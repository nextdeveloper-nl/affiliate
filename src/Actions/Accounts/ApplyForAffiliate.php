<?php

namespace NextDeveloper\Affiliate\Actions\Accounts;

use NextDeveloper\Commons\Actions\AbstractAction;
use NextDeveloper\Events\Services\Events;
use NextDeveloper\IAM\Database\Models\Accounts;
use NextDeveloper\IAM\Database\Models\Users;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;
use NextDeveloper\IAM\Helpers\RoleHelper;
use NextDeveloper\IAM\Helpers\UserHelper;

/**
 * This action will apply for the affiliate program for the user.
 */
class ApplyForAffiliate extends AbstractAction
{
    public const EVENTS = [
        'affiliate-applied:NextDeveloper\Affiliate\Accounts',
        'affiliate-applied:NextDeveloper\IAM\Accounts'
    ];

    /**
     * This action will apply for the affiliate program for the user.
     *
     * @param Accounts $accounts
     * @param ...$args
     */
    public function __construct(Accounts $accounts, ...$args)
    {
        $this->model = $accounts;
    }

    public function handle()
    {
        $this->setProgress(0, 'Starting to apply for the affiliate program');

        $account = $this->model;

        // We will check if the user has already applied for the affiliate program
        if ($account->hasRole('affiliate-user')) {
            $this->setProgress(100, 'The user has already applied for the affiliate program');
            return;
        }

        // We will add the affiliate role to the user
        $user = Users::withoutGlobalScope(AuthorizationScope::class)->where('id', $account->iam_user_id)->first();

        //  Create this function so that we can add the user to the affiliate-user role
        RoleHelper::addUserToRole($user, 'affiliate-user');

        //  Then send the user an email to confirm that they have applied for the affiliate program


        $iamAccount = Accounts::withoutGlobalScope(AuthorizationScope::class)
            ->where('id', $account->iam_account_id)
            ->first();

        Events::fire('affiliate-applied:NextDeveloper\Affiliate\Accounts', $account);
        Events::fire('affiliate-applied:NextDeveloper\IAM\Accounts', $iamAccount);

        $this->setProgress(100, 'The user has successfully applied for the affiliate program');
    }
}

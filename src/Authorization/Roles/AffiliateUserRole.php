<?php

namespace NextDeveloper\Affiliate\Authorization\Roles;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use NextDeveloper\Affiliate\Database\Models\Accounts;
use NextDeveloper\CRM\Database\Models\AccountManagers;
use NextDeveloper\IAM\Authorization\Roles\AbstractRole;
use NextDeveloper\IAM\Authorization\Roles\IAuthorizationRole;
use NextDeveloper\IAM\Database\Models\Users;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;
use NextDeveloper\IAM\Helpers\UserHelper;

class AffiliateUserRole extends AbstractRole implements IAuthorizationRole
{
    public const NAME = 'affiliate-user';

    public const LEVEL = 150;

    public const DESCRIPTION = 'Affiliate user who is applied for the affiliate program.';

    public const DB_PREFIX = 'affiliate';

    /**
     * Applies basic member role sql for Eloquent
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if($model->getTable() == 'affiliate_stats') {
            $account = Accounts::withoutGlobalScope(AuthorizationScope::class)
                ->where('iam_account_id', UserHelper::currentAccount()->id)
                ->first();

            $builder->where('affiliate_account_id', $account->id);
        }
    }

    public function checkPrivileges(Users $users = null)
    {
        //return UserHelper::hasRole(self::NAME, $users);
    }

    public function getModule()
    {
        return 'affiliate';
    }

    public function allowedOperations() :array
    {
        return [
            'affiliate_accounts:read',
            'affiliate_accounts:write',
            'affiliate_accounts:delete',
            'affiliate_marketplace_products:read',
            'affiliate_marketplace_products:write',
            'affiliate_marketplace_products:delete',
            'affiliate_stats:read',
            'affiliate_stats:write',
            'affiliate_stats:delete'
        ];
    }

    public function getLevel(): int
    {
        return self::LEVEL;
    }

    public function getDescription(): string
    {
        return self::DESCRIPTION;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function canBeApplied($column)
    {
        if(self::DB_PREFIX === '*') {
            return true;
        }

        if(Str::startsWith($column, self::DB_PREFIX)) {
            return true;
        }

        return false;
    }

    public function getDbPrefix()
    {
        return self::DB_PREFIX;
    }

    public function checkRules(Users $users): bool
    {
        // TODO: Implement checkRules() method.
    }
}

<?php

namespace NextDeveloper\Affiliate\Authorization\Roles;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use NextDeveloper\CRM\Database\Models\AccountManagers;
use NextDeveloper\IAM\Authorization\Roles\AbstractRole;
use NextDeveloper\IAM\Authorization\Roles\IAuthorizationRole;
use NextDeveloper\IAM\Database\Models\Users;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;
use NextDeveloper\IAM\Helpers\UserHelper;

class AffiliateAdminRole extends AbstractRole implements IAuthorizationRole
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
        //  This role used to return every affiliate row of every account. It now sees its own affiliate data only.
        $accountId = UserHelper::currentAccount()->id;
        $table = $model->getTable();

        //  Plain query builder subquery: the acting account's affiliate accounts, without recursing into the scope.
        $myAffiliateAccountIds = \Illuminate\Support\Facades\DB::table('affiliate_accounts')
            ->select('id')
            ->where('iam_account_id', $accountId);

        if ($table == 'affiliate_accounts') {
            $builder->where('affiliate_accounts.iam_account_id', $accountId);

            return;
        }

        //  Customers brought in by my affiliate account(s), plus my own row as a customer.
        if ($table == 'affiliate_customers') {
            $builder->where(function (Builder $q) use ($accountId, $myAffiliateAccountIds) {
                $q->where('affiliate_customers.iam_account_id', $accountId)
                    ->orWhereIn('affiliate_customers.affiliate_account_id', $myAffiliateAccountIds);
            });

            return;
        }

        if ($table == 'affiliate_stats') {
            $builder->whereIn('affiliate_stats.affiliate_account_id', $myAffiliateAccountIds);

            return;
        }

        //  The product catalog (commission rates) is shared by every affiliate.
        if ($table == 'affiliate_marketplace_products') {
            return;
        }

        if (\NextDeveloper\Commons\Helpers\DatabaseHelper::isColumnExists($table, 'iam_account_id')) {
            $builder->where($table . '.iam_account_id', $accountId);

            return;
        }

        //  Unknown table without an owner column: fail closed.
        $builder->whereRaw('1 = 0');
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

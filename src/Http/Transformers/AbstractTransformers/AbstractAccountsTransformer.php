<?php

namespace NextDeveloper\Affiliate\Http\Transformers\AbstractTransformers;

use NextDeveloper\Affiliate\Database\Models\Accounts;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class AccountsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Affiliate\Http\Transformers
 */
class AbstractAccountsTransformer extends AbstractTransformer
{

    /**
     * @param Accounts $model
     *
     * @return array
     */
    public function transform(Accounts $model)
    {
                        $superiorAccountId = \NextDeveloper\\Database\Models\SuperiorAccounts::where('id', $model->superior_account_id)->first();
                    $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'reference_code'  =>  $model->reference_code,
            'superior_account_id'  =>  $superiorAccountId ? $superiorAccountId->uuid : null,
            'is_brand_ambassador'  =>  $model->is_brand_ambassador,
            'payable_income'  =>  $model->payable_income,
            'customer_count'  =>  $model->customer_count,
            'iban'  =>  $model->iban,
            'level'  =>  $model->level,
            'plusclouds_points'  =>  $model->plusclouds_points,
            'boosts'  =>  $model->boosts,
            'mystery_box'  =>  $model->mystery_box,
            'badges'  =>  $model->badges,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'is_suspended'  =>  $model->is_suspended,
            'suspension_reason'  =>  $model->suspension_reason,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}

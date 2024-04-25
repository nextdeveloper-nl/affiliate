<?php

namespace NextDeveloper\Affiliate\Http\Transformers\AbstractTransformers;

use NextDeveloper\Affiliate\Database\Models\Customers;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class CustomersTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Affiliate\Http\Transformers
 */
class AbstractCustomersTransformer extends AbstractTransformer
{

    /**
     * @param Customers $model
     *
     * @return array
     */
    public function transform(Customers $model)
    {
                        $affiliateAccountId = \NextDeveloper\Affiliate\Database\Models\Accounts::where('id', $model->affiliate_account_id)->first();
                    $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'affiliate_account_id'  =>  $affiliateAccountId ? $affiliateAccountId->uuid : null,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'is_active'  =>  $model->is_active,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}

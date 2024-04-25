<?php

namespace NextDeveloper\Affiliate\Http\Transformers\AbstractTransformers;

use NextDeveloper\Affiliate\Database\Models\Stats;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class StatsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Affiliate\Http\Transformers
 */
class AbstractStatsTransformer extends AbstractTransformer
{

    /**
     * @param Stats $model
     *
     * @return array
     */
    public function transform(Stats $model)
    {
                        $affiliateAccountId = \NextDeveloper\Affiliate\Database\Models\Accounts::where('id', $model->affiliate_account_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'affiliate_account_id'  =>  $affiliateAccountId ? $affiliateAccountId->uuid : null,
            'date'  =>  $model->date,
            'sales_count'  =>  $model->sales_count,
            'visitor_count'  =>  $model->visitor_count,
            'registration_count'  =>  $model->registration_count,
            'subscription_count'  =>  $model->subscription_count,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}

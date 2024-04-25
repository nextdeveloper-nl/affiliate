<?php

namespace NextDeveloper\Affiliate\Http\Transformers\AbstractTransformers;

use NextDeveloper\Affiliate\Database\Models\MarketplaceProducts;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class MarketplaceProductsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Affiliate\Http\Transformers
 */
class AbstractMarketplaceProductsTransformer extends AbstractTransformer
{

    /**
     * @param MarketplaceProducts $model
     *
     * @return array
     */
    public function transform(MarketplaceProducts $model)
    {
                        $commonCurrencyId = \NextDeveloper\Commons\Database\Models\Currencies::where('id', $model->common_currency_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'commission_rate'  =>  $model->commission_rate,
            'pay_per_sale_amount'  =>  $model->pay_per_sale_amount,
            'common_currency_id'  =>  $commonCurrencyId ? $commonCurrencyId->uuid : null,
            'object_type'  =>  $model->object_type,
            'object_id'  =>  $model->object_id,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}

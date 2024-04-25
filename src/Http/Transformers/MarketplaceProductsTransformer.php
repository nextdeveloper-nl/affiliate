<?php

namespace NextDeveloper\Affiliate\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Affiliate\Database\Models\MarketplaceProducts;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Affiliate\Http\Transformers\AbstractTransformers\AbstractMarketplaceProductsTransformer;

/**
 * Class MarketplaceProductsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Affiliate\Http\Transformers
 */
class MarketplaceProductsTransformer extends AbstractMarketplaceProductsTransformer
{

    /**
     * @param MarketplaceProducts $model
     *
     * @return array
     */
    public function transform(MarketplaceProducts $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('MarketplaceProducts', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('MarketplaceProducts', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}

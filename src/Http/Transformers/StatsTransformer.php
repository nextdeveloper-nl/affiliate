<?php

namespace NextDeveloper\Affiliate\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Affiliate\Database\Models\Stats;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Affiliate\Http\Transformers\AbstractTransformers\AbstractStatsTransformer;

/**
 * Class StatsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Affiliate\Http\Transformers
 */
class StatsTransformer extends AbstractStatsTransformer
{

    /**
     * @param Stats $model
     *
     * @return array
     */
    public function transform(Stats $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Stats', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Stats', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}

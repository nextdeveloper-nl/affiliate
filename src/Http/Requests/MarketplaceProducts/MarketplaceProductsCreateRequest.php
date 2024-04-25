<?php

namespace NextDeveloper\Affiliate\Http\Requests\MarketplaceProducts;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class MarketplaceProductsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'commission_rate' => '',
        'pay_per_sale_amount' => '',
        'common_currency_id' => 'nullable|exists:common_currencies,uuid|uuid',
        'object_type' => 'required|string',
        'object_id' => 'required',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
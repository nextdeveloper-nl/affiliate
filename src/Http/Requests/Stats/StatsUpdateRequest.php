<?php

namespace NextDeveloper\Affiliate\Http\Requests\Stats;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class StatsUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'affiliate_account_id' => 'nullable|exists:affiliate_accounts,uuid|uuid',
        'date' => 'nullable|date',
        'sales_count' => 'integer',
        'visitor_count' => 'integer',
        'registration_count' => 'integer',
        'subscription_count' => 'integer',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
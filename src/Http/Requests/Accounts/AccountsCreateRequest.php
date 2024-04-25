<?php

namespace NextDeveloper\Affiliate\Http\Requests\Accounts;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class AccountsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'reference_code' => 'required|string',
        'superior_account_id' => 'nullable|exists:superior_accounts,uuid|uuid',
        'is_brand_ambassador' => 'boolean',
        'payable_income' => 'required',
        'customer_count' => 'integer',
        'iban' => 'nullable|string',
        'level' => 'integer',
        'plusclouds_points' => 'integer',
        'boosts' => 'nullable',
        'mystery_box' => 'nullable',
        'badges' => 'nullable',
        'is_suspended' => 'boolean',
        'suspension_reason' => 'nullable|string',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
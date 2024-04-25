<?php

Route::prefix('affiliate')->group(
    function () {
        Route::prefix('marketplace-products')->group(
            function () {
                Route::get('/', 'MarketplaceProducts\MarketplaceProductsController@index');
                Route::get('/actions', 'MarketplaceProducts\MarketplaceProductsController@getActions');

                Route::get('{affiliate_marketplace_products}/tags ', 'MarketplaceProducts\MarketplaceProductsController@tags');
                Route::post('{affiliate_marketplace_products}/tags ', 'MarketplaceProducts\MarketplaceProductsController@saveTags');
                Route::get('{affiliate_marketplace_products}/addresses ', 'MarketplaceProducts\MarketplaceProductsController@addresses');
                Route::post('{affiliate_marketplace_products}/addresses ', 'MarketplaceProducts\MarketplaceProductsController@saveAddresses');

                Route::get('/{affiliate_marketplace_products}/{subObjects}', 'MarketplaceProducts\MarketplaceProductsController@relatedObjects');
                Route::get('/{affiliate_marketplace_products}', 'MarketplaceProducts\MarketplaceProductsController@show');

                Route::post('/', 'MarketplaceProducts\MarketplaceProductsController@store');
                Route::post('/{affiliate_marketplace_products}/do/{action}', 'MarketplaceProducts\MarketplaceProductsController@doAction');

                Route::patch('/{affiliate_marketplace_products}', 'MarketplaceProducts\MarketplaceProductsController@update');
                Route::delete('/{affiliate_marketplace_products}', 'MarketplaceProducts\MarketplaceProductsController@destroy');
            }
        );

        Route::prefix('stats')->group(
            function () {
                Route::get('/', 'Stats\StatsController@index');
                Route::get('/actions', 'Stats\StatsController@getActions');

                Route::get('{affiliate_stats}/tags ', 'Stats\StatsController@tags');
                Route::post('{affiliate_stats}/tags ', 'Stats\StatsController@saveTags');
                Route::get('{affiliate_stats}/addresses ', 'Stats\StatsController@addresses');
                Route::post('{affiliate_stats}/addresses ', 'Stats\StatsController@saveAddresses');

                Route::get('/{affiliate_stats}/{subObjects}', 'Stats\StatsController@relatedObjects');
                Route::get('/{affiliate_stats}', 'Stats\StatsController@show');

                Route::post('/', 'Stats\StatsController@store');
                Route::post('/{affiliate_stats}/do/{action}', 'Stats\StatsController@doAction');

                Route::patch('/{affiliate_stats}', 'Stats\StatsController@update');
                Route::delete('/{affiliate_stats}', 'Stats\StatsController@destroy');
            }
        );

        Route::prefix('accounts')->group(
            function () {
                Route::get('/', 'Accounts\AccountsController@index');
                Route::get('/actions', 'Accounts\AccountsController@getActions');

                Route::get('{affiliate_accounts}/tags ', 'Accounts\AccountsController@tags');
                Route::post('{affiliate_accounts}/tags ', 'Accounts\AccountsController@saveTags');
                Route::get('{affiliate_accounts}/addresses ', 'Accounts\AccountsController@addresses');
                Route::post('{affiliate_accounts}/addresses ', 'Accounts\AccountsController@saveAddresses');

                Route::get('/{affiliate_accounts}/{subObjects}', 'Accounts\AccountsController@relatedObjects');
                Route::get('/{affiliate_accounts}', 'Accounts\AccountsController@show');

                Route::post('/', 'Accounts\AccountsController@store');
                Route::post('/{affiliate_accounts}/do/{action}', 'Accounts\AccountsController@doAction');

                Route::patch('/{affiliate_accounts}', 'Accounts\AccountsController@update');
                Route::delete('/{affiliate_accounts}', 'Accounts\AccountsController@destroy');
            }
        );

        Route::prefix('customers')->group(
            function () {
                Route::get('/', 'Customers\CustomersController@index');
                Route::get('/actions', 'Customers\CustomersController@getActions');

                Route::get('{affiliate_customers}/tags ', 'Customers\CustomersController@tags');
                Route::post('{affiliate_customers}/tags ', 'Customers\CustomersController@saveTags');
                Route::get('{affiliate_customers}/addresses ', 'Customers\CustomersController@addresses');
                Route::post('{affiliate_customers}/addresses ', 'Customers\CustomersController@saveAddresses');

                Route::get('/{affiliate_customers}/{subObjects}', 'Customers\CustomersController@relatedObjects');
                Route::get('/{affiliate_customers}', 'Customers\CustomersController@show');

                Route::post('/', 'Customers\CustomersController@store');
                Route::post('/{affiliate_customers}/do/{action}', 'Customers\CustomersController@doAction');

                Route::patch('/{affiliate_customers}', 'Customers\CustomersController@update');
                Route::delete('/{affiliate_customers}', 'Customers\CustomersController@destroy');
            }
        );

        // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE




    }
);


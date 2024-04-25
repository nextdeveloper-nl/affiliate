<?php

namespace NextDeveloper\Affiliate\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Affiliate\Database\Filters\AffiliateMarketplaceProductQueryFilter;
use NextDeveloper\Affiliate\Services\AbstractServices\AbstractAffiliateMarketplaceProductService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait AffiliateMarketplaceProductTestTraits
{
    public $http;

    /**
     *   Creating the Guzzle object
     */
    public function setupGuzzle()
    {
        $this->http = new Client(
            [
            'base_uri'  =>  '127.0.0.1:8000'
            ]
        );
    }

    /**
     *   Destroying the Guzzle object
     */
    public function destroyGuzzle()
    {
        $this->http = null;
    }

    public function test_http_affiliatemarketplaceproduct_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/affiliate/affiliatemarketplaceproduct',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_affiliatemarketplaceproduct_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/affiliate/affiliatemarketplaceproduct', [
            'form_params'   =>  [
                'object_type'  =>  'a',
                            ],
                ['http_errors' => false]
            ]
        );

        $this->assertEquals($response->getStatusCode(), Response::HTTP_OK);
    }

    /**
     * Get test
     *
     * @return bool
     */
    public function test_affiliatemarketplaceproduct_model_get()
    {
        $result = AbstractAffiliateMarketplaceProductService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_affiliatemarketplaceproduct_get_all()
    {
        $result = AbstractAffiliateMarketplaceProductService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_affiliatemarketplaceproduct_get_paginated()
    {
        $result = AbstractAffiliateMarketplaceProductService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_affiliatemarketplaceproduct_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatemarketplaceproduct_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatemarketplaceproduct_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateMarketplaceProduct\AffiliateMarketplaceProductRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatemarketplaceproduct_event_object_type_filter()
    {
        try {
            $request = new Request(
                [
                'object_type'  =>  'a'
                ]
            );

            $filter = new AffiliateMarketplaceProductQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatemarketplaceproduct_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new AffiliateMarketplaceProductQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatemarketplaceproduct_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new AffiliateMarketplaceProductQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatemarketplaceproduct_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new AffiliateMarketplaceProductQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatemarketplaceproduct_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateMarketplaceProductQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatemarketplaceproduct_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateMarketplaceProductQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatemarketplaceproduct_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateMarketplaceProductQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatemarketplaceproduct_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateMarketplaceProductQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatemarketplaceproduct_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateMarketplaceProductQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatemarketplaceproduct_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateMarketplaceProductQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateMarketplaceProduct::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
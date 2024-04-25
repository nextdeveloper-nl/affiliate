<?php

namespace NextDeveloper\Affiliate\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Affiliate\Database\Filters\AffiliateCustomerQueryFilter;
use NextDeveloper\Affiliate\Services\AbstractServices\AbstractAffiliateCustomerService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait AffiliateCustomerTestTraits
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

    public function test_http_affiliatecustomer_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/affiliate/affiliatecustomer',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_affiliatecustomer_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/affiliate/affiliatecustomer', [
            'form_params'   =>  [
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
    public function test_affiliatecustomer_model_get()
    {
        $result = AbstractAffiliateCustomerService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_affiliatecustomer_get_all()
    {
        $result = AbstractAffiliateCustomerService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_affiliatecustomer_get_paginated()
    {
        $result = AbstractAffiliateCustomerService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_affiliatecustomer_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatecustomer_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatecustomer_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateCustomer\AffiliateCustomerRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatecustomer_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new AffiliateCustomerQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatecustomer_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new AffiliateCustomerQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatecustomer_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new AffiliateCustomerQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatecustomer_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateCustomerQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatecustomer_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateCustomerQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatecustomer_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateCustomerQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatecustomer_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateCustomerQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatecustomer_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateCustomerQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatecustomer_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateCustomerQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
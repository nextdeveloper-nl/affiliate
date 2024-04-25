<?php

namespace NextDeveloper\Affiliate\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Affiliate\Database\Filters\AffiliateStatQueryFilter;
use NextDeveloper\Affiliate\Services\AbstractServices\AbstractAffiliateStatService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait AffiliateStatTestTraits
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

    public function test_http_affiliatestat_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/affiliate/affiliatestat',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_affiliatestat_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/affiliate/affiliatestat', [
            'form_params'   =>  [
                'sales_count'  =>  '1',
                'visitor_count'  =>  '1',
                'registration_count'  =>  '1',
                'subscription_count'  =>  '1',
                    'date'  =>  now(),
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
    public function test_affiliatestat_model_get()
    {
        $result = AbstractAffiliateStatService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_affiliatestat_get_all()
    {
        $result = AbstractAffiliateStatService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_affiliatestat_get_paginated()
    {
        $result = AbstractAffiliateStatService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_affiliatestat_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliatestat_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateStat\AffiliateStatRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_sales_count_filter()
    {
        try {
            $request = new Request(
                [
                'sales_count'  =>  '1'
                ]
            );

            $filter = new AffiliateStatQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_visitor_count_filter()
    {
        try {
            $request = new Request(
                [
                'visitor_count'  =>  '1'
                ]
            );

            $filter = new AffiliateStatQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_registration_count_filter()
    {
        try {
            $request = new Request(
                [
                'registration_count'  =>  '1'
                ]
            );

            $filter = new AffiliateStatQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_subscription_count_filter()
    {
        try {
            $request = new Request(
                [
                'subscription_count'  =>  '1'
                ]
            );

            $filter = new AffiliateStatQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'dateStart'  =>  now()
                ]
            );

            $filter = new AffiliateStatQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new AffiliateStatQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new AffiliateStatQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new AffiliateStatQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'dateEnd'  =>  now()
                ]
            );

            $filter = new AffiliateStatQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateStatQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateStatQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateStatQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'dateStart'  =>  now(),
                'dateEnd'  =>  now()
                ]
            );

            $filter = new AffiliateStatQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateStatQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateStatQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliatestat_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateStatQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
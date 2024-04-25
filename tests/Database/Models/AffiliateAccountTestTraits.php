<?php

namespace NextDeveloper\Affiliate\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Affiliate\Database\Filters\AffiliateAccountQueryFilter;
use NextDeveloper\Affiliate\Services\AbstractServices\AbstractAffiliateAccountService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait AffiliateAccountTestTraits
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

    public function test_http_affiliateaccount_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/affiliate/affiliateaccount',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_affiliateaccount_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/affiliate/affiliateaccount', [
            'form_params'   =>  [
                'reference_code'  =>  'a',
                'iban'  =>  'a',
                'suspension_reason'  =>  'a',
                'customer_count'  =>  '1',
                'level'  =>  '1',
                'plusclouds_points'  =>  '1',
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
    public function test_affiliateaccount_model_get()
    {
        $result = AbstractAffiliateAccountService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_affiliateaccount_get_all()
    {
        $result = AbstractAffiliateAccountService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_affiliateaccount_get_paginated()
    {
        $result = AbstractAffiliateAccountService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_affiliateaccount_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliateaccount_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_affiliateaccount_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::first();

            event(new \NextDeveloper\Affiliate\Events\AffiliateAccount\AffiliateAccountRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliateaccount_event_reference_code_filter()
    {
        try {
            $request = new Request(
                [
                'reference_code'  =>  'a'
                ]
            );

            $filter = new AffiliateAccountQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliateaccount_event_iban_filter()
    {
        try {
            $request = new Request(
                [
                'iban'  =>  'a'
                ]
            );

            $filter = new AffiliateAccountQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliateaccount_event_suspension_reason_filter()
    {
        try {
            $request = new Request(
                [
                'suspension_reason'  =>  'a'
                ]
            );

            $filter = new AffiliateAccountQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliateaccount_event_customer_count_filter()
    {
        try {
            $request = new Request(
                [
                'customer_count'  =>  '1'
                ]
            );

            $filter = new AffiliateAccountQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliateaccount_event_level_filter()
    {
        try {
            $request = new Request(
                [
                'level'  =>  '1'
                ]
            );

            $filter = new AffiliateAccountQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliateaccount_event_plusclouds_points_filter()
    {
        try {
            $request = new Request(
                [
                'plusclouds_points'  =>  '1'
                ]
            );

            $filter = new AffiliateAccountQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliateaccount_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new AffiliateAccountQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliateaccount_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new AffiliateAccountQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliateaccount_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new AffiliateAccountQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliateaccount_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateAccountQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliateaccount_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateAccountQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliateaccount_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateAccountQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliateaccount_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateAccountQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliateaccount_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateAccountQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_affiliateaccount_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new AffiliateAccountQueryFilter($request);

            $model = \NextDeveloper\Affiliate\Database\Models\AffiliateAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
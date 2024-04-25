<?php

namespace NextDeveloper\Affiliate\Http\Controllers\MarketplaceProducts;

use Illuminate\Http\Request;
use NextDeveloper\Affiliate\Http\Controllers\AbstractController;
use NextDeveloper\Commons\Http\Response\ResponsableFactory;
use NextDeveloper\Affiliate\Http\Requests\MarketplaceProducts\MarketplaceProductsUpdateRequest;
use NextDeveloper\Affiliate\Database\Filters\MarketplaceProductsQueryFilter;
use NextDeveloper\Affiliate\Database\Models\MarketplaceProducts;
use NextDeveloper\Affiliate\Services\MarketplaceProductsService;
use NextDeveloper\Affiliate\Http\Requests\MarketplaceProducts\MarketplaceProductsCreateRequest;
use NextDeveloper\Commons\Http\Traits\Tags;use NextDeveloper\Commons\Http\Traits\Addresses;
class MarketplaceProductsController extends AbstractController
{
    private $model = MarketplaceProducts::class;

    use Tags;
    use Addresses;
    /**
     * This method returns the list of marketplaceproducts.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  MarketplaceProductsQueryFilter $filter  An object that builds search query
     * @param  Request                        $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(MarketplaceProductsQueryFilter $filter, Request $request)
    {
        $data = MarketplaceProductsService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This function returns the list of actions that can be performed on this object.
     *
     * @return void
     */
    public function getActions()
    {
        $actions = MarketplaceProductsService::getActions();

        if($actions) {
            if(array_key_exists($this->model, $actions)) {
                return $this->withArray($actions[$this->model]);
            }
        }

        return $this->noContent();
    }

    /**
     * Makes the related action to the object
     *
     * @param  $objectId
     * @param  $action
     * @return array
     */
    public function doAction($objectId, $action)
    {
        $actionId = MarketplaceProductsService::doAction($objectId, $action);

        return $this->withArray(
            [
            'action_id' =>  $actionId
            ]
        );
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $marketplaceProductsId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = MarketplaceProductsService::getByRef($ref);

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method returns the list of sub objects the related object. Sub object means an object which is preowned by
     * this object.
     *
     * It can be tags, addresses, states etc.
     *
     * @param  $ref
     * @param  $subObject
     * @return void
     */
    public function relatedObjects($ref, $subObject)
    {
        $objects = MarketplaceProductsService::relatedObjects($ref, $subObject);

        return ResponsableFactory::makeResponse($this, $objects);
    }

    /**
     * This method created MarketplaceProducts object on database.
     *
     * @param  MarketplaceProductsCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(MarketplaceProductsCreateRequest $request)
    {
        $model = MarketplaceProductsService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates MarketplaceProducts object on database.
     *
     * @param  $marketplaceProductsId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($marketplaceProductsId, MarketplaceProductsUpdateRequest $request)
    {
        $model = MarketplaceProductsService::update($marketplaceProductsId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates MarketplaceProducts object on database.
     *
     * @param  $marketplaceProductsId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($marketplaceProductsId)
    {
        $model = MarketplaceProductsService::delete($marketplaceProductsId);

        return $this->noContent();
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}

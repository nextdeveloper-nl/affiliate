<?php

namespace NextDeveloper\Affiliate\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Affiliate\Database\Observers\AccountsObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * Accounts model.
 *
 * @package  NextDeveloper\Affiliate\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property string $reference_code
 * @property integer $superior_account_id
 * @property boolean $is_brand_ambassador
 * @property $payable_income
 * @property integer $customer_count
 * @property string $iban
 * @property integer $level
 * @property integer $plusclouds_points
 * @property $boosts
 * @property $mystery_box
 * @property $badges
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property integer $iam_account_id
 * @property boolean $is_suspended
 * @property string $suspension_reason
 */
class Accounts extends Model
{
    use Filterable, UuidId, CleanCache, Taggable;
    use SoftDeletes;


    public $timestamps = true;

    protected $table = 'affiliate_accounts';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'reference_code',
            'superior_account_id',
            'is_brand_ambassador',
            'payable_income',
            'customer_count',
            'iban',
            'level',
            'plusclouds_points',
            'boosts',
            'mystery_box',
            'badges',
            'iam_account_id',
            'is_suspended',
            'suspension_reason',
    ];

    /**
      Here we have the fulltext fields. We can use these for fulltext search if enabled.
     */
    protected $fullTextFields = [

    ];

    /**
     @var array
     */
    protected $appends = [

    ];

    /**
     We are casting fields to objects so that we can work on them better
     *
     @var array
     */
    protected $casts = [
    'id' => 'integer',
    'reference_code' => 'string',
    'superior_account_id' => 'integer',
    'is_brand_ambassador' => 'boolean',
    'customer_count' => 'integer',
    'iban' => 'string',
    'level' => 'integer',
    'plusclouds_points' => 'integer',
    'boosts' => 'array',
    'mystery_box' => 'array',
    'badges' => 'array',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    'deleted_at' => 'datetime',
    'is_suspended' => 'boolean',
    'suspension_reason' => 'string',
    ];

    /**
     We are casting data fields.
     *
     @var array
     */
    protected $dates = [
    'created_at',
    'updated_at',
    'deleted_at',
    ];

    /**
     @var array
     */
    protected $with = [

    ];

    /**
     @var int
     */
    protected $perPage = 20;

    /**
     @return void
     */
    public static function boot()
    {
        parent::boot();

        //  We create and add Observer even if we wont use it.
        parent::observe(AccountsObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('affiliate.scopes.global');
        $modelScopes = config('affiliate.scopes.affiliate_accounts');

        if(!$modelScopes) { $modelScopes = [];
        }
        if (!$globalScopes) { $globalScopes = [];
        }

        $scopes = array_merge(
            $globalScopes,
            $modelScopes
        );

        if($scopes) {
            foreach ($scopes as $scope) {
                static::addGlobalScope(app($scope));
            }
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}

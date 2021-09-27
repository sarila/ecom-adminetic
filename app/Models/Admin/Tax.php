<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Tax extends Model
{
    use LogsActivity;

    protected $guarded = [];

    // Forget cache on updating or saving and deleting
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            self::cacheKey();
        });

        static::deleting(function () {
            self::cacheKey();
        });
    }

    // Cache Keys
    private static function cacheKey()
    {
        Cache::has('taxes') ? Cache::forget('taxes') : '';
    }

    // Logs
    protected static $logName = 'tax';

    //Accessor
    protected function getTypeAttribute($type) {
        if ($type == 1) {
            return "Percentage";
        } else {
            return "Flat";
        }
    }
}

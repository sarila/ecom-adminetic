<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Str;

class Category extends Model
{
    use LogsActivity;

    protected $guarded = [];

    //
    public function parentCategory(){
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function setSlugAttribute($slug) {
        if (static::whereSlug($slug = Str::slug($slug))->exists()) {
            $slug = $this->incrementSlug($slug);
        }
        $this->attributes['slug'] = $slug;
    } 

    public function incrementSlug($slug) {
        $original = $slug;
        $count = 2;
        while (static::whereSlug($slug)->exists()) {
            $slug = "{$original}-" . $count++;
        }
        return $slug;
    }

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
        Cache::has('categories') ? Cache::forget('categories') : '';
    }

    // Logs
    protected static $logName = 'category';

    //Accessor Status
    protected function getStatusAttribute($status) {
        if($status == 0) {
            return "Inactive";
        } else {
            return "Active";
        }
    }
}

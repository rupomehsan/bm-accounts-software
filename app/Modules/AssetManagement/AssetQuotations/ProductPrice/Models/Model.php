<?php

namespace App\Modules\AssetManagement\AssetQuotations\ProductPrice\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    protected static $productModel = \App\Modules\AssetManagement\AssetQuotations\Product\Models\Model::class;
    protected $table = "product_prices";
    protected $guarded = [];

    protected static function booted()
    {
        static::created(function ($data) {
            $random_no = random_int(100, 999) . $data->id . random_int(100, 999);
            $slug = $data->title . " " . $random_no;
            $data->slug = Str::slug($slug);
            $data->save();
        });
    }

    public function scopeActive($q)
    {
        return $q->where('status', 'active');
    }

    public function product()
    {
        return $this->belongsTo(self::$productModel, 'product_id', 'id');
    }
    
}

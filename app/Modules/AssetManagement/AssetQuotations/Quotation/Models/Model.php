<?php

namespace App\Modules\AssetManagement\AssetQuotations\Quotation\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    static $quotationProductPriceModel =  \App\Modules\AssetManagement\AssetQuotations\ProductPrice\Models\Model::class;
    protected $table = "quotations";
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


    public function quotation_product_price()
    {
        return $this->hasMany(self::$quotationProductPriceModel, 'asset_quotation_id');
    }
}

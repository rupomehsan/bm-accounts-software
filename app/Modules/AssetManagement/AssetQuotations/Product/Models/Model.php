<?php

namespace App\Modules\AssetManagement\AssetQuotations\Product\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    protected static $quotationModel = \App\Modules\AssetManagement\AssetQuotations\Quotation\Models\Model::class;
    protected $table = "products";
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

    public function quotation()
    {
        return $this->belongsTo(self::$quotationModel, 'asset_quotation_id', 'id');
    }
}

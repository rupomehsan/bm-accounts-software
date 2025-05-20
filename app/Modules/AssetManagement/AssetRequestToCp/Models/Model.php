<?php

namespace App\Modules\AssetManagement\AssetRequestToCp\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    protected static $assetModel = \App\Modules\AssetManagement\Asset\Models\Model::class;
    protected static $assetQuotationModel = \App\Modules\AssetManagement\AssetQuotations\Quotation\Models\Model::class;
    protected static $userModel = \App\Modules\User\Model::class;

    protected $table = "asset_request_to_cps";
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

    public function asset()
    {
        return $this->belongsTo(self::$assetModel, 'asset_id', 'id');
    }
    public function asset_quotation()
    {
        return $this->belongsTo(self::$assetQuotationModel, 'asset_quotation_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(self::$userModel, 'creator', 'id');
    }
}

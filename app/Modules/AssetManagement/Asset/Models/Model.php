<?php

namespace App\Modules\AssetManagement\Asset\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    static $assetAuditListModel = \App\Modules\AssetManagement\AssetAuditList\Models\Model::class;
    static $assetBrandModel = \App\Modules\AssetManagement\AssetBrand\Models\Model::class;
    static $assetTransferModel = \App\Modules\AssetManagement\AssetTransfer\Models\Model::class;
    static $asseItemsModel = \App\Modules\AssetManagement\AssetItem\Models\Model::class;
    static $asseLostModel = \App\Modules\AssetManagement\AssetLost\Models\Model::class;
    static $asseRequestToCpModel = \App\Modules\AssetManagement\AssetRequestToCp\Models\Model::class;
    static $asseCategoryModel = \App\Modules\AssetManagement\AssetCategory\Models\Model::class;

    protected $table = "assets";
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

    public function asset_audit_list()
    {
        return $this->hasOne(self::$assetAuditListModel, 'asset_id');
    }
    public function asset_brands()
    {
        return $this->hasMany(self::$assetBrandModel, 'asset_id');
    }
    public function asset_transfer()
    {
        return $this->hasOne(self::$assetTransferModel, 'asset_id');
    }
    public function asset_items()
    {
        return $this->hasMany(self::$asseItemsModel, 'asset_id');
    }
    public function asset_lost()
    {
        return $this->hasOne(self::$asseLostModel, 'asset_id');
    }
    public function asset_request_to_cp()
    {
        return $this->hasMany(self::$asseRequestToCpModel, 'asset_id');
    }
    public function asset_item_category()
    {
        return $this->belongsToMany(self::$asseCategoryModel, 'assets_has_asset_category', 'asset_id', 'asset_category_id');
    }
}

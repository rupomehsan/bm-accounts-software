<?php

namespace App\Modules\AssetManagement\Asset\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class AssetCategoryModel extends EloquentModel
{
    protected $table = "assets_has_asset_category";
    protected $guarded = [];
}

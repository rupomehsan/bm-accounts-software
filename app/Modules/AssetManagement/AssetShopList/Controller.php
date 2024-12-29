<?php

namespace App\Modules\AssetManagement\AssetShopList;

use App\Modules\AssetManagement\AssetShopList\Actions\All;
use App\Modules\AssetManagement\AssetShopList\Actions\Delete;
use App\Modules\AssetManagement\AssetShopList\Actions\Show;
use App\Modules\AssetManagement\AssetShopList\Actions\Store;
use App\Modules\AssetManagement\AssetShopList\Actions\Update;
use App\Modules\AssetManagement\AssetShopList\Validations\Validation;
use App\Modules\AssetManagement\AssetShopList\Actions\BulkActions;
use App\Http\Controllers\Controller as ControllersController;


class Controller extends ControllersController
{

    public function index()
    {
        $data = All::execute();
        return $data;
    }

    public function store(Validation $request)
    {
        $data = Store::execute($request);
        return $data;
    }

    public function show($id)
    {
        $data = Show::execute($id);
        return $data;
    }

    public function update(Validation $request, $id)
    {
        $data = Update::execute($request, $id);
        return $data;
    }

    public function destroy($id)
    {
        $data = Delete::execute($id);
        return $data;
    }
    public function bulkAction()
    {
        $data = BulkActions::execute();
        return $data;
    }

}
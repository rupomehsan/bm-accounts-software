<?php

namespace App\Modules\AssetManagement\Asset;

use App\Modules\AssetManagement\Asset\Actions\All;
use App\Modules\AssetManagement\Asset\Actions\Delete;
use App\Modules\AssetManagement\Asset\Actions\Show;
use App\Modules\AssetManagement\Asset\Actions\Store;
use App\Modules\AssetManagement\Asset\Actions\Update;
use App\Modules\AssetManagement\Asset\Validations\Validation;
use App\Modules\AssetManagement\Asset\Actions\BulkActions;
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
    public function showDetails($id)
    {
        $data = Show::showDetails($id);
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

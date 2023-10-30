<?php

namespace App\Modules\AssetWaranty;

use App\Modules\AssetWaranty\Actions\All;
use App\Modules\AssetWaranty\Actions\Delete;
use App\Modules\AssetWaranty\Actions\Show;
use App\Modules\AssetWaranty\Actions\Store;
use App\Modules\AssetWaranty\Actions\Update;
use App\Modules\AssetWaranty\Actions\Validation;
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

    public function update($request, $id)
    {
        $data = Update::execute($request, $id);
        return $data;
    }

    public function destroy($id)
    {
        $data = Delete::execute($id);
        return $data;
    }
}
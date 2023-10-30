<?php

namespace App\Modules\AppSetting;

use App\Modules\AppSetting\Actions\All;
use App\Modules\AppSetting\Actions\Delete;
use App\Modules\AppSetting\Actions\Show;
use App\Modules\AppSetting\Actions\Store;
use App\Modules\AppSetting\Actions\Update;
use App\Modules\AppSetting\Actions\Validation;
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
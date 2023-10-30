<?php

namespace App\Modules\UserNotification;

use App\Modules\UserNotification\Actions\All;
use App\Modules\UserNotification\Actions\Delete;
use App\Modules\UserNotification\Actions\Show;
use App\Modules\UserNotification\Actions\Store;
use App\Modules\UserNotification\Actions\Update;
use App\Modules\UserNotification\Actions\Validation;
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
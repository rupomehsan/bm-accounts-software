<?php

namespace App\Modules\UserRole;

use App\Modules\UserRole\Actions\All;
use App\Modules\UserRole\Actions\Delete;
use App\Modules\UserRole\Actions\Show;
use App\Modules\UserRole\Actions\Store;
use App\Modules\UserRole\Actions\Update;
use App\Modules\UserRole\Actions\Validation;
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
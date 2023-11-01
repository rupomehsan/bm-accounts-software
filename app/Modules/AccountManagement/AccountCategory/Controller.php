<?php

namespace App\Modules\AccountManagement\AccountCategory;

use App\Modules\AccountCategory\Actions\All;
use App\Modules\AccountCategory\Actions\Delete;
use App\Modules\AccountCategory\Actions\Show;
use App\Modules\AccountCategory\Actions\Store;
use App\Modules\AccountCategory\Actions\Update;
use App\Modules\AccountCategory\Actions\Validation;
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

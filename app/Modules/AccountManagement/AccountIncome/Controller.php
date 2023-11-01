<?php

namespace App\Modules\AccountManagement\AccountIncome;

use App\Modules\AccountIncome\Actions\All;
use App\Modules\AccountIncome\Actions\Delete;
use App\Modules\AccountIncome\Actions\Show;
use App\Modules\AccountIncome\Actions\Store;
use App\Modules\AccountIncome\Actions\Update;
use App\Modules\AccountIncome\Actions\Validation;
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

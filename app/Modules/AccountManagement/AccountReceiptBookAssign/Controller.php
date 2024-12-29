<?php

namespace App\Modules\AccountManagement\AccountReceiptBookAssign;

use App\Modules\AccountManagement\AccountReceiptBookAssign\Actions\All;
use App\Modules\AccountManagement\AccountReceiptBookAssign\Actions\Delete;
use App\Modules\AccountManagement\AccountReceiptBookAssign\Actions\Show;
use App\Modules\AccountManagement\AccountReceiptBookAssign\Actions\Store;
use App\Modules\AccountManagement\AccountReceiptBookAssign\Actions\Update;
use App\Modules\AccountManagement\AccountReceiptBookAssign\Actions\Validation;
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
   
}

<?php

namespace App\Modules\AccountManagement\AccountReceiptBook;

use App\Modules\AccountReceiptBook\Actions\All;
use App\Modules\AccountReceiptBook\Actions\Delete;
use App\Modules\AccountReceiptBook\Actions\Show;
use App\Modules\AccountReceiptBook\Actions\Store;
use App\Modules\AccountReceiptBook\Actions\Update;
use App\Modules\AccountReceiptBook\Actions\Validation;
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

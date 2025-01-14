<?php

namespace App\Modules\AccountManagement\AccountReceiptBookRejectPage;

use App\Modules\AccountManagement\AccountReceiptBookRejectPage\Actions\All;
use App\Modules\AccountManagement\AccountReceiptBookRejectPage\Actions\Delete;
use App\Modules\AccountManagement\AccountReceiptBookRejectPage\Actions\Show;
use App\Modules\AccountManagement\AccountReceiptBookRejectPage\Actions\Store;
use App\Modules\AccountManagement\AccountReceiptBookRejectPage\Actions\Update;
use App\Modules\AccountManagement\AccountReceiptBookRejectPage\Validations\Validation;
use App\Modules\AccountManagement\AccountReceiptBookRejectPage\Actions\BulkActions;
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
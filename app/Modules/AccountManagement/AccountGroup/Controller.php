<?php

namespace App\Modules\AccountManagement\AccountGroup;

use App\Modules\AccountManagement\AccountGroup\Actions\All;
use App\Modules\AccountManagement\AccountGroup\Actions\Delete;
use App\Modules\AccountManagement\AccountGroup\Actions\Show;
use App\Modules\AccountManagement\AccountGroup\Actions\Store;
use App\Modules\AccountManagement\AccountGroup\Actions\Update;
use App\Modules\AccountManagement\AccountGroup\Validations\Validation;
use App\Modules\AccountManagement\AccountGroup\Actions\BulkActions;
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
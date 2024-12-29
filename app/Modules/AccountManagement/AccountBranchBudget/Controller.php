<?php

namespace App\Modules\AccountManagement\AccountBranchBudget;

use App\Modules\AccountManagement\AccountBranchBudget\Actions\All;
use App\Modules\AccountManagement\AccountBranchBudget\Actions\Delete;
use App\Modules\AccountManagement\AccountBranchBudget\Actions\Show;
use App\Modules\AccountManagement\AccountBranchBudget\Actions\Store;
use App\Modules\AccountManagement\AccountBranchBudget\Actions\Update;
use App\Modules\AccountManagement\AccountBranchBudget\Actions\Validation;
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

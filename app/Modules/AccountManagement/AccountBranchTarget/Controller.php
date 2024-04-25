<?php

namespace App\Modules\AccountManagement\AccountBranchTarget;

use App\Modules\AccountManagement\AccountBranchTarget\Actions\All;
use App\Modules\AccountManagement\AccountBranchTarget\Actions\Delete;
use App\Modules\AccountManagement\AccountBranchTarget\Actions\Show;
use App\Modules\AccountManagement\AccountBranchTarget\Actions\Store;
use App\Modules\AccountManagement\AccountBranchTarget\Actions\Update;
use App\Modules\AccountManagement\AccountBranchTarget\Actions\Validation;
use App\Modules\AccountManagement\AccountBranchTarget\Actions\getBranchTargetByBranchId;
use App\Http\Controllers\Controller as ControllersController;
use PhpParser\Node\Expr\FuncCall;

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

    public function getBranchTargetByBranchId()
    {
        $data = getBranchTargetByBranchId::execute();
        return $data;
    }
}

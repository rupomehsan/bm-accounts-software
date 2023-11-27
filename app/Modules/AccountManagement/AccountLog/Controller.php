<?php

namespace App\Modules\AccountManagement\AccountLog;

use App\Modules\AccountManagement\AccountLog\Actions\All;
use App\Modules\AccountManagement\AccountLog\Actions\Delete;
use App\Modules\AccountManagement\AccountLog\Actions\Show;
use App\Modules\AccountManagement\AccountLog\Actions\Store;
use App\Modules\AccountManagement\AccountLog\Actions\Update;
use App\Modules\AccountManagement\AccountLog\Actions\Validation;
use App\Modules\AccountManagement\AccountLog\Actions\GetAllIncomeByCategoryID;
use App\Modules\AccountManagement\AccountLog\Actions\GetAllIncomeByDatewise;
use App\Modules\AccountManagement\AccountLog\Actions\IncomeExpenseReport;
use App\Modules\AccountManagement\AccountLog\Actions\IncomeExpenseClosingRange;
use App\Modules\AccountManagement\AccountLog\Actions\IncomeLedger;
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
    public function getAllIncomeByCategoryID($id)
    {

        $data = GetAllIncomeByCategoryID::execute($id);
        return $data;
    }
    public function GetAllIncomeByDatewise()
    {

        $data = GetAllIncomeByDatewise::execute();
        return $data;
    }
    public function IncomeExpenseReport()
    {

        $data = IncomeExpenseReport::execute();
        return $data;
    }
    public function IncomeExpenseClosingRange()
    {

        $data = IncomeExpenseClosingRange::execute();
        return $data;
    }
    public function getIncomeLedger()
    {
        $data = IncomeLedger::execute();
        return $data;
    }
}

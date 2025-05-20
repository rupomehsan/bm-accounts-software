<?php

namespace App\Modules\AccountManagement\AccountLog;

use App\Modules\AccountManagement\AccountLog\Actions\All;
use App\Modules\AccountManagement\AccountLog\Actions\Delete;
use App\Modules\AccountManagement\AccountLog\Actions\Show;
use App\Modules\AccountManagement\AccountLog\Actions\Store;
use App\Modules\AccountManagement\AccountLog\Actions\Update;
use App\Modules\AccountManagement\AccountLog\Actions\Validation;
use App\Modules\AccountManagement\AccountLog\Actions\GetAllIncomeByCategoryID;
use App\Modules\AccountManagement\AccountLog\Actions\getAllExpenseByCategoryID;
use App\Modules\AccountManagement\AccountLog\Actions\GetAllIncomeByDatewise;
use App\Modules\AccountManagement\AccountLog\Actions\IncomeExpenseReport;
use App\Modules\AccountManagement\AccountLog\Actions\GetAllExpenseByDatewise;
use App\Modules\AccountManagement\AccountLog\Actions\IncomeExpenseClosingRange;
use App\Modules\AccountManagement\AccountLog\Actions\IncomeLedger;
use App\Modules\AccountManagement\AccountLog\Actions\getIncomeTotal;
use App\Modules\AccountManagement\AccountLog\Actions\getExpenseTotal;
use App\Modules\AccountManagement\AccountLog\Actions\Reporting;
use App\Modules\AccountManagement\AccountLog\Actions\GetIncomeLedgerByCategory;
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
    public function getAllExpenseByCategoryID($id)
    {

        $data = getAllExpenseByCategoryID::execute($id);
        return $data;
    }
    public function GetAllIncomeByDatewise()
    {

        $data = GetAllIncomeByDatewise::execute();
        return $data;
    }
    public function getAllExpenseByDatewise()
    {

        $data = GetAllExpenseByDatewise::execute();
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
    public function getIncomeTotal()
    {
        $data = getIncomeTotal::execute();
        return $data;
    }
    public function getExpenseTotal()
    {
        $data = getExpenseTotal::execute();
        return $data;
    }
    public function mainLedger()
    {
        $data = Reporting::mainLedger();
        return $data;
    }
    public function statements()
    {
        $data = Reporting::statements();
        return $data;
    }
    public function income_expense_closing_in_range()
    {
        $data = Reporting::income_expense_closing_in_range();
        return $data;
    }
    public function get_all_loan_register()
    {
        $data = Reporting::get_all_loan_register();
        return $data;
    }
    public function get_all_jamanot_register()
    {
        $data = Reporting::get_all_jamanot_register();
        return $data;
    }
    public function get_all_ekkalin_prodan()
    {
        $data = Reporting::get_all_ekkalin_prodan();
        return $data;
    }
    public function get_all_niyomito_prodan()
    {
        $data = Reporting::get_all_niyomito_prodan();
        return $data;
    }
    public function get_all_kendriosuvakanghi_income()
    {
        $data = Reporting::get_all_kendriosuvakanghi_income();
        return $data;
    }
    public function get_all_office_rent()
    {
        $data = Reporting::get_all_office_rent();
        return $data;
    }
    public function get_all_house_rent()
    {
        $data = Reporting::get_all_house_rent();
        return $data;
    }
    public function GetIncomeLedgerByCategory()
    {
        $data = GetIncomeLedgerByCategory::execute();
        return $data;
    }
}

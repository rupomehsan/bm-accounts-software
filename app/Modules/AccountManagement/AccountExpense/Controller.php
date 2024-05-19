<?php

namespace App\Modules\AccountManagement\AccountExpense;

use App\Modules\AccountManagement\AccountExpense\Actions\All;
use App\Modules\AccountManagement\AccountExpense\Actions\Delete;
use App\Modules\AccountManagement\AccountExpense\Actions\Show;
use App\Modules\AccountManagement\AccountExpense\Actions\Store;
use App\Modules\AccountManagement\AccountExpense\Actions\Update;
use App\Modules\AccountManagement\AccountExpense\Actions\Validation;
use App\Modules\AccountManagement\AccountExpense\Actions\BulkActions;
use App\Modules\AccountManagement\AccountExpense\Actions\DeleteSupportVoucher;
use App\Modules\AccountManagement\AccountExpense\Actions\ApprovalVoucher;
use App\Modules\AccountManagement\AccountExpense\Actions\GetSingleSupportVoucher;
use App\Modules\AccountManagement\AccountExpense\Actions\SetMonth;
use App\Http\Controllers\Controller as ControllersController;
use App\Modules\AccountManagement\AccountExpense\Actions\Topshit;

class Controller extends ControllersController
{

    public function index()
    {
        $data = All::execute();
        return $data;
    }
    public function seachByDateWise()
    {
        $data = All::seachByDateWise();
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

    public function deleteSupportVoucher($id)
    {
        $data = DeleteSupportVoucher::execute($id);
        return $data;
    }

    public function approvalVoucher()
    {
        $data = ApprovalVoucher::execute();
        return $data;
    }
    public function bmNotApprovalVoucher()
    {
        $data = ApprovalVoucher::bmNotApprovalVoucher();
        return $data;
    }
    public function CpNotApprovalVoucher()
    {
        $data = ApprovalVoucher::CpNotApprovalVoucher();
        return $data;
    }
    public function supportVoucherApprovalByAdmin()
    {
        $data = ApprovalVoucher::supportVoucherApprovalByAdmin();
        return $data;
    }
    public function notApprovedBySupportBmVoucher()
    {
        $data = ApprovalVoucher::notApprovedBySupportBmVoucher();
        return $data;
    }
    public function voucherCancelComment()
    {
        $data = ApprovalVoucher::voucherCancelComment();
        return $data;
    }
    public function getSingleSupportVoucher($id)
    {
        $data = GetSingleSupportVoucher::execute($id);
        return $data;
    }
    public function SetMonth()
    {
        $data = SetMonth::store();
        return $data;
    }
    public function getSetMonthData()
    {
        // $data = SetMonth::get();
        // return $data;
    }
    public function getSingleVoucherWithTopShit($id)
    {
        $data = Topshit::execute($id);

        return $data;
    }
    public function getActiveMonth()
    {
        $data = SetMonth::getActiveMonth();

        return $data;
    }
}

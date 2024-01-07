<?php

namespace App\Modules\AccountManagement\AccountReceiptBook;

use App\Modules\AccountManagement\AccountReceiptBook\Actions\All;
use App\Modules\AccountManagement\AccountReceiptBook\Actions\Delete;
use App\Modules\AccountManagement\AccountReceiptBook\Actions\Show;
use App\Modules\AccountManagement\AccountReceiptBook\Actions\Store;
use App\Modules\AccountManagement\AccountReceiptBook\Actions\Update;
use App\Modules\AccountManagement\AccountReceiptBook\Actions\Validation;
use \App\Modules\AccountManagement\AccountReceiptBook\Model as AccountReceiptBook;
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

    public function update(AccountReceiptBook $account_receipt_book, Validation $request)
    {
        $data = Update::execute($account_receipt_book, $request);
        return $data;
    }

    public function destroy($id)
    {
        $data = Delete::execute($id);
        return $data;
    }
}

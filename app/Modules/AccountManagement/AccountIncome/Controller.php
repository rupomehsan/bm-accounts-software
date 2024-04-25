<?php

namespace App\Modules\AccountManagement\AccountIncome;

use App\Modules\AccountManagement\AccountIncome\Actions\All;
use App\Modules\AccountManagement\AccountIncome\Actions\Delete;
use App\Modules\AccountManagement\AccountIncome\Actions\Show;
use App\Modules\AccountManagement\AccountIncome\Actions\Store;
use App\Modules\AccountManagement\AccountIncome\Actions\Update;
use App\Modules\AccountManagement\AccountIncome\Actions\Validation;
use App\Modules\AccountManagement\AccountIncome\Actions\SearchIncome;
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

    public function getAmountToNumber($number)
    {
        return numercToAlphabet($number);
    }
    public function SearchIncome()
    {
        $data = SearchIncome::execute();
        return $data;
    }
}

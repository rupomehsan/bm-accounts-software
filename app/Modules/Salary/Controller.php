<?php

namespace App\Modules\Salary;

use App\Modules\Salary\Actions\All;
use App\Modules\Salary\Actions\Delete;
use App\Modules\Salary\Actions\Show;
use App\Modules\Salary\Actions\Store;
use App\Modules\Salary\Actions\Update;
use App\Modules\Salary\Actions\Validation;
use App\Modules\Salary\Actions\BulkActions;
use App\Http\Controllers\Controller as ControllersController;


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
}

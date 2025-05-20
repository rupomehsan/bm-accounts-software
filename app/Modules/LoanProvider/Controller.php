<?php

namespace App\Modules\LoanProvider;

use App\Modules\LoanProvider\Actions\All;
use App\Modules\LoanProvider\Actions\Delete;
use App\Modules\LoanProvider\Actions\Show;
use App\Modules\LoanProvider\Actions\Store;
use App\Modules\LoanProvider\Actions\Update;
use App\Modules\LoanProvider\Actions\Validation;
use App\Modules\LoanProvider\Actions\BulkActions;
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

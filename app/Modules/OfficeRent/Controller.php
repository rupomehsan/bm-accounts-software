<?php

namespace App\Modules\OfficeRent;

use App\Modules\OfficeRent\Actions\All;
use App\Modules\OfficeRent\Actions\Delete;
use App\Modules\OfficeRent\Actions\Show;
use App\Modules\OfficeRent\Actions\Store;
use App\Modules\OfficeRent\Actions\Update;
use App\Modules\OfficeRent\Actions\Validation;
use App\Modules\OfficeRent\Actions\BulkActions;
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

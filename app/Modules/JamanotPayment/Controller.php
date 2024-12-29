<?php

namespace App\Modules\JamanotPayment;

use App\Modules\JamanotPayment\Actions\All;
use App\Modules\JamanotPayment\Actions\Delete;
use App\Modules\JamanotPayment\Actions\Show;
use App\Modules\JamanotPayment\Actions\Store;
use App\Modules\JamanotPayment\Actions\Update;
use App\Modules\JamanotPayment\Actions\Validation;
use App\Modules\JamanotPayment\Actions\BulkActions;
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

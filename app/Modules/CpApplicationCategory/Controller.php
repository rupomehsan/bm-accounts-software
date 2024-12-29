<?php

namespace App\Modules\CpApplicationCategory;

use App\Modules\CpApplicationCategory\Actions\All;
use App\Modules\CpApplicationCategory\Actions\Delete;
use App\Modules\CpApplicationCategory\Actions\Show;
use App\Modules\CpApplicationCategory\Actions\Store;
use App\Modules\CpApplicationCategory\Actions\Update;
use App\Modules\CpApplicationCategory\Actions\Validation;
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
}

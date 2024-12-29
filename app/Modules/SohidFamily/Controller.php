<?php

namespace App\Modules\SohidFamily;

use App\Modules\SohidFamily\Actions\All;
use App\Modules\SohidFamily\Actions\Delete;
use App\Modules\SohidFamily\Actions\Show;
use App\Modules\SohidFamily\Actions\Store;
use App\Modules\SohidFamily\Actions\Update;
use App\Modules\SohidFamily\Actions\Validation;
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
<?php

namespace App\Modules\TestModule\ModuleOne;

use App\Modules\TestModule\ModuleOne\Actions\All;
use App\Modules\TestModule\ModuleOne\Actions\Delete;
use App\Modules\TestModule\ModuleOne\Actions\Show;
use App\Modules\TestModule\ModuleOne\Actions\Store;
use App\Modules\TestModule\ModuleOne\Actions\Update;
use App\Modules\TestModule\ModuleOne\Validations\Validation;
use App\Modules\TestModule\ModuleOne\Actions\BulkActions;
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
    public function bulkAction()
    {
        $data = BulkActions::execute();
        return $data;
    }

}
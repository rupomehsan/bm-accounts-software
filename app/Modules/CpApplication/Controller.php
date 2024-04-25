<?php

namespace App\Modules\CpApplication;

use App\Modules\CpApplication\Actions\Approval;
use App\Modules\CpApplication\Actions\All;
use App\Modules\CpApplication\Actions\Delete;
use App\Modules\CpApplication\Actions\Show;
use App\Modules\CpApplication\Actions\Store;
use App\Modules\CpApplication\Actions\Update;
use App\Modules\CpApplication\Actions\Validation;
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


    public function applicationApproval()
    {
        $data = Approval::execute();
        return $data;
    }
}

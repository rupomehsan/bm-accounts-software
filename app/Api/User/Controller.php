<?php

namespace App\Api\User;

use App\Api\User\Actions\All;
use App\Api\User\Actions\Store;
use App\Api\User\Actions\Validation;
use App\Http\Controllers\Controller as ControllersController;

class Controller extends ControllersController
{
    public function index()
    {
        $data = All::exec();
        return $data;
    }

    public function store(Validation $request)
    {
        
        $data = Store::exec($request);
        return $data;
    }

    public function show($id)
    {
        $data = Store::exec($request);
        return $data;
    }

    public function update($id)
    {
        //function_body
    }

    public function destroy($id)
    {
        //function_body
    }
}

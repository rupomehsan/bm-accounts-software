<?php

namespace App\Modules\User;

use App\Modules\User\Actions\All;
use App\Modules\User\Actions\Delete;
use App\Modules\User\Actions\Show;
use App\Modules\User\Actions\Store;
use App\Modules\User\Actions\Update;
use App\Modules\User\Actions\Validation;
use App\Modules\User\Actions\PasswordValidation;
use App\Modules\User\Actions\AtAGlance;
use \App\Modules\User\Model as User;
use App\Http\Controllers\Controller as ControllersController;
use App\Modules\User\Actions\ProfileUpdate;

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

    public function update(User $user, Validation $request)
    {

        $data = Update::execute($user, $request);
        return $data;
    }
    public function userUnblock($id)
    {

        $data = Update::userUnblock($id);
        return $data;
    }

    public function destroy($id)
    {
        $data = Delete::execute($id);
        return $data;
    }

    public function checkUser()
    {
        if (auth()->check()) {
            return response()->json([
                'user' => auth()->user()->load(['roles']),
            ], 200);
        }

        return response()->json([""]);
    }

    public function departmentAtAglance()
    {
        $data = AtAGlance::execute();
        return $data;
    }
    public function updatePassword(PasswordValidation $request)
    {
        $data = ProfileUpdate::execute($request);
        return $data;
    }
}

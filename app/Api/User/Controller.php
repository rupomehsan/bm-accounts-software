<?php

namespace App\Api\User;

use App\Api\User\Actions\Update;
use App\Api\User\Actions\Validation;
use App\Http\Controllers\Controller as ControllersController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Controller extends ControllersController
{
    static $model = \App\Api\User\Model::class;
    public function index()
    {
        try {
            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = [];
            $data = self::$model::query();
            if (request()->has('status') && request()->input('status')) {
                $condition['status'] = request()->input('status');
            }

            if (request()->has('search') && request()->input('search')) {
                $data = $data->where('full_name', 'like', '%' . request()->input('search') . '%');
            }

            if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
                $data = $data->with($with)->where($condition)->latest()->get();
            } else {
                $data = $data->with($with)->where($condition)->latest()->paginate($offset);
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }

    public function store(Validation $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = image_uploader($image, 'uploads/user');
                $data['image'] = $imageName;
            }

            $data['password'] = Hash::make($request->input('password'));
            if (self::$model::query()->create($data)) {
                return messageResponse('User added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }

    public function show($id)
    {
        try {
            $with = [];
            if (!$data = self::$model::query()->with($with)->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }

            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }

    public function update(Validation $request, $id)
    {
        try {

            if (!$query = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = image_uploader($image, 'uploads/user');
                $data['image'] = $imageName;
            } else {
                $data['image'] = $query->image;
            }
            $query->update($data);
            return messageResponse('User updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }

    public function destroy($id)
    {
        $data = User::find($id);
        if ($data) {
            if ($data->image !== 'avatar.png' && file_exists(public_path($data->image))) {
                unlink($data->image);
            }
            $data->delete();
        } else {
            return messageResponse('Data configure found...', 404, 'error');
        }
    }
}

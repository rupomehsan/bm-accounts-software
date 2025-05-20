<?php

namespace App\Modules\Salary\Actions;

use App\Modules\Salary\Actions\Validation;

class Update
{
    static $model = \App\Modules\Salary\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {
            $requestData = $request->validated();
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            if ($request->hasFile('attachment')) {
                $image = $request->file('attachment');
                $imageName = uploader($image, 'uploads/salary');
                $requestData['attachment'] = $imageName;
            }
            $data->update($requestData);
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}

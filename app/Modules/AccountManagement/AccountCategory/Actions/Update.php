<?php

namespace App\Modules\AccountManagement\AccountCategory\Actions;

use App\Modules\AccountManagement\AccountCategory\Actions\Validation;

class Update
{
    static $model = \App\Modules\AccountManagement\AccountCategory\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {

            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }

            if ($data->serial_number >= request()->serial_number) {
                $data->update($request->validated());
                $nextdata = self::$model::query()->select('id', 'serial_number')->where('serial_number', '>=', $data->serial_number)
                    ->where('id', '!=', $data->id)
                    ->orderBy('serial_number', 'asc')
                    ->get();
                $serialNumber = $data->serial_number + 1;
                foreach ($nextdata as $key => $value) {
                    $value->serial_number = $serialNumber++;
                    $value->save();
                }
            }

            if ($data->serial_number < request()->serial_number) {
                $oldSerial = $data->serial_number;
                $newSerial = request()->serial_number;
                $data->update(['serial_number' => null]);
                self::$model::query()
                    ->whereBetween('serial_number', [$oldSerial + 1, $newSerial])
                    ->decrement('serial_number');
                $data->serial_number = $newSerial;
                $data->save();
            }

            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}

<?php

namespace App\Modules\CpApplicationFormat\Actions;

use App\Modules\CpApplicationFormat\Actions\Validation;

class Update
{
    static $model = \App\Modules\CpApplicationFormat\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {

            if ($data = self::$model::query()->where('id', $id)->first()) {
                $removeItems = self::$model::query()->where('cp_application_category_id', $data->cp_application_category_id)->get();
                foreach ($removeItems as $item) {
                    $item->delete();
                }

                $fields = json_decode($request->input('extra_fields'));
                // dd($fields);
                if ($fields && count($fields)) {
                    foreach ($fields as $field) {
                        $data = [
                            'cp_application_category_id' => $request->input('cp_application_category_id'),
                            'field_name' => $field->field_name,
                            'field_type' => $field->field_type,
                        ];
                        self::$model::query()->create($data);
                    }

                    return messageResponse('Item updated successfully');
                } else {
                    self::$model::query()->create(['cp_application_category_id' => $request->input('cp_application_category_id')]);
                    return messageResponse('Item updated successfully');
                }
            } else {
                return messageResponse('Data not found...', 404, 'error');
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}

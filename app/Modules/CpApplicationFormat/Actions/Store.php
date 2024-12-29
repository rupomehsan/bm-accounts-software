<?php

namespace App\Modules\CpApplicationFormat\Actions;

use App\Modules\CpApplicationFormat\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\CpApplicationFormat\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $fields = json_decode($request->input('extra_fields'));
            if ($fields && count($fields)) {
                foreach ($fields as $field) {
              
                    $data = [
                        'cp_application_category_id' => $request->input('cp_application_category_id'),
                        'field_name' => $field->field_name,
                        'field_type' => $field->field_type,
                    ];
                    self::$model::query()->create($data);
                }
                return messageResponse('Item added successfully', 201);
            } else {
                self::$model::query()->create(['cp_application_category_id' => $request->input('cp_application_category_id')]);
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}

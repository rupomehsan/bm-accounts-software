<?php

namespace App\Modules\CpApplication\Actions;

use App\Modules\CpApplication\Actions\Validation;

class Update
{
    static $model = \App\Modules\CpApplication\Model::class;
    static $applicationModelValue = \App\Modules\CpApplicationValue\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }

            $requestData = $request->validated();
            if ($request->hasFile('pdf_submission_file')) {
                $pdf_submission_file = $request->file('pdf_submission_file');
                $fileName = uploader($pdf_submission_file, 'uploads/application');
                $requestData['pdf_submission_file'] = $fileName;
            }
            // dd($extraField);
            if ($data->update($requestData)) {
                self::$applicationModelValue::query()->where('cp_application_id', $id)->delete();

                $applicationValue = [];
                $applicationValue['cp_application_id'] = $id;
                foreach ($request->extrafields as  $value) {
                    $field = array_keys($value);
                    $val = array_values($value);
                    $applicationValue["title"] = count($field) ? $field[0] : '';
                    $applicationValue["value"] = count($val) ? $val[0] : '';
                    self::$applicationModelValue::query()->create($applicationValue);
                }
                return messageResponse('Item added successfully', 201);
            }




            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}

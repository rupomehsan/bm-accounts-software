<?php

namespace App\Modules\CpApplication\Actions;

use App\Modules\CpApplication\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\CpApplication\Model::class;
    static $applicationModelValue = \App\Modules\CpApplicationValue\Model::class;

    public static function execute(Validation $request)
    {
        try {
            // dd($request->all());
            $data = $request->validated();
            if ($request->hasFile('pdf_submission_file')) {
                $pdf_submission_file = $request->file('pdf_submission_file');
                $fileName = uploader($pdf_submission_file, 'uploads/application');
                $data['pdf_submission_file'] = $fileName;
            }
            // dd($extraField);
            $extraFieldImages = $_FILES['extrafields']['name'] ?? [];
            $fileList = [];
            foreach ($extraFieldImages as $key => $value) {
                $fileList[] = array_keys($value)[0];
            }
            // dd($fileList);
            if ($applicationData = self::$model::query()->create($data)) {
                $applicationValue = [];
                $applicationValue['cp_application_id'] = $applicationData->id;
                // dd($request->extrafields);
                foreach ($request->extrafields as $key =>  $value) {

                    if (array_search(array_keys($value)[0], $fileList) >= 0) {
                        // dd(array_keys($value)[0]);
                        //     $image = array_values($value)[0];
                        //     if ($image) {
                        //         $imageName = uploader($image, 'uploads/application');
                        //         $applicationValue["title"] = array_keys($value)[0];
                        //         $applicationValue["value"] = $imageName;
                        //         self::$applicationModelValue::query()->create($applicationValue);
                        //     }
                        // } else {
                        $field = array_keys($value);
                        $val = array_values($value);
                        $applicationValue["title"] = count($field) ? $field[0] : '';
                        $applicationValue["value"] = count($val) ? $val[0] : '';
                        self::$applicationModelValue::query()->create($applicationValue);
                    }
                }
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}

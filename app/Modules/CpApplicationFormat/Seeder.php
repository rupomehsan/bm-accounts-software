<?php

namespace App\Modules\CpApplicationFormat;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     php artisan db:seed --class="App\Modules\CpApplicationFormat\Seeder"
     * Run the database seeds.
     */
    static $cpApplicationFormatModal = \App\Modules\CpApplicationFormat\Model::class;
    static $cpApplicationValueModal = \App\Modules\CpApplicationValue\Model::class;
    static $cpApplicationCategoryModel = \App\Modules\CpApplicationCategory\Model::class;
    static $cpApplicationModel = \App\Modules\CpApplication\Model::class;
    public function run(): void
    {
        self::$cpApplicationFormatModal::truncate();
        self::$cpApplicationValueModal::truncate();
        self::$cpApplicationModel::truncate();



        function getFieldData($name = null, $sakha = null, $contactNumber = null)
        {
            $fieldData = [
                [
                    "name" => "full name",
                    "type" => "text",
                    "value" => "Mr xyz"
                ],
                [
                    "name" => "sakha",
                    "type" => "text",
                    "value" => ['mohanogor uttor', 'mohanogor dohkin', 'gazypur'][rand(0, 2)]
                ],
                [
                    "name" => "contact number",
                    "type" => "text",
                    "value" => rand(9999999999, 9999999999)
                ],
                [
                    "name" => "number type (whatsapp,telegram,offline)",
                    "type" => "text",
                    "value" => ['whatsapp', 'telegram', 'offline'][rand(0, 2)]
                ],
                [
                    "name" => "description",
                    "type" => "textarea",
                    "value" => "
                    Subject: Leave Application
                    Dear [Manager's Name],
                    I am writing to request a [number of days] leave from [start date] to [end date] due to [reason for leave]. I have made the necessary arrangements to ensure a smooth workflow during my absence. I believe this time off will not disrupt our operations.

                    I will be available for any urgent matters and will ensure a smooth handover of my responsibilities. I understand the importance of my role and will make every effort to minimize any inconvenience caused.

                    I kindly request your approval for this leave, and I assure you of my commitment to fulfilling my duties promptly upon my return. Thank you for your understanding.

                    Sincerely,
                    [Your Name]
                    "
                ],
                [
                    "name" => "attachment",
                    "type" => "file",
                    "value" => ""
                ],
            ];
            return $fieldData;
        }

        $applicationData = [
            [
                "cp_application_category_id" => rand(1, 5),
                "applicant_id" => rand(12, 15),
                "pdf_submission_file" => null,
                "is_approve" => 0,
                "remarks" => null,
                "subject" => "application for test purppose",

                "format" => getFieldData()
            ],
            [
                "cp_application_category_id" => rand(1, 5),
                "applicant_id" => rand(12, 15),
                "pdf_submission_file" => null,
                "is_approve" => 0,
                "remarks" => null,
                "subject" => "application for test purppose 2",
                "format" => getFieldData()
            ],
            [
                "cp_application_category_id" => rand(1, 5),
                "applicant_id" => rand(12, 15),
                "pdf_submission_file" => null,
                "is_approve" => 0,
                "remarks" => null,
                "subject" => "application for test purppose 3",
                "format" => getFieldData()
            ],

        ];


        $cpCategoryData = self::$cpApplicationCategoryModel::get();
        foreach ($cpCategoryData as $key => $category) {
            foreach (getFieldData() as $format) {
                self::$cpApplicationFormatModal::create([
                    "cp_application_category_id" => $category->id,
                    "field_name" => $format['name'],
                    "field_type" => $format['type'],
                    "pdf_format" => null,
                ]);
            }
        }

        foreach ($applicationData as $key => $item) {
            $cpApplication = self::$cpApplicationModel::create([
                "cp_application_category_id" => rand(1, 5),
                "applicant_id" => rand(12, 15),
                "pdf_submission_file" => null,
                "is_approve" => 0,
                "remarks" => null,
                "subject" => "application for test purppose",
            ]);
            foreach ($item['format'] as $formatValue) {
                // dd($formatValue);
                self::$cpApplicationValueModal::create([
                    "cp_application_id" => $cpApplication->id,
                    "title" => $formatValue['name'],
                    "title_id" => self::$cpApplicationFormatModal::where('field_name', $formatValue['name'])->first()->id,
                    "value" => $formatValue['value'],
                ]);
            }
        }
    }
}

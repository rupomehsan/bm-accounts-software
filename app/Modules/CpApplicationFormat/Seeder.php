<?php

namespace App\Modules\CpApplicationFormat;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     php artisan db:seed --class="App\Modules\CpApplicationFormat\Seeder"
     * Run the database seeds.
     */
    static $model = \App\Modules\CpApplicationFormat\Model::class;
    static $cpCategoryModel = \App\Modules\CpApplicationCategory\Model::class;
    public function run(): void
    {
        self::$model::truncate();

        $cpCategoryData = self::$cpCategoryModel::get();
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
        foreach ($cpCategoryData as $item) {
            for ($i = 1; $i <= 5; $i++) {
                self::$model::create([
                    "cp_application_category_id" => $item->id,
                    "field_name" => $fieldData[$i]['name'],
                    "field_type" => $fieldData[$i]['type'],
                    "field_value" => $fieldData[$i]['value'],
                    "pdf_format" => null,
                ]);
            }
        }
    }
}

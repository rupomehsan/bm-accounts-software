<?php

namespace App\Modules\AccountManagement\AccountLog;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     php artisan db:seed --class="App\Modules\AccountManagement\AccountLog\Seeder"
     * Run the database seeds.
     */
    static $model = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $categoryModel = \App\Modules\AccountManagement\AccountCategory\Model::class;
    public function run(): void
    {
        self::$model::truncate();

        $incomeCtegory = self::$categoryModel::where('type', 'income')->get();

        foreach ($incomeCtegory as $item) {
           
        }
        $data = [
            "income" => [
                "বকেয়া আদায়",
                "নববর্ষ বাবদ",
                "ফ্লাট আয়",
                "মওকুফ",
                "বিশেষ আয়",
                "ঘাটতি",
                "ভুর্তুকি",
                "ব্যাঙ্ক জমার মাধ্যমে আয়",
                "অগ্রিম আয়",
                "এককালীন",
            ],
            "expense" => [
                "সিলেবাসের বই ক্রয় বাবদ",
                "যাতায়াত",
                "আপ্যায়ন",
                "মোবাইল রিচার্জ",
                "পরিবহন খরচ",
                "অফিস স্টেশনারী",
                "মাসিক বেতন",
                "সৈজন্য প্রদান",
                "অফিস ভাড়া",
                "গোডাউন ভাড়া",
                "ইন্টারনেট বিল (সংযোগসহ)",
                "অফিস/গোডাউন জামানত বাবদ",
                "ট্রেড লাইসেন্স",
                "সৈজন্য",
                "মওকুফ",
                "বস্তা ক্রয় / কাটুন বিল",
                "পত্রিকা বিল",
                "সম্পদ ক্রয়",
                "মোবাইল ক্রয়",
                "পানি বিল",
                "বিবিদ",
                "এককালিন",
                "ঈদ সামগ্রি",
                "মাল ফেরত",
                "ব্যাংক কর্তন",
                "চিকিৎসা বাবদ",
                "ফ্ল্যাট বাবদ খরচ",
                "নসিহত",
                "আহবান",
                "নববর্ষ উদ্ভোদন",
                "নববর্ষ অনুষ্ঠান",
                "ব্যংক নগদ জমার মাধ্যমে",
                "ঘাটতি",
                "মেরামত",
                "নববর্ষ",
                "সম্পদ ক্রয়",
                "ডেকরেশন",
                "ঋণ পরিশোধ",
                "ভি আই পি ব্যাগ",
            ]
        ];

        foreach ($data['income'] as $item) {
            self::$model::create([
                "title" => $item,
                "description" => " ",
                "parent" => "1",
                "type" => "income",
            ]);
        }
        foreach ($data['expense'] as $item) {
            self::$model::create([
                "title" => $item,
                "description" => " ",
                "parent" => "1",
                "type" => "expense",
            ]);
        }
    }
}

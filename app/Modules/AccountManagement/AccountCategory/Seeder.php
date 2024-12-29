<?php

namespace App\Modules\AccountManagement\AccountCategory;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     php artisan db:seed --class="App\Modules\AccountManagement\AccountCategory\Seeder"
     * Run the database seeds.
     */
    static $model = \App\Modules\AccountManagement\AccountCategory\Model::class;
    public function run(): void
    {
        
        self::$model::truncate();
        $data = [
            "income" => [
                "মাসিক আয়",
                "বার্ষিক আয়",
                "ত্রাণ",
                "শহীদ ফান্ড",
                "কর্যে হাসানা",
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
                "ঋণ পরিশোধ",
                "জামানত",
                "কল্যান তহবিল",
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
                "বাসা ভাড়া",
                "গোডাউন ভাড়া",
                "ইন্টারনেট বিল (সংযোগসহ)",
                "জামানত",
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
                "ঋণ প্রদান",
                "ভি আই পি ব্যাগ",
                "আবাসন",
                "পরিমান",
                "যানবাহন",
                "সম্পদ",
                "চিকিৎসা",
                "ছাত্রকল্যান",
                "শিক্ষা সহায়তা",
                "প্রো.বাস্তবায়ন",
                "প্রশিক্ষন",
                "শহীদ পরিবার",
                "মামলা",
                "শিশুকল্যাণ",
                "দা.কার্যক্রম",
                "ঋণ ডিলিট",
                'আয় সমন্নয়'
            ]
        ];
        $defaultIncome = [
            "মাসিক আয়",
            "বার্ষিক আয়",
            "শহীদ ফান্ড",
            "ত্রাণ",
            "কল্যান তহবিল",
        ];

        $defaultExpense = [
            "ঋণ ডিলিট",
            'আয় সমন্নয়'
        ];

        $serial = 1;

        foreach ($data['income'] as  $item) {
            $income = self::$model::create([
                "title" => $item,
                "description" =>'',
                "serial_number" => $serial++,
                "parent" => "1",
                "type" => "income",
                "is_default" => in_array($item, $defaultIncome) ? '1' : '0',
            ]);
        }

        foreach ($data['expense'] as   $item) {
            $expense = self::$model::create([
                "title" => $item,
                "description" => " ",
                "serial_number" => $serial++,
                "parent" => "1",
                "type" => "expense",
                "is_default" => in_array($item, $defaultExpense) ? '1' : '0'
            ]);
        }

    }
}

<?php



use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\support\Str;
use Faker\Factory as Faker;

if (!function_exists('entityResponse')) {
    function entityResponse($data = null, $statusCode = 200, $status = 'success', $message = null)
    {
        $payload = ['status' => $status, 'statusCode' => $statusCode, 'data' => $data];

        if ($message) {
            $payload['message'] = $message;
        }

        return response($payload, $statusCode);
    }
}

if (!function_exists('messageResponse')) {
    function messageResponse($message = '', $statusCode = 200, $status = 'success')
    {
        return response(['status' => $status, 'statusCode' => $statusCode, 'message' => $message], $statusCode);
    }
}
if (!function_exists('sendToTelegram')) {
    function sendToTelegram($chatId = '6555657006', $text = 'this is test message')
    {
        $bot_token = env('BOT_TOKEN');
        $method = "sendMessage";
        $parameters = [
            // 'chat_id' => 812239513,//shifat
            'chat_id' => $chatId,
            'text' => $text,
        ];
        $url = "https://api.telegram.org/bot$bot_token/$method";
        $response = Http::get($url . '?chat_id=' . $parameters['chat_id'] . '&text=' . $parameters['text']);
        return $response->json();
    }
}

if (!function_exists('uploader')) {
    function uploader($source, $path, $width = null, $height = null, $file_name = null)
    {
        // dd($source->getClientMimeType(), $source->getClientOriginalExtension(), $source->getClientOriginalName());
        $mime_type = $source->getClientMimeType();

        // dd($mime_type);
        if ($mime_type != "image/png" && $mime_type != "image/jpeg" && $mime_type != "image/jpg") {
            $path = Storage::putFile($path, $source);
            return $path;
        }


        $image = Image::make($source);

        if (!$path) {
            $path = public_path('uploads');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
        } else {
            if (!file_exists(public_path($path))) {
                mkdir(public_path($path), 0777, true);
            }
        }
        if (!$file_name) {
            $file_name = Carbon::now()->toDateTimeString();
            $file_name = Str::slug($file_name) . rand(999, 99999);
            $file_name .= "." . $source->getClientOriginalExtension();
        } else {
            $file_name = Str::slug($file_name);
        }

        if ($width || $height) {
            $image->fit($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $full_name = $path . '/' . $file_name;
        $image->save(public_path($full_name));
        return $full_name;
    }
}

function numercToAlphabet($number)
{

    //A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
    $words = array(
        '0' => '', '1' => 'one', '2' => 'two', '3' => 'three', '4' => 'four', '5' => 'five',
        '6' => 'six', '7' => 'seven', '8' => 'eight', '9' => 'nine', '10' => 'ten',
        '11' => 'eleven', '12' => 'twelve', '13' => 'thirteen', '14' => 'fouteen', '15' => 'fifteen',
        '16' => 'sixteen', '17' => 'seventeen', '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty',
        '30' => 'thirty', '40' => 'fourty', '50' => 'fifty', '60' => 'sixty', '70' => 'seventy',
        '80' => 'eighty', '90' => 'ninty'
    );

    //First find the length of the number
    $number_length = strlen($number);
    //Initialize an empty array
    $number_array = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
    $received_number_array = array();

    //Store all received numbers into an array
    for ($i = 0; $i < $number_length; $i++) {
        $received_number_array[$i] = substr($number, $i, 1);
    }

    //Populate the empty array with the numbers received - most critical operation
    for ($i = 9 - $number_length, $j = 0; $i < 9; $i++, $j++) {
        $number_array[$i] = $received_number_array[$j];
    }

    $number_to_words_string = "";
    //Finding out whether it is teen ? and then multiply by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
    for ($i = 0, $j = 1; $i < 9; $i++, $j++) {
        //"01,23,45,6,78"
        //"00,10,06,7,42"
        //"00,01,90,0,00"
        if ($i == 0 || $i == 2 || $i == 4 || $i == 7) {
            if ($number_array[$j] == 0 || $number_array[$i] == "1") {
                $number_array[$j] = intval($number_array[$i]) * 10 + $number_array[$j];
                $number_array[$i] = 0;
            }
        }
    }

    $value = "";
    for ($i = 0; $i < 9; $i++) {
        if ($i == 0 || $i == 2 || $i == 4 || $i == 7) {
            $value = $number_array[$i] * 10;
        } else {
            $value = $number_array[$i];
        }
        if ($value != 0) {
            $number_to_words_string .= $words["$value"] . " ";
        }
        if ($i == 1 && $value != 0) {
            $number_to_words_string .= "Crores ";
        }
        if ($i == 3 && $value != 0) {
            $number_to_words_string .= "Lakhs ";
        }
        if ($i == 5 && $value != 0) {
            $number_to_words_string .= "Thousand ";
        }
        if ($i == 6 && $value != 0) {
            $number_to_words_string .= "Hundred ";
        }
    }
    if ($number_length > 9) {
        $number_to_words_string = "Sorry This does not support more than 99 Crores";
    }
    return ucwords(strtolower($number_to_words_string));
}



function facker()
{

    return   Faker::create();
}


/**
 * ```js
  logEntry([
        "user_id" => $data['user_id'],
        "user_type" => $data['user_type'],
        "date" => $data['date'],
        "name" => $data['name'],
        "amount" => $data['amount'],
        "category_id" => $data['category_id'],
        "account_id" => $data['account_id'],
        "account_number_id" => $data['account_number_id'],
        "trx_id" => $data['trx_id'],
        "receipt_no" => $data['receipt_no'],
        "is_income" => $data['is_income'],
        "is_expense" => $data['is_expense'],
        "description" => $data['description'],
        "random_user" => $data['random_user'],
    ])
 */
function logEntry($data)
{
    $model = \App\Modules\AccountManagement\AccountLog\Model::class;
    $accountLogModel = $model::create([
        "user_id" => $data['user_id'] ?? null,
        "user_type" => $data['user_type'] ?? null,
        "date" => $data['date'] ?? null,
        "name" => $data['name'] ?? null,
        "amount" => $data['amount'] ?? null,
        "category_id" => $data['category_id'] ?? null,
        "account_id" => $data['account_id'] ?? null,
        "account_number_id" => $data['account_number_id'] ?? null,
        "trx_id" => $data['trx_id'] ?? null,
        "receipt_no" => $data['receipt_no'] ?? null,
        "is_income" => $data['is_income'] ?? null,
        "is_expense" => $data['is_expense'] ?? null,
        "description" => $data['description'] ?? null,
        "random_user" => $data['random_user'] ?? null,
    ]);

    return $accountLogModel;
}

// dd(__DIR__);
include_once(__DIR__ . '/Account.php');

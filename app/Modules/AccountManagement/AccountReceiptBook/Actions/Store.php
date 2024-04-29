<?php

namespace App\Modules\AccountManagement\AccountReceiptBook\Actions;

use App\Modules\AccountManagement\AccountReceiptBook\Actions\Validation;


class Store
{
    static $model = \App\Modules\AccountManagement\AccountReceiptBook\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $start = $request->input('receipt_start_serial_no');
            $end = $request->input('receipt_end_serial_no');
            // 1 - 115
            // 20 - 50
            // 400 - 500
            $check_serial_no = self::$model::where(function ($q) use ($start, $end) {
                $q->where('receipt_start_serial_no', '<=', $start)
                    ->orWhere('receipt_start_serial_no', '>=', $end);
            })
                ->where(function ($q) use ($start, $end) {
                    $q->where('receipt_end_serial_no', '>=', $start)
                        ->orWhere('receipt_end_serial_no', '>=', $end);
                })

                ->count();

            if ($check_serial_no) {
                $data= self::$model::orderBy('receipt_end_serial_no', 'desc')->first();
                return response()->json([
                    'errors' => [
                        'receipt_start_serial_no' => [
                            'receipt start serial no is exist, input > '.($data->receipt_end_serial_no +1)
                        ],
                        'receipt_end_serial_no' => [
                            'receipt end serial no is exist'
                        ],
                    ]
                ], 422);
            }

            if (self::$model::query()->create($request->validated())) {
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}

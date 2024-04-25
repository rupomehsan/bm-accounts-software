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
            // $check_serial_no = self::$model::whereBetween('receipt_start_serial_no', [$start, $end])
            //     ->whereBetween('receipt_end_serial_no', [$start, $end])
            //     ->count();
            $check_serial_no = self::$model::where('receipt_start_serial_no', '>', $start)
                ->where('receipt_end_serial_no', '<', $end)
                ->count();
            if ($check_serial_no) {
                return response()->json([
                    'errors' => [
                        'receipt_start_serial_no' => [
                            'receipt start serial no is exist'
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

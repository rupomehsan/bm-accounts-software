<?php

namespace App\Modules\AccountManagement\AccountReceiptBook\Actions;

use Illuminate\Support\Facades\DB;

class All
{
    static $model = \App\Modules\AccountManagement\AccountReceiptBook\Model::class;
    static $accountIncomeModel = \App\Modules\AccountManagement\AccountIncome\Model::class;
    static $userModel = \App\Modules\User\Model::class;

    public static function execute()
    {
        try {

            // dd(request()->all());

            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = [];
            $data = self::$model::query();

            if (request()->has('is_approvel') && request()->input('is_approvel')) {
                $condition['is_approvel'] =  request()->input('is_approvel') == 'approved' ? 1 : 0;
            }
            if (request()->has('rejected') && request()->input('rejected')) {
                $condition['is_rejected'] =  request()->input('rejected');
            }

            if (request()->has('search') && request()->input('search')) {
                $data = $data->where('title', 'like', '%' . request()->input('search') . '%');
            }

            if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
                if (request()->input('where') == 'not-exist') {
                    $data = $data->where('is_approvel', 1)->whereNotExists(function ($query) {
                        $query->select(DB::raw(1))
                            ->from('account_receipt_book_assigns')
                            ->whereRaw('account_receipt_book_assigns.account_receipt_book_id = account_receipt_books.id');
                    })->get();
                } elseif (request()->input('uniq_receipt')) {

                    if (auth()->user()->parent) {
                        $data = $data->where('remaining_page', '>', 0)->where('is_approvel', 1)->whereHas('receipt_book_assing', function ($q) {
                            $q->where('division_id', auth()->user()->parent);
                        })->get();

                    } else {

                        $data = $data->where('remaining_page', '>', 0)->where('is_approvel', 1)->whereHas('receipt_book_assing', function ($q) {
                            $q->where('division_id', auth()->id());
                        })->get();

                        $newData = [];

                        foreach ($data as $item) {
                            $differenceNumber = $item->receipt_end_serial_no - $item->receipt_start_serial_no;
                            $accounLogCount = self::$accountIncomeModel::where('account_receipt_book_id', $item->id)->count();
                            if ($accounLogCount < $differenceNumber) {
                                $newData[] = $item;
                            }
                        }

                        $data = $newData;

                    }
                } else {
                    $data = $data->with($with)->where($condition)->latest()->get();
                }
            } else {
                $data = $data->with($with)->where($condition)->latest()->paginate($offset);
                // dd($data);
            }
            $response = [
                'data' => $data,
                'totalApproved' => self::$model::where('is_approvel', 1)->count(),
                'totalNotApproved' => self::$model::where('is_approvel', 0)->count(),
            ];
            return entityResponse($response);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}

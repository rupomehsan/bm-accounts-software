<?php

namespace App\Modules\AccountManagement\AccountBranchTarget\Actions;

use App\Modules\AccountManagement\AccountBranchTarget\Actions\Validation;


class Store
{
    static $model = \App\Modules\AccountManagement\AccountBranchTarget\Model::class;

    public static function execute(Validation $request)
    {
        // dd($request->all());
        try {
            $comment = [];
            $comment[] = $request->input('comment');
            if (self::$model::query()->create(array_merge($request->validated(), ['comment' => $comment]))) {
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}

<?php

namespace App\Modules\AccountManagement\AccountBranchTarget\Actions;

use App\Modules\AccountManagement\AccountBranchTarget\Actions\Validation;

class Update
{
    static $model = \App\Modules\AccountManagement\AccountBranchTarget\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {


            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }

            $comment = $data->comment;

            if ($comment && count($comment)) {
                $oldcomment = $comment[count($comment) - 1];
                if ($oldcomment !== $request->input('comment')) {
                    $comment[] = $request->input('comment');
                    $data->update(array_merge($request->validated(), ['comment' => $comment]));
                }else{
                    $data->update(array_merge($request->validated(), ['comment' => $comment]));
                }
            }


            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}

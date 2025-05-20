<?php

namespace App\Modules\User\Actions;

use Illuminate\Support\Facades\DB;

class AtAGlance
{
    static $userModel = \App\Modules\User\Model::class;
    static $acLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;

    public static function execute()
    {
        try {

            $offset = request()->input('offset') ?? 10;
            $with = ['roles'];

            $users = self::$userModel::query()->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('user_user_role')
                    ->whereColumn('user_user_role.user_id', 'users.id')
                    ->whereIn('user_user_role.user_role_id',[7,8]);
            });
            $users = $users->get();
            foreach ($users as $user) {
                $user->income = self::$acLogModel::where('is_income', 1)->where('user_id', $user->id)->sum('amount');
                $user->expense = self::$acLogModel::where('is_expense', 1)->where('user_id', $user->id)->sum('amount');
            }
            return entityResponse($users);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}

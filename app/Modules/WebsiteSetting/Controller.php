<?php

namespace App\Modules\WebsiteSetting;


use App\Modules\WebsiteSetting\Actions\DashboardAnalytics;
use App\Http\Controllers\Controller as ControllersController;


class Controller extends ControllersController
{

    public function getDashboardAnalytics()
    {
        $data = DashboardAnalytics::execute();
        return $data;
    }
}

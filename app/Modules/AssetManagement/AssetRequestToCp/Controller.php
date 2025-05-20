<?php

namespace App\Modules\AssetManagement\AssetRequestToCp;

use App\Modules\AssetManagement\AssetRequestToCp\Actions\All;
use App\Modules\AssetManagement\AssetRequestToCp\Actions\Delete;
use App\Modules\AssetManagement\AssetRequestToCp\Actions\Show;
use App\Modules\AssetManagement\AssetRequestToCp\Actions\Store;
use App\Modules\AssetManagement\AssetRequestToCp\Actions\Update;
use App\Modules\AssetManagement\AssetRequestToCp\Validations\Validation;
use App\Modules\AssetManagement\AssetRequestToCp\Actions\BulkActions;
use App\Http\Controllers\Controller as ControllersController;


class Controller extends ControllersController
{

    public function index()
    {
        $data = All::execute();
        return $data;
    }
    public function seachByDateWise()
    {
        $data = All::seachByDateWise();
        return $data;
    }

    public function store(Validation $request)
    {
        $data = Store::execute($request);
        return $data;
    }

    public function show($id)
    {
        $data = Show::execute($id);
        return $data;
    }

    public function update(Validation $request, $id)
    {
        $data = Update::execute($request, $id);
        return $data;
    }
    public function assetQuotationApproval()
    {
        $data = Update::assetQuotationApproval();
        return $data;
    }

    public function destroy($id)
    {
        $data = Delete::execute($id);
        return $data;
    }
    public function bulkAction()
    {
        $data = BulkActions::execute();
        return $data;
    }
}

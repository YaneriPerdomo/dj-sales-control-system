<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\MerchandiseHistory;
use App\Models\MerchandisesDetails;
use App\Models\ReturnMerchandise;
use App\Models\ReturnMerchandiseDetails;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class PurchaseHistoryController extends Controller
{
    public function index()
    {
        $purchase_history = MerchandiseHistory::select('good_id', 'created_at', 'message', 'return_merchandise_id')
            ->orderBy('created_at', 'DESC')
            ->paginate(3);


        return view(
            'admin.operations.merchandise-management.goods.purchase-history'
            ,
            ['purchase_history' => $purchase_history]
        );
    }

    public function show($id, $statu)
    {

        switch ($statu) {
            case 'entrada':
                $type = 'entrada';
                $purchase_history = Good::select('good_id', 'description', 'created_at')
                    ->where('good_id', $id)->first();

                $purchase_history2 = MerchandisesDetails::select('good_id', 'product_id', 'amount')
                    ->with([
                        'products' => function ($query) {
                            $query->select('product_id', 'name', 'code');
                        }
                    ])->where('good_id', $id)->paginate(10);
                $purchase_history = $purchase_history->toArray();
                
                return view(
                    'admin.operations.merchandise-management.goods.history-more-details'
                    ,
                    [
                        'type' => $type,
                        'purchase_history' => $purchase_history, 'purchase_history2' => $purchase_history2]
                );

                break;
            case 'salida':
                $type = 'salida';
                $purchase_history = ReturnMerchandise::select('return_merchandise_id',
                 'description', 'created_at')
                    ->where('return_merchandise_id', $id)->first();

                $purchase_history2 = ReturnMerchandiseDetails::select('return_merchandise_id', 'product_id', 'amount')
                    ->with([
                        'products' => function ($query) {
                            $query->select('product_id', 'name', 'code');
                        }
                    ])->where('return_merchandise_id', $id)->paginate(10);
                $purchase_history = $purchase_history->toArray();
                return view(
                    'admin.operations.merchandise-management.goods.history-more-details'
                    ,
                    [
                        'type' => $type,
                        'purchase_history' => $purchase_history, 'purchase_history2' => $purchase_history2]
                );
                break;

            default:
                # code...
                break;
        }

    }
}

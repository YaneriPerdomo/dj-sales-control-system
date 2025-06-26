<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetails;
use DB;
use Illuminate\Http\Request;

class WarrantyManagementController extends Controller
{

    public function changeProductStatus(Request $request)
    {


        DB::beginTransaction();

        $itemNames = 0;

        $requestData = $request->except(['_token', '_method', 'sale_price_usd_1', 'discount_1', 'total_parcial_usd_1']);
        foreach ($requestData as $value) {
            $itemNames++;
        }

        $numberOfItems = $itemNames / 1;
        $sum = 0;

        for ($i = 1; $i <= $numberOfItems; $i++) {
            $productIdKey = 'id_' . $i;
            $warrantyStatusKey = 'warranty_status_' . $i;
            if (
                isset($requestData[$warrantyStatusKey]) && isset($requestData[$productIdKey])) {
                $productId = $requestData[$productIdKey];
                $productWarrantyStatus = $requestData[$warrantyStatusKey];
                $updateSaleDetails = SaleDetails::where('sale_detail_id', $productId)->first();

                $updateSaleDetails->warranty_status = $productWarrantyStatus;
                $updateSaleDetails->save();

               
            } 
        }



        DB::commit();



        return true;
    }
    public function index()
    {

        $sales = SaleDetails::select(
            "sale_detail_id",
            "sale_id",
        )
            ->whereHas(
                'sale',
                function ($query) {
                    $query->select(
                        'payment_type_id',
                        "sale_id",
                        "customer_id",
                        "total_price_dollars",
                        "status",
                        'sale_code',

                        "created_at",
                        "slug"
                    )->where('status', 'Garantía Pendiente')
                        ->with([
                            'paymentType' =>
                                function ($query) {
                                    $query->select(
                                        'payment_type_id',
                                        'name'
                                    );
                                },
                        ])
                        ->with([
                            'customer' =>
                                function ($query) {
                                    $query->select(
                                        'customer_id',
                                        'name',
                                        'lastname',
                                        'card'
                                    );
                                },
                        ]);
                }
            )->orderBy('created_at', 'desc')
            ->paginate(8);

        return view(
            'admin.operations.warranty-management.products-with-guarantees',
            [
                'sales' => $sales
            ]
        );
    }
    public function searchForSale()
    {
        return view('admin.operations.warranty-management.search-for-sale');
    }

    public function checkStatusSale(Request $request)
    {
        $code_sale = $request->sale_code ?? 0;

        $sale = Sale::where('sale_code', $code_sale)
            ->with([
                'customer' => function ($query) {
                    return $query;
                }
            ])
            ->first();


        if ($sale) {
            $fecha_actual = Date('Y-m-d');

            $fecha_vencimiento = $sale->expiration_date;

            if ($sale->expiration_date == null) {
                $msg = 'La venta solicitada existe, pero <b>NO CUENTA CON GARANTIA.</b> Te recomendamos revisar los detalles de la compra.';
                return view('admin.operations.warranty-management.expired-or-non-existent-warranty-msg', [
                    'msg' => $msg
                ]);
            }
            if ($fecha_actual > $fecha_vencimiento) {

                $msg = 'La venta solicitada existe, pero <b>LA GARANTÍA YA NO ES VÁLIDA</b> debido al tiempo otorgado. Si lo desea, <i>puede ampliar el periodo de garantía.</i> <a href=""> Aquí </a>';
                return view('admin.operations.warranty-management.expired-or-non-existent-warranty-msg', [
                    'msg' => $msg
                ]);
            }

            $count = 0;
            $sale_details = SaleDetails::where('sale_id', $sale->sale_id)
                ->with([
                    'products' => function ($query) {
                        return $query->select('name', 'product_id');
                    }
                ])
                ->get();
            $payment_types = PaymentType::all();





            return view('admin.operations.warranty-management.show-sale', [
                'sale' => $sale,
                'count' => $count,
                'payment_types' => $payment_types,
                'sale_details' => $sale_details
            ]);
        } else {
            $msg = 'No encontramos ninguna venta relacionada con el código que ingresaste. Asegúrate de escribirlo correctamente.';
            return view('admin.operations.warranty-management.expired-or-non-existent-warranty-msg', [
                'msg' => $msg
            ]);
        }
    }
}

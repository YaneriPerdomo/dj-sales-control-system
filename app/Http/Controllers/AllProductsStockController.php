<?php

namespace App\Http\Controllers;

use App\Models\DollarRate;
use App\Models\Product;
use Illuminate\Http\Request;

class AllProductsStockController extends Controller
{
    public function index()
    {
        $products = Product::select(
            'name',
            'location_id',
            "code",
            "price_dollar",
            "slug",
            "stock_available"
        )->
           
            with([
                "location" => function ($query) {
                    $query->select('location_id', 'name');
                }
            ])->paginate(8);
        //With(el nombre del metodo del modelo);

        $bs = DollarRate::select('in_bs')->first();


        return view(
            "admin.operations.inventory-management.all-products-stock-controller.show-all",
            ['products' => $products, 'bs' => $bs]
        );
    }
}

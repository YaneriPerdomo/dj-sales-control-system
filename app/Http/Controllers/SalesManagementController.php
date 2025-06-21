<?php

namespace App\Http\Controllers;

use App\Models\CreditRate;
use App\Models\Customer;
use App\Models\DollarRate;
use App\Models\Iva;
use App\Models\Product;
use Illuminate\Http\Request;

class SalesManagementController extends Controller
{
     public function create()
     {
          //Record customer sale
          $bs = DollarRate::select('in_bs')->first();
          $iva = Iva::select('iva')->first();
          $credit_rate = CreditRate::select('value')->first();
         
          return view(
               'admin.operations.sales-management.register',
               [
                    'iva' => $iva,
                    'bs' => $bs, 
                    'credit_rate' => $credit_rate
               ]
          );
     }

     public function searchCurtomer(Request $request)
     {

          $customer = Customer::where('card', $request->supplier_id_search)->first();

          if ($customer) {
               return response($customer)->header('Content-type', 'aplication/json');
          } else {
               return response(['customer' => false])->header('Content-type', 'aplication/json');

          }
     }

     public function searchProduct(Request $request)
     {
          if ($request->name_product == "") {
               return response(['customer' => false])->header('Content-type', 'aplication/json');
          }
          $customer = Product::select('name', 'code', 'price_dollar', 'sale_profit_percentage', 'discount_only_dollar', 'description')
               ->whereLike('name', '%' . $request->name_product . '%')->get();


          if (!$customer->count() == 0) {
               return response($customer)->header('Content-type', 'aplication/json');
          } else {
               return response(['customer' => false])->header('Content-type', 'aplication/json');

          }
     }
}

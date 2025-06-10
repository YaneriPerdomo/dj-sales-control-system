<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class SalesManagementController extends Controller
{
     public function create()
     {
          //Record customer sale

          return view('admin.operations.sales-management.register');
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
}

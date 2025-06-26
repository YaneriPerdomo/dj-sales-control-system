<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\IdentityCard;
use DB;
use Illuminate\Http\Request;
use PDOException;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::select(
            'identity_card_id',
            'name',
            'lastname',
            'phone',
            'address',
            'slug',
            'card',
            'created_at',
            'gender_id'
        )
            ->with([
                'identityCard' => function ($query) {
                    $query->select('identity_card_id', 'identity_card');
                }
            ])->paginate(9);


        return view(
            "admin.catalogs.master-data.customers.show-all",
            ['customers' => $customers]
        );
    }


    public function create()
    {
        return view(
            "admin.catalogs.master-data.customers.create",

        );
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $customer = new Customer();
            $slug = converter_slug($request->customer_name
                . ' ' . $request->customer_lastname, $request->card);
            $customer->name = $request->customer_name;
            $customer->lastname = $request->customer_lastname;
            $customer->gender_id = $request->gender_id;
            $customer->identity_card_id = $request->identity_card_id;
            $customer->card = $request->card;
            $customer->phone = $request->telephone_number;
            $customer->address = $request->address;
            $customer->slug = $slug;
            $customer->save();
            $message = $request->gender_id == 1 ? "El cliente ha sido registrado" : "La cliente ha sido registrada";
            DB::commit();
            return redirect('clientes')->with("alert-success", $message . " con éxito.");
        } catch (PDOException $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }
    }
    public function edit($slug)
    {
        $customer = Customer::where('slug', $slug)->first();
        $identity_cards = IdentityCard::all();
        return view(
            "admin.catalogs.master-data.customers.edit",
            ['customer' => $customer, 'identity_cards' => $identity_cards]
        );
    }

    public function update(Request $request, $slug)
    {
        $customer = Customer::where('slug', $slug)->first();

        $customer->name = $request->customer_name;
        $customer->lastname = $request->customer_lastname;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->card = $request->card;
        $customer->gender_id = $request->gender_id;
        $customer->phone = $request->telephone_number;
        $customer->identity_card_id = $request->identity_card_id;
        $customer->slug = 123;
        $customer->save();

        $new_slug = converter_slug($request->customer_name
            . ' ' . $request->customer_lastname, $request->card);
        $customer->slug = $new_slug;
        $customer->save();

        $message = $request->gender_id == 1 ? "El cliente ha sido actualizado" : "La cliente ha sido actualizada";
        DB::commit();
        return redirect('cliente/'.$new_slug.'/editar')->with("alert-success", $message . " con éxito.");
    }

}

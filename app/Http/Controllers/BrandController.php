<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use DB;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDOException;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(8);
        return view(
            "admin.catalogs.catalog-configuration.brands.show-all",
            ["brands" => $brands]
        );
    }

    public function create()
    {
        return view(
            "admin.catalogs.catalog-configuration.brands.create",

        );
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $slug = converter_slug($request->name);

            $insert_brand = new Brand();

            $insert_brand->slug = $slug;
            $insert_brand->name = $request->name;
            $insert_brand->save();


            DB::commit();
            return redirect('marcas')->with("alert-success", "La marca ha sido registrada con éxito.");
            return $insert_brand;
        } catch (QueryException $ex) { //Error de consulta de nuestra base de datos
            abort(500, 'Sucedio un error de actualizacion de usuario');
            echo $ex->getMessage() . ' ' . $ex->getLine();
        } catch (PDOException $ex) { //Error relacionado con la base de datos a mas detalles
            abort(500, 'Sucedio un error en la base de datos');
            echo $ex->getMessage() . ' ' . $ex->getLine();
        } catch (Exception $ex) { //Error generico que se puede presentar 
            abort(500, 'Error generico inesperado ');
            echo $ex->getMessage() . ' ' . $ex->getLine();
        }

    }

    public function edit($slug)
    {
        $brand = Brand::where('slug', $slug)->first();

        return view(
            'admin.catalogs.catalog-configuration.brands.edit',
            [
                'brand' => $brand
            ]
        );
    }

    public function update(Request $request, $old_slug)
    {
        try {
            DB::beginTransaction();

            $update_brand = Brand::where('slug', $old_slug)->first();
            $new_slug = converter_slug($request->name);

            $update_brand->slug = $new_slug;
            $update_brand->name = $request->name;
            $update_brand->save();

            DB::commit();
            return redirect('marca/' . $new_slug . '/editar')
                ->with("alert-success", "La marca se ha actualizado correctamente.");
        } catch (QueryException $ex) { //Error de consulta de nuestra base de datos
            abort(500, 'Sucedio un error de actualizacion de usuario');
            echo $ex->getMessage() . ' ' . $ex->getLine();
        } catch (PDOException $ex) { //Error relacionado con la base de datos a mas detalles
            abort(500, 'Sucedio un error en la base de datos');
            echo $ex->getMessage() . ' ' . $ex->getLine();
        } catch (Exception $ex) { //Error generico que se puede presentar 
            abort(500, 'Error generico inesperado ');
            echo $ex->getMessage() . ' ' . $ex->getLine();
        }
    }

    public function delete($slug)
    {

        return view(
            "admin.catalogs.catalog-configuration.brands.delete",
            ["slug" => $slug]
        );
    }
    public function destroy($slug)
    {

        $supplier = Brand::where('slug', $slug)->first();

        $name = $supplier->name;
        $supplier->delete();

        return redirect('marcas')
            ->with("alert-success", 'La  marca "' . $name . '" ha sido eliminada' . " correctamente.");
    }
}

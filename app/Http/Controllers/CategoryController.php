<?php

namespace App\Http\Controllers;

use App\Models\Category;
use DB;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDOException;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(8);
        return view(
            "admin.catalogs.catalog-configuration.categorys.show-all",
            ["categories" => $categories]
        );
    }

    public function create()
    {
        return view(
            "admin.catalogs.catalog-configuration.categorys.create",

        );
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $slug = converter_slug($request->name);

            $insert_category = new Category();

            $insert_category->slug = $slug;
            $insert_category->name = $request->name;
            $insert_category->save();


            DB::commit();
            return redirect('categorias')->with("alert-success", "La categoria ha sido registrada con éxito.");
            return $insert_category;
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
        $category = Category::where('slug', $slug)->first();

        return view(
            'admin.catalogs.catalog-configuration.categorys.edit',
            [
                'category' => $category
            ]
        );
    }

    public function update(Request $request, $old_slug)
    {
        try {
            DB::beginTransaction();

            $update_category = Category::where('slug', $old_slug)->first();
            $new_slug = converter_slug($request->name);

            $update_category->slug = $new_slug;
            $update_category->name = $request->name;
            $update_category->save();

            DB::commit();
            return redirect('categoria/' . $new_slug . '/editar')
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
}

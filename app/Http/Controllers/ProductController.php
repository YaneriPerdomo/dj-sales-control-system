<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\DollarRate;
use App\Models\Location;
use App\Models\Product;
use App\Models\Supplier;
use DB;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDOException;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::select(
            'name',
            'category_id',
            "created_at",
            'brand_id',
            'location_id',
            "code",
            "price_dollar",
            "sale_profit_percentage",
            "discount_only_dollar",
            "description",
            "slug",
            "supplier_id"
        )->
            with([
                "category" => function ($query) {
                    $query->select('category_id', 'name')
                    ;
                }
            ])
            ->with([
                "supplier" => function ($query) {
                    $query->select('supplier_id', 'name')
                    ;
                }
            ])
            ->with([
                "brand" => function ($query) {
                    $query->select('brand_id', 'name');
                }
            ])
            ->with([
                "location" => function ($query) {
                    $query->select('location_id', 'name');
                }
            ])->paginate(8);
        //With(el nombre del metodo del modelo);

        $bs = DollarRate::select('in_bs')->first();


        return view(
            "admin.catalogs.master-data.products.show-all",
            ['products' => $products, 'bs' => $bs]
        );
    }

    public function create()
    {

        $categorys = Category::select('category_id', 'name')->get();
        $brands = Brand::select('brand_id', 'name')->get();
        $locations = Location::select('location_id', 'name')->get();
        $suppliers = Supplier::select('supplier_id', 'name')->get();
        return view(
            "admin.catalogs.master-data.products.create",
            [
                'categorys' => $categorys,
                'brands' => $brands,
                'locations' => $locations
                ,
                "suppliers" => $suppliers
            ]
        );
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $product = new Product();

            $slug = converter_slug($request->product_name, $request->sku);
            $product->slug = $slug;
            $product->name = $request->product_name;
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->code = $request->sku;
            $product->supplier_id = $request->supplier_id;
            $product->location_id = $request->location_id;
            $product->description = $request->description;
            $product->price_dollar = $request->price_usd;
            $product->sale_profit_percentage = $request->profit_margin_percentage;
            $product->discount_only_dollar = $request->discount_foreign_currency;

            $product->save();

            DB::commit();
            return redirect('productos')->with("alert-success", "El producto ha sido registrado con éxito.");

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
        $product = Product::select(
            'name',
            'category_id',
            'brand_id',
            'location_id',
            "code",
            "supplier_id",
            "price_dollar",
            "sale_profit_percentage",
            "discount_only_dollar",
            "description",
            "slug"
        )->where('slug', $slug)
            ->with([
                "category" => function ($query) {
                    $query->select('category_id', 'name')

                    ;
                }
            ])->with([
                "supplier" => function ($query) {
                    $query->select('supplier_id', 'name')

                    ;
                }
            ])
            ->with([
                "brand" => function ($query) {
                    $query->select('brand_id', 'name');
                }
            ])
            ->with([
                "location" => function ($query) {
                    $query->select('location_id', 'name');
                }
            ])->first();

        $categorys = Category::select('category_id', 'name')->get();
        $brands = Brand::select('brand_id', 'name')->get();
        $locations = Location::select('location_id', 'name')->get();
        $suppliers = Supplier::select('supplier_id', 'name')->get();        
        if (!$product) {
            abort(404, 'No se pudo encontrar el registro');
        }

        return view('admin.catalogs.master-data.products.edit', [
            "categorys" => $categorys,
            "brands" => $brands,
            "locations" => $locations,
            "product" => $product,
            "suppliers" => $suppliers
        ]);
    }

    public function update(Request $request, $old_slug)
    {
        DB::beginTransaction();
        $product = Product::where('slug', $old_slug)->first();

        $slug = converter_slug($request->product_name, $request->sku);
        $product->slug = $slug;
        $product->name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->code = $request->sku;
        $product->supplier_id = $request->supplier_id;
        $product->location_id = $request->location_id;
        $product->description = $request->description;
        $product->price_dollar = $request->price_usd;
        $product->sale_profit_percentage = $request->profit_margin_percentage;
        $product->discount_only_dollar = $request->discount_foreign_currency;

        $product->save();

        DB::commit();
        return redirect('producto/' . $slug . '/editar')
            ->with("alert-success", "El producto ha sido actualizado con éxito.");

    }
}

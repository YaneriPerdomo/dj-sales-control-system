<?php

use App\Http\Controllers\AllProductsStockController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfigurationAdminController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\ControlPanelController;
use App\Http\Controllers\CriticalStockController;
use App\Http\Controllers\DollarRateController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::get('iniciar-sesion', 'index')->name('login');
    Route::post('iniciar-sesion', 'store')->name('attemptLogin');
    Route::post('cerrar-sesion', 'logout')->name('logout');
});

Route::get('panel-control', [ControlPanelController::class, 'index'])
    ->middleware(['auth'])
    ->name('controlPanel.index');

Route::controller(ConfigurationAdminController::class)->group(function () {
    Route::get('configuracion', 'index')->name('configuration.index');
    Route::put('configuracion', 'update')->name('configuration.update');
    Route::put('configuracion/cambiar-contrasena', 'updatePassword')->name('configuration.update-password');
});


Route::controller(CategoryController::class)->group(function () {
    Route::get('categorias', 'index')->name('category.index');
    Route::get('categoria/registrar', 'create')->name('category.create');
    Route::post('categoria/registrar', 'store')->name('category.store');
    Route::get('categoria/{slug}/editar', 'edit')->name('category.edit');
    Route::put('categoria/{slug}/editar', 'update')->name('category.update');
});

Route::controller(BrandController::class)->group(function () {
    Route::get('marcas', 'index')->name('brand.index');
    Route::get('marca/registrar', 'create')->name('brand.create');
    Route::post('marca/registrar', 'store')->name('brand.store');
    Route::get('marca/{slug}/editar', 'edit')->name('brand.edit');
    Route::put('marca/{slug}/editar', 'update')->name('brand.update');
});



Route::controller(LocationController::class)->group(function () {
    Route::get('ubicaciones', 'index')->name('location.index');
    Route::get('ubicacion/registrar', 'create')->name('location.create');
    Route::post('ubicacion/registrar', 'store')->name('location.store');
    Route::get('ubicacion/{slug}/editar', 'edit')->name('location.edit');
    Route::put('ubicacion/{slug}/editar', 'update')->name('location.update');
});

Route::controller(DollarRateController::class)->group(function () {
    Route::get('tasa-de-dolar', 'index')->name('dollar-rate.index');
    Route::get('tasa-de-dolar/editar', 'edit')->name('dollar-rate.edit');
    Route::put('tasa-de-dolar/editar', 'update')->name('dollar-rate.update');
});

Route::controller(SupplierController::class)->group(function () {
    Route::get('proveedores', 'index')->name('supplier.index');
    Route::get('proveedor/registrar', 'create')->name('supplier.create');
    Route::post('proveedor/registrar', 'store')->name('supplier.store');
    Route::get('proveedor/editar', 'edit')->name('supplier.edit');
    Route::put('proveedor/editar', 'update')->name('supplier.update');
    Route::get('proveedor/{slug}/editar', 'edit')->name('supplier.edit-m');
    Route::get('proveedora/{slug}/editar', 'edit')->name('supplier.edit-f');
    Route::put('proveedor/{slug}/editar', 'update')->name('supplier.update');
    Route::get('proveedor/{slug}/eliminar', 'delete')->name('supplier.delete-m');
    Route::get('proveedora/{slug}/eliminar', 'delete')->name('supplier.delete-f');
    Route::delete('proveedor/{slug}/eliminar', 'destroy')->name('supplier.destroy');

});

Route::controller(ProductController::class)->group(function () {
    Route::get('productos', 'index')->name('product.index');
    Route::get('producto/registrar', 'create')->name('product.create');
    Route::post('producto/registrar', 'store')->name('product.store');
    Route::get('producto/{slug}/editar', 'edit')->name('product.edit');
    Route::put('producto/{slug}/editar', 'update')->name('product.update');
    Route::get('producto/{slug}/eliminar', 'delete')->name('product.delete');
    Route::delete('producto/{slug}/eliminar', 'destroy')->name('product.destroy');
});

Route::controller(AllProductsStockController::class)->group(function () {
    Route::get('todos-los-productos-y-stock', 'index')->name('all-products-stock.index');
    Route::get('todos-los-productos-y-stock/{slug}/editar', 'edit')->name('all-product-stock.edit');
    Route::put('todos-los-productos-y-stock/{slug}/editar', 'update')->name('all-product-stock.update');
});

Route::controller(CriticalStockController::class)->group(function () {
    Route::get('productos-con-stock-criticos', 'index')->name('critical-stock.index');
});

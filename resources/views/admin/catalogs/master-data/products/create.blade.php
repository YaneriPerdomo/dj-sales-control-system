<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configuration | Biblioteca B</title>
    <link rel="stylesheet" href="../../../css/utilities.css">
    <link rel="stylesheet" href="../../../css/layouts/_base.css">
    <link rel="stylesheet" href="../../../css/components/_button.css">
    <link rel="stylesheet" href="../../../css/components/_footer.css">
    <link rel="stylesheet" href="../../../css/components/_form.css">
    <link rel="stylesheet" href="../../../css/components/_header.css">
    <link rel="stylesheet" href="../../../css/components/_input.css">
    <link rel="stylesheet" href="../../../css/components/_top-bar.css">
    <link rel="stylesheet" href="../css/components/_selection-operations.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body class="h-100 d-flex flex-column">
    <x-header-admin></x-header-admin>
    <x-selection-operations></x-selection-operations>
    <main class="flex__grow-2 flex-full__aligh-start">
        <form action="{{ route('product.store') }}" method="post" class="form w-adjustable">
            @csrf
            @method('POST')

            <div class="button--back">
                <a href="{{ route('product.index') }}">
                    <i class="bi bi-arrow-left-square text-grey"></i>
                    <button class="button text-grey" type="button">Volver al listado</button> </a>
            </div>

            <legend class="form__title">
                <b>Registrar Nuevo Producto</b>
            </legend>

            @if (session('alert-success'))
                <div class="alert alert-success">
                    {{ session('alert-success') }}
                </div>
            @endif

            <fieldset>
                <legend>
                    Detalles del Producto
                </legend>
                <div class="form__item">
                    <label for="supplier_id" class="form__label form__label--required">Proveedor</label>
                    <div class="input-group">
                        <span class="form__icon input-group-text @error('supplier_id') is-invalid--border @enderror"
                            id="category-addon"><i class="bi bi-person-badge"></i></span>
                        <select class="form-select @error('supplier_id') is-invalid @enderror" name="supplier_id"
                            id="supplier_id" aria-label="Seleccione la categoría del producto">
                            <option selected disabled>Seleccione una opción</option>
                            @foreach ($suppliers as $value)
                                <option value="{{ $value->supplier_id }}" {{ old('supplier_id') == $value->supplier_id ? 'selected' : '' }}>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('supplier_id') <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__item">
                    <label for="category_id" class="form__label form__label--required">Categoría</label>
                    <div class="input-group">
                        <span class="form__icon input-group-text @error('category_id') is-invalid--border @enderror"
                            id="category-addon"><i class="bi bi-tags"></i></span>
                        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                            id="category_id" aria-label="Seleccione la categoría del producto">
                            <option selected disabled>Seleccione una opción</option>
                            @foreach ($categorys as $value)
                                <option value="{{ $value->category_id }}" {{ old('category_id') == $value->category_id ? 'selected' : '' }}>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id') <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form__item">
                    <label for="brand_id" class="form__label form__label--required">Marca</label>
                    <div class="input-group">
                        <span class="form__icon input-group-text @error('brand_id') is-invalid--border @enderror"
                            id="brand-addon"><i class="bi bi-building"></i></span>
                        <select class="form-select @error('brand_id') is-invalid @enderror" name="brand_id"
                            id="brand_id" aria-label="Seleccione la marca del producto">
                            <option selected disabled>Seleccione una opción</option>
                            @foreach ($brands as $value)
                                <option value="{{ $value->brand_id }}" {{ old('brand_id') == $value->brand_id ? 'selected' : '' }}>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('brand_id')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form__item">
                    <label for="product_name" class="form__label form__label--required">Nombre del Producto</label>
                    <div class="input-group">
                        <span class="form__icon input-group-text @error('product_name') is-invalid--border @enderror"
                            id="product-name-addon"><i class="bi bi-box"></i></span>
                        <input type="text" name="product_name" id="product_name"
                            class="form-control @error('product_name') is-invalid @enderror"
                            placeholder="Ej: Camisa Deportiva Elite" aria-label="Nombre del producto" autofocus
                            value="{{ old('product_name') }}">
                    </div>
                    @error('product_name') <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form__item">
                    <label for="sku" class="form__label">Código de Producto (SKU)</label>
                    <div class="input-group">
                        <span class="form__icon input-group-text @error('sku') is-invalid--border @enderror"
                            id="sku-addon"><i class="bi bi-qr-code"></i></span>
                        <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror"
                            placeholder="Ej: ABC123XYZ" aria-label="Código de producto SKU" value="{{ old('sku') }}">
                    </div>
                    @error('sku') <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form__item">
                    <label for="location_id" class="form__label form__label--required">Ubicación del producto</label>
                    <div class="input-group">
                        <span class="form__icon input-group-text @error('location_id') is-invalid--border @enderror"
                            id="location-addon"><i class="bi bi-geo-alt"></i></span>
                        <select class="form-select @error('location_id') is-invalid @enderror" name="location_id"
                            id="location_id" aria-label="Seleccione la ubicación del producto">
                            <option selected disabled>Seleccione una opción</option>
                            @foreach ($locations as $value)
                                <option value="{{ $value->location_id }}" {{ old('location_id') == $value->location_id ? 'selected' : '' }}>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('location_id')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form__item">
                    <label for="description" class="form__label">Descripción</label>
                    <div class="input-group">
                        <span class="form__icon input-group-text @error('description') is-invalid--border @enderror"
                            id="description-addon"><i class="bi bi-text-paragraph"></i></span>
                        <textarea name="description" id="description" rows="3"
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Breve descripción del producto (material, características, etc.)"
                            aria-label="Descripción del producto">{{ old('description') }}</textarea>
                    </div>
                    @error('description') <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </fieldset>

            <fieldset>
                <legend>
                    Precios y Rentabilidad
                </legend>

                <div class="form__item">
                    <label for="price_usd" class="form__label form__label--required">Precio de Costo ($)</label>
                    <div class="input-group">
                        <span class="form__icon input-group-text @error('price_usd') is-invalid--border @enderror"
                            id="price-usd-addon"><i class="bi bi-currency-dollar"></i></span>
                        <input type="number" step="0.01" name="price_usd" id="price_usd"
                            class="form-control @error('price_usd') is-invalid @enderror" placeholder="Ej: 19.99"
                            aria-label="Precio del producto en dólares" value="{{ old('price_usd') }}">
                    </div>
                    @error('price_usd') <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form__item">
                    <label for="discount_foreign_currency" class="form__label">Descuento por Pago en Divisas ($)</label>
                    <div class="input-group">
                        <span
                            class="form__icon input-group-text @error('discount_foreign_currency') is-invalid--border @enderror"
                            id="discount-addon"><i class="bi bi-percent"></i></span>
                        <input type="number" name="discount_foreign_currency" id="discount_foreign_currency"
                            class="form-control @error('discount_foreign_currency') is-invalid @enderror"
                            placeholder="Ej: 5 (para 5$)" aria-label="Porcentaje de descuento en divisas"
                            value="{{ old('discount_foreign_currency') }}">
                    </div>
                    @error('discount_foreign_currency') <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form__item">
                    <label for="profit_margin_percentage" class="form__label form__label--required">Margen de Ganancia
                        (%)</label>
                    <div class="input-group">
                        <span
                            class="form__icon input-group-text @error('profit_margin_percentage') is-invalid--border @enderror"
                            id="profit-margin-addon"><i class="bi bi-graph-up"></i></span>
                        <input type="number" name="profit_margin_percentage" id="profit_margin_percentage"
                            class="form-control @error('profit_margin_percentage') is-invalid @enderror"
                            placeholder="Ej: 25 (para 25%)" aria-label="Margen de ganancia en porcentaje"
                            value="{{ old('profit_margin_percentage') }}">
                    </div>
                    @error('profit_margin_percentage') <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </fieldset>

            <div class="form__button w-100 my-3">
                <button class="button button--color-blue w-100" type="submit">
                    Guardar cambios
                </button>
            </div>
        </form>
    </main>
    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>
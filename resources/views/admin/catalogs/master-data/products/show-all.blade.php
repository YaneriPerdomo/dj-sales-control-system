<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configuration | Biblioteca B</title>
    <link rel="stylesheet" href="../../../../../css/utilities.css">
    <link rel="stylesheet" href="../css/layouts/_base.css">
    <link rel="stylesheet" href="../css/components/_button.css">
    <link rel="stylesheet" href="../css/components/_footer.css">
    <link rel="stylesheet" href="../css/components/_form.css">
    <link rel="stylesheet" href="../../../../css/components/_table.css">
    <link rel="stylesheet" href="../../../../css/components/_header.css">
    <link rel="stylesheet" href="../css/components/_selection-operations.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<style>
    .article--all-job {
        align-self: start;
    }

    .table__operations {
        display: flex !important;
        gap: 0.5rem;
    }
</style>

<body class="h-100 d-flex flex-column">
    <x-header-admin></x-header-admin>
    <x-selection-operations></x-selection-operations>
    <main class="flex__grow-2 flex-full__aligh-start">
        <article class="form w-100 ">
            <div class="flex-full__justify-content-between p-0">
                <div>
                    <legend><b>Listado de Productos</b></legend>
                </div>
                <div>
                    <a href="{{ route('product.create') }}" class="text-decoration-none text-white">
                        <button class="button button--color-blue">
                            Registrar nuevo producto
                        </button>
                    </a>
                </div>
            </div>
            <div class="">
                @if (session('alert-success'))
                    <div class="alert alert-success">
                        {{ session('alert-success') }}
                    </div>
                @endif
                <section class='table'>
                    <table class='dataTable'>
                        <thead>
                            <tr>
                                <td>Proveedor</td>
                                <th>Código de Producto (SKU)</th>
                                <th>Nombre del producto</th>
                                <th>Categoria</th>
                                <th>Marca</th>
                                <th>Precio de Costo ($) </th>
                                <th> Margen de Ganancia (%) </th>
                                <td>Precio de Venta</td>
                                <th> Descuento por Pago en Divisas ($) </th>

                                <th>Descripcion</th>
                                <td>
                                    Registrado desde
                                </td>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->items() == [])
                                <p>No hay productos registrados por los momentos.</p>
                            @else
                                @foreach ($products->items() as $value)
                                    <tr class='show'>
                                        <td>{{ $value->supplier->name}}</td>
                                        <td>{{ $value->code }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->category->name }}</td>
                                        <td>{{ $value->brand->name }}</td>
                                        <td>{{ number_format($value->price_dollar, 2, ',', '.') }}$</td>
                                        <td>{{$value->sale_profit_percentage}}%</td>
                                        <td>
                                            @php
                                                $value->price_dollar;
                                                $value->sale_profit_percentage;

                                                $decimal = number_format($value->sale_profit_percentage / 100, 2);
                                              

                                                $ganancia = $value->price_dollar * $decimal;
                                               

                                                
                                                $formula =  $value->price_dollar + $ganancia;
                                                
                                                 $respuesta = number_format($formula, 2, ',', '.');
                                               

                                                 echo  'USD: ' . $respuesta .
                                                    ' <br> BS: ' . number_format(number_format($formula, 2) * $bs->in_bs, 2, ',', '.');
                                            @endphp
                                        </td>
                                        <td>
                                            {{ $value->discount_only_dollar }}$
                                        </td>
                                        <td>
                                            {{ $value->description }}
                                        </td>
                                        <td>
                                            {{ substr($value->created_at, 0, 10) }}
                                        </td>

                                        <td class='table__operations'>

                                            <a href="{{ route('product.delete', $value->slug)}}">
                                                <button type="button" class="button button--color-red ">
                                                    <i class='bi bi-trash''></i>
                                                                                                                            </button>
                                                                                                                        </a>

                                                                                                                        <a href="{{ route('product.edit', $value->slug)}}">
                                                                                                                            <button class="button button--color-orange">
                                                                                                                               <i class="bi bi-pencil-square"></i>
                                                                        </button>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </section>
                <div>
                </div>
                <div class="flex-full__justify-content-between">
                    <div>
                        <p>
                            Mostrando {{ $products->count() == 1 ? 'registro' : 'registros' }} 1 -
                            {{ $products->count() }}
                            de un total de {{ $products->total() }}
                        </p>
                    </div>
                    <div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </article>
    </main>


    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>
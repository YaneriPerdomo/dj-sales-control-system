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

    .critical-stock {
        border-radius: 0.5rem;
        padding: 0.4rem 0.7rem;
        background-color: var(--color-yellow);
    }

    .out-stock {
        border-radius: 0.5rem;
        color:white;
        padding: 0.4rem 0.7rem;
        background-color: var(--color-black);
    }

    .low-stock{
        border-radius: 0.5rem;
        padding: 0.4rem 0.7rem;
        color:white;
        background-color: var(--color-red);
    }
</style>

<body class="h-100 d-flex flex-column">
    <x-header-admin></x-header-admin>
    <x-selection-operations></x-selection-operations>
    <main class="flex__grow-2 flex-full__aligh-start">
        <article class="form w-adjustable  ">
            <div class="flex-full__justify-content-between p-0">
                <div>
                    <legend><b>Listado de Productos con Stock crítico</b></legend>
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
                                <th>Código de Producto (SKU)</th>
                                <th>Nombre del producto</th>
                                <th> Precio en Dólares ($) </th>
                                <th> Ubicación del producto </th>
                                <th> Stock actual </th>
                                <th>Estado</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->items() == [])
                                <p>No hay productos registrados por los momentos.</p>
                            @else
                                @foreach ($products->items() as $value)
                                    <tr class='show'>
                                        <td>{{ $value->code }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>${{ $value->price_dollar }}</td>
                                        <td>{{ $value->location->name }}</td>
                                        <td>
                                            {{ $value->stock_available }}
                                        </td>

                                        @php


                                            if ($value->stock_available == 0) {
                                                echo '<td ><span class="out-stock"> Agotado </span></td>';
                                            }

                                            if ($value->stock_available >= 4 && $value->stock_available <= 8) {
                                                echo ' <td> <span class="critical-stock"> Critico </span></td>';
                                            }
                                            if ($value->stock_available > 0 && $value->stock_available < 4) {
                                                echo '<td> <span class="low-stock">Bajo </span> </td>';
                                            }





                                           @endphp


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
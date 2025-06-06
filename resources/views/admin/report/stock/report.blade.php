<head>
    <style>
        .dataTable th {
            text-align: left;
            background: rgb(97, 112, 223) !important;
            border-bottom: 1px dashed #aaa;
        }

        thead>tr {
            background: rgb(97, 112, 223) !important;
            color: white;
        }

        .dataTable tr:nth-child(odd) {
            background: rgba(0, 0, 0, 0.07);
        }

        .dataTable td,
        .dataTable th {
            padding: 0.625em;
            line-height: 1.5em;
            border-bottom: 1px dashed #ccc;
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        .flex-full__justify-content-between {
            display: flex;
            width: 100%;
            justify-content: space-between;

            padding: 10px;

        }

        :root {
            --color-blue: rgb(28, 103, 181);
            --color-red: rgb(229, 55, 43);
            --color-grey: #5b5b5b;
            --color-grey-two: #979797;
            --color-light-red: rgb(255, 187, 182);
            --color-orange: rgb(229, 95, 43);
            --color-pink: rgb(255, 137, 156);
            --color-yellow: rgb(236, 236, 94);
            --color-vinotinto: #b41c38;
            --color-blue: rgb(98, 113, 224);
            --color-black: rgb(47, 47, 47);
            --color-red: rgb(203, 43, 37);
        }

        .critical-stock {
            border-radius: 0.5rem;
            padding: 0.4rem 0.7rem;
            background-color: var(--color-yellow);
        }

        .out-stock {
            border-radius: 0.5rem;
            color: white;
            padding: 0.4rem 0.7rem;
            background-color: var(--color-black);
        }

        .low-stock {
            border-radius: 0.5rem;
            padding: 0.4rem 0.7rem;
            color: white;
            background-color: var(--color-red);
        }
    </style>
</head>
<div class="flex-full__justify-content-between p-0">
    <div>
        <span><b>{{ $title }}</b></span>
    </div>
    <div>
        {{-- Formato de fecha más legible. Carbon es ideal aquí si lo usas en el controlador. --}}
        <span>Fecha de Generación: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span>
    </div>
</div>

<div class="">
    <section class='table'>
        <table class='dataTable'>
            <thead>
                <tr>
                    <th>Código de Producto (SKU)</th>
                    <th>Nombre del Producto</th>
                    <th>Precio de Venta</th>
                    <th>Ubicación del Producto</th>
                    <th>Stock Actual</th>
                    @if ($state == true)
                        <th>Estado</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                {{-- Verifica si la colección de productos está vacía o es null --}}
                @forelse ($products as $value)
                    <tr class='show'>
                        <td>{{ $value->code ?? 'N/A' }}</td> {{-- Mejor "N/A" que "2" si el código no existe --}}
                        <td>{{ $value->name }}</td>
                        <td>
                            @php
                                $value->price_dollar;
                                $value->sale_profit_percentage;

                                $decimal = number_format($value->sale_profit_percentage / 100, 2);


                                $ganancia = $value->price_dollar * $decimal;



                                $formula = $value->price_dollar + $ganancia;

                                $respuesta = number_format($formula, 2, ',', '.');


                                echo 'USD: ' . $respuesta .
                                    ' <br> BS: ' . number_format(number_format($formula, 2) * $bs->in_bs, 2, ',', '.');
                            @endphp
                        </td>
                        <td>{{ $value->location->name ?? 'Desconocida' }}</td> {{-- Considera si location podría ser null
                        --}}
                        <td>{{ $value->stock_available }}</td>
                        @if ($state == true)
                            <td>
                                @if ($value->stock_available == 0)
                                    <span class="out-stock">Agotado</span>
                                @elseif ($value->stock_available >= 4 && $value->stock_available <= 8)
                                    <span class="critical-stock">Crítico</span>
                                @elseif ($value->stock_available > 0 && $value->stock_available < 4)
                                    <span class="low-stock">Bajo</span>
                                @else
                                    {{-- Opcional: un estado para stock "normal" si $value->stock_available > 8 --}}
                                    <span class="normal-stock">Normal</span>
                                @endif
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        {{-- colspan para que el mensaje ocupe toda la fila de la tabla --}}
                        <td colspan="6" style="text-align: center;">No hay productos solicitados en este momento.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</div>
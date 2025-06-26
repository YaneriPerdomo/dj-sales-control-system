<head>

    <style>
        * {
            font-family: "Lato", sans-serif;
            font-weight: 100;
            font-style: normal;
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
            --color-blue: rgb(16, 59, 200);
            --color-black: rgb(47, 47, 47);
            --color-red: rgb(203, 43, 37);
        }

        .dataTable th {
            text-align: left;
            background: rgb(16, 59, 200) !important;
            border-bottom: 1px dashed #aaa;
        }

        thead>tr {
            background: rgb(16, 59, 200) !important;
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



        .text-blue {
            color: var(--color-blue);
            font-weight: bold;
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

        .total-price {
            background-color: var(--color-blue);
            color: white;
            padding: 0.5rem;
            margin-top: 1rem;
        }

        .resumen>span {
            padding: 0.5rem;
            margin: 1rem !important;
            border: solid 1px black;
        }

        .border {
            border: solid 1px black;
        }
    </style>
</head>
<div style="font-family: Arial, sans-serif; font-size: 10pt; line-height: 1.4;">
    {{-- Business Data Section --}}
    <div style="margin-bottom: 20px; text-align: center;">
        @if (!empty($business_data['name']))
            <h1 style="padding: 0; margin: 0; color: #000080;"><b>{{ $business_data['name'] }}</b></h1>
        @endif
        @if (!empty($business_data['phone']))
            <span><b>Teléfono:</b> </span><span>{{ $business_data['phone'] }}</span><br>
        @endif
        @if (!empty($business_data['email']))
            <span><b>Correo Electrónico:</b></span><span>{{ $business_data['email'] }}</span><br>
        @endif
        @if (!empty($business_data['address']))
            <span><b>Dirección:</b> </span> <span>{!! $business_data['address'] !!}</span><br>
        @endif
    </div>

    {{-- Client and Invoice Data Table --}}
    <section style="margin-bottom: 20px;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="background: none; color: black; text-align: left; padding: 5px 0;">
                        <b style="color: #000080;">Datos del cliente:</b>
                    </th>
                    <th style="background: none; color: black; text-align: right; padding: 5px 0;">
                        <b style="color: #000080;">Datos de la venta:</b>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: left; padding: 5px 0; vertical-align: top;">
                        @if ($sale['customer']['name'] && $sale['customer']['lastname'])
                            <span><b>Nombre: </b>{{ $sale['customer']['name'] }} {{ $sale['customer']['lastname'] }}</span>
                            <br>
                        @endif
                        @if ($sale['customer']['phone'])
                            <span><b>Teléfono:</b> {{ $sale['customer']['phone'] }}</span><br>
                        @endif
                        @if ($sale['customer']['card'])
                            <span>Número de identificación:
                                @if ($sale['customer']['identity_card_id'] == 1)
                                    V-{{ $sale['customer']['card'] }}
                                @else
                                    E-{{ $sale['customer']['card'] }}
                                @endif
                            </span><br>
                        @endif
                        @if ($sale['customer']['address'])
                            <span>Dirección: {!! $sale['customer']['address'] !!}</span><br>
                        @endif
                    </td>
                    <td style="text-align: right; padding: 5px 0; vertical-align: top;">
                        @if ($sale['sale_code'])
                            <span>Código de venta:
                                {{ $sale['sale_code'] }}</span> <br>
                        @endif
                        <span>Fecha de generación: {{ Date('d-m-Y') }}</span><br>
                        @if ($sale['expiration_date'])
                            <span>Fecha de vencimiento:
                                @php
                                    $date = explode('-', $sale['expiration_date']);

                                    echo $date[2] . '-' . $date[1] . '-' . $date[0];
                                @endphp
                            </span><br>
                        @endif
                        @if ($sale['remarks'])
                            <span>Observaciones: {{ $sale['remarks'] }}</span><br>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

    {{-- Product Details Table --}}
    <section style="margin-bottom: 20px;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="padding: 8px; text-align: left; border: 1px solid #ddd;">
                        Descripción del producto</th>
                    <th style="padding: 8px; text-align: center; border: 1px solid #ddd;">
                        Cantidad</th>
                    <th style="padding: 8px; text-align: right; border: 1px solid #ddd;">
                        Precio Unitario<br>Divisas</th>
                    <th style="padding: 8px; text-align: center; border: 1px solid #ddd; ">
                        Descuento</th>
                    <th style="padding: 8px; text-align: right; border: 1px solid #ddd;">
                        Total Neto<br>Divisas</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sale_details as $detail)
                    <tr>
                        <td style="padding: 8px; text-align: left; border: 1px solid #ddd;">
                            {{ $detail['products']['name'] ?? '' }}
                        </td>
                        <td style="padding: 8px; text-align: center; border: 1px solid #ddd;">
                            {{ $detail['quantity'] ?? '' }}
                        </td>
                        <td style="padding: 8px; text-align: right; border: 1px solid #ddd;">
                            {{ number_format($detail['unit_cost_dollars'], 2, ',', '.') ?? '' }}
                        </td>
                        <td style="padding: 8px; text-align: center; border: 1px solid #ddd;">
                            {{ $detail['discount'] ?? 0 }}%
                        </td>
                        <td style="padding: 8px; text-align: right; border: 1px solid #ddd;">
                            {{ number_format($detail['subtotal_dollars'], 2, ',', '.') ?? '' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        {{-- Corrected colspan from 3 to 5 for all columns --}}
                        <td colspan="5" style="padding: 8px; text-align: center; border: 1px solid #ddd;">
                            No se encontraron detalles de productos para esta compra.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>

    {{-- Summary Section --}}
    <section style="text-align: right; margin-top: 30px;">
        <div style="margin-bottom: 5px;">
            <span style="font-weight: bold; margin-right: 10px;">BASE IMPONIBLE:</span>
            <span>{{ number_format($sale['tax_base'], 2, ',', '.') }}$</span>
        </div>
        <div style="margin-bottom: 5px;">
            <span style="font-weight: bold; margin-right: 10px;">IVA ({{ $sale['VAT'] ?? '' }}%):</span>
            <span>{{ number_format($sale['VAT_tax_dollars'], 2, ',', '.') }}$</span> {{-- Assuming VAT applies to tax_base --}}
        </div>

        @if ($sale['credit_tax_dollars'] != '0.00')
            <div style="margin-bottom: 5px;">
                <span style="font-weight: bold; margin-right: 10px;">TASA DE INTERÉS DE CRÉDITO
                    ({{ $sale['credit_rate'] ?? '' }}%):</span>
                <span>{{ number_format($sale['credit_tax_dollars'], 2, ',', '.') }}$</span>
            </div>
        @endif
        <div style="margin-top: 15px; font-size: 12pt;">
            <span style="font-weight: bold; margin-right: 10px; color: #000080;">TOTAL A PAGAR:</span>
            <span
                style="font-weight: bold; color: #000080;">{{ number_format($sale['total_price_dollars'], 2, ',', '.') }}$</span>
        </div>
    </section>
    <br><br>
    <section style="text-align: center; margin-top: 50px;">
         @if ($sale['expiration_date'])
             <span style="style="display: block; width: 250px; margin: 0 auto; border-top: 1px solid #000; padding-bottom: 5px; text-align: center;"">
            <b style="font-weight: bold;"><i>¡GRACIAS POR ELEGIRNOS!</i></b> <br>

            <small>
                Queremos informarte que, si bien no es posible realizar reembolsos, <br>
            estaremos encantados de ofrecerte un 
            cambio  o una reparación para <br>tu producto, en caso de ser necesario.
            <br>Nuestro equipo está listo para ayudarte.
            </small>
        </span>
        <br><br><br><br>
         @endif
        <span
            style="display: block; width: 250px; margin: 0 auto; border-top: 1px solid #000; padding-bottom: 5px; text-align: center;">
            Firma del cliente
        </span>
       
    </section>
</div>
<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ver Detalles
de la Venta  | Sistema Web DJ</title>
    <link rel="stylesheet" href="../../../css/utilities.css">
    <link rel="stylesheet" href="../../../css/layouts/_base.css">
    <link rel="stylesheet" href="../../../css/components/_button.css">
    <link rel="stylesheet" href="../../../css/components/_footer.css">
    <link rel="stylesheet" href="../../../css/components/_form.css">
    <link rel="stylesheet" href="../../../css/components/_table.css">
    <link rel="stylesheet" href="../../../css/components/_header.css">
    <link rel="stylesheet" href="../../../css/components/_input.css">
    <link rel="stylesheet" href="../../../css/components/_top-bar.css">
    <link rel="stylesheet" href="../css/components/_selection-operations.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <style>
        .product__total-sale {
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--color-black);
            padding: 0.7rem;
            color: white;
            border-radius: 2rem;
        }

        .summary {}

        .summary__title {
            background-color: var(--color-black);
            display: block;
            padding: 0.5rem 1rem;
            color: white;
        }

        .summary__content {
            padding: 0.5rem 1rem;

        }

        .summary {
            filter: drop-shadow(2px 2px 3px rgb(200, 200, 200));
            background-color: white;
            border: solid 1px var(--color-black);
            margin: 0.5rem;
        }

        .summary__block {
            display: flex;
            gap: 1rem;
            justify-content: space-between;
        }


         .article--all-job {
        align-self: start;
    }

    .table__operations {
        display: flex !important;
        gap: 0.5rem;
    }

    .multiple-steps__number {
        display: flex;
        gap: 0;
        justify-content: center;
        align-items: center;
    }

    .multiple-steps__number>b {
        background: var(--color-blue);
        color: white;
        padding: 1rem;
        border-radius: rem;
        clip-path: circle(50% at 50% 50%);

    }

    .multiple-steps__line {
        background: var(--color-blue);
        color: white;
        height: 10px !important;
        width: 10%;
        flex-basis: 100%;
    }

    .multiple-steps__wait {
        background: var(--color-grey-two) !important;
    }

    .multiple-steps__text {
        text-align: center;
    }

    .multiple-steps__line--interrupted {
        background-image: linear-gradient(90deg, var(--color-blue) 0% 50%, var(--color-grey-two) 50% 100%) !important;
    }



    .warranty-history{
        display:flex;
          flex-direction: column;
        justify-content:center;
          align-items: center;
    }

    .warranty-history__header{
              text-align: right;
    }
 
     
    .warranty-history__content{
        padding: 0.7rem;
   margin: 1rem;
 
  border: solid 3px var(--color-blue);
  border-radius: 0.5rem;
    }

    </style>
</head>

<body class="h-100 d-flex flex-column">
    <x-header-admin></x-header-admin>
    <x-selection-operations></x-selection-operations>
    <main class="flex__grow-2 flex-full__justify-content-center">
        <article class="form w-100">
            @if (session('alert-success-sale'))
                <div class="alert alert-success" role="alert">
                    {{ session('alert-success-sale') }}
                </div>
            @endif
            @if (session('alert-danger'))
                <div class="alert alert-danger" role="alert">
                    {{ session('alert-danger') }}
                </div>
            @endif
               <div class="multiple-steps">
                    <div class="flex-full__justify-content-between p-0 multiple-steps__context">
                        <small class="multiple-steps__text">
                                                  Buscar Venta <br> por Código
                        </small>
                        <small class="multiple-steps__text">
                          <b>
                           Ver Detalles <br> de la Venta
                          </b>
                        </small>
                        <small class="multiple-steps__text">
                               Seleccionar Condiciones <br> de Garantía
                        </small>
                        <small class="multiple-steps__text">
                                Procesar <br> Garantía 
                        </small>
                    </div>
                    <div class="multiple-steps__number">
                        <b>1</b>
                        <div class="  multiple-steps__line"></div>
                        <b class="">2</b>
                        <div class="multiple-steps__wait multiple-steps__line  "></div>
                        <b class="multiple-steps__wait">3</b>
                        <div class="multiple-steps__wait multiple-steps__line  "></div>
                        <b class="multiple-steps__wait">4</b>
                    </div>
                </div>
                
                
            

                <section>
                    <h2 class="fs-4">Comprobante de Pago</h2>
                    <div class="row">
                        <div class="col-4">
                            <label for="receipt_number" class="form__label">Número del Recibo</label>
                            <div class="input-group">
                                <span
                                    class="form__icon input-group-text @error ('product_id') is-invalid--border @enderror"
                                    id="basic-addon1">
                                    <i class="bi bi-receipt"></i>
                                </span>
                                <input type="text" name="receipt_number" id="receipt_number" class="form-control"
                                    placeholder="" aria-label="Número de Factura" value="{{ $sale->sale_code }}" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="payment-method" class="form__label form__label--required">Método de Pago</label>
                            <div class="input-group">
                                <span
                                    class="form__icon input-group-text @error ('product_id') is-invalid--border @enderror"
                                    id="basic-addon1">
                                    <i class="bi bi-cash-coin"></i>
                                </span>
                                <select class="form-select" name="payment-method" id="payment-method"
                                    aria-label="Seleccione el método de pago">
                                    <option value="" selected disabled>Seleccione una opción de pago</option>
                                    @foreach ($payment_types as $value)
                                        <option value="{{ $value['payment_type_id'] }}" 
                                        disabled
                                        @if ($value['payment_type_id'] == $sale->payment_type_id)
                                            selected
                                        @endif
                                        >{{$value['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="expiration_date" class="form__label form__label--required">Fecha de
                                Vencimiento</label>
                            <div class="input-group">
                                <span class="form__icon input-group-text"><i class="bi bi-calendar"></i></span>
                                <input type="date" name="expiration_date" disabled id="expiration_date" class="form-control"
                                    placeholder="Ej: Llanta de repuesto" aria-label="Fecha de vencimiento" value="{{ $sale->expiration_date }}">
                            </div>
                        </div>
                    </div>
                    <div class="form__item">
                        <label for="observations" class="form__label">Observaciones</label>
                        <div class="input-group">
                            <span
                                class="form__icon input-group-text @error('observations') is-invalid--border @enderror"
                                id="observations-addon">
                                <i class="bi bi-chat-dots"></i>
                            </span>
                            <textarea name="observations" id="observations" rows="3" disabled
                                class="form-control @error('observations') is-invalid @enderror"
                                placeholder="Breve descripción del comprobante..."
                                aria-label="Observaciones">{{ $sale->remarks ?? ''}}</textarea>
                        </div>
                    </div>
                </section>
           <div>

            <h2 class="fs-4">Información del cliente</h2>
            <div action="{{ route('register.search-card') }}" class="search-card flex-full__aligh-start" method="POST"
                style="justify-content: start;">
                <div class="form__item w-50 m-0">
                    <label for="supplier_id_search" class="form__label form__label--required">Número de
                        identificación</label>
                    <div class="input-group">
                        <span class="form__icon input-group-text"><i class="bi bi-person-badge"></i></span>
                        <input type="text" name="supplier_id_search" id="supplier_id_search" class="form-control"
                            placeholder="Ej: 31048726" aria-label="Número de identificación" value="{{ $sale->customer->card }}" disabled>
                    </div>
                </div>
            </div>

            <div id="register_sale">
                @csrf
                @method('POST')

                @if (session('alert-success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('alert-success') }}
                    </div>
                @endif

                <fieldset>
                    <input type="hidden" name="id_customer">
                    <div class="form__item row">
                        <div class="col-4">
                            <div class="form__item">
                                <label for="client_name" class="form__label">Nombre</label>
                                <div class="input-group">
                                    <span
                                        class="form__icon input-group-text @error('client_name') is-invalid--border @enderror"
                                        id="category-addon">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" name="client_name" id="client_name"
                                        class="form-control @error('client_name') is-invalid @enderror"
                                        placeholder="..." aria-label="Nombre del cliente" value="{{ $sale->customer->name }}" disabled>
                                </div>
                                @error('client_name') <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form__item">
                                <label for="client_lastname" class="form__label">Apellido</label>
                                <div class="input-group">
                                    <span
                                        class="form__icon input-group-text @error('client_lastname') is-invalid--border @enderror"
                                        id="category-addon">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" name="client_lastname" id="client_lastname"
                                        class="form-control @error('client_lastname') is-invalid @enderror"
                                        placeholder="..." aria-label="Apellido del cliente" value="{{ $sale->customer->lastname }}" disabled>
                                </div>
                                @error('client_lastname') <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form__item">
                                <label for="client_phone" class="form__label">Número de Teléfono</label>
                                <div class="input-group">
                                    <span
                                        class="form__icon input-group-text @error('client_phone') is-invalid--border @enderror"
                                        id="category-addon">
                                        <i class="bi bi-phone"></i>
                                    </span>
                                    <input type="text" name="client_phone" id="client_phone"
                                        class="form-control @error('client_phone') is-invalid @enderror"
                                        placeholder="..." aria-label="Número de teléfono del cliente" value="{{ $sale->customer->phone }}" disabled>
                                </div>
                                @error('client_phone') <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form__item">
                        <label for="client_address" class="form__label">Dirección</label>
                        <div class="input-group">
                            <span
                                class="form__icon input-group-text @error('client_address') is-invalid--border @enderror"
                                id="description-addon">
                                <i class="bi bi-house"></i>
                            </span>
                            <textarea name="client_address" id="client_address" rows="3" disabled
                                class="form-control @error('client_address') is-invalid @enderror" placeholder="..."
                                aria-label="Dirección del cliente">{{ $sale->customer->address }}</textarea>
                        </div>
                        @error('client_address') <div class="alert alert-danger mt-1">{{ $message }}</div> @enderror
                    </div>
                </fieldset>
            </div>

            <section class="product">
                <h2 class="fs-4">Listado de Productos</h2>
                <div class="product__total-sale">
                    <span>
                        <i>USD: {{number_format( $sale->total_price_dollars , 2, ',','.')}}</i>
                        <i>BS: {{number_format($sale->total_price_dollars * $sale->exchange_rate_bs, 2, ',','.')}}</i>
                    </span>
                </div>
 
                <div action="" method="post" class="form__sale-register">
                    @csrf
                    @method('POST')
                    <section class='table' data-count='0'>
                        <div class="table-responsive">
                            <table class='dataTable'>
                                <thead>
                                    <tr>
                                        <th>Descripción del producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario <br> Divisas</th>
                                        <th>Descuento</th>
                                        <th>Total Neto <br>Divisas</th>
                                    </tr>
                                </thead>
                                <tbody class="table-insert">
                                    @foreach ($sale_details as $value )
                                    @php
                                         $count++;
                                    @endphp
                                     <tr class='show'>
                                    <td>
                                        <div class="input-group ">
                                            <span class="form__icon input-group-text" id="basic-addon1">
                                                <i class="bi bi-box"></i>
                                            </span>
                                            <input 
                                                type="hidden" 
                                                id="id" 
                                                name="id_{{ $count }}" 
                                                disabled
                                                value="{{ $value->sale_detail_id }}"
                                            >
                                            <input 
                                                type="text" 
                                                disabled 
                                                id = "selected-product"
                                                class="form-control"
                                                placeholder="Ej: 32" 
                                                aria-label="name" 
                                                aria-describedby="basic-addon1" 
                                                value="{{ $value->products->name }}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <span class="form__icon input-group-text" id = "basic-addon1">
                                            <i class="bi bi-hash"></i> 
                                        </span>
                                        <input 
                                            type="number" 
                                            disabled
                                            class="form-control" 
                                            placeholder="Ej: 1"
                                            value="{{ $value->quantity }}"
                                            aria-label="quantify"
                                            aria-describedby="basic-addon1"  >
                                        </div>
                                    </td> 
                                    <td>
                                        <div class="input-group">
                                            <span class="form__icon input-group-text" id = "basic-addon1">
                                            <i class="bi bi-currency-dollar"></i>
                                        </span>
                                        <input 
                                            type="text" 
                                            disabled
                                            class="form-control" 
                                            placeholder="Ej: 1"
                                            value="@php echo number_format($value->unit_cost_dollars, 2, ',','.') @endphp"
                                            aria-label="quantify"
                                            aria-describedby="basic-addon1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <span class="form__icon input-group-text" id = "basic-addon1">
                                            <i class="bi bi-percent"></i>
                                        </span>
                                        <input 
                                            type="text" 
                                            disabled
                                            class="form-control" 
                                            placeholder="Ej: 1"
                                            value="{{ $value->discount ?? 0}}%"
                                            aria-label="quantify"
                                            aria-describedby="basic-addon1">
                                        </div>
                                    </td>      
                                    <td>
                                        <div class="input-group">
                                            <span class="form__icon input-group-text" id = "basic-addon1">
                                            <i class="bi bi-cash-coin"></i>
                                        </span>
                                        <input 
                                            type="text" 
                                           
                                            class="form-control" 
                                            placeholder="Ej: 1"
                                            value="@php
                                            echo number_format($value->subtotal_dollars, 2, ',','.')
                                            @endphp"
                                            aria-label="quantify"
                                            aria-describedby="basic-addon1">
                                        </div>
                                    </td>  
                                    <!-- <td>
                                         <div class="input-group">
                                <span
                                    class="form__icon input-group-text @error ('product_id') is-invalid--border @enderror"
                                    id="basic-addon1">
                                    <i class="bi bi-patch-check"></i>
                                </span>
                                 <select class="form-select" name="warranty_status_{{ $count }}" id="warranty_status_1" aria-label="Seleccione el estado final de la garantía">
                                            <option value="" selected="" disabled="">Seleccione un estado</option>
                                            <option value="Reparado">
                                                Reparado
                                            </option>
                                            <option value="Cambiado">
                                                Cambiado
                                            </option>
                                            <option value="Pendiente de revisión">
                                                Pendiente de revisión
                                            </option>
                                            <option value="Rechazado">
                                                Rechazado
                                            </option>
                                        </select> 
                            </div>
                                    </td>--->
                                </tr>
                                    @endforeach
                                  
                                 
                           
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <section class="flex-full__justify-content-center">
                        <div class="summary">
                            <span class="summary__title">RESUMEN</span>
                            <div class="summary__content">
                                <div class="summary__block summary__calculation">
                                    <span>BASE IMPONIBLE</span>
                                    <span>{{number_format($sale->tax_base, 2, ',','.')}}</span>
                                </div>
                                <div class="summary__block summary__calculation summary__calculation--iva">
                                    <span>IVA {{ $sale->VAT }}% </span>
                                    <span>{{number_format($sale->VAT_tax_dollars,2,',','.')}}</span>
                                </div>
                                <div class="summary__block summary__calculation summary__calculation--credit-rate"
                                    >
                                    <span>TASA DE INTERÉS {{$sale->credit_rate}}%</span>
                                    <span>{{number_format($sale->credit_tax_dollars, 2, ',','.') ?? 0}}</span>
                                </div>
                                <div class="summary__block summary__calculation">
                                    <span>TOTAL A PAGAR</span>
                                    <span>{{number_format($sale->total_price_dollars, 2, ',','.')}}</span>
                                </div>
                            </div>
                        </div>
                    </section>
                 
                    <div class="form__button w-100 my-3">
                        <form action="{{ route('warranty-sale.show-select-option') }}" method="POST">
                              @csrf
                            @method('POST')
                            <input type="hidden" value="{{ $sale->sale_code }}" name="sale_code">
                            <button class="button button--color-blue w-100" type="submit">
                                               Siguiente  
                        </button> 
                        </form>
                              
                         
                    </div>
                </div>
            </section>
        </article>

    </main>
    <x-footer></x-footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>
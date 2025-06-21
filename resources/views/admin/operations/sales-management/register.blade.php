<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Nueva Venta | Sistema Web DJ</title>
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
    </style>
</head>

<body class="h-100 d-flex flex-column">
    <x-header-admin></x-header-admin>
    <x-selection-operations></x-selection-operations>
    <main class="flex__grow-2 flex-full__justify-content-center">
        <article class="form w-100">
            <div>
                @csrf
                <input type="hidden" name="id_customer">
                
            </div>

            <h1 class="fs-3">
                <b>Registrar Nueva Venta</b>
            </h1>
            <div style="display: flex; justify-content: center; align-items: center; gap:1rem">
                <label for="option-1">
                    <input type="radio" name="generate_invoice" id="option-1" checked>
                    <span>Generar Venta y Descargar comprobante</span>
                </label>

                <label for="option-2">
                    <input type="radio" name="generate_invoice" id="option-2">
                    <span>Solo Generar Venta</span>
                </label>
            </div>

            <form id="register_sale">
                <section>
                    <h2 class="fs-4">Comprobante de Pago</h2>
                    <div class="row">
                        <div class="col-4">
                            <label for="receipt_number" class="form__label">Número de Factura</label>
                            <div class="input-group">
                                <span
                                    class="form__icon input-group-text @error ('product_id') is-invalid--border @enderror"
                                    id="basic-addon1">
                                    <i class="bi bi-receipt"></i>
                                </span>
                                <input type="text" name="receipt_number" id="receipt_number" class="form-control"
                                    placeholder="" aria-label="Número de Factura" value="" disabled>
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
                                    <option value="punto_de_venta_debito">Punto de Venta (Débito)</option>
                                    <option value="punto_de_venta_credito">Punto de Venta (Crédito)</option>
                                    <option value="divisas">Divisas</option>
                                    <option value="bolivares">Bolívares (Efectivo/Transferencia)</option>
                                    <option value="mixto">Mixto (Combinación de métodos)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="expiration_date" class="form__label form__label--required">Fecha de
                                Vencimiento</label>
                            <div class="input-group">
                                <span class="form__icon input-group-text"><i class="bi bi-calendar"></i></span>
                                <input type="date" name="expiration_date" id="expiration_date" class="form-control"
                                    placeholder="Ej: Llanta de repuesto" aria-label="Fecha de vencimiento" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form__item">
                        <label for="note" class="form__label">Observaciones</label>
                        <div class="input-group">
                            <span class="form__icon input-group-text @error('note') is-invalid--border @enderror"
                                id="note-addon">
                                <i class="bi bi-chat-dots"></i>
                            </span>
                            <textarea name="note" id="note" rows="3"
                                class="form-control @error('note') is-invalid @enderror"
                                placeholder="Breve descripción del comprobante..."
                                aria-label="Observaciones">{{ old('note') }}</textarea>
                        </div>
                    </div>
                </section>
            </form>

            <h2 class="fs-4">Información del cliente</h2>
            <form action="{{ route('register.search-card') }}" class="search-card flex-full__aligh-start" method="POST"
                style="justify-content: start;">
                <div class="form__item w-50 m-0">
                    <label for="supplier_id_search" class="form__label form__label--required">Número de
                        identificación</label>
                    <div class="input-group">
                        <span class="form__icon input-group-text"><i class="bi bi-person-badge"></i></span>
                        <input type="text" name="supplier_id_search" id="supplier_id_search" class="form-control"
                            placeholder="Ej: 31048726" aria-label="Número de identificación" value="12" autofocus>
                    </div>
                </div>
                <div class="align-self-end">
                    <button class="button button--color-orange" type="submit">
                        Buscar cliente
                    </button>
                </div>
            </form>

            <form id="register_sale">
                @csrf
                @method('POST')
                <div class="register-client text-red" style="display:none">
                    <p class="p-0 m-0" role="alert">
                        Cliente no encontrado. Por favor, regístralo.
                        <a href="" class="text-blue">Aquí</a>
                    </p>
                </div>

                @if (session('alert-success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('alert-success') }}
                    </div>
                @endif

                <fieldset>
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
                                        placeholder="..." aria-label="Nombre del cliente"
                                        value="{{ old('client_name') }}" disabled>
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
                                        placeholder="..." aria-label="Apellido del cliente"
                                        value="{{ old('client_lastname') }}" disabled>
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
                                        placeholder="..." aria-label="Número de teléfono del cliente"
                                        value="{{ old('client_phone') }}" disabled>
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
                                aria-label="Dirección del cliente">{{ old('client_address') }}</textarea>
                        </div>
                        @error('client_address') <div class="alert alert-danger mt-1">{{ $message }}</div> @enderror
                    </div>
                </fieldset>
            </form>

            <section class="product">
                <h2 class="fs-4">Listado de Productos</h2>
                <div class="product__total-sale">
                    <span>
                        <i>USD: 0</i>
                        <i>BS: 0</i>
                    </span>
                </div>

                <form action="{{ route('register.search-product') }}" class="product-selection" method="post">
                    <div class="row mt-2 mb-0">
                        <div class="col-6">
                            <label for="name_product" class="form__label form__label--required">
                                Buscador del Producto
                            </label>
                            <div class="input-group">
                                <span class="form__icon input-group-text"><i class="bi bi-search"></i></span>
                                <input type="text" name="name_product" id="name_product"
                                    class="form-control name-product" placeholder="Ej: Llanta de repuesto"
                                    aria-label="Nombre del producto" value="">
                            </div>
                            <div class="message-registration-found message-registration-found--product text-red"
                                style="display:none" role="alert">
                                <p class="p-0 m-0">
                                    <b>Productos no encontrados.</b> Por favor, <i><b>sea más descriptivo</b></i> del
                                    producto deseado.
                                </p>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="products" class="form__label form__label--required">Productos</label>
                            <div class="input-group">
                                <span
                                    class="form__icon input-group-text @error ('products') is-invalid--border @enderror"
                                    id="basic-addon1">
                                    <i class="bi bi-box-seam"></i>
                                </span>
                                <select class="form-select" name="products" id="products"
                                    aria-label="Seleccione el producto" data-bs="{{ $bs->in_bs }}">
                                    <option selected disabled>Seleccione una opción</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>

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
                                    <th>Operación</th>
                                </tr>
                            </thead>
                            <tbody class="table-insert">
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
                                <span>0</span>
                            </div>
                            <div class="summary__block summary__calculation summary__calculation--iva"
                                data-iva="{{ number_format($iva->iva / 100, 2)}}">
                                <span>IVA ({{ $iva->iva }}%)</span>
                                <span>0</span>
                            </div>
                            <div class="summary__block summary__calculation summary__calculation--credit-rate"
                                data-credit-rate="{{  number_format($credit_rate->value / 100, 2) }}">
                                <span>TASA DE INTERÉS ({{ $credit_rate->value }}%)</span>
                                <span>0</span>
                            </div>
                            <div class="summary__block summary__calculation">
                                <span>TOTAL A PAGAR</span>
                                <span>0</span>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="form__button w-100 my-3">
                    <button class="button button--color-blue w-100" type="submit" form="register_sale">
                        Guardar cambios
                    </button>
                </div>
            </section>
        </article>

    </main>
    <x-footer></x-footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {

        // src/app.js

        function generarCadenaAleatoria(longitud) {
            let resultado = '';
            const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            const caracteresLongitud = caracteres.length;
            for (let i = 0; i < longitud; i++) {
                resultado += caracteres.charAt(Math.floor(Math.random() * caracteresLongitud));
            }
            return resultado;
        }

        let receipt_number = document.querySelector('#receipt_number');
        receipt_number.value = generarCadenaAleatoria(8);
        console.log(generarCadenaAleatoria(8)); // Genera una cadena de 8 caracteres aleatorios

        const ItemFormSearch = document.querySelector(".search-card");
        const clientMessageArea = document.getElementById('clientMessageArea'); // Para mostrar mensajes


        // *** IMPORTANTE: Verificar que el formulario se encontró ***
        if (!ItemFormSearch) {
            console.error("Error: El formulario con la clase 'search-card' no fue encontrado en el DOM.");
            return; // Salir si el formulario no existe
        } else {
            console.info('si existe')
        }

        ItemFormSearch.addEventListener('submit', e => {
            console.info('hoila');
            e.preventDefault(); // ¡CRÍTICO! Previene el envío tradicional del formulario y la recarga.
            const FormDataSearch = new FormData(ItemFormSearch);
            console.info(FormDataSearch.get('supplier_id_search'));
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(ItemFormSearch.action, {
                method: ItemFormSearch.method,
                headers: {
                    'Accept': 'application/json',
                    "Content-Type": "application/json",
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    supplier_id_search: FormDataSearch.get('supplier_id_search')
                }),
            })
                .then(response => {
                    if (!response.ok) {
                        return response.text().then(text => {
                            throw new Error(`Error HTTP: ${response.status} - ${text || 'Sin mensaje de error.'}`);
                        });
                    }
                    return response.json();
                })
                .then(htmlResponse => {

                    let InputClientName = document.querySelector('[name="client_name"]');
                    let InputClientLastName = document.querySelector('[name="client_lastname"]');
                    let InputClientePhone = document.querySelector('[name="client_phone"]');
                    let TextTareaClienteAddress = document.querySelector('[name="client_address"]');
                    let InputClienteIdCustomer = document.querySelector('[name="id_customer"]');
                    let DivRegisterClient = document.querySelector('.register-client');
                    if (htmlResponse['customer'] == false) {
                        console.info(InputClientLastName);
                        InputClientName.value = '';
                        InputClientLastName.value = '';
                        InputClientePhone.value = '';
                        TextTareaClienteAddress.value = '';
                        InputClienteIdCustomer.value = '';
                        DivRegisterClient.removeAttribute('style');
                        return false;
                    }

                    console.info(InputClientLastName);
                    InputClientName.value = htmlResponse['name'];
                    InputClientLastName.value = htmlResponse['lastname'];
                    InputClientePhone.value = htmlResponse['phone'];
                    TextTareaClienteAddress.value = htmlResponse['address'];
                    InputClienteIdCustomer.value = htmlResponse['customer_id'];
                    DivRegisterClient.style.display = 'none';
                    console.info(htmlResponse['address'])
                    console.info(TextTareaClienteAddress);

                })
                .catch(error => {
                    // Hubo un error en la petición o en el procesamiento de la respuesta
                    console.error("Error en la petición AJAX:", error);
                    clientMessageArea.innerHTML = `<div class="alert alert-danger mt-1">Error: ${error.message}</div>`;
                });
        });
    });

</script>
<script>



    const FormProductsSelection = document.querySelector('.product-selection');
    const InputSearchProduct = document.querySelector('.name-product')


    console.info(InputSearchProduct);
    console.info(FormProductsSelection);


    FormProductsSelection.addEventListener('submit', e => {
        e.preventDefault(); // ¡CRÍTICO! Previene el envío tradicional del formulario y la recarga.
        const FormDataSearch = new FormData(FormProductsSelection);

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(FormProductsSelection.action, {
            method: FormProductsSelection.method,
            headers: {
                'Accept': 'application/json',
                "Content-Type": "application/json",
                'X-CSRF-TOKEN': csrfToken

            },
            body: JSON.stringify({
                name_product: FormDataSearch.get('name_product')
            }),


        })
            .then(response => {
                // Limpiar mensajes anteriores


                if (!response.ok) {
                    // Si la respuesta no es 2xx (éxito), lanza un error
                    // Intenta leer el cuerpo de la respuesta para obtener más detalles del error
                    return response.text().then(text => {
                        throw new Error(`Error HTTP: ${response.status} - ${text || 'Sin mensaje de error.'}`);
                    });
                }
                return response.json(); // Espera que la respuesta sea texto (HTML)
            })
            .then(htmlResponse => {
                console.info(htmlResponse);
                let SelectedProducts = document.querySelectorAll('#selected-product');
                console.info(SelectedProducts);
                let SelectProducts = document.querySelector('[name="products"]');

                let msg_registration_found_product = document.querySelector('.message-registration-found--product');
                console.info(htmlResponse['length'])
                if (htmlResponse['customer'] == false) {
                    console.info('nada')
                    console.info(msg_registration_found_product ?? 'nada');
                    msg_registration_found_product.removeAttribute('style');
                    return SelectProducts.innerHTML = ' <option selected disabled>Seleccione una opción</option>';
                }
                msg_registration_found_product.style.display = 'none';
                SelectProducts.innerHTML = ' <option selected disabled>Seleccione una opción</option>';
                /*
                  function generate_cost_sale(cost_price, profit_margin, discount = 0, bs = 0) {
                    let porcentaje_ganancia_decimal = profit_margin / 100;
                    let monto_ganancia_dolares = cost_price * porcentaje_ganancia_decimal;
                    let precio_venta_inicial = cost_price + monto_ganancia_dolares;
                    if (discount) {
                        let porcentaje_descuento_decimal = discount / 100;
                        let monto_descuento_dolares = precio_venta_inicial * porcentaje_descuento_decimal;
                        let precio_final_dolares_calculado = precio_venta_inicial - monto_descuento_dolares;
                        let precio_final_dolares_formateado = precio_final_dolares_calculado.toLocaleString('es-ES' ,{ style: 'decimal', minimumFractionDigits: 2, maximumFractionDigits: 2 });
                        let precio_final_bolivares_calculado = precio_final_dolares_calculado * bs;
                        let precio_final_bolivares_formateado =  precio_final_bolivares_calculado.toLocaleString('es-ES' ,{ style: 'decimal', minimumFractionDigits: 2, maximumFractionDigits: 2 });
                        return ''  + precio_final_dolares_formateado.
                        '<br> BS:'+ precio_final_bolivares_formateado;
                    } else {
                        let precio_venta_dolares_formateado = precio_venta_inicial.toLocaleString('es-ES' ,{ style: 'decimal', minimumFractionDigits: 2, maximumFractionDigits: 2 });
                        let precio_venta_bolivares_calculado = precio_venta_inicial * $bs;
                        let precio_venta_bolivares_formateado = precio_venta_bolivares_calculado.toLocaleString('es-ES' ,{ style: 'decimal', minimumFractionDigits: 2, maximumFractionDigits: 2 });
                        return '' + precio_venta_dolares_formateado.
                        '<br> BS:' + precio_venta_bolivares_formateado;
                    }
                }


                */
                htmlResponse.forEach(element => {
                    let option = document.createElement('option');
                    option.textContent = element['name'];
                    option.value = element['code'];

                    option.setAttribute('data-price-dollar', element['price_dollar']);
                    option.setAttribute('data-profit-margin', element['sale_profit_percentage'])
                    option.setAttribute('discount', element['discount_only_dollar'] ?? "")
                    if (!SelectedProducts.length == 0) {
                        SelectedProducts.forEach(product => {
                            if (product.value == element['name']) {
                                option.disabled = true;
                            }
                        });
                    }
                    SelectProducts.appendChild(option, SelectProducts.lastChild);
                });
            })
            .catch(error => {
                // Hubo un error en la petición o en el procesamiento de la respuesta
                console.error("Error en la petición AJAX:", error);
                clientMessageArea.innerHTML = `<div class="alert alert-danger mt-1">Error: ${error.message}</div>`;
            });
    });

</script>


<script>

    let itemSelect = document.querySelector("#products");
    let itemTableBody = document.querySelector('.table-insert');
    let ItemTable = document.querySelector('.table');
    itemSelect.addEventListener('change', async e => {

        let selectedOptionText = e.target.selectedOptions[0].textContent;
        let selectedOption = e.target.selectedOptions[0];
        if (selectedOptionText.disabled) {
            return;
        }
        let newRow = document.createElement('tr');

        let rowCount = parseInt(ItemTable.getAttribute('data-count')) + 1;
        /*
        ItemTable.setAttribute('data-count', rowCount);
        newRow.setAttribute('data-id', rowCount)*/

        function generate_cost_sale(cost_price, profit_margin, discount = 0, bs = 0, type, desc = false) {
            let porcentaje_ganancia_decimal = profit_margin / 100;
            let monto_ganancia_dolares = cost_price * porcentaje_ganancia_decimal;
            let precio_venta_inicial = cost_price + monto_ganancia_dolares;
            if (discount && desc == true) {
                let porcentaje_descuento_decimal = discount / 100;
                let monto_descuento_dolares = precio_venta_inicial * porcentaje_descuento_decimal;
                let precio_final_dolares_calculado = precio_venta_inicial - monto_descuento_dolares;
                let precio_final_dolares_formateado = precio_final_dolares_calculado.
                    toLocaleString('es-ES', { style: 'decimal', minimumFractionDigits: 2, maximumFractionDigits: 2 })
                    .toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                let precio_final_bolivares_calculado = precio_final_dolares_calculado * bs;
                let precio_final_bolivares_formateado = precio_final_bolivares_calculado.
                    toLocaleString('es-ES', { style: 'decimal', minimumFractionDigits: 2, maximumFractionDigits: 2 })
                    .toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                return type == 'USD' ? precio_final_dolares_formateado : precio_final_bolivares_formateado;
            } else {
                let precio_venta_dolares_formateado = precio_venta_inicial.
                    toLocaleString('es-ES', { style: 'decimal', minimumFractionDigits: 2, maximumFractionDigits: 2 })
                    .toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                let precio_venta_bolivares_calculado = precio_venta_inicial * bs;
                let precio_venta_bolivares_formateado = precio_venta_bolivares_calculado.
                    toLocaleString('es-ES', { style: 'decimal', minimumFractionDigits: 2, maximumFractionDigits: 2 })
                    .toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                return type == 'USD' ? precio_venta_dolares_formateado : precio_venta_bolivares_formateado;
            }
        }
        selectedOption.disabled = true;

        let dolar_actual = parseInt(Math.round(itemSelect.getAttribute('data-bs')));
        let precio_venta = parseInt(Math.round(selectedOption.getAttribute('data-price-dollar')));
        console.info(dolar_actual);
        let precio_unitario_bs = generate_cost_sale(
            precio_venta,
            parseInt(selectedOption.getAttribute('data-profit-margin')),
            parseInt(selectedOption.getAttribute('discount')),
            dolar_actual,
            'BS');
        let coste_sale_USD = generate_cost_sale(
            precio_venta,
            parseInt(selectedOption.getAttribute('data-profit-margin')),
            parseInt(selectedOption.getAttribute('discount')),
            dolar_actual,
            'USD', false);
        let total_neta_usd = generate_cost_sale(
            precio_venta,
            parseInt(selectedOption.getAttribute('data-profit-margin')),
            parseInt(selectedOption.getAttribute('discount')),
            dolar_actual,
            'USD', true);

        let total_neta_bs = generate_cost_sale(
            precio_venta,
            parseInt(selectedOption.getAttribute('data-profit-margin')),
            parseInt(selectedOption.getAttribute('discount')),
            dolar_actual,
            'BS', true);

        let coste_sale_BS = generate_cost_sale(
            precio_venta,
            parseInt(selectedOption.getAttribute('data-profit-margin')),
            parseInt(selectedOption.getAttribute('discount')),
            dolar_actual,
            'BS');
        console.info(selectedOption.getAttribute('discount'))

        newRow.innerHTML = `
                    <td>
                        <div class="input-group ">
                            <span class="form__icon input-group-text" id="basic-addon1">
                                <i class="bi bi-box"></i>
                            </span>
                            <input 
                                type="hidden" 
                                id="id" 
                                name="id" 
                                value="${e.target.value}"
                            >
                            <input 
                                type="text" 
                                readonly 
                                id = "selected-product"
                                name="" 
                                class="form-control"
                                placeholder="Ej: 32" 
                                aria-label="name" 
                                aria-describedby="basic-addon1" 
                                value="${selectedOptionText}">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <span class="form__icon input-group-text" id = "basic-addon1">
                            <i class="bi bi-hash"></i> 
                        </span>
                        <input 
                            type="number" 
                            name="" 
                            id="quantity"
                            class="form-control" 
                            placeholder="Ej: 1"
                            value="1"
                            aria-label="quantify"
                            aria-describedby="basic-addon1">
                        </div>
                    </td> 
                    <td>
                        <div class="input-group">
                            <span class="form__icon input-group-text" id = "basic-addon1">
                            <i class="bi bi-currency-dollar"></i>
                        </span>
                        <input 
                            type="text" 
                            name="" 
                            id="sale_price_usd"
                            class="form-control" 
                            placeholder="Ej: 1"
                            value="${coste_sale_USD}"
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
                            name="" 
                            id="discount"
                            class="form-control" 
                            placeholder="Ej: 1"
                            value="${selectedOption.getAttribute('discount') != "" ? selectedOption.getAttribute('discount') : 0}%"
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
                            name="" 
                            id="total_parcial_usd"
                            class="form-control" 
                            placeholder="Ej: 1"
                            value="${total_neta_usd}"
                            aria-label="quantify"
                            aria-describedby="basic-addon1">
                        </div>
                    </td>        
                                 
                    <td>
                        <button class="btn btn-danger remove-item-btn" data-id=${rowCount} 
                        data-optionValue = ${e.target.value}
                        type="button"><i class="bi bi-trash"></i></button>
                    </td>`;
        await itemTableBody.appendChild(newRow);

        let InputNameTotal = 0;
        await document.querySelectorAll('#selected-product').forEach(element => {
            InputNameTotal++;
        });
        let inputName = document.querySelectorAll('#selected-product');
        let inputSalePrice = document.querySelectorAll('#sale_price_usd');
        let inputTotalParcial = document.querySelectorAll('#total_parcial_usd');
        let inputQuantity = document.querySelectorAll('#quantity');
        let inputId = document.querySelectorAll('#id');
        let inputDiscount = document.querySelectorAll('#discount');
        let sequentialIndex = 1
        for (let i = 0; i <= InputNameTotal; i++) {
            if (!inputName[i]) {
                break;
            }
            inputDiscount[i].setAttribute('name', `discount_${sequentialIndex}`);
            inputName[i].setAttribute('name', `name_${sequentialIndex}`)
            inputQuantity[i].setAttribute('data-number', `${sequentialIndex}`)
            inputQuantity[i].setAttribute('name', `quantity_${sequentialIndex}`)
            inputId[i].setAttribute('name', `id_${sequentialIndex}`);
            inputSalePrice[i].setAttribute('name', `sale_price_usd_${sequentialIndex}`)
            inputTotalParcial[i].setAttribute('name', `total_parcial_usd_${sequentialIndex}`);
            sequentialIndex++;
        }
        console.clear();

        e.target.value = '';

        let quantityInputs = document.querySelectorAll('#quantity');

        let dataNumber = 0;
        quantityInputs.forEach(element => {
            dataNumber++;
        });



        // Obtenemos los elementos del DOM y sus valores
        const salePriceInput = document.querySelector(`[name="sale_price_usd_${dataNumber}"]`);
        const totalNetoInput = document.querySelector(`[name="total_parcial_usd_${dataNumber}"]`);
        const discountInput = document.querySelector(`[name="discount_${dataNumber}"]`);
        const quantityInput = document.querySelector(`[name="quantity_${dataNumber}"]`);

        // Validamos la existencia de los elementos antes de continuar
        if (!salePriceInput || !totalNetoInput || !discountInput) {
            console.error('Error: No se encontraron todos los elementos DOM necesarios.');
            return;
        }

        // Limpiamos y parseamos los valores numéricos
        let salePrice = parseFloat(salePriceInput.value.replace('USD:', '').replace(',', '.'));
        let quantity = parseInt(quantityInput.value);
        let discountText = discountInput.value;

        // Validar que la cantidad sea un número positivo
        if (isNaN(quantity) || quantity < 1) {
            alert('La cantidad no puede ser un valor negativo o cero. Se establecerá en 1.');
            quantityInput.value = 1;
            quantity = 1; // Aseguramos que la cantidad usada en el cálculo sea 1
        }

        // Validar que el precio de venta sea un número válido
        if (isNaN(salePrice)) {
            console.error('Error: El precio de venta no es un número válido.');
            totalNetoInput.value = '0,00'; // Establecer un valor predeterminado en caso de error
            return;
        }

        let totalNeto = salePrice * quantity;
        let finalPrice = totalNeto;

        // Aplicar descuento si existe
        if (discountText !== "0%") {
            const discountPercentage = parseFloat(discountText.replace('%', ''));
            if (!isNaN(discountPercentage)) {
                const discountAmount = totalNeto * (discountPercentage / 100);
                finalPrice = totalNeto - discountAmount;
            } else {
                console.warn('Advertencia: El formato del descuento no es válido.');
            }
        }

        // Formatear el precio final a la moneda local (es-ES)
        const formattedPrice = finalPrice.toLocaleString('es-ES', {
            style: 'decimal',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        // Asignar el valor formateado al input de total
        totalNetoInput.value = formattedPrice;
        console.info(`Precio final calculado: ${formattedPrice}`);


        // Select DOM elements
        const subTotalAllProducts = document.querySelector('.product__total-sale > span');
        const totalNetoInputs = document.querySelectorAll('#total_parcial_usd');
        const productsElement = document.querySelector('#products'); // Assuming 'data-bs' is on this element

        // Initialize sum for USD and IVA calculations
        let totalUsdBeforeIva = 0;

        // Calculate the sum of all product totals in USD before IVA
        totalNetoInputs.forEach(inputElement => {
            // Replace comma with dot for proper float parsing and add to total
            totalUsdBeforeIva += parseFloat(inputElement.value.replace(',', '.'));
        });

        // Define IVA rate
        const ivaRate = parseFloat(document.querySelector('.summary__calculation--iva').getAttribute('data-iva')).toFixed(2);

        // --- Calculate USD Totals ---
        let ivaUsd = totalUsdBeforeIva * ivaRate;
        let totalUsdWithIva = totalUsdBeforeIva + ivaUsd;

        // --- Calculate BS Totals ---
        // Get the current dollar exchange rate from the 'data-bs' attribute
        const dollarExchangeRate = parseFloat(productsElement.getAttribute('data-bs').replace(',', '.'));

        // Calculate the total in BS before IVA
        const totalBsBeforeIva = totalUsdBeforeIva * dollarExchangeRate;

        // Calculate IVA in BS
        let ivaBs = totalBsBeforeIva * ivaRate;

        // Calculate total in BS with IVA
        const totalBsWithIva = totalBsBeforeIva + ivaBs;

        // Format BS total for display
        // Using 'es-ES' locale for comma as decimal separator and dot as thousands separator
        const formattedBsTotal = totalBsWithIva.toLocaleString('es-ES', {
            style: 'decimal',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        const formatted = function (value) {
            return value.toLocaleString('es-ES', {
                style: 'decimal',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        };



        // Log IVA in BS and total USD for debugging (optional)
        console.info('IVA (BS):', ivaBs);
        console.info('Total USD (with IVA):', totalUsdWithIva);

        let summary__calculationSpan = document.querySelectorAll('.summary__calculation > span')
        let total_pay_summary = summary__calculationSpan[7];
        let credit_interest_rate = summary__calculationSpan[5];

        let VAT_summary = summary__calculationSpan[3];
        let tax_base = summary__calculationSpan[1];
        let payment_method = document.querySelector('#payment-method');

        if (payment_method.value === "punto_de_venta_credito") {
            let creditRate = parseFloat(document.querySelector('.summary__calculation--credit-rate').getAttribute('data-credit-rate')).toFixed(2)

            let credit_interest_rate_usd = totalUsdBeforeIva * creditRate;
            totalUsdWithIva = totalUsdWithIva + credit_interest_rate_usd;
            let total_a_pagar = totalUsdWithIva * dollarExchangeRate;
            console.info('total del dolar: ' + total_a_pagar);

            credit_interest_rate_bs = ivaBs * creditRate;
            total_Bs = total_a_pagar;

            console.info(creditRate + ' -> Tasa de interes')

            credit_interest_rate.innerHTML = formatted(credit_interest_rate_usd);
        } else {
            credit_interest_rate.innerHTML = 0;
            console.info('sin tasa de interes');
            total_Bs = totalBsWithIva;
        }
        total_pay_summary.innerHTML = formatted(totalUsdWithIva);
        VAT_summary.innerHTML = formatted(ivaUsd);
        tax_base.innerHTML = formatted(totalUsdBeforeIva);

        subTotalAllProducts.innerHTML = `
                    <i>USD: ${formatted(totalUsdWithIva)}</i>
                    <i>BS: ${formatted(total_Bs)}</i>
                `;

        
        console.info(ivaRate + ' -> IVA')
    })


    document.addEventListener('click', async e => {
        if (e.target.matches('.remove-item-btn')) {
            const optionValueToEnable = e.target.getAttribute('data-optionValue');
            const optionToEnable = itemSelect.querySelector(`option[value="${optionValueToEnable}"]`);
            if (optionToEnable) {
                optionToEnable.disabled = false;
            }
            e.target.closest('tr').remove();
            e.target.value = '';
            let InputNameTotal = 0;
            document.querySelectorAll('#name').forEach(element => {
                InputNameTotal++;
            });
            document.querySelectorAll('#selected-product').forEach(element => {
                InputNameTotal++;
            });
            let inputName = document.querySelectorAll('#selected-product');
            let inputSalePrice = document.querySelectorAll('#sale_price_usd');
            let inputTotalParcial = document.querySelectorAll('#total_parcial_usd');
            let inputQuantity = document.querySelectorAll('#quantity');
            let inputId = document.querySelectorAll('#id');
            let inputDiscount = document.querySelectorAll('#discount');
            let sequentialIndex = 1
            for (let i = 0; i <= InputNameTotal; i++) {
                if (!inputName[i]) {
                    break;
                }
                inputQuantity[i].setAttribute('data-number', `${sequentialIndex}`)
                inputDiscount[i].setAttribute('name', `discount_${sequentialIndex}`);
                inputName[i].setAttribute('name', `name_${sequentialIndex}`)
                inputQuantity[i].setAttribute('name', `quantity_${sequentialIndex}`)
                inputId[i].setAttribute('name', `id_${sequentialIndex}`);
                inputSalePrice[i].setAttribute('name', `sale_price_usd_${sequentialIndex}`)
                inputTotalParcial[i].setAttribute('name', `total_parcial_usd_${sequentialIndex}`);
                sequentialIndex++;
            }


            let quantityInputs = document.querySelectorAll('#quantity');

            let dataNumber = 0;
            quantityInputs.forEach(element => {
                dataNumber++;
            });



            // Obtenemos los elementos del DOM y sus valores
            const salePriceInput = document.querySelector(`[name="sale_price_usd_${dataNumber}"]`);
            const totalNetoInput = document.querySelector(`[name="total_parcial_usd_${dataNumber}"]`);
            const discountInput = document.querySelector(`[name="discount_${dataNumber}"]`);
            const quantityInput = document.querySelector(`[name="quantity_${dataNumber}"]`);

            // Validamos la existencia de los elementos antes de continuar
            if (!salePriceInput || !totalNetoInput || !discountInput) {
                console.error('Error: No se encontraron todos los elementos DOM necesarios.');

                let summary__calculationSpan = document.querySelectorAll('.summary__calculation > span')
                let total_pay_summary = summary__calculationSpan[7];
                let credit_interest_rate = summary__calculationSpan[5];

                let VAT_summary = summary__calculationSpan[3];
                let tax_base = summary__calculationSpan[1];

                total_pay_summary.innerHTML = 0;
                credit_interest_rate.innerHTML = 0;
                VAT_summary.innerHTML = 0;
                tax_base.innerHTML = 0;
                const subTotalAllProducts = document.querySelector('.product__total-sale > span');
                subTotalAllProducts.innerHTML = `
                    <i>USD: 0</i>
                    <i>BS: 0</i>
                `;
                return;
            }

            // Limpiamos y parseamos los valores numéricos
            let salePrice = parseFloat(salePriceInput.value.replace('USD:', '').replace(',', '.'));
            let quantity = parseInt(quantityInput.value);
            let discountText = discountInput.value;

            // Validar que la cantidad sea un número positivo
            if (isNaN(quantity) || quantity < 1) {
                alert('La cantidad no puede ser un valor negativo o cero. Se establecerá en 1.');
                quantityInput.value = 1;
                quantity = 1; // Aseguramos que la cantidad usada en el cálculo sea 1
            }

            // Validar que el precio de venta sea un número válido
            if (isNaN(salePrice)) {
                console.error('Error: El precio de venta no es un número válido.');
                totalNetoInput.value = '0,00'; // Establecer un valor predeterminado en caso de error
                return;
            }

            let totalNeto = salePrice * quantity;
            let finalPrice = totalNeto;

            // Aplicar descuento si existe
            if (discountText !== "0%") {
                const discountPercentage = parseFloat(discountText.replace('%', ''));
                if (!isNaN(discountPercentage)) {
                    const discountAmount = totalNeto * (discountPercentage / 100);
                    finalPrice = totalNeto - discountAmount;
                } else {
                    console.warn('Advertencia: El formato del descuento no es válido.');
                }
            }

            // Formatear el precio final a la moneda local (es-ES)
            const formattedPrice = finalPrice.toLocaleString('es-ES', {
                style: 'decimal',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            // Asignar el valor formateado al input de total
            totalNetoInput.value = formattedPrice;
            console.info(`Precio final calculado: ${formattedPrice}`);


            // Select DOM elements
            const subTotalAllProducts = document.querySelector('.product__total-sale > span');
            const totalNetoInputs = document.querySelectorAll('#total_parcial_usd');
            const productsElement = document.querySelector('#products'); // Assuming 'data-bs' is on this element

            // Initialize sum for USD and IVA calculations
            let totalUsdBeforeIva = 0;

            // Calculate the sum of all product totals in USD before IVA
            totalNetoInputs.forEach(inputElement => {
                // Replace comma with dot for proper float parsing and add to total
                totalUsdBeforeIva += parseFloat(inputElement.value.replace(',', '.'));
            });

            // Define IVA rate
            const ivaRate = parseFloat(document.querySelector('.summary__calculation--iva').getAttribute('data-iva')).toFixed(2);

            console.info(ivaRate);

            // --- Calculate USD Totals ---
            const ivaUsd = totalUsdBeforeIva * ivaRate;
            let totalUsdWithIva = totalUsdBeforeIva + ivaUsd;

            // --- Calculate BS Totals ---
            // Get the current dollar exchange rate from the 'data-bs' attribute
            const dollarExchangeRate = parseFloat(productsElement.getAttribute('data-bs').replace(',', '.'));

            // Calculate the total in BS before IVA
            const totalBsBeforeIva = totalUsdBeforeIva * dollarExchangeRate;

            // Calculate IVA in BS
            const ivaBs = totalBsBeforeIva * ivaRate;

            // Calculate total in BS with IVA
            const totalBsWithIva = totalBsBeforeIva + ivaBs;

            // Format BS total for display
            // Using 'es-ES' locale for comma as decimal separator and dot as thousands separator
            const formattedBsTotal = totalBsWithIva.toLocaleString('es-ES', {
                style: 'decimal',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            const formatted = function (value) {
                return value.toLocaleString('es-ES', {
                    style: 'decimal',
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            };


            console.clear();

            // Log IVA in BS and total USD for debugging (optional)

            // Log IVA in BS and total USD for debugging (optional)
            console.info('IVA (BS):', ivaBs);
            console.info('Total USD (with IVA):', totalUsdWithIva);

            let summary__calculationSpan = document.querySelectorAll('.summary__calculation > span')
            let total_pay_summary = summary__calculationSpan[7];
            let credit_interest_rate = summary__calculationSpan[5];

            let VAT_summary = summary__calculationSpan[3];
            let tax_base = summary__calculationSpan[1];
            let payment_method = document.querySelector('#payment-method');

            if (payment_method.value === "punto_de_venta_credito") {
                let creditRate = parseFloat(document.querySelector('.summary__calculation--credit-rate').getAttribute('data-credit-rate')).toFixed(2)

                let credit_interest_rate_usd = totalUsdBeforeIva * creditRate;
                totalUsdWithIva = totalUsdWithIva + credit_interest_rate_usd;
                let total_a_pagar = totalUsdWithIva * dollarExchangeRate;
                console.info('total del dolar: ' + total_a_pagar);

                credit_interest_rate_bs = ivaBs * creditRate;
                total_Bs = total_a_pagar;


                credit_interest_rate.innerHTML = formatted(credit_interest_rate_usd);
            } else {
                credit_interest_rate.innerHTML = 0;
                console.info('sin tasa de interes');
                total_Bs = totalBsWithIva;
            }
            total_pay_summary.innerHTML = formatted(totalUsdWithIva);
            VAT_summary.innerHTML = formatted(ivaUsd);
            tax_base.innerHTML = formatted(totalUsdBeforeIva);

            subTotalAllProducts.innerHTML = `
                    <i>USD: ${formatted(totalUsdWithIva)}</i>
                    <i>BS: ${formatted(total_Bs)}</i>
                `;
        }
    })
</script>

<script>

    let payment_method = document.querySelector('.payment-method');

</script>
<script>


    document.addEventListener('change', e => {
        // Verificamos si el cambio proviene del input con id 'quantity'
        if (e.target.matches('#quantity')) {
            const quantityInput = e.target;
            const dataNumber = quantityInput.getAttribute('data-number');

            // Obtenemos los elementos del DOM y sus valores
            const salePriceInput = document.querySelector(`[name="sale_price_usd_${dataNumber}"]`);
            const totalNetoInput = document.querySelector(`[name="total_parcial_usd_${dataNumber}"]`);
            const discountInput = document.querySelector(`[name="discount_${dataNumber}"]`);

            // Validamos la existencia de los elementos antes de continuar
            if (!salePriceInput || !totalNetoInput || !discountInput) {
                console.error('Error: No se encontraron todos los elementos DOM necesarios.');
                return;
            }

            // Limpiamos y parseamos los valores numéricos
            let salePrice = parseFloat(salePriceInput.value.replace('USD:', '').replace(',', '.'));
            let quantity = parseInt(quantityInput.value);
            let discountText = discountInput.value;

            // Validar que la cantidad sea un número positivo
            if (isNaN(quantity) || quantity < 1) {
                alert('La cantidad no puede ser un valor negativo o cero. Se establecerá en 1.');
                quantityInput.value = 1;
                quantity = 1; // Aseguramos que la cantidad usada en el cálculo sea 1
            }

            // Validar que el precio de venta sea un número válido
            if (isNaN(salePrice)) {
                console.error('Error: El precio de venta no es un número válido.');
                totalNetoInput.value = '0,00'; // Establecer un valor predeterminado en caso de error
                return;
            }

            let totalNeto = salePrice * quantity;
            let finalPrice = totalNeto;

            // Aplicar descuento si existe
            if (discountText !== "0%") {
                const discountPercentage = parseFloat(discountText.replace('%', ''));
                if (!isNaN(discountPercentage)) {
                    const discountAmount = totalNeto * (discountPercentage / 100);
                    finalPrice = totalNeto - discountAmount;
                } else {
                    console.warn('Advertencia: El formato del descuento no es válido.');
                }
            }

            // Formatear el precio final a la moneda local (es-ES)
            const formattedPrice = finalPrice.toLocaleString('es-ES', {
                style: 'decimal',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            // Asignar el valor formateado al input de total
            totalNetoInput.value = formattedPrice;
            console.info(`Precio final calculado: ${formattedPrice}`);


            // Select DOM elements
            const subTotalAllProducts = document.querySelector('.product__total-sale > span');
            const totalNetoInputs = document.querySelectorAll('#total_parcial_usd');
            const productsElement = document.querySelector('#products'); // Assuming 'data-bs' is on this element

            // Initialize sum for USD and IVA calculations
            let totalUsdBeforeIva = 0;

            // Calculate the sum of all product totals in USD before IVA
            totalNetoInputs.forEach(inputElement => {
                // Replace comma with dot for proper float parsing and add to total
                totalUsdBeforeIva += parseFloat(inputElement.value.replace(',', '.'));
            });

            // Define IVA rate
            const ivaRate = parseFloat(document.querySelector('.summary__calculation--iva').getAttribute('data-iva')).toFixed(2);

            // --- Calculate USD Totals ---
            const ivaUsd = totalUsdBeforeIva * ivaRate;
            let totalUsdWithIva = totalUsdBeforeIva + ivaUsd;

            // --- Calculate BS Totals ---
            // Get the current dollar exchange rate from the 'data-bs' attribute
            const dollarExchangeRate = parseFloat(productsElement.getAttribute('data-bs').replace(',', '.'));

            // Calculate the total in BS before IVA
            const totalBsBeforeIva = totalUsdBeforeIva * dollarExchangeRate;

            // Calculate IVA in BS
            const ivaBs = totalBsBeforeIva * ivaRate;

            // Calculate total in BS with IVA
            const totalBsWithIva = totalBsBeforeIva + ivaBs;

            // Format BS total for display
            // Using 'es-ES' locale for comma as decimal separator and dot as thousands separator
            const formattedBsTotal = totalBsWithIva.toLocaleString('es-ES', {
                style: 'decimal',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            const formatted = function (value) {
                return value.toLocaleString('es-ES', {
                    style: 'decimal',
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            };


            console.clear();

            // Log IVA in BS and total USD for debugging (optional)

            // Log IVA in BS and total USD for debugging (optional)
            console.info('IVA (BS):', ivaBs);
            console.info('Total USD (with IVA):', totalUsdWithIva);

            let summary__calculationSpan = document.querySelectorAll('.summary__calculation > span')
            let total_pay_summary = summary__calculationSpan[7];
            let credit_interest_rate = summary__calculationSpan[5];

            let VAT_summary = summary__calculationSpan[3];
            let tax_base = summary__calculationSpan[1];
            let payment_method = document.querySelector('#payment-method');

            if (payment_method.value === "punto_de_venta_credito") {
                let creditRate = parseFloat(document.querySelector('.summary__calculation--credit-rate').getAttribute('data-credit-rate')).toFixed(2)

                let credit_interest_rate_usd = totalUsdBeforeIva * creditRate;
                totalUsdWithIva = totalUsdWithIva + credit_interest_rate_usd;
                let total_a_pagar = totalUsdWithIva * dollarExchangeRate;
                console.info('total del dolar: ' + total_a_pagar);

                credit_interest_rate_bs = ivaBs * creditRate;
                total_Bs = total_a_pagar;


                credit_interest_rate.innerHTML = formatted(credit_interest_rate_usd);
            } else {
                credit_interest_rate.innerHTML = 0;
                console.info('sin tasa de interes');
                total_Bs = totalBsWithIva;
            }
            total_pay_summary.innerHTML = formatted(totalUsdWithIva);
            VAT_summary.innerHTML = formatted(ivaUsd);
            tax_base.innerHTML = formatted(totalUsdBeforeIva);

            subTotalAllProducts.innerHTML = `
                    <i>USD: ${formatted(totalUsdWithIva)}</i>
                    <i>BS: ${formatted(total_Bs)}</i>
                `;
        }

        if (e.target.matches('#payment-method')) {
            console.info(e.target.value)


            let quantityInputs = document.querySelectorAll('#quantity');

            let dataNumber = 0;
            quantityInputs.forEach(element => {
                dataNumber++;
            });



            // Obtenemos los elementos del DOM y sus valores
            const salePriceInput = document.querySelector(`[name="sale_price_usd_${dataNumber}"]`);
            const totalNetoInput = document.querySelector(`[name="total_parcial_usd_${dataNumber}"]`);
            const discountInput = document.querySelector(`[name="discount_${dataNumber}"]`);
            const quantityInput = document.querySelector(`[name="quantity_${dataNumber}"]`);

            // Validamos la existencia de los elementos antes de continuar
            if (!salePriceInput || !totalNetoInput || !discountInput) {
                console.error('Error: No se encontraron todos los elementos DOM necesarios.');
                return;
            }

            // Limpiamos y parseamos los valores numéricos
            let salePrice = parseFloat(salePriceInput.value.replace('USD:', '').replace(',', '.'));
            let quantity = parseInt(quantityInput.value);
            let discountText = discountInput.value;

            // Validar que la cantidad sea un número positivo
            if (isNaN(quantity) || quantity < 1) {
                alert('La cantidad no puede ser un valor negativo o cero. Se establecerá en 1.');
                quantityInput.value = 1;
                quantity = 1; // Aseguramos que la cantidad usada en el cálculo sea 1
            }

            // Validar que el precio de venta sea un número válido
            if (isNaN(salePrice)) {
                console.error('Error: El precio de venta no es un número válido.');
                totalNetoInput.value = '0,00'; // Establecer un valor predeterminado en caso de error
                return;
            }

            let totalNeto = salePrice * quantity;
            let finalPrice = totalNeto;

            // Aplicar descuento si existe
            if (discountText !== "0%") {
                const discountPercentage = parseFloat(discountText.replace('%', ''));
                if (!isNaN(discountPercentage)) {
                    const discountAmount = totalNeto * (discountPercentage / 100);
                    finalPrice = totalNeto - discountAmount;
                } else {
                    console.warn('Advertencia: El formato del descuento no es válido.');
                }
            }

            // Formatear el precio final a la moneda local (es-ES)
            const formattedPrice = finalPrice.toLocaleString('es-ES', {
                style: 'decimal',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            // Asignar el valor formateado al input de total
            totalNetoInput.value = formattedPrice;
            console.info(`Precio final calculado: ${formattedPrice}`);


            // Select DOM elements
            const subTotalAllProducts = document.querySelector('.product__total-sale > span');
            const totalNetoInputs = document.querySelectorAll('#total_parcial_usd');
            const productsElement = document.querySelector('#products'); // Assuming 'data-bs' is on this element

            // Initialize sum for USD and IVA calculations
            let totalUsdBeforeIva = 0;

            // Calculate the sum of all product totals in USD before IVA
            totalNetoInputs.forEach(inputElement => {
                // Replace comma with dot for proper float parsing and add to total
                totalUsdBeforeIva += parseFloat(inputElement.value.replace(',', '.'));
            });

            // Define IVA rate
            const ivaRate = parseFloat(document.querySelector('.summary__calculation--iva').getAttribute('data-iva')).toFixed(2);

            // --- Calculate USD Totals ---
            let ivaUsd = totalUsdBeforeIva * ivaRate;
            let totalUsdWithIva = totalUsdBeforeIva + ivaUsd;

            // --- Calculate BS Totals ---
            // Get the current dollar exchange rate from the 'data-bs' attribute
            const dollarExchangeRate = parseFloat(productsElement.getAttribute('data-bs').replace(',', '.'));

            // Calculate the total in BS before IVA
            const totalBsBeforeIva = totalUsdBeforeIva * dollarExchangeRate;

            // Calculate IVA in BS
            let ivaBs = totalBsBeforeIva * ivaRate;

            // Calculate total in BS with IVA
            const totalBsWithIva = totalBsBeforeIva + ivaBs;

            // Format BS total for display
            // Using 'es-ES' locale for comma as decimal separator and dot as thousands separator
            const formattedBsTotal = totalBsWithIva.toLocaleString('es-ES', {
                style: 'decimal',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            const formatted = function (value) {
                return value.toLocaleString('es-ES', {
                    style: 'decimal',
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            };



            // Log IVA in BS and total USD for debugging (optional)
            console.info('IVA (BS):', ivaBs);
            console.info('Total USD (with IVA):', totalUsdWithIva);

            let summary__calculationSpan = document.querySelectorAll('.summary__calculation > span')
            let total_pay_summary = summary__calculationSpan[7];
            let credit_interest_rate = summary__calculationSpan[5];

            let VAT_summary = summary__calculationSpan[3];
            let tax_base = summary__calculationSpan[1];
            let payment_method = document.querySelector('#payment-method');

            if (payment_method.value === "punto_de_venta_credito") {
                let creditRate = parseFloat(document.querySelector('.summary__calculation--credit-rate').getAttribute('data-credit-rate')).toFixed(2)

                let credit_interest_rate_usd = totalUsdBeforeIva * creditRate;
                totalUsdWithIva = totalUsdWithIva + credit_interest_rate_usd;
                let total_a_pagar = totalUsdWithIva * dollarExchangeRate;
                console.info('total del dolar: ' + total_a_pagar);

                credit_interest_rate_bs = ivaBs * creditRate;
                total_Bs = total_a_pagar;


                credit_interest_rate.innerHTML = formatted(credit_interest_rate_usd);
            } else {
                credit_interest_rate.innerHTML = 0;
                console.info('sin tasa de interes');
                total_Bs = totalBsWithIva;
            }
            total_pay_summary.innerHTML = formatted(totalUsdWithIva);
            VAT_summary.innerHTML = formatted(ivaUsd);
            tax_base.innerHTML = formatted(totalUsdBeforeIva);

            console.info(ivaRate + 'IVA')
            subTotalAllProducts.innerHTML = `
                    <i>USD: ${formatted(totalUsdWithIva)}</i>
                    <i>BS: ${formatted(total_Bs)}</i>
                `;
        }

    });
</script>

</html>
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
    <link rel="stylesheet" href="../../../css/components/_header.css">
    <link rel="stylesheet" href="../../../css/components/_input.css">
    <link rel="stylesheet" href="../../../css/components/_top-bar.css">
    <link rel="stylesheet" href="../css/components/_selection-operations.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body class="h-100 d-flex flex-column">
    <x-header-admin></x-header-admin>
    <x-selection-operations></x-selection-operations>
    <main class="flex__grow-2 flex-full__aligh-start">
        <article class="form">
            <form action="{{ route('register.search-card') }}" class="search-card" method="POST">
                @csrf
                <input type="hidden" name="id_customer">
                <div class="button--back">
                    <a href="{{ route('product.index') }}">
                        <i class="bi bi-arrow-left-square text-grey"></i>
                        <button class="button text-grey" type="button">Volver al panel de control</button>
                    </a>
                </div>


                <legend>Información del Cliente</legend> {{-- Añadido un título para el formulario de búsqueda --}}

                <div class="d-flex gap-2">
                    <div class="form__item w-50">
                        <label for="supplier_id_search" class="form__label form__label--required">Número de
                            identificación</label>
                        <div class="input-group">
                            <span class="form__icon input-group-text"><i class="bi bi-person-badge"></i></span>
                            <input type="text" name="supplier_id_search" id="supplier_id_search" class="form-control"
                                placeholder="Ej: 31048726" aria-label="Número de identificación" value="12" autofocus>
                        </div>
                    </div>
                    <div>
                        <button class="button button--color-blue ee" type="submit">
                            Buscar cliente
                        </button>
                    </div>
                </div>
            </form>

            <form action="{{ route('product.store') }}" method="post" class=" w-adjustable">
                @csrf
                @method('POST')
                <div class="register-client text-red" style="display:none">
                    <p class="p-0 m-0">
                        Cliente no encontrado. Por favor, regístralo.
                        <a href="" class="text-blue">Aqui</a>
                    </p>

                </div>


                <legend class="form__title">
                    <b>Registrar Nueva Venta</b>
                </legend>

                @if (session('alert-success'))
                    <div class="alert alert-success">
                        {{ session('alert-success') }}
                    </div>
                @endif

                <legend>Detalles de la Venta</legend> {{-- Título para la sección de los datos de la venta --}}

                <fieldset>
                    <div class="form__item row">
                        <div class="col-4">
                            <div class="form__item ">
                                <label for="client_name" class="form__label">Nombre</label>
                                <div class="input-group">
                                    <span
                                        class="form__icon input-group-text @error('client_name') is-invalid--border @enderror"
                                        id="category-addon"><i class="bi bi-person-badge"></i></span>
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
                                <label for="client_lastname" class="form__label ">Apellido</label>
                                <div class="input-group">
                                    <span
                                        class="form__icon input-group-text @error('client_lastname') is-invalid--border @enderror"
                                        id="category-addon"><i class="bi bi-person-badge"></i></span>
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
                            <div class="form__item ">
                                <label for="client_phone" class="form__label ">Número de Teléfono </label>
                                <div class="input-group">
                                    <span
                                        class="form__icon input-group-text @error('client_phone') is-invalid--border @enderror"
                                        id="category-addon"><i class="bi bi-person-badge"></i></span>
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
                                id="description-addon"><i class="bi bi-text-paragraph"></i></span>
                            <textarea name="client_address" id="client_address" rows="3" disabled
                                class="form-control @error('client_address') is-invalid @enderror" placeholder="..."
                                aria-label="Dirección del cliente">{{ old('client_address') }}</textarea>
                        </div>
                        @error('client_address') <div class="alert alert-danger mt-1">{{ $message }}</div> @enderror
                    </div>
                </fieldset>

                <div class="form__button w-100 my-3">
                    <button class="button button--color-blue w-100" type="button">
                        Guardar cambios
                    </button>
                </div>
            </form>
        </article>

    </main>
    <x-footer></x-footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ItemFormSearch = document.querySelector(".search-card");
        const clientMessageArea = document.getElementById('clientMessageArea'); // Para mostrar mensajes


        // *** IMPORTANTE: Verificar que el formulario se encontró ***
        if (!ItemFormSearch) {
            console.error("Error: El formulario con la clase 'search-card' no fue encontrado en el DOM.");
            return; // Salir si el formulario no existe
        }

        ItemFormSearch.addEventListener('submit', e => {
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
                    // Le decimos al servidor que queremos HTML
                    // 'Content-Type' NO es necesario con FormData si solo envías campos de texto.
                    // Fetch lo gestiona automáticamente como multipart/form-data o application/x-www-form-urlencoded.
                },
                body: JSON.stringify({
                    supplier_id_search: FormDataSearch.get('supplier_id_search')
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
                    // La petición fue exitosa, 'htmlResponse' contiene el HTML devuelto
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
                        return
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

</html>
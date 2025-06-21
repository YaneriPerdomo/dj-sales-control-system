<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configuration del Iva | Sistema Web DJ</title>
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
        <article class="form w-adjustable-s">
            <div class="flex-full__justify-content-between p-0">
                <div>
                    <legend><b>Configuración de la Tasa de Crédito</b></legend>
                </div>
                <div>
                    <a href="{{ route('credit-rate-settings.edit') }}" class="text-decoration-none text-white">
                        <button class="button button--color-blue">
                            Actualizar Valor
                        </button>
                    </a>
                </div>
            </div>
            <div>
                @if (session('alert-success'))
                    <div class="alert alert-success">
                        {{ session('alert-success') }}
                    </div>
                @endif
                <hr>
                <section class="flex-full__justify-content-between">
                    <div>
                        <span>
                            Tasa de Interés del Crédito
                        </span>
                    </div>
                    <div>
                        <span>
                            {{ $credit_rate->value ?? 0 }}%
                        </span>
                    </div>
                </section>
                <hr>
                <section class="text-center">
                    <i>
                        Fecha y hora de última actualización:
                    </i><br>
                    <span>
                        @php
                        @endphp
                        {{ $credit_rate->updated_at ?? 'Aún no se ha actualizado' }}
                    </span>
                </section>
            </div>
        </article>
    </main>


    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>
<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de Proveedores | Sistema Web DJ</title>
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
        <article class="form w-adjustable ">
            <div class="flex-full__justify-content-between p-0">
                <div>
                    <legend><b>Listado de Proveedores</b></legend>
                </div>
                <div>
                    <a href="{{ route('supplier.create') }}" class="text-decoration-none text-white">
                        <button class="button button--color-blue">
                            Registrar nueva proveedor
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
                                <th>Nombre del proveedor</th>
                                <th>RIF</th>
                                <th>Número de Teléfono </th>
                                <th>Dirección</th>
                                <th>Registrado desde</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($suppliers->items() == [])
                                <p>No hay proveedores registrados por los momentos.</p>
                            @else
                                @foreach ($suppliers->items() as $value)
                                    <tr class='show'>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->rif }}</td>
                                        <td>{{ $value->telephone_number }}</td>
                                        <td>{{ $value->address }}</td>
                                        <td>{{substr($value->created_at, 0, 10)}}</td>
                                        </td>
                                        <td class='table__operations'>
                                            @php
                                                $delete = $value->gender_id == 1 ? 'supplier.delete-m' : 'supplier.delete-f'
                                            @endphp
                                            <a href="{{ route($delete, $value->slug)}}">
                                                <button type="button" class="button button--color-red ">
                                                    <i class='bi bi-trash''></i>
                                                                                                </button>
                                                                                            </a>
                                                                                            @php
                                                                                                $edit = $value->gender_id == 1 ? 'supplier.edit-m' : 'supplier.edit-f'
                                                                                            @endphp
                                                                                            <a href="{{ route($edit, $value->slug)}}">
                                                                                                <button class="button button--color-orange">
                                                                                                    <i class=' bi
                                                        bi-person-lines-fill'></i>
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
                            Mostrando {{ $suppliers->count() == 1 ? 'registro' : 'registros' }} 1 -
                            {{ $suppliers->count() }}
                            de un total de {{ $suppliers->total() }}
                        </p>
                    </div>
                    <div>
                        {{ $suppliers->links() }}
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
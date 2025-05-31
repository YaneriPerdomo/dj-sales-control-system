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
        <article class="form w-adjustable-s  ">
            <div class="flex-full__justify-content-between p-0">
                <div>
                    <legend><b>Listado de Categorias</b></legend>
                </div>
                <div>
                    <a href="{{ route('category.create') }}" class="text-decoration-none text-white">
                        <button class="button button--color-blue">
                            Registrar nueva categoria
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
                                <th>Nombre de la categoría</th>

                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($categories->items() == [])
                                <p>No hay cargos registrados por los momentos.</p>
                            @else
                                @foreach ($categories->items() as $value)
                                    <tr class='show'>
                                        <td>{{ $value->name }}</td>
                                        </td>
                                        <td class='table__operations'>
                                            <a href="">
                                                <button type="button" class="button button--color-red ">
                                                    <i class='bi bi-trash''></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('category.edit', $value->slug )}}">
                                                        <button class="button button--color-orange">
                                                            <i class=' bi bi-person-lines-fill'></i>
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
                            Mostrando {{ $categories->count() == 1 ? 'registro' : 'registros' }} 1 -
                            {{ $categories->count() }}
                            de un total de {{ $categories->total() }}
                        </p>
                    </div>
                    <div>
                        {{ $categories->links() }}
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
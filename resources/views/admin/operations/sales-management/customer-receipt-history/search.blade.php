<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscar Recibos del Cliente | Sistema Web DJ</title>
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

<body class="h-100 d-flex flex-column">
    <x-header-admin></x-header-admin>
    <x-selection-operations></x-selection-operations>
    <main class="flex__grow-2 flex-full__aligh-start">
        <form action="" method="post" class="form w-adjustable-s">
            <legend class="form__title">
                <b>Buscar Recibos del Cliente</b>
            </legend>
            @if (session('alert-success'))
                <div class="alert alert-success">
                    {{ session('alert-success') }}
                </div>
            @endif
            <div class="form__item">
                <label for="credit_rate" class="form__label form__label--required">Número de Identificación del
                    Cliente</label>
                <div class="input-group">
                    <span class="form__icon input-group-text @error ('credit_rate') is-invalid--border @enderror"
                        id="client-id-icon">
                        <i class="bi bi-person-badge"></i> </span>
                    <input type="text" name="credit_rate" id="credit_rate"
                        class="form-control @error ('credit_rate') is-invalid @enderror" placeholder="Ej: 123456789"
                        aria-label="Número de Identificación del Cliente" aria-describedby="client-id-icon" autofocus
                        value="{{ old('credit_rate') }}">
                </div>
                @error('credit_rate')
                <div class="alert alert-danger mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="form__button w-100 my-3">
                <button class="button button--color-blue w-100 button--search" type="submit">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>
            <script>
                let ItemButttonSearh = document.querySelector('.button--search');
                let ItemFomSearch = document.querySelector('form');
                let ItemInputNameProduct = document.querySelector('#credit_rate');
                function slugify(text) {
                    const lowercase = text.toLowerCase();
                    const slug = lowercase.replace(/[^a-z0-9]+/g, '-');
                    const trimmedSlug = slug.replace(/^-+|-+$/g, '');
                    return trimmedSlug;
                }
                ItemButttonSearh.addEventListener('click', async e => {
                    e.preventDefault();
                    let inputValue = slugify(ItemInputNameProduct.value);
                    if (inputValue != "") {
                        return window.location.href = '../../historial-de-recibos-garantia/' + inputValue.trim() + '/historial';
                    } else {
                        return window.location.href = '../../historial-de-recibos-garantia';
                    }
                })
            </script>
        </form>
    </main>


    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>
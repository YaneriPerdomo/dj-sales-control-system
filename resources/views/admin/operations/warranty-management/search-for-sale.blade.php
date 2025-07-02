<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscar Venta por Código | Sistema Web DJ</title>
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
</style>

<body class="h-100 d-flex flex-column">
    <x-header-admin></x-header-admin>
    <x-selection-operations></x-selection-operations>
    <main class="flex__grow-2 flex-full__aligh-start">
        <form action='{{ route('warranty-sale.show-sale-warranty-status') }}' method="post" class="form w-adjustable-s">
            @method('POST')
            @csrf
            <div class="multiple-steps">
                <div class="flex-full__justify-content-between p-0 multiple-steps__context">
                    <small class="multiple-steps__text">
                        <b>                                     Buscar Venta <br> por Código
                        </b>
                    </small>
                    <small class="multiple-steps__text">
                                        Ver Detalles <br> de la Venta

                       
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
                    <div class="multiple-steps__wait  multiple-steps__line"></div>
                    <b class="multiple-steps__wait">2</b>
                    <div class="multiple-steps__wait multiple-steps__line  "></div>
                    <b class="multiple-steps__wait">3</b>
                    <div class="multiple-steps__wait multiple-steps__line  "></div>
                    <b class="multiple-steps__wait">4</b>
                </div>
            </div>
            @if (session('alert-success'))
                <div class="alert alert-success">
                    {!! session('alert-success')  !!}
                </div>
            @endif

            @if (session('alert-danger'))
                <div class="alert alert-danger">
                    {{ session('alert-danger') }}
                </div>
            @endif
            <div class="form__item">
                <label for="sale_code" class="form__label form__label--required">Código de Venta</label>
                <div class="input-group">
                    <span class="form__icon input-group-text @error('sale_code') is-invalid--border @enderror"
                        id="sale-code-icon">
                        <i class="bi bi-tag-fill"></i> </span>
                    <input type="text" name="sale_code" id="sale_code"
                        class="form-control @error('sale_code') is-invalid @enderror" placeholder="Ej: KfdVNC4F"
                        aria-label="Código único de la venta para buscar garantía" aria-describedby="sale-code-icon"
                        autofocus value="{{ old('sale_code') }}">
                </div>
                @error('sale_code')
                    <div class="alert alert-danger mt-1" role="alert">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__button w-100 my-3">
                <button class="button button--color-blue w-100 button--search" type="submit">
                    Siguiente
                </button>
            </div>
            <script>
                /*
                  let ItemButttonSearh = document.querySelector('.button--search');
                let ItemInputNameProduct = document.querySelector('#sale_code');
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
                        return window.location.href = '../../seguimiento-de-ventas-y-garantias/' + inputValue.trim() + '/historial';
                    } else {
                        return window.location.href = '../../seguimiento-de-ventas-y-garantias';
                    }
                })
                */
            </script>
        </form>
    </main>


    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>
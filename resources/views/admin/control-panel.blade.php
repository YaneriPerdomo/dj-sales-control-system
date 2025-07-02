<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido/a | <x-systen-name></x-systen-name></title>
    <link rel="stylesheet" href="../css/utilities.css">
    <link rel="stylesheet" href="../css/layouts/_base.css">
    <link rel="stylesheet" href="../css/components/_button.css">
    <link rel="stylesheet" href="../css/components/_table.css">
    <link rel="stylesheet" href="../css/components/_footer.css">
    <link rel="stylesheet" href="../css/components/_form.css">
    <link rel="stylesheet" href="../css/components/_header.css">
    <link rel="stylesheet" href="../css/components/_selection-operations.css">
    <link rel="stylesheet" href="../css/components/_top-bar.css">
        <link rel="icon" type="image/x-icon" href="./img/icono.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<style>
    .white-background {
        border-radius: 1rem;
        border: solid 1px #e8d8ff;
        margin: 0.5rem;
        background: white;
        padding: 1.2rem !important;
    }

    .main-title {
        line-height: inherit;
        font-size: calc(1.275rem + .3vw);
    }

    .card__block {
        color: white;
        border-radius: 1rem;
        display: flex;
        display: flex;
        flex-basis: 250px;
        align-items: center;
    }

    /*.card__products {
        background: var(--color-blue);

    }

    .card_categorys {
        background: var(--color-pink);
    }

    .card_clients {
        background: var(--color-orange);
    }*/

    .card__content {
        display: flex;
        gap: 1rem;
        flex-direction: row;
        border: 0rem;
        flex-wrap: wrap;
    }

    .card {
        border: none;
        border-bottom: solid 2px var(--color-black);
        border-radius: 0;
    }

    .card__quantity-content {

        padding: 0.5rem;
        border-radius: 0rem 1rem 2rem 0rem;
    }

    .card__icon {
        padding: 0.5rem;
        padding-right: 0rem;
    }

    .msg__title {
        background: var(--color-blue);
        padding: 0.5rem;
        color: white;
        border-radius: 1rem 1rem 0rem 0rem;
        
    }

    .msg__p {
        font-size: 0.9em;
        line-height: 1.6;
        /*color: #495057;*/
        margin-bottom: 0;
        padding: 0.5rem;
    }

    .msg {
        border-bottom: solid 2px var(--color-black);
    }

    .card__block > a:hover{
        color:var(--color-verde) !important;
        font-weight: bold;
        transition: 0.3s linear;
    }

    .card__icon {
        font-size: 1.8rem;
        color: var(--color-black);
    }

    .card__sub-title,
    .card__sub-title+b {
        border-bottom: dotted;
    }

    .card__title {
        background: var(--color-verde);
        padding: 0.5rem;
        color: white;
        border-radius: 1rem 1rem 0rem 0rem;
    }


    .img-welcome>img {
        height: 280px;
        object-fit: contain;
    }
</style>

<body>
    <x-header-admin></x-header-admin>
    <x-selection-operations> </x-selection-operations>
    <main class="  h-100 flex-full__justify-content-center">
        <article class="white-background w-adjustable ">
            <div class="row">
                <div class="col-6  flex-full__justify-content-center pb-0 ">
                    <div class=" welcome">
                    <h1 class="welcome__greetings text-center fs-2 ">

                        ¡<span>

                        </span>
                        {{ Auth::user()->user ?? 0}}!

                    </h1>
                    <script>
                        let welcomeGreetings = document.querySelector('.welcome__greetings > span');
                        let date = new Date();
                        if (date.getHours() >= 0 && date.getHours() <= 12) {
                            console.info(true)
                            welcomeGreetings.innerHTML = 'Buenos dias, estimado/a '
                        }
                        if (date.getHours() >= 12 && date.getHours() <= 18) {
                            console.info(true)
                            welcomeGreetings.innerHTML = 'Buenas tardes, estimado/a '
                        }
                        if (date.getHours() >= 18 && date.getHours() <= 24) {
                            console.info(true)
                            welcomeGreetings.innerHTML = 'Buenas noches, estimado/a '
                        }
                    </script>
                    <span class="">
                        ¡Bienvenido/a! Con Soluciones de Control de Ventas a Medida, nuestro sistema
                        web StockDJ te ayuda a tomar el <b class="text-orange">control total de tus ventas y stock de
                            forma
                            simplificada.</b>
                    </span>
                </div>
                <div class="msg  ">
                    <div class="msg__title">
                        <i>
                            ¡Tus Ideas Mejoran Nuestro Sistema!
                        </i>
                    </div>
                    <p class="msg__p ">El sistema web StockDJ ya está funcionando, y tu experiencia es clave para seguir
                        mejorándolo. Si
                        tienes alguna sugerencia o idea sobre características adicionales, no dudes en contactar a
                        nuestra especialista en Desarrollo Web, Yaneri Perdomo. ¡Ella hizo todo esto posible con tanto amor y
                        dedicación!
                    </p>
                </div>

            </div>
            <div class="col-6">

                <figure class="img-welcome flex-full__justify-content-center">
                    <img src="../img/welcome-img-2.jpg" alt="" class="img-fluid">
                </figure>

            </div>


            </div>

            <br>
            <div class="card">
                <h2 class="card__title fs-5">Acciones Rápidas</h2>
                <div class="card__content">
                    <div class="card__block card_categorys">
                        <i class="bi bi-cart-plus fs-4 card__icon"></i>
                        <a href="{{ route('register.create') }}" class="text-decoration-none text-color-black">
                            <div class="card__quantity-content">
                                <span class="card__sub-title">Registrar Venta</span>
                            </div>
                        </a>
                    </div>
                    <div class="card__block card_clients">
                        <i class="bi bi-graph-up fs-4 card__icon"></i>
                        <a href="{{ route('spurchase-history.index') }}"
                            class="text-decoration-none text-color-black">
                            <div class="card__quantity-content">
                                <span class="card__sub-title">Movimientos de E/S</span>
                            </div>
                        </a>
                    </div>
                    <div class="card__block card_clients">
                        <i class="bi bi-currency-exchange fs-4 card__icon"></i>
                        <a href="{{ route('dollar-rate.index') }}"
                            class="text-decoration-none text-color-black">
                            <div class="card__quantity-content">
                                <span class="card__sub-title">Tasa de Cambio: </span>
                                <b>{{ number_format($total_rate, 2, ',', '.') ?? 0 }}Bs</b>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
            <br>
            <div class="card">
                <h2 class="card__title fs-5"> Resumen General</h2>
                <br>
                <div class="card__content b-0">
                    <div class="card__block card_categorys">
                        <i class="bi bi-tags fs-4 card__icon"></i>
                        <a href="{{ route('category.index') }}" class="text-decoration-none text-color-black">
                            <div class="card__quantity-content">
                                <span class="card__sub-title">Categoría{{ $total_categorys == 1 ? '' : 's' }}: <b
                                        class="">{{$total_categorys ?? 0}}</b></span>
                            </div>
                        </a>
                    </div>
                    <div class="card__block card__products">
                        <i class="bi bi-box-seam fs-4 card__icon"></i>
                        <a href="{{ route('product.index') }}" class="text-decoration-none text-color-black">
                            <div class="card__quantity-content">
                                <span class="card__sub-title">Producto{{ $total_products == 1 ? '' : 's' }}:</span>
                                <b class="">{{$total_products ?? 0}}</b>
                            </div>
                        </a>
                    </div>
                    <div class="card__block card_clients">
                        <i class="bi bi-people fs-4 card__icon"></i>
                        <a href="{{ route('customer.index') }}" class="text-decoration-none text-color-black">
                            <div class="card__quantity-content">
                                <span class="card__sub-title">Cliente{{ $total_clients == 1 ? '' : 's' }}:</span>
                                <b class="">{{$total_clients ?? 0}}</b>
                            </div>
                        </a>
                    </div>
                    <div class="card__block card_clients">
                        <i class="bi bi-cash-stack fs-4 card__icon"></i>
                        <a href="{{ route('general-history-sale.index') }}"
                            class="text-decoration-none text-color-black">
                            <div class="card__quantity-content">
                                <span class="card__sub-title">Ventas{{ $total_sale == 1 ? '':'s' }}:</span>
                                <b class="">{{$total_sale ?? 0}}</b>
                            </div>
                        </a>
                    </div>
                    <div class="card__block card_clients">
                        <i class="bi bi-boxes fs-4 card__icon"></i>
                        <a href="{{ route('general-history-sale.index') }}"
                            class="text-decoration-none text-color-black">
                            <div class="card__quantity-content">
                                <span class="card__sub-title">Stock Actual: </span>
                                <b class="">{{$current_stock ?? 0}}</b>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            </div>

        </article>


    </main>
    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>
</body>

</html>
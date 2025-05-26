<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<style>
    .height-full {
        height: 100%;
    }


    .alert {
        margin: 0;
    }

    :root {
        --color-blue: rgb(98, 113, 224);
        --color-black: rgb(47, 47, 47);
    }

    body {
        display: flex;
        flex-direction: column;
        height: 100%;

    }

    .form {
        padding: 2rem;
        border-radius: 1rem;
        border: solid 1px #e8d8ff;
        margin: 0.5rem;
        background: white;
    }

    .form--login {
        width: clamp(300px, 30%, 400px);
    }

    .flex-all-center {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .button {
        color: white;
        padding 0.3rem 1rem;
        border: 0rem;
        padding: 0.5rem;
        border-radius: 1rem;
    }

    .text-color-blue {
        color: var(--color-blue);
    }

    .button--bg-blue {
        background: var(--color-blue);
    }

    .logo {
        position: absolute;
        top: 0.5rem;
        left: 0.5rem;
    }

    .form__item {
        margin-bottom: 0.6rem;
    }

    header {
        height: 60px;
        background: var(--color-blue);
    }

    main {
        flex-grow: 2;
        background: rgb(239, 239, 239);
    }

    footer {
        width: 100%;
        padding: 1rem;
        background: var(--color-black);
    }

    header {
        display: flex;
        flex-direction: revert;
        justify-content: space-between;
        padding: 1rem;
        flex-wrap: wrap;
        align-content: center;
    }
    .button--logout {
        border:0rem; 
        background: white;
        padding: 0.4rem 1rem;
    }
</style>

<body>
    <header>
        <section>
            Logo
        </section>
        <div>
            <div class="top-bar__avatar">
            </div>
            <div class=" dropdown">
                <button class="button text-white button--bg-blue dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Hola, {{ Auth::user()->user }}!
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class=" button--logout text-black">Cerrar sesion</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main class="flex-all-center h-100">

    </main> 
    <footer class="text-white text-center">
    hola
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>
</body>

</html>
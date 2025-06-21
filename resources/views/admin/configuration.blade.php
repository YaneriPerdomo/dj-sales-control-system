<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configuracion | Sistema Web DJ</title>
    <link rel="stylesheet" href="../css/utilities.css">
    <link rel="stylesheet" href="../css/layouts/_base.css">
    <link rel="stylesheet" href="../css/components/_button.css">
    <link rel="stylesheet" href="../css/components/_footer.css">
    <link rel="stylesheet" href="../css/components/_form.css">
    <link rel="stylesheet" href="../css/components/_header.css">
    <link rel="stylesheet" href="../css/components/_selection-operations.css">
    <link rel="stylesheet" href="../css/components/_top-bar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>


<body class="h-100 d-flex flex-column">

    <x-header-admin></x-header-admin>
    <x-selection-operations> </x-selection-operations>
    <main class="flex__grow-2">
        <article class="container-xxl h-100 ">
            <div class="px-3 mt-3">
                <legend><b>Mi cuenta</b></legend>
                <p>
                    Gestiona tu información personal y de seguridad
                </p>
            </div>
            <section class="forms">
                <form action="{{ route('configuration.update') }}" class="form form--update-account" method="post">
                    @csrf
                    @method('PUT')
                    @if (session('alert-success-update-data'))
                        <div class="alert alert-success">
                            {{ session('alert-success-update-data') }}
                        </div>
                    @endif
                    <legend class="form__title"><b>Datos de usuario</b></legend>
                    <span class="form__description">Actualiza tu nombre de usuario</span>
                    <div class="form__item">
                        <label for="" class="form__label form__label--required">Usuario</label>
                        <div class="input-group ">
                            <span class="form__icon input-group-text  @error ('user') is-invalid--border @enderror"
                                id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                            <input type="search" name="user" class="form-control @error ('user') is-invalid @enderror "
                                placeholder="Ej: Yane3" aria-label="Username" aria-describedby="basic-addon1" autofocus
                                value="{{ auth::user()->user }}">
                        </div>
                        @error('user')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form__item">
                        <div class="form__button flex-full__justify-content-end ">
                            <button class="button button--color-blue" type="submit">
                                Guardar cambios
                            </button>
                        </div>
                </form>
                <form action="{{ route('configuration.update-password') }}" class="form--update-password" method="post">
                    @csrf
                    @method('PUT')
                    @if (session('alert-success-update-password'))
                        <div class="alert alert-success">
                            {{ session('alert-success-update-password') }}
                        </div>
                    @endif
                    <legend class="form__title"><b>Seguridad</b></legend>

                    <span class="form__description">Cambia tu contraseña para mantener tu cuenta segura</span>
                  
                    <div class="form__item">
                        <label for="" class="form__label form__label--required"> Nueva contraseña </label>
                        <div class="input-group ">
                            <span class="form__icon input-group-text @error ('password') is-invalid--border @enderror"
                                id="basic-addon1"><i class="bi bi-key"></i></span>
                            <input type="password" name="password"
                                class="form-control @error ('password') is-invalid @enderror"
                                placeholder="Mínimo 8 caracteres" aria-label="Username" aria-describedby="basic-addon1"
                                value="">
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form__item">
                        <label for="" class="form__label form__label--required">Confirmar nueva contraseña </label>
                        <div class="input-group ">
                            <span
                                class="form__icon input-group-text @error ('password_confirmation') is-invalid--border @enderror"
                                id="basic-addon1"><i class="bi bi-key"></i></span>
                            <input type="password" name="password_confirmation"
                                class="form-control @error ('password_confirmation') is-invalid @enderror "
                                placeholder="Repite tu nueva contraseña" aria-label="Username"
                                aria-describedby="basic-addon1" value="">
                        </div>
                        @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form__button flex-full__justify-content-end ">
                        <button class="button button--color-blue" type="submit">
                            Actualizar nueva contraseña
                        </button>
                    </div>
                </form>
            </section>
        </article>
    </main>
    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>
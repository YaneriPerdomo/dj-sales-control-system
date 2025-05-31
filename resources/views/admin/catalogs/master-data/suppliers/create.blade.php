<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configuration | Biblioteca B</title>
    <link rel="stylesheet" href="../../../css/utilities.css">
    <link rel="stylesheet" href="../../../css/layouts/_base.css">
    <link rel="stylesheet" href="../../../css/components/_button.css">
    <link rel="stylesheet" href="../../../css/components/_footer.css">
    <link rel="stylesheet" href="../../../css/components/_form.css">
    <link rel="stylesheet" href="../../../css/components/_header.css">
    <link rel="stylesheet" href="../../../css/components/_input.css">
    <link rel="stylesheet" href="../../../css/components/_top-bar.css">
    <link rel="stylesheet" href="../css/components/_selection-operations.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body class="h-100 d-flex flex-column">
    <x-header-admin></x-header-admin>
    <x-selection-operations></x-selection-operations>
    <main class="flex__grow-2 flex-full__aligh-start">
       <form action="{{ route('supplier.store') }}" method="post" class="form w-adjustable">
    @csrf
    @method('POST')
    <div class="button--back">
        <a href="{{ route('supplier.index') }}">
            <i class="bi bi-arrow-left-square text-grey"></i> <button class="button text-grey" type="button">Volver al listado</button>
        </a>
    </div>
    <legend class="form__title">
        <b> Registrar nuevo proveedor</b>
    </legend>

    @if (session('alert-success'))
        <div class="alert alert-success">
            {{ session('alert-success') }}
        </div>
    @endif
    <div class="form__item">
        <label for="name" class="form__label form__label--required">Nombre del Proveedor</label>
        <div class="input-group ">
            <span class="form__icon input-group-text @error ('name') is-invalid--border @enderror" id="basic-addon1">
                <i class="bi bi-building"></i> </span>
            <input type="text" name="name" id="name" class="form-control @error ('name') is-invalid @enderror"
                placeholder="Ej: Don Pescadon" aria-label="Nombre del Proveedor" aria-describedby="basic-addon1" autofocus value="">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form__item">
        <label for="gender" class="form__label form__label--required">Género</label>
        <div class="input-group ">
            <span class="form__icon input-group-text @error ('gender') is-invalid--border @enderror" id="basic-addon1">
                <i class="bi bi-gender-ambiguous"></i> </span>
            <select class="form-select " name="gender_id" id="gender" aria-label="Seleccione el género">
                <option selected disabled>Seleccione una opción</option>
                <option value="1">Masculino</option> 
                <option value="2">Femenino</option>
            </select>
        </div>
        @error('gender')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form__item">
        <label for="rif" class="form__label">RIF</label>
        <div class="input-group ">
            <span class="form__icon input-group-text @error ('rif') is-invalid--border @enderror" id="basic-addon1">
                <i class="bi bi-credit-card-2-front"></i> </span>
            <input type="text" name="rif" id="rif" class="form-control @error ('rif') is-invalid @enderror"
                placeholder="Ej: J-12345678-9" aria-label="RIF del Proveedor" aria-describedby="basic-addon1" autofocus value="">
        </div>
        @error('rif')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form__item">
        <label for="telephone_number" class="form__label">Número de Teléfono</label>
        <div class="input-group ">
            <span class="form__icon input-group-text @error ('telephone_number') is-invalid--border @enderror" id="basic-addon1">
                <i class="bi bi-telephone"></i> </span>
            <input type="text" name="telephone_number" id="telephone_number" class="form-control @error ('telephone_number') is-invalid @enderror"
                placeholder="Ej: 0414-1234567" aria-label="Número de Teléfono" aria-describedby="basic-addon1" autofocus value="">
        </div>
        @error('telephone_number')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form__item">
        <label for="address" class="form__label">Dirección</label>
        <div class="input-group ">
            <span class="form__icon input-group-text @error ('address') is-invalid--border @enderror" id="basic-addon1">
                <i class="bi bi-house"></i> </span>
            <textarea name="address" id="address" rows="2" class="form-control @error ('address') is-invalid @enderror"
                placeholder="Ej: Sierra Maestra, Calle 10, entre av. 10 y 11, #10-61 Diagonal al Vivero Girasol, Maracaibo, Venezuela" aria-label="Dirección del Proveedor" aria-describedby="basic-addon1"></textarea>
        </div>
        @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form__button w-100 my-3">
        <button class="button button--color-blue w-100" type="submit">
            Guardar cambios
        </button>
    </div>
</form>
    </main>
    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>
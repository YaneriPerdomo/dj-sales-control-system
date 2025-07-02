<header>
    <a href="{{ route('controlPanel.index') }}" class="text-decoration-none text-white fs-4" >
         StockYP
    </a>
    <div>
        <div class="top-bar__avatar">
        </div>
        <div class=" dropdown">
            <button class="button text-white button--bg-blue dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Hola, {{ Auth::user()->user ?? 0}}!
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="{{ route('controlPanel.index') }}">Inicio</a></li>
                <li><a class="dropdown-item" href="{{ route('configuration.index') }}">Configuración</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                        @csrf
                        <button class="button button--logout">Cerrar sesion</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
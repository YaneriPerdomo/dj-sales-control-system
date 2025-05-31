<div class="selection-operations">
    <nav class="container-xl flex-full__justify-content-between text-white">
        <div>
            <a href="" class="text-decoration-none text-white">
                Panel de control
            </a>
        </div>
        <div>
            <div class="dropdown">
                <button class="button text-white dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Operaciones
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li>
                        <h6 class="dropdown-header">Gestión de Compras</h6>
                    </li>
                    <li><a class="dropdown-item" href="">Registrar Compra</a></li>
                    <li><a class="dropdown-item" href="">Historial de Compras</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <h6 class="dropdown-header">Gestión de Ventas</h6>
                    </li>
                    <li><a class="dropdown-item" href="">Registrar Venta</a></li>
                    <li><a class="dropdown-item" href="">Historial de Ventas</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <h6 class="dropdown-header">Gestión de Inventario</h6>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('all-products-stock.index') }}">
                            <i class="fas fa-boxes"></i> Todos los Productos y Stock
                        </a></li>
                    <li><a class="dropdown-item" href="{{ route('critical-stock.index') }}">
                            <i class="fas fa-exclamation-triangle"></i> Alertas de Stock Crítico
                        </a></li>
                    <li><a class="dropdown-item" href="">
                            <i class="fas fa-exchange-alt"></i> Historial de Movimientos
                        </a></li>
                </ul>
            </div>
        </div>
        <div>
            <div class="dropdown">
                <button class="button text-white dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Catálogos
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li>
                        <h6 class="dropdown-header">Maestros Principales</h6>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('product.index') }}">Productos</a></li>
                    <li><a class="dropdown-item" href="{{ route('supplier.index') }}">Proveedores</a></li>
                    <li><a class="dropdown-item" href="{">Clientes</a></li>
                    <li><a class="dropdown-item" href="{{ route('dollar-rate.index') }}">Tasa de Cambio (USD/BS)</a></li>
                    <li><a class="dropdown-item" href="">Configuración IVA</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <h6 class="dropdown-header">Configuración de Catálogos</h6>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('category.index') }}">Categorías</a></li>
                    <li><a class="dropdown-item" href="{{ route('brand.index') }}">Marcas</a></li>
                    <li><a class="dropdown-item" href="{{ route('location.index') }}">Ubicaciones</a></li>
                </ul>
            </div>
        </div>
        <div>
            <div class="dropdown">
                <button class="button text-white dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Informes
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="">Informe de Ventas</a></li>
                    <li><a class="dropdown-item" href="">Informe de Compras</a></li>
                    <li><a class="dropdown-item" href="">Informe de Stock</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
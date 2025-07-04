<div class="selection-operations">
    <nav class="container-xl flex-full__justify-content-between text-white">
        <div>
            <div class="dropdown">
                <button class="button text-white dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Operaciones
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li>
                        <h6 class="dropdown-header">Gestión de Mercancias</h6>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('good.create') }}">Registrar Mercancia</a></li>
                    <li><a class="dropdown-item" href="{{ route('return-merchandise.create') }}">Devolución de
                            Mercancía</a></li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <h6 class="dropdown-header">Gestión de Ventas</h6>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('register.create') }}">Registrar Venta</a></li>
                    <li><a class="dropdown-item" href="{{ route('general-history-sale.index') }}">Historial de Ventas
                            General</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <h6 class="dropdown-header">Gestión de Garantías</h6>
                    </li>
                    <!--<li>
                        <a class="dropdown-item" href="{{ route('customer-receipt-history.index') }}">
                            Productos con garantía válida
                        </a>
                    </li>-->
                    <li>
                        <a class="dropdown-item" href="{{ route('warranty-sale.search-for-sale') }}">
                            Seguimiento de Ventas y Garantías
                        </a>
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
                    <li><a class="dropdown-item" href="{{ route('spurchase-history.index') }}">
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
                    <li><a class="dropdown-item" href="{{ route('customer.index') }}">Clientes</a></li>

                    <li><a class="dropdown-item" href="{{ route('dollar-rate.index') }}">Tasa de Cambio (USD/BS)</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('business-data.index') }}">Datos del Negocio</a></li>
                    <li><a class="dropdown-item" href="{{ route('iva-configuration.index') }}">Configuración del IVA</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('credit-rate-settings.index') }}">Configuración de la
                            Tasa de Crédito</a></li>
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
                    <li><a class="dropdown-item" href="{{ route('sale-report.index') }}">Informe de Ventas</a></li>
                    <li><a class="dropdown-item" href="{{ route('stock-reporte.index') }}">Informe de Stock</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
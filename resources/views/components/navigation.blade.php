<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboards-index') }}">
            <i class="bi bi-grid"></i>
            <span>painel inicial</span>
            </a>
        </li>

        <!-- Clientes -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#btn-cliente" data-bs-toggle="collapse" href="{{ route('clientes-index') }}">
                <i class="bi bi-menu-button-wide"></i><span>Clientes</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
        </li>
        <!-- Fim clientes -->

        <!-- Consertos -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#btn-conserto" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Consertos</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
        </li>
        <!-- Fim consertos -->

  </aside><!-- End Sidebar-->
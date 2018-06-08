<?php use Mini\Libs\Sesion; ?>
<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="../">Academia </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="material-icons">apps</i> MENU
                    </a>
                    <div class="dropdown-menu dropdown-with-icons">
                        <a href="/../entradas" class="dropdown-item">
                            <i class="material-icons">layers</i> Todas las Entradas
                        </a>
                        <a href="/../entradas/categorias" class="dropdown-item">
                            <i class="material-icons">layers</i> Todas las Categorías
                        </a>
                    </div>
                </li>

                <li class="nav-item {{ Request::is('messages') ? 'active' : ''}}">
                    <?php if (isset($_SESSION['user_email'])){ echo '<a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="/admin" data-original-title="debes de ser profesor">
                        Panel Administración
                    </a>'; }else{  } ?>
                </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : ''}}">
                    <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="/../#sobre_nosotros" data-original-title="Conócenos">
                        Sobre Nosotros
                    </a>
                </li>
                <li class="nav-item {{ Request::is('contact') ? 'active' : ''}}">
                    <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="/../#contacto" data-original-title="Contacto">
                        Contáctanos
                    </a>
                </li>
                <li class="nav-item {{ Request::is('login') ? 'active' : ''}}">
                    <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="/../login" data-original-title="Iniciar Sesión">

                        <?php if (isset($_SESSION['user_email'])){ echo Sesion::get('user_email'); }else{ echo "Iniciar Sesión"; } ?>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('contact') ? 'active' : ''}}">
                    <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="/../login/salir" data-original-title="Cerrar Sesión">
                        Salir
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- menú principal Artículos -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>user">Usuarios</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link 
                    <?= in_array($_SESSION['role_id'], $GLOBALS['user']['nuevo']) ? 'active' : 'disabled' ?>"
                        aria-current="page" href="<?= URL ?>user/nuevo">Nuevo</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle
                    <?= in_array($_SESSION['role_id'], $GLOBALS['user']['ordenar']) ? 'active' : 'disabled' ?>"
                        href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Ordenar
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= URL ?>user/ordenar/1/<?= $_SESSION["csrf_token"] ?>">Id</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>user/ordenar/2/<?= $_SESSION["csrf_token"] ?>">Nombre</a></li>
                        <li><a class="dropdown-item" href="<?= URL ?>user/ordenar/3/<?= $_SESSION["csrf_token"] ?>">Email</a></li>
                    </ul>
                </li>

            </ul>
            <form class="d-flex" role="search" action="<?= URL ?>user/filtrar" method="GET">

                <!-- protección CSRF -->
                <input type="hidden" name="csrf_token"
                    value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '') ?>">

                <!-- expresión    -->
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="expresion" required>

                <!-- botones de accion -->
                <button class="btn btn-outline-primary 
                <?= in_array($_SESSION['role_id'], $GLOBALS['user']['filtrar']) ? null : 'disabled' ?>"
                    type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>
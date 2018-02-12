<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        Dashboard
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-bell mr-2"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $userInfo['email']; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item dropdown-item-custom" href="#">
                        <i class="fas fa-user mr-2"></i>Perfil
                    </a>
                    <a class="dropdown-item dropdown-item-custom" href="#">
                        <i class="fas fa-cog mr-2"></i>Preferencias
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item dropdown-item-custom" href="<?php echo BASE_URL.'user/logout'; ?>">
                        <i class="fas fa-sign-out-alt mr-2"></i>Sair
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <img src="<?php echo BASE_URL.'assets/images/users/'.$userInf['photograph']; ?>" alt="<?php echo $userInfo['name']; ?>" class="rounded-circle">
            </li>
        </ul>
    </div>
</nav>
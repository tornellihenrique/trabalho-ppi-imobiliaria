<?php

if (!Login::isLoggedIn()) {
    $url = BASEDIR;

    header("Location: $url");
}

if (isset($_GET['logout'])) {
    Login::logout();

    $url = BASEDIR;
    header("Location: $url");
}

?>

<div class="pos-f-t">
    <nav class="navbar navbar-dark fixed-top bg-transparent">
        <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse"
            data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="collapse custom-navbar-collapse fixed-top" id="navbarToggleExternalContent">
        <div class="custom-menu-bg bg-dark vh-100 pt-3">
            <h6 class="text-white h4 pl-4">Menu</h6>
            <ul class="custom-menu mt-3">
                <li class="custom-menu-item pointer <?php if ($_GET['url'] == 'admin') { echo "custom-menu-item-active"; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>admin">
                        Home
                    </a>
                </li>
                <li class="custom-menu-item pointer <?php if ($_GET['url'] == 'register-employee') { echo "custom-menu-item-active"; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>register-employee">
                        Cadastro de funcionários
                    </a>
                </li>
                <li class="custom-menu-item pointer <?php if ($_GET['url'] == 'register-customer') { echo "custom-menu-item-active"; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>register-customer">
                        Cadastro de clientes
                    </a>
                </li>
                <li class="custom-menu-item pointer <?php if ($_GET['url'] == 'register-realty') { echo "custom-menu-item-active"; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>register-realty">
                        Cadastro de imóveis
                    </a>
                </li>
                <li class="custom-menu-item pointer <?php if ($_GET['url'] == 'list-employee') { echo "custom-menu-item-active"; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>list-employee">
                        Listagem dos funcionários
                    </a>
                </li>
                <li class="custom-menu-item pointer <?php if ($_GET['url'] == 'list-customer') { echo "custom-menu-item-active"; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>list-customer">
                        Listagem dos clientes
                    </a>
                </li>
                <li class="custom-menu-item pointer <?php if ($_GET['url'] == 'list-realty') { echo "custom-menu-item-active"; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>list-realty">
                        Listagem dos imóveis
                    </a>
                </li>
                <li class="custom-menu-item pointer <?php if ($_GET['url'] == 'list-messages') { echo "custom-menu-item-active"; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>list-messages">
                        Listagem dos interesses dos usuários nos imóveis
                    </a>
                </li>
                <li class="custom-menu-item pointer">
                    <a class="text-decoration-none text-white d-block px-3 py-2 pointer" onclick="logout()">
                        Sair
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    function logout() {
        window.location.href = '?logout';
    }
</script>
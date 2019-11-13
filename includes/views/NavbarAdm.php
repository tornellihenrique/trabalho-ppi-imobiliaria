<?php

$homeUrl = BASEDIR;

$isHome = $_GET['url'] == 'admin';
$isRegisterEmployee = $_GET['url'] == 'register-employee';
$isRegisterCustomer = $_GET['url'] == 'register-customer';
$isRegisterRealty = $_GET['url'] == 'register-realty';
$isListEmployee = $_GET['url'] == 'list-employee';
$isListCustomer = $_GET['url'] == 'list-customer';
$isListRealty = $_GET['url'] == 'list-realty';
$isListMessages = $_GET['url'] == 'list-messages';

if (isset($_GET['logout'])) {
    Login::logout();
}

?>

<script>
if (<?php if (Login::isLoggedIn()) { echo "false"; } else { echo "true"; } ?> || window.location.href.includes('logout')) {
    window.location.href = '<?=$homeUrl?>';
}
</script>

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
                <li class="custom-menu-item pointer <?php if ($isHome) { echo 'custom-menu-item-active'; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>admin">
                        Home
                    </a>
                </li>
                <li class="custom-menu-item pointer <?php if ($isRegisterEmployee) { echo 'custom-menu-item-active'; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>register-employee">
                        Cadastro de funcionários
                    </a>
                </li>
                <li class="custom-menu-item pointer <?php if ($isRegisterCustomer) { echo 'custom-menu-item-active'; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>register-customer">
                        Cadastro de clientes
                    </a>
                </li>
                <li class="custom-menu-item pointer <?php if ($isRegisterRealty) { echo 'custom-menu-item-active'; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>register-realty">
                        Cadastro de imóveis
                    </a>
                </li>
                <li class="custom-menu-item pointer <?php if ($isListEmployee) { echo 'custom-menu-item-active'; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>list-employee">
                        Listagem dos funcionários
                    </a>
                </li>
                <li class="custom-menu-item pointer <?php if ($isListCustomer) { echo 'custom-menu-item-active'; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>list-customer">
                        Listagem dos clientes
                    </a>
                </li>
                <li class="custom-menu-item pointer <?php if ($isListRealty) { echo 'custom-menu-item-active'; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>list-realty">
                        Listagem dos imóveis
                    </a>
                </li>
                <li class="custom-menu-item pointer <?php if ($isListMessages) { echo 'custom-menu-item-active'; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>list-messages">
                        Listagem dos interesses dos usuários nos imóveis
                    </a>
                </li>
                <li class="custom-menu-item pointer">
                    <a class="text-decoration-none text-white d-block px-3 py-2 pointer" onclick="gotHome()">
                        Voltar
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

    function gotHome() {
        window.location.href = '<?php echo BASEDIR; ?>';
    }
</script>
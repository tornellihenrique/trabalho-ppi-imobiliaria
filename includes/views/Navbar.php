<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (Login::loginUser($username, $password)) {
            $url = BASEDIR . 'admin';

            echo "
            <script>
                $(document).ready(function(){
                    window.open('$url', '_blank')
                })
            </script>
            ";
        }
    }
}

if (isset($_GET['logout'])) {
    Login::logout();

    $url = BASEDIR;
    header("Location: $url");
}

?>
<div class="pos-f-t">
    <nav class="navbar navbar-dark fixed-top bg-transparent">
        <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        if ($_GET['url'] == 'search') {
            echo <<<HTML
                <button class="searchbar-toggler bg-dark" type="button" data-toggle="collapse"
                    data-target="#searchbarToggleExternalContent" aria-controls="searchbarToggleExternalContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-search align-middle text-white"></i>
                </button>
            HTML;
        }
        ?>
    </nav>
    <div class="collapse custom-navbar-collapse fixed-top" id="navbarToggleExternalContent">
        <div class="custom-menu-bg bg-dark vh-100 pt-3">
            <h6 class="text-white h4 pl-4">Menu</h6>
            <ul class="custom-menu mt-3">
                <?php
                if (!Login::isLoggedIn()) {
                    echo '
                    <li class="custom-menu-item pointer" onclick="openLoginModal()">
                        <a class="text-decoration-none text-white d-block px-3 py-2">Login</a>
                    </li>
                    ';
                }
                ?>
                <li class="custom-menu-item pointer <?php if ($_GET['url'] == 'index.php') { echo "custom-menu-item-active"; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>">Home</a>
                </li>
                <li class="custom-menu-item pointer <?php if ($_GET['url'] == 'search') { echo "custom-menu-item-active"; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>search">Busca de imóveis</a>
                </li>
                <li class="custom-menu-item pointer <?php if ($_GET['url'] == 'contact') { echo "custom-menu-item-active"; } ?>">
                    <a class="text-decoration-none text-white d-block px-3 py-2" href="<?=BASEDIR?>contact">Contato</a>
                </li>
                <?php
                if (Login::isLoggedIn()) {
                    echo '
                    <li class="custom-menu-item pointer" onclick="logout()">
                        <a class="text-decoration-none text-white d-block px-3 py-2">Sair</a>
                    </li>
                    ';
                }
                ?>
            </ul>
        </div>
    </div>

    <?php
if ($_GET['url'] == 'search') {
    echo <<<HTML
            <div class="collapse custom-searchbar-collapse" id="searchbarToggleExternalContent">
                <div class="bg-dark vh-100 pt-3 text-white">
                    <h5 class="pl-4 pb-3 bg-secondary search-title font-weight-bolder">Pesquisa de imóveis</h5>
                    <div class="px-4 h-100">
                        <form action="" method="GET" class="h-100">
                            <div class="d-flex justify-content-between mt-4">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="aquisition" name="purpose" value="aquisition"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="aquisition">Aquisição</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="location" name="purpose" value="location"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="location">Locação</label>
                                </div>
                            </div>
                            <div class="mt-3">
                                <select class="custom-select" name="neighborhood">
                                    <option selected disabled>Bairro</option>
                                    <option value="1">Santa Mônica</option>
                                    <option value="2">Centro</option>
                                    <option value="3">Santa Luzia</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <div class="d-flex align-items-baseline mb-2">
                                    <label for="minValue" class="w-50 mb-0">Valor mínimo</label>
                                    <div class="input-group w-50">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="currency">R$</span>
                                        </div>
                                        <input type="number" class="form-control" id="minValue" min="0" max="200000"
                                            value="0" name="minValue">
                                    </div>
                                </div>
                                <input type="range" class="custom-range input-range-min" min="0" max="200000" step="100"
                                    value="0" aria-describedby="currency">
                            </div>
                            <div class="mt-3">
                                <div class="d-flex align-items-baseline mb-2">
                                    <label for="maxValue" class="w-50 mb-0">Valor máximo</label>
                                    <div class="input-group w-50">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="currency">R$</span>
                                        </div>
                                        <input type="number" class="form-control" id="maxValue" min="0" max="200000"
                                            value="0" name="maxValue">
                                    </div>
                                </div>
                                <input type="range" class="custom-range input-range-max" min="0" max="200000" step="100"
                                    value="0" aria-describedby="currency">
                            </div>
                            <div class="mt-3">
                                <input type="text" class="form-control" id="tags" name="tags"
                                    placeholder="Outras informações">
                            </div>
                            <div class="pull-bottom mb-3 px-4 d-flex justify-content-between w-100">
                                <button type="reset" class="btn btn-secondary">Limpar</button>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        HTML;
}
?>
</div>
<?php

if (!Login::isLoggedIn()) {
    echo '
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username">Endereço de Email</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="joaquim" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="**********" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                            <button type="reset" class="btn btn-secondary">Limpar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    ';
}

?>

<script>
    function openLoginModal() {
        $('#loginModal').modal('show');
    }

    function logout() {
        window.location.href = '?logout';
    }

    function goToAdm() {
        var win = window.open('adm.html', '_blank');
        win.focus();
    }
</script>

<?php
if ($_GET['url'] == 'search') {
    echo <<<HTML
    <script>
        var range1 = document.querySelector('.input-range-min')
        var field1 = document.getElementById('minValue')
        var range2 = document.querySelector('.input-range-max')
        var field2 = document.getElementById('maxValue')

        range1.addEventListener('input', function (e) {
            field1.value = e.target.value
        })
        field1.addEventListener('input', function (e) {
            range1.value = e.target.value
        })

        range2.addEventListener('input', function (e) {
            field2.value = e.target.value
        })
        field2.addEventListener('input', function (e) {
            range2.value = e.target.value
        })

        function updateValue(e) {
            var sibling = e.target.previousElementSibling || e.target.nextElementSibling
            sibling.value = e.target.value
        }
    </script>
HTML;
}
?>
<div class="pos-f-t">
    <nav class="navbar navbar-dark fixed-top bg-transparent">
        <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="collapse custom-navbar-collapse fixed-top" id="navbarToggleExternalContent">
        <div class="custom-menu-bg bg-dark vh-100 pt-3">
            <h6 class="text-white h4 pl-4">Menu</h6>
            <ul class="custom-menu mt-3">
                <li class="custom-menu-item px-3 py-2 pointer" onclick="openLoginModal()">
                    <a class="text-decoration-none text-white">Login</a>
                </li>
                <li class="custom-menu-item px-3 py-2 pointer">
                    <a class="text-decoration-none text-white" href="/">Home</a>
                </li>
                <li class="custom-menu-item px-3 py-2 pointer">
                    <a class="text-decoration-none text-white" href="/search">Busca de imóveis</a>
                </li>
                <li class="custom-menu-item px-3 py-2 pointer">
                    <a class="text-decoration-none text-white" href="/contact">Contato</a>
                </li>
            </ul>
        </div>
    </div>
</div>

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
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Endereço de Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="joaquim@email.com" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="**********" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary" onclick="goToAdm()">Entrar</button>
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openLoginModal() {
        $('#loginModal').modal('show');
    }

    function goToAdm() {
        var win = window.open('adm.html', '_blank');
        win.focus();
    }
</script>
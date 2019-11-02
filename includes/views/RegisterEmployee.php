<?php

$jobs = static::loadJobs();

$ufs = static::loadUfs();

$neighborhoods = static::loadNeighborhoods();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
    $job = isset($_POST['job']) ? $_POST['job'] : null;
    $tel1 = isset($_POST['tel1']) ? $_POST['tel1'] : null;
    $tel2 = isset($_POST['tel2']) ? $_POST['tel2'] : null;
    $dateadm = isset($_POST['dateadm']) ? $_POST['dateadm'] : null;
    $salary = isset($_POST['salary']) ? $_POST['salary'] : null;
    $cep = isset($_POST['cep']) ? str_replace("-", "", str_replace(".", "", $_POST['cep'])) : null;
    $street = isset($_POST['street']) ? $_POST['street'] : null;
    $house_number = isset($_POST['number']) ? $_POST['number'] : null;
    $neighborhood = isset($_POST['neighborhood']) ? $_POST['neighborhood'] : null;
    $city = isset($_POST['city']) ? $_POST['city'] : null;
    $uf = isset($_POST['uf']) ? $_POST['uf'] : null;
    $user = isset($_POST['user']) ? $_POST['user'] : null;
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;

    static::createEmployee($name, $cpf, $job, $tel1, $tel2, $dateadm, $salary, $cep, $street, $house_number, $neighborhood, $city, $uf, $user, $password);
}

?>

<div class="container mt-5 pt-3">
    <section>
        <h2 class="text-center">Cadastro de Funcionários</h2>
        <div class="mt-4">
            <form name="formFunc" method="POST" action="">
                <div class="form-row">
                    <div class="form-group col-12 col-md-4">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Joaquim da Silva">
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="123.456.789-00">
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <label for="job">Cargo</label>
                        <select class="form-control" id="job" name="job">
                            <option selected disabled>Selecione um cargo</option>
                            <?php
                            foreach ($jobs as $job) {
                                $id = $job['id'];
                                $desc = $job['descricao'];
                                echo "<option value='$id'>$desc</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-3">
                        <label for="tel1">Telefone Contato</label>
                        <input type="text" class="form-control" id="tel1" name="tel1" placeholder="(69) 4002-8922">
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label for="tel2">Telefone Celular</label>
                        <input type="text" class="form-control" id="tel2" name="tel2" placeholder="(34) 99174-0220">
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label for="dateadm">Data de admissão</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                </span>
                            </div>
                            <input type="date" class="form-control" name="dateadm" id="dateadm" placeholder="10/10/1990">
                        </div>
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label for="salary">Salário</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input type="number" name="salary" id="salary" class="form-control" placeholder="500">
                            <div class="input-group-append">
                                <span class="input-group-text">,00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4 col-12">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" placeholder="39.408-724">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="street">Rua</label>
                        <input type="text" class="form-control" name="street" id="street" placeholder="Rua dos Bobos">
                    </div>
                    <div class="form-group col-md-2 col-12">
                        <label for="number">Número</label>
                        <input type="text" class="form-control" name="number" id="number" placeholder="123">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="neighborhood">Bairro</label>
                        <select id="neighborhood" name="neighborhood" class="form-control">
                            <option disabled selected>Selecione um bairro</option>
                            <?php
                            foreach ($neighborhoods as $neighborhood) {
                                $id = $neighborhood['id'];
                                $name = $neighborhood['nome'];
                                echo "<option value='$id'>$name</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="city">Cidade</label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="Uberlândia">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="uf">Estado</label>
                        <select id="uf" name="uf" class="form-control">
                            <option disabled selected>Selecione um estado</option>
                            <?php
                            foreach ($ufs as $uf) {
                                $id = $uf['sigla'];
                                $name = $uf['nome'];
                                echo "<option value='$id'>$name</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="user">Usuário</label>
                        <input type="text" class="form-control" id="user" name="user" placeholder="joaquim123" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <button type="reset" class="btn btn-secondary">Limpar</button>
                </div>
            </form>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $("#cpf").mask('000.000.000-00', {
            reverse: false
        });

        $("#cep").mask('00.000-000', {
            reverse: false
        });

        $("#tel1").mask('(00) 0000-0000', {
            reverse: false
        });

        $("#tel2").mask('(00) 00000-0000', {
            reverse: false
        });

        $("#cep").keyup(function(e) {
            if ($(this).val().length == 10) {
                var cep = $(this).val().replace('.', '').replace('-', '');

                $.ajax({
                    url: 'https://viacep.com.br/ws/' + cep + '/json/unicode/',
                    dataType: 'json',
                    success: function(res) {
                        $("#city").val(res.localidade);
                        $("#street").val(res.logradouro);
                        $("#uf").val(res.uf);
                        $("#number").focus();
                    }
                });

            }
        });
    });
</script>
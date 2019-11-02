<?php

$ufs = static::loadUfs();

$neighborhoods = static::loadNeighborhoods();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $cpf = isset($_POST['cpf']) ? str_replace("-", "", str_replace(".", "", $_POST['cpf'])) : null;
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $tel1 = isset($_POST['tel1']) ? $_POST['tel1'] : null;
    $tel2 = isset($_POST['tel2']) ? $_POST['tel2'] : null;
    $cst = isset($_POST['cst']) ? $_POST['cst'] : null;
    $profession = isset($_POST['profession']) ? $_POST['profession'] : null;
    $cep = isset($_POST['cep']) ? str_replace("-", "", str_replace(".", "", $_POST['cep'])) : null;
    $street = isset($_POST['street']) ? $_POST['street'] : null;
    $house_number = isset($_POST['number']) ? $_POST['number'] : null;
    $neighborhood = isset($_POST['neighborhood']) ? $_POST['neighborhood'] : null;
    $city = isset($_POST['city']) ? $_POST['city'] : null;
    $uf = isset($_POST['uf']) ? $_POST['uf'] : null;

    static::createCustomer($name, $cpf, $gender, $email, $tel1, $tel2, $cst, $profession, $cep, $street, $house_number, $neighborhood, $city, $uf);
}

?>

<div class="container mt-5 pt-3 adm-container">
    <section>
        <h2 class="text-center">Cadastro de Clientes</h2>
        <div class="mt-4">
            <form name="formClientes" method="POST" action="">
                <div class="form-row">
                    <div class="form-group col-12 col-md-4">
                        <label for="name">Nome <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Joaquim da Silva" required>
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <label for="cpf">CPF <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="123.456.789-00" required>
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <label for="gender">Sexo</label>
                        <select class="form-control" id="gender" name="gender">
                            <option disabled selected>Selecione um sexo</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Endereço de Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="joaquim@email.com">
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
                        <label for="cst">Estado Civil</label>
                        <select class="form-control" id="cst" name="cst">
                            <option value="Solteiro">Solteiro</option>
                            <option value="Namorando">Namorando</option>
                            <option value="Casado">Casado</option>
                            <option value="Divorciado">Divorciado</option>
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label for="profession">Profissão</label>
                        <input type="text" class="form-control" id="profession" name="profession" placeholder="Engenheiro">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4 col-12">
                        <label for="cep">CEP <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="cep" name="cep" placeholder="39.408-724" required>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="street">Rua <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="street" id="street" placeholder="Rua dos Bobos" required>
                    </div>
                    <div class="form-group col-md-2 col-12">
                        <label for="number">Número <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="number" id="number" placeholder="123" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="neighborhood">Bairro <span class="text-danger">*</span></label>
                        <select id="neighborhood" name="neighborhood" class="form-control" required>
                            <option value="" disabled selected>Selecione um bairro</option>
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
                        <label for="city">Cidade <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="Uberlândia" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="uf">Estado <span class="text-danger">*</span></label>
                        <select id="uf" name="uf" class="form-control" required>
                            <option value="" disabled selected>Selecione um estado</option>
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
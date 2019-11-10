<?php

$ufs = static::loadUfs();

$neighborhoods = static::loadNeighborhoods();

$customers = static::loadCustomers();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cep = isset($_POST['cep']) ? str_replace("-", "", str_replace(".", "", $_POST['cep'])) : null;
    $street = isset($_POST['street']) ? $_POST['street'] : null;
    $house_number = isset($_POST['number']) ? $_POST['number'] : null;
    $neighborhood = isset($_POST['neighborhood']) ? $_POST['neighborhood'] : null;
    $city = isset($_POST['city']) ? $_POST['city'] : null;
    $uf = isset($_POST['uf']) ? $_POST['uf'] : null;

    $category = isset($_POST['category']) ? $_POST['category'] : null;
    $available = isset($_POST['available']) ? $_POST['available'] : null;
    $customer = isset($_POST['customer']) ? $_POST['customer'] : null;
    $pictures = isset($_FILES['pictures']) ? $_FILES['pictures'] : null;
    $cost = isset($_POST['cost']) ? $_POST['cost'] : null;
    $description = isset($_POST['description']) ? $_POST['description'] : null;

    if (isset($_POST['realtyType'])) {
        $realtyType = $_POST['realtyType'];

        switch ($realtyType) {
            case "1":
                // CASA
                $qtdquartos = isset($_POST['qtdquartos']) ? $_POST['qtdquartos'] : null;
                $qtdsuites = isset($_POST['qtdsuites']) ? $_POST['qtdsuites'] : null;
                $qtdsalaestar = isset($_POST['qtdsalaestar']) ? $_POST['qtdsalaestar'] : null;
                $qtdsalajantar = isset($_POST['qtdsalajantar']) ? $_POST['qtdsalajantar'] : null;
                $qtdvagasgaragem = isset($_POST['qtdvagasgaragem']) ? $_POST['qtdvagasgaragem'] : null;
                $areaCasa = isset($_POST['areaCasaAp']) ? $_POST['areaCasaAp'] : null;
                $armarioemb = isset($_POST['armarioemb']) ? $_POST['armarioemb'] : null;

                static::createHouse($cep, $street, $house_number, $neighborhood, $city, $uf, $category, $available, $customer, $pictures, $cost, $qtdquartos, $qtdsuites, $qtdsalaestar, $qtdsalajantar, $qtdvagasgaragem, $areaCasa, $armarioemb, $description);
                break;
            
            case "2":
                // APARTAMENTO
                $qtdquartos = isset($_POST['qtdquartos']) ? $_POST['qtdquartos'] : null;
                $qtdsuites = isset($_POST['qtdsuites']) ? $_POST['qtdsuites'] : null;
                $qtdsalaestar = isset($_POST['qtdsalaestar']) ? $_POST['qtdsalaestar'] : null;
                $qtdsalajantar = isset($_POST['qtdsalajantar']) ? $_POST['qtdsalajantar'] : null;
                $qtdvagasgaragem = isset($_POST['qtdvagasgaragem']) ? $_POST['qtdvagasgaragem'] : null;
                $areaAp = isset($_POST['areaCasaAp']) ? $_POST['areaCasaAp'] : null;
                $armarioemb = isset($_POST['armarioemb']) ? $_POST['armarioemb'] : null;
                $floor = isset($_POST['floor']) ? $_POST['floor'] : null;
                $valorcond = isset($_POST['valorcond']) ? $_POST['valorcond'] : null;
                $portaria24hrs = isset($_POST['portaria24hrs']) ? $_POST['portaria24hrs'] : null;

                static::createApartment($cep, $street, $house_number, $neighborhood, $city, $uf, $category, $available, $customer, $pictures, $cost, $qtdquartos, $qtdsuites, $qtdsalaestar, $qtdsalajantar, $qtdvagasgaragem, $areaAp, $armarioemb, $description, $floor, $valorcond, $portaria24hrs);
                break;

            case "3":
                // Sala comercial
                $areaSalaC = isset($_POST['areaSalaC']) ? $_POST['areaSalaC'] : null;
                $qtdbanheiros = isset($_POST['qtdbanheiros']) ? $_POST['qtdbanheiros'] : null;
                $qtdcomodos = isset($_POST['qtdcomodos']) ? $_POST['qtdcomodos'] : null;

                static::createCommercialRoom($cep, $street, $house_number, $neighborhood, $city, $uf, $category, $available, $customer, $pictures, $cost, $areaSalaC, $qtdbanheiros, $qtdcomodos, $description);
                break;

            case "4":
                // Terreno
                $largura = isset($_POST['largura']) ? $_POST['largura'] : null;
                $comprimento = isset($_POST['comprimento']) ? $_POST['comprimento'] : null;
                $aclive = isset($_POST['aclive']) ? $_POST['aclive'] : null;

                static::createTerrain($cep, $street, $house_number, $neighborhood, $city, $uf, $category, $available, $customer, $pictures, $cost, $largura, $comprimento, $aclive, $description);
                break;
        }
    }
}

?>

    <div class="container mt-5 pt-3 adm-container">
        <section>
            <h2 class="text-center">Cadastro de Imóvel</h2>
            <div class="mt-4">
                <form name="formImoveis" method="POST" action="" enctype="multipart/form-data">
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
                    <div class="form-row">
                        <div class="form-group col-12 col-md-4">
                            <label for="category">Categoria <span class="text-danger">*</span></label>
                            <div class="d-flex align-items-center form-control-heigth">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="category" id="aquisition" value="A" required>
                                    <label class="form-check-label" for="aquisition">Aquisição</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="category" id="location" value="L">
                                    <label class="form-check-label" for="location">Locação</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <label for="available">Disponibilidade <span class="text-danger">*</span></label>
                            <div class="d-flex align-items-center form-control-heigth">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="available" id="a" value="1" required>
                                    <label class="form-check-label" for="a">Disponível</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="available" id="o" value="0">
                                    <label class="form-check-label" for="o">Ocupado</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <label for="cost">Valor</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input type="number" class="form-control" id="cost" min="0" max="200000" value="0" name="cost">
                                <div class="input-group-append">
                                    <span class="input-group-text">,00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 col-md-4">
                            <label for="customer">Cliente proprietário <span class="text-danger">*</span></label>
                            <select id="customer" name="customer" class="form-control" required>
                                <option value="" selected disabled>Selecione um cliente</option>
                                <?php
                                foreach ($customers as $customer) {
                                    $cpf = $customer['cpf'];
                                    $name = $customer['nome'];
                                    echo "<option value='$cpf'>$name</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <label for="pictures">Fotos do imóvel <span class="text-danger">*</span></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="pictures[]" id="pictures" multiple required>
                                <label class="custom-file-label cut-text" for="pictures">Selecione as fotos</label>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <label for="realtyType">Tipo <span class="text-danger">*</span></label>
                            <select id="realtyType" name="realtyType" class="form-control" required>
                                <option value="" selected disabled>Selecione o tipo de imóvel</option>
                                <option value="1">Casa</option>
                                <option value="2">Apartamento</option>
                                <option value="3">Sala comercial</option>
                                <option value="4">Terreno</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea class="form-control" id="description" name="description" cols="4"></textarea>
                    </div>
                    <div id="infoImoveisDin1" class="d-none">
                        <div class="form-row">
                            <div class="form-group col-6 col-md-3">
                                <label for="qtdquartos">Quantidade de quartos</label>
                                <input type="number" class="form-control" name="qtdquartos" id="qtdquartos" min="0" max="20">
                            </div>
                            <div class="form-group col-6 col-md-3">
                                <label for="qtdsuites">Quantidade de suítes</label>
                                <input type="number" class="form-control" name="qtdsuites" id="qtdsuites" min="0" max="20">
                            </div>
                            <div class="form-group col-6 col-md-3">
                                <label for="qtdsalaestar">Quantidade de salas de estar</label>
                                <input type="number" class="form-control" name="qtdsalaestar" id="qtdsalaestar" min="0" max="20">
                            </div>
                            <div class="form-group col-6 col-md-3">
                                <label for="qtdsalajantar">Quantidade de salas de jantar</label>
                                <input type="number" class="form-control" name="qtdsalajantar" id="qtdsalajantar" min="0" max="20">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-4">
                                <label for="qtdvagasgaragem">Vagas na garagem</label>
                                <input type="number" class="form-control" name="qtdvagasgaragem" id="qtdvagasgaragem" min="0" max="20">
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="areaCasaAp">Área</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="areaCasaAp" id="areaCasaAp" min="0">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="m2">m²</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label>Armario embutido</label>
                                <div class="d-flex align-items-center justify-content-between form-control-heigth">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="armarioemb" id="armarioembSim" value="1">
                                        <label class="form-check-label" for="armarioembSim">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="armarioemb" id="armarioembNao" value="0">
                                        <label class="form-check-label" for="armarioembNao">Não</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="infoImoveisDin2" class="d-none">
                        <div class="form-row">
                            <div class="form-group col-12 col-md-4">
                                <label for="floor">Andar</label>
                                <input type="number" class="form-control" name="floor" id="floor" min="0">
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="valorcond">Valor condomínio</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="currency">R$</span>
                                    </div>
                                    <input type="number" class="form-control" id="valorcond" min="0" max="200000" value="0" name="valorcond">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="cents">,00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label>Portaria 20 horas</label>
                                <div class="d-flex align-items-center justify-content-between form-control-heigth">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="portaria24hrs" id="portaria24hrsSim" value="1">
                                        <label class="form-check-label" for="portaria24hrsSim">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="portaria24hrs" id="portaria24hrsNao" value="0">
                                        <label class="form-check-label" for="portaria24hrsNao">Não</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="infoImoveisDin3" class="d-none">
                        <div class="form-row">
                            <div class="form-group col-12 col-md-4">
                                <label for="areaSalaC">Área</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="areaSalaC" id="areaSalaC" min="0">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="m2">m²</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6 col-md-4">
                                <label for="qtdbanheiros">Quantidade de banheiros</label>
                                <input type="number" class="form-control" name="qtdbanheiros" id="qtdbanheiros" min="0" max="20">
                            </div>
                            <div class="form-group col-6 col-md-4">
                                <label for="qtdcomodos">Quantidade de cômodos</label>
                                <input type="number" class="form-control" name="qtdcomodos" id="qtdcomodos" min="0" max="20">
                            </div>
                        </div>
                    </div>
                    <div id="infoImoveisDin4" class="d-none">
                        <div class="form-row">
                            <div class="form-group col-12 col-md-4">
                                <label for="largura">Largura</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="largura" id="largura" min="0">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="m2">m²</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="comprimento">Comprimento</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="comprimento" id="comprimento" min="0">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="m2">m²</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="aclive">Possui aclive/declive</label>
                                <div class="d-flex align-items-center justify-content-between form-control-heigth">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="aclive" id="acliveSim" value="1">
                                        <label class="form-check-label" for="acliveSim">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="aclive" id="acliveNao" value="0">
                                        <label class="form-check-label" for="acliveNao">Não</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            $("#cep").mask('00.000-000', {
                reverse: false
            });

            $("#cep").keyup(function(e) {
                if ($(this).val().length == 10) {
                    var cep = $(this).val().replace('.', '').replace('-', '');

                    $.ajax({
                        url: '<?php echo BASEDIR; ?>api/search-cep.php?cep=' + cep,
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

        $('#pictures').change(function(e) {
            var files = [];
            for (var i = 0; i < $(this)[0].files.length; i++) {
                files.push($(this)[0].files[i].name);
            }
            $(this).next('.custom-file-label').html(files.join(', '));
        });

        function show(id) {
            $(`#${id}`).removeClass('d-none');
            $(`#${id}`).removeClass('d-block');
            $(`#${id}`).addClass('d-block');
        }

        function hide(id) {
            $(`#${id}`).removeClass('d-none');
            $(`#${id}`).removeClass('d-block');
            $(`#${id}`).addClass('d-none');
        }

        $('#realtyType').change(function(e) {
            var realtyType = $('#realtyType').val();

            switch (realtyType) {
                case "1": {
                    show('infoImoveisDin1');
                    hide('infoImoveisDin2');
                    hide('infoImoveisDin3');
                    hide('infoImoveisDin4');
                    break;
                }
                case "2": {
                    show('infoImoveisDin1');
                    show('infoImoveisDin2');
                    hide('infoImoveisDin3');
                    hide('infoImoveisDin4');
                    break;
                }
                case "3": {
                    hide('infoImoveisDin1');
                    hide('infoImoveisDin2');
                    show('infoImoveisDin3');
                    hide('infoImoveisDin4');
                    break;
                }
                case "4": {
                    hide('infoImoveisDin1');
                    hide('infoImoveisDin2');
                    hide('infoImoveisDin3');
                    show('infoImoveisDin4');
                    break;
                }
                default: {
                    hide('infoImoveisDin1');
                    hide('infoImoveisDin2');
                    hide('infoImoveisDin3');
                    hide('infoImoveisDin4');
                }
            }
        });
    </script>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['realtyID'])) {
        $realtyID = intval($_POST['realtyID']);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $proposal = $_POST['proposal'];

        static::sendMessage($realtyID, $name, $email, $phone, $proposal);
    }
}

$purpose = $neighborhood = $minValue = $maxValue = $tags = NULL;

if (isset($_GET['purpose'])) {
    $purpose = $_GET['purpose'];
}

if (isset($_GET['neighborhood'])) {
    $neighborhood = $_GET['neighborhood'];
}

if (isset($_GET['minValue']) && isset($_GET['maxValue'])) {
    $minValue = $_GET['minValue'];
    $maxValue = $_GET['maxValue'];
    if ($minValue == 0 ) {
        $minValue = NULL;
    }
    if ($maxValue == 0 ) {
        $maxValue = NULL;
    }
}

if (isset($_GET['tags'])) {
    $tags = $_GET['tags'];
}

$realties = static::searchRealties($purpose, $neighborhood, $minValue, $maxValue, $tags);
foreach ($realties as $i => $r) {
    $id = $r['id'];
    $pics = static::searchPictures($id);
    $realties[$i]['pictures'] = $pics;
}

?>

<div class="container-fluid mt-5 pt-3 search-container">
    <section>
        <h2 class="text-center">Resultado de busca</h2>
        <div class="mt-4">
            <?php
            if (count($realties) == 0) {
            ?>
            <h6 class="text-center">Nenhum imóvel encontrado</h6>
            <?php
            }
            ?>
            <div class="row">
                <?php
                foreach ($realties as $r) {
                    $idImovel = $r['id'];
                    $idTipoImovel = $r['id_tipo_imovel'];
                    $tipoImovel = $r['tipo_imovel'];
                    $imagens = $r['pictures'];

                    $categoria = $r['categoria'] == "A" ? "Aquisição" : "Locação";
                    $disponivel = $r['disponivel'] ? "Disponível" : "Ocupado";
                    $valor = $r['valor'];
                    $descricao = $r['descricao'];

                    $cquartos = $r['cquartos'];
                    $csuites = $r['csuites'];
                    $csalaEestar = $r['csala_estar'];
                    $cvagasGaragem = $r['cvagas_garagem'];
                    $carea = $r['carea'];
                    $carmEmb = $r['carm_emb'] ? "Sim" : "Não";

                    $aquartos = $r['aquartos'];
                    $asuites = $r['asuites'];
                    $asalaEstar = $r['asala_estar'];
                    $asalaJantar = $r['asala_jantar'];
                    $avagasGaragem = $r['avagas_garagem'];
                    $aarea = $r['aarea'];
                    $aarmEmb = $r['aarm_emb'];
                    $andar = $r['andar'];
                    $valorCondominio = $r['valor_condominio'];
                    $portaria24h = $r['portaria_24h'];

                    $scarea = $r['scarea'];
                    $scbanheiros = $r['scbanheiros'];
                    $sccomodos = $r['sccomodos'];

                    $largura = $r['largura'];
                    $comprimento = $r['comprimento'];
                    $possuiAclive = $r['possui_aclive'];

                    $rua = $r['rua'];
                    $numero = $r['numero'];
                    $cep = $r['cep'];
                    $cidade = $r['cidade'];
                    $estadoSigla = $r['estado_sigla'];
                    $bairro = $r['bairro'];
                ?>
                <div class="col-12 mb-4">
                    <div class="card realty-card">
                        <div class="row no-glutters">
                            <div class="col-sm-12 col-lg-3">
                                <div class="card-body h-100">
                                    <h5 class="card-title"><?=$categoria?> <?=$tipoImovel?></h5>
                                    <dl class="row">
                                        <dt class="col-6">Preço</dt>
                                        <dd class="col-6">R$ <?=$valor?></dd>
                                        <?php
                                        if ($idTipoImovel == 1 && $carea) {
                                        ?>
                                        <dt class="col-6">Número de quartos</dt>
                                        <dd class="col-6"><?=$cquartos?> quartos</dd>
                                        <dt class="col-6">Área construida</dt>
                                        <dd class="col-6"><?=$carea?> m²</dd>
                                        <?php
                                        }
                                        
                                        if ($idTipoImovel == 2 && $aarea) {
                                        ?>
                                        <dt class="col-6">Cômodos</dt>
                                        <dd class="col-6"><?=$aquartos?> quartos</dd>
                                        <dt class="col-6">Área construida</dt>
                                        <dd class="col-6"><?=$aarea?> m²</dd>
                                        <?php
                                        }
                                        
                                        if ($idTipoImovel == 3 && $scarea) {
                                        ?>
                                        <dt class="col-6">Número de cômodos</dt>
                                        <dd class="col-6"><?=$sccomodos?> cômodos</dd>
                                        <dt class="col-6">Área construida</dt>
                                        <dd class="col-6"><?=$scarea?> m²</dd>
                                        <?php
                                        }
                                        
                                        if ($idTipoImovel == 4 && $largura) {
                                        ?>
                                        <dt class="col-6">Largura</dt>
                                        <dd class="col-6"><?=$largura?> m</dd>
                                        <dt class="col-6">Comprimento</dt>
                                        <dd class="col-6"><?=$comprimento?> m</dd>
                                        <?php
                                        }
                                        ?>
                                    </dl>
                                    <a data-toggle="modal" data-target="#realtyModal<?=$idImovel?>"
                                        class="btn btn-primary pull-bottom ml-4 pointer">Tenho interesse</a>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-9 d-flex align-items-center">
                                <div class="row align-items-center mt-3">
                                    <div class="col-12 col-sm-6 col-md-4 mb-2">
                                        <img src="pictures/<?=$imagens[0]['file_name']?>" alt=""
                                            class="img-thumbnail img-hover-effect">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 mb-2">
                                        <img src="pictures/<?=$imagens[1]['file_name']?>" alt=""
                                            class="img-thumbnail img-hover-effect">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 mb-2">
                                        <img src="pictures/<?=$imagens[2]['file_name']?>" alt=""
                                            class="img-thumbnail img-hover-effect">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
</div>

<?php
foreach ($realties as $r) {
    $idImovel = $r['id'];
    $idTipoImovel = $r['id_tipo_imovel'];
    $tipoImovel = $r['tipo_imovel'];
    $imagens = $r['pictures'];

    $categoria = $r['categoria'] == "A" ? "Aquisição" : "Locação";
    $disponivel = $r['disponivel'] ? "Disponível" : "Ocupado";
    $valor = $r['valor'];
    $descricao = $r['descricao'];

    $cquartos = $r['cquartos'];
    $csuites = $r['csuites'];
    $csalaEstar = $r['csala_estar'];
    $csalaJantar = $r['csala_jantar'];
    $cvagasGaragem = $r['cvagas_garagem'];
    $carea = $r['carea'];
    $carmEmb = $r['carm_emb'] ? "Sim" : "Não";

    $aquartos = $r['aquartos'];
    $asuites = $r['asuites'];
    $asalaEstar = $r['asala_estar'];
    $asalaJantar = $r['asala_jantar'];
    $avagasGaragem = $r['avagas_garagem'];
    $aarea = $r['aarea'];
    $aarmEmb = $r['aarm_emb'];
    $andar = $r['andar'];
    $valorCondominio = $r['valor_condominio'];
    $portaria24h = $r['portaria_24h'] ? "Sim" : "Não";

    $scarea = $r['scarea'];
    $scbanheiros = $r['scbanheiros'];
    $sccomodos = $r['sccomodos'];

    $largura = $r['largura'];
    $comprimento = $r['comprimento'];
    $possuiAclive = $r['possui_aclive'] ? "Sim" : "Não";

    $rua = $r['rua'];
    $numero = $r['numero'];
    $cep = $r['cep'];
    $cidade = $r['cidade'];
    $estadoSigla = $r['estado_sigla'];
    $bairro = $r['bairro'];
?>
<div class="modal fade" id="realtyModal<?=$idImovel?>" tabindex="-1" role="dialog" aria-labelledby="realtyModalLabel<?=$idImovel?>" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="realty-info-tab" data-toggle="pill" href="#realty-info-<?=$idImovel?>" role="tab" aria-controls="realty-info-<?=$idImovel?>" aria-selected="true">Informações do imóvel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="pill" href="#contact-<?=$idImovel?>" role="tab" aria-controls="contact-<?=$idImovel?>" aria-selected="false">Contato</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent-<?=$idImovel?>">
                    <div class="tab-pane px-4 fade show active" id="realty-info-<?=$idImovel?>" role="tabpanel" aria-labelledby="realty-info-tab-<?=$idImovel?>">
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <h3 class="font-weight-bolder mb-0">R$ <?=$valor?></h3>
                            <span class="badge badge-pill badge-secondary realty-type"><?=$categoria?></span>
                        </div>
                        <div class="mt-3">
                            <div class="bd-example">
                                <div id="realty-images-<?=$idImovel?>" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                    <?php
                                    foreach ($imagens as $i => $pic) {
                                    ?>
                                        <li data-target="#realty-images-<?=$idImovel?>" data-slide-to="<?=$i?>"<?php if ($i == 0) { echo " class='active'"; } ?>></li>
                                    <?php
                                    }
                                    ?>
                                    </ol>
                                    <div class="carousel-inner">
                                    <?php
                                    foreach ($imagens as $i => $pic) {
                                    ?>
                                        <div class="carousel-item<?php if ($i == 0) { echo " active"; } ?>">
                                            <img src="pictures/<?=$pic['file_name']?>" class="d-block w-100 modal-img" alt="...">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#realty-images-<?=$idImovel?>" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                    <a class="carousel-control-next" href="#realty-images-<?=$idImovel?>" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Próximo</span>
                                    </a>
                                </div>
                                <?php
                                if ($descricao) {
                                ?>
                                <div class="mt-4">
                                    <h3>Descrição do imóvel</h3>
                                    <p class="text-muted"><?=$descricao?></p>
                                </div>
                                <?php
                                }
                                ?>

                                <?php
                                if ($idTipoImovel == 1) {
                                ?>
                                <div class="mt-4">
                                    <h3>Detalhes do imóvel</h3>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-key"></i></td>
                                                        <td>Identificação do Imóvel</td>
                                                        <td><?=$idImovel?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-money-bill-alt"></i></td>
                                                        <td>Preço</td>
                                                        <td>R$ <?=$valor?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-expand"></i></td>
                                                        <td>Área</td>
                                                        <td><?=$carea?> m²</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-bed"></i></td>
                                                        <td>Quartos</td>
                                                        <td><?=$cquartos?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-bath"></i></td>
                                                        <td>Suítes</td>
                                                        <td><?=$csuites?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-utensils"></i></td>
                                                        <td>Salas de estar</td>
                                                        <td><?=$csalaEstar?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-shower"></i></td>
                                                        <td>Salas de jantar</td>
                                                        <td><?=$csalaJantar?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-building"></i></td>
                                                        <td>Tipo</td>
                                                        <td><?=$tipoImovel?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-door-closed"></i></td>
                                                        <td>Armário embutido</td>
                                                        <td><?=$carmEmb?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-car"></i></td>
                                                        <td>Garagem</td>
                                                        <td><?=$cvagasGaragem?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>

                                <?php
                                if ($idTipoImovel == 2) {
                                ?>
                                <div class="mt-4">
                                    <h3>Detalhes do imóvel</h3>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-key"></i></td>
                                                        <td>Identificação do Imóvel</td>
                                                        <td><?=$idImovel?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-money-bill-alt"></i></td>
                                                        <td>Preço</td>
                                                        <td>R$ <?=$valor?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-expand"></i></td>
                                                        <td>Área</td>
                                                        <td><?=$aarea?> m²</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-bed"></i></td>
                                                        <td>Quartos</td>
                                                        <td><?=$aquartos?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-bath"></i></td>
                                                        <td>Suítes</td>
                                                        <td><?=$asuites?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-utensils"></i></td>
                                                        <td>Salas de estar</td>
                                                        <td><?=$asalaEstar?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-shower"></i></td>
                                                        <td>Salas de jantar</td>
                                                        <td><?=$asalaJantar?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-building"></i></td>
                                                        <td>Tipo</td>
                                                        <td><?=$tipoImovel?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-door-closed"></i></td>
                                                        <td>Armário embutido</td>
                                                        <td><?=$carmEmb?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-car"></i></td>
                                                        <td>Garagem</td>
                                                        <td><?=$avagasGaragem?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-city"></i></td>
                                                        <td>Valor do condomínio</td>
                                                        <td>R$ <?=$valorCondominio?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-clock"></i></td>
                                                        <td>Portaria 24hrs</td>
                                                        <td><?=$portaria24h?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-sort-numeric-up"></i></td>
                                                        <td>Andar</td>
                                                        <td><?=$andar?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>

                                <?php
                                if ($idTipoImovel == 3) {
                                ?>
                                <div class="mt-4">
                                    <h3>Detalhes do imóvel</h3>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-key"></i></td>
                                                        <td>Identificação do Imóvel</td>
                                                        <td><?=$idImovel?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-money-bill-alt"></i></td>
                                                        <td>Preço</td>
                                                        <td>R$ <?=$valor?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-expand"></i></td>
                                                        <td>Área</td>
                                                        <td><?=$scarea?> m²</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-shower"></i></td>
                                                        <td>Banheiros</td>
                                                        <td><?=$scbanheiros?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-building"></i></td>
                                                        <td>Tipo</td>
                                                        <td><?=$tipoImovel?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-door-closed"></i></td>
                                                        <td>Cômodos</td>
                                                        <td><?=$sccomodos?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>

                                <?php
                                if ($idTipoImovel == 4) {
                                ?>
                                <div class="mt-4">
                                    <h3>Detalhes do imóvel</h3>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-key"></i></td>
                                                        <td>Identificação do Imóvel</td>
                                                        <td><?=$idImovel?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-money-bill-alt"></i></td>
                                                        <td>Preço</td>
                                                        <td>R$ <?=$valor?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-building"></i></td>
                                                        <td>Tipo</td>
                                                        <td><?=$tipoImovel?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-ruler-horizontal"></i></td>
                                                        <td>Largura</td>
                                                        <td><?=$largura?> m</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-ruler-vertical"></i></td>
                                                        <td>Comprimento</td>
                                                        <td><?=$comprimento?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-mountain"></i></td>
                                                        <td>Possui aclive</td>
                                                        <td><?=$possuiAclive?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane px-4 fade" id="contact-<?=$idImovel?>" role="tabpanel" aria-labelledby="contact-tab-<?=$idImovel?>">
                        <h3 class="font-weight-bolder mb-0">Deixe seu contato</h3>
                        <form class="mt-3" action="" method="POST">
                            <div class="form-group">
                                <label for="name">Nome completo</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Joaquim da Silva">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="joaquim@email.com">
                            </div>
                            <div class="form-group">
                                <label for="phone-<?=$idImovel?>">Telefone</label>
                                <input type="text" class="form-control" id="phone-<?=$idImovel?>" name="phone" placeholder="(34) 99876-5432">
                            </div>
                            <div class="form-group">
                                <label for="proposal">Proposta</label>
                                <textarea class="form-control" id="proposal" name="proposal" rows="3"></textarea>
                            </div>
                            <input type="hidden" id="realtyID" name="realtyID" value="<?=$idImovel?>">
                            <div class="d-flex justify-content-between">
                                <button type="reset" class="btn btn-secondary">Limpar</button>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>

<script>
    $(document).ready(function() {
        <?php
        foreach ($realties as $r) {
            $idImovel = $r['id'];
        ?>
        $("#phone-<?=$idImovel?>").mask('(00) 00000-0000', {
            reverse: false
        });
        <?php
        }
        ?>
    });
</script>
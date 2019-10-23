<?php

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
    if ($minValue == 0 && $maxValue == 0) {
        $minValue = $maxValue = NULL;
    }
}

if (isset($_GET['tags'])) {
    $tags = $_GET['tags'];
}

?>

<div class="container-fluid mt-5 pt-3">
    <section>
        <h2 class="text-center">Resultado de busca</h2>
        <div class="mt-4">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card realty-card">
                        <div class="row no-glutters">
                            <div class="col-sm-12 col-lg-3">
                                <div class="card-body h-100">
                                    <h5 class="card-title">Título imóvel</h5>
                                    <dl class="row">
                                        <dt class="col-6">Preço</dt>
                                        <dd class="col-6">R$ 200.000,00</dd>
                                        <dt class="col-6">Número de quartos</dt>
                                        <dd class="col-6">3 quartos</dd>
                                        <dt class="col-6">Área construida</dt>
                                        <dd class="col-6">300 m²</dd>
                                    </dl>
                                    <a data-toggle="modal" data-target="#realtyModal"
                                        class="btn btn-primary pull-bottom ml-4 pointer">Tenho interesse</a>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-9 d-flex align-items-center">
                                <div class="row align-items-center mt-3">
                                    <div class="col-12 col-sm-6 col-md-4 mb-2">
                                        <img src="assets/images/house1.jpg" alt=""
                                            class="img-thumbnail img-hover-effect">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 mb-2">
                                        <img src="assets/images/house2.jpg" alt=""
                                            class="img-thumbnail img-hover-effect">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 mb-2">
                                        <img src="assets/images/house3.jpg" alt=""
                                            class="img-thumbnail img-hover-effect">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Anterior</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Próximo</a>
            </li>
        </ul>
    </nav>
</div>

<div class="modal fade" id="realtyModal" tabindex="-1" role="dialog" aria-labelledby="realtyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="realty-info-tab" data-toggle="pill" href="#realty-info" role="tab" aria-controls="realty-info" aria-selected="true">Informações do imóvel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="pill" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contato</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane px-4 fade show active" id="realty-info" role="tabpanel" aria-labelledby="realty-info-tab">
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <h3 class="font-weight-bolder mb-0">R$ 2.500,00</h3>
                            <span class="badge badge-pill badge-secondary realty-type">Aluguel</span>
                        </div>
                        <div class="mt-3">
                            <div class="bd-example">
                                <div id="realty-images" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#realty-images" data-slide-to="0" class="active">
                                        </li>
                                        <li data-target="#realty-images" data-slide-to="1"></li>
                                        <li data-target="#realty-images" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="assets/images/house1.jpg" class="d-block w-100 modal-img" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Cozinha</h5>
                                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="assets/images/house2.jpg" class="d-block w-100 modal-img" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Sala</h5>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="assets/images/house3.jpg" class="d-block w-100 modal-img" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Sala</h5>
                                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#realty-images" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                    <a class="carousel-control-next" href="#realty-images" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Próximo</span>
                                    </a>
                                </div>
                                <div class="mt-4">
                                    <h3>Descrição do imóvel</h3>
                                    <p class="text-muted">03 Quartos com armários sendo os 03 suítes, sala em dois
                                        ambientes, lavabo,
                                        cozinha planejada com cooktop e coifa, área de
                                        serviços com armários, varanda gourmet com churrasqueira e armários, salão
                                        de festas, playground, 02 vagas de garagem
                                        livres, portaria virtual.</p>
                                </div>
                                <div class="mt-4">
                                    <h3>Detalhes do imóvel</h3>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-key"></i></td>
                                                        <td>Identificação do Imóvel</td>
                                                        <td>495892</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-money-bill-alt"></i></td>
                                                        <td>Preço</td>
                                                        <td>R$ 2.500,00</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-expand"></i></td>
                                                        <td>Área</td>
                                                        <td>125,0m²</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-bed"></i></td>
                                                        <td>Quartos</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-bath"></i></td>
                                                        <td>Banheiros</td>
                                                        <td>2</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-utensils"></i></td>
                                                        <td>Salas de jantar</td>
                                                        <td>2</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-shower"></i></td>
                                                        <td>Suítes</td>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-building"></i></td>
                                                        <td>Tipo</td>
                                                        <td>Apartamento</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-city"></i></td>
                                                        <td>Valor do condomínio</td>
                                                        <td>R$ 700,00</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-clock"></i></td>
                                                        <td>Portaria 24hrs</td>
                                                        <td>Sim</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-door-closed"></i></td>
                                                        <td>Armário embutido</td>
                                                        <td>Sim</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-car"></i></td>
                                                        <td>Garagem</td>
                                                        <td>2</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane px-4 fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <h3 class="font-weight-bolder mb-0">Deixe seu contato</h3>
                        <form class="mt-3" action="" method="GET">
                            <div class="form-group">
                                <label for="name">Nome completo</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Joaquim da Silva">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="joaquim@email.com">
                            </div>
                            <div class="form-group">
                                <label for="phone">Telefone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="(34) 99876-5432">
                            </div>
                            <div class="form-group">
                                <label for="proposal">Proposta</label>
                                <textarea class="form-control" id="proposal" name="proposal" rows="3"></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                                <button type="reset" class="btn btn-secondary">Limpar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
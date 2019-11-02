<?php

$baseUrl = BASEDIR . $_GET['url'];

$realties = static::loadRealties();

if (isset($_GET['deleteRealty'])) {
    $id = $_GET['deleteRealty'];

    static::deleteRealty($id);
}

?>
<div class="container-fluid mt-5 pt-3 adm-container">
    <section>
        <h2 class="text-center">Listagem de Imóveis</h2>
        <div class="mt-4 table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Proprietário</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Disponibilidade</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Tipo imóvel</th>
                        <th scope="col">Rua</th>
                        <th scope="col">Número</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">CEP</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($realties as $realty) {
                        $id = $realty['id'];
                        $owner = $realty['proprietario'];
                        $category = $realty['categoria'] == "A" ? "Aquisição" : "Locação";
                        $available = $realty['disponivel'] ? "Disponível" : "Ocupado";
                        $value = $realty['valor'];
                        $type = $realty['tipo_imovel'];
                        $street = $realty['rua'];
                        $number = $realty['numero'];
                        $cep = $realty['cep'];
                        $city = $realty['cidade'];
                        $uf = $realty['estado_sigla'];
                        $neighborhood = $realty['bairro'];

                        echo <<<HTML
                        <tr>
                            <th scope="row">$id</th>
                            <td>$owner</td>
                            <td>$category</td>
                            <td>$available</td>
                            <td>$value</td>
                            <td>$type</td>
                            <td>$street</td>
                            <td>$number</td>
                            <td>$neighborhood</td>
                            <td>$cep</td>
                            <td>$city</td>
                            <td>$uf</td>
                            <td>
                                <button class="btn btn-danger" onclick="deleteRealty('$id');">Excluir</button>
                            </td>
                        </tr>
                        HTML;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<script>

    if (window.location.href.includes('deleteRealty')) {
        window.location.href = '<?=$baseUrl?>';
    }

    function deleteRealty(id) {
        window.location.href = `?deleteRealty=${id}`;
    }

</script>
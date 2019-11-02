<?php

$baseUrl = BASEDIR . $_GET['url'];

$customers = static::loadCustomers();

if (isset($_GET['deleteCustomer'])) {
    $cpf = $_GET['deleteCustomer'];

    static::deleteCustomer($cpf);
}

?>
<div class="container-fluid mt-5 pt-3 adm-container">
    <section>
        <h2 class="text-center">Listagem de Clientes</h2>
        <div class="mt-4 table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">CPF</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone contato</th>
                        <th scope="col">Telefone celular</th>
                        <th scope="col">Email</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Estado civil</th>
                        <th scope="col">Profissão</th>
                        <th scope="col">CEP</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($customers as $customer) {
                        $cpf = $customer['cpf'];
                        $name = $customer['nome'];
                        $tel1 = $customer['telefone_contato'];
                        $tel2 = $customer['telefone_celular'];
                        $email = $customer['email'];
                        $sexo = $customer['sexo'];
                        $cs = $customer['estado_civil'];
                        $profession = $customer['profissao'];
                        $cep = $customer['cep'];

                        echo <<<HTML
                        <tr>
                            <th scope="row">$cpf</th>
                            <td>$name</td>
                            <td>$tel1</td>
                            <td>$tel2</td>
                            <td>$email</td>
                            <td>$sexo</td>
                            <td>$cs</td>
                            <td>$profession</td>
                            <td>$cep</td>
                            <td>
                                <button class="btn btn-danger" onclick="deleteCustomer('$cpf');">Excluir</button>
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

    if (window.location.href.includes('deleteCustomer')) {
        window.location.href = '<?=$baseUrl?>';
    }

    function deleteCustomer(cpf) {
        window.location.href = `?deleteCustomer=${cpf}`;
    }

</script>
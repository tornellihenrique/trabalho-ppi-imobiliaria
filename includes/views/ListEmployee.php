<?php

$baseUrl = BASEDIR . $_GET['url'];

$employees = static::loadEmployees();

if (isset($_GET['deleteEmployee'])) {
    $user = $_GET['deleteEmployee'];

    static::deleteEmployee($user);
}

?>

<div class="container-fluid mt-5 pt-3 adm-container">
    <section>
        <h2 class="text-center">Listagem de Funcionários</h2>
        <div class="mt-4 table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Usuário</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone contato</th>
                        <th scope="col">Telefone celular</th>
                        <th scope="col">Data ingresso</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Salário</th>
                        <th scope="col">CEP</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($employees as $employee) {
                        $user = $employee['usuario'];
                        $name = $employee['nome'];
                        $cpf = $employee['cpf'];
                        $tel1 = $employee['telefone_contato'];
                        $tel2 = $employee['telefone_celular'];
                        $dateadm = $employee['data_ingresso'];
                        $job = $employee['cargo'];
                        $salary = $employee['salario'];
                        $cep = $employee['cep'];

                        echo <<<HTML
                        <tr>
                            <th scope="row">$user</th>
                            <td>$name</td>
                            <td>$cpf</td>
                            <td>$tel1</td>
                            <td>$tel2</td>
                            <td>$dateadm</td>
                            <td>$job</td>
                            <td>$salary</td>
                            <td>$cep</td>
                            <td>
                                <button class="btn btn-danger" onclick="deleteEmployee('$user');">Excluir</button>
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

    if (window.location.href.includes('deleteEmployee')) {
        window.location.href = '<?=$baseUrl?>';
    }

    function deleteEmployee(userId) {
        window.location.href = `?deleteEmployee=${userId}`;
    }

</script>
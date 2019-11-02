<?php

$baseUrl = BASEDIR . $_GET['url'];

$messages = static::loadMessages();

if (isset($_GET['deleteMessage'])) {
    $id = $_GET['deleteMessage'];

    static::deleteMessage($id);
}

?>
<div class="container-fluid mt-5 pt-3 adm-container">
    <section>
        <h2 class="text-center">Interesses dos Usuários</h2>
        <div class="mt-4 table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Proposta</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($messages as $message) {
                        $id = $message['id'];
                        $name = $message['nome'];
                        $email = $message['email'];
                        $phone = $message['telefone'];
                        $purpose = $message['proposta'];

                        echo <<<HTML
                        <tr>
                            <th scope="row">$name</th>
                            <td>$email</td>
                            <td>$phone</td>
                            <td>$purpose</td>
                            <td>
                                <button class="btn btn-danger" onclick="deleteMessage('$id');">Excluir</button>
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

    if (window.location.href.includes('deleteMessage')) {
        window.location.href = '<?=$baseUrl?>';
    }

    function deleteMessage(id) {
        window.location.href = `?deleteMessage=${id}`;
    }

</script>
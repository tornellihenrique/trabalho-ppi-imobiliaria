<?php

require_once( '../includes/classes/Database.php' );

if (isset($_GET['cep'])) {
    $cep = intval($_GET['cep']);

    $info = Database::query("SELECT * FROM cep WHERE cep = :cep", array(':cep' => $cep));

    if (count($info) > 0) {
        echo json_encode($info[0]);
    } else {
        echo '{"cep":"","0":"","rua":"","1":"","cidade":"","2":"","estado":"","3":""}';
    }
}

?>
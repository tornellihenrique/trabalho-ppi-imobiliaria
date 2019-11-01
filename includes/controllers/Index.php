<?php

class Index extends Controller {

    public static function test() {
        $conn = self::begin();

        try {
            self::addQuery($conn, "INSERT INTO cargo (id_cargo, descricao) VALUES (1, 'pedreiro')");
            self::addQuery($conn, "INSERT INTO cargo (id_cargo, descricao) VALUES (2, 'pedreiro zika')");

            self::commit($conn);
        } catch (Exception $e) {
            self::rollback($conn);
        }
    
    }

}

?>
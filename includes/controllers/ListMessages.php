<?php

class ListMessages extends Controller {

    public static function loadMessages() {
        return self::query("SELECT * FROM mensagens");
    }

    public static function deleteMessage($id) {
        $conn = self::begin();

        try {
            self::addQuery($conn, "DELETE FROM mensagens WHERE id = :id", array(':id' => $id));

            self::commit($conn);
        } catch (Exception $e) {
            self::rollback($conn);

            Toast::showToast('Erro ao deletar mensagem!');
        }
    }

}

?>
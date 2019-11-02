<?php

class ListCustomer extends Controller {

    public static function loadCustomers() {
        return self::query("SELECT * from clientes c left join enderecos e on c.id_endereco = e.id");
    }

    public static function deleteCustomer($cpf) {
        $conn = self::begin();

        try {
            $customers = self::addQuery($conn, "SELECT * FROM clientes WHERE cpf = :cpf", array(':cpf' => $cpf));

            self::addQuery($conn, "DELETE FROM clientes WHERE cpf = :cpf", array(':cpf' => $cpf));

            if ($customers[0]['id_endereco'] != null) {
                self::addQuery($conn, "DELETE FROM enderecos WHERE id = :id", array(':id' => $customers[0]['id_endereco']));
            }

            self::commit($conn);
        } catch (Exception $e) {
            self::rollback($conn);

            Toast::showToast('Erro ao deletar cliente!');
        }
    }
}

?>
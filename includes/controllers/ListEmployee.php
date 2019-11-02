<?php

class ListEmployee extends Controller {

    public static function loadEmployees() {
        return self::query("SELECT f.usuario, f.nome, f.cpf, f.telefone_contato, f.telefone_celular, f.data_ingresso, c.descricao as cargo, f.salario, e.cep from funcionarios f left join enderecos e on e.id = f.id_endereco left join cargo c on c.id = f.id_cargo where usuario != 'admin'");
    }

    public static function deleteEmployee($user) {
        $conn = self::begin();

        try {
            $employees = self::addQuery($conn, "SELECT * FROM funcionarios WHERE usuario = :user", array(':user' => $user));

            self::addQuery($conn, "DELETE FROM funcionarios WHERE usuario = :usuario", array(':usuario' => $user));

            if ($employees[0]['id_endereco'] != null) {
                self::addQuery($conn, "DELETE FROM enderecos WHERE id = :id", array(':id' => $employees[0]['id_endereco']));
            }

            self::commit($conn);
        } catch (Exception $e) {
            self::rollback($conn);

            Toast::showToast('Erro ao deletar funcionário!');
        }
    }
}

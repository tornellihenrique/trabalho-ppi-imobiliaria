<?php

class ListRealty extends Controller {

    public static function loadRealties() {
        return self::query("SELECT i.id, c.nome as proprietario, i.categoria, i.disponivel, i.valor, t.descricao as tipo_imovel, e.rua, e.numero, e.cep, e.cidade, e.estado_sigla, b.nome as bairro from imoveis i left join enderecos e on i.id_endereco = e.id left join tipo_imovel t on t.id = id_tipo_imovel left join bairros b on b.id = e.bairro_id left join clientes c on c.cpf = i.id_cliente");
    }

    public static function deleteRealty($id) {
        $conn = self::begin();

        try {
            $realties = self::addQuery($conn, "SELECT * FROM imoveis WHERE id = :id", array(':id' => $id));

            $type = $realties[0]['id_tipo_imovel'];
            $addressId = $realties[0]['id_endereco'];

            if ($type == 1) {
                // CASA
                self::addQuery($conn, "DELETE FROM casas WHERE id_imovel = :realtyId", array(':realtyId' => $id));
            } else if ($type == 2) {
                // APARTAMENTO
                self::addQuery($conn, "DELETE FROM apartamentos WHERE id_imovel = :realtyId", array(':realtyId' => $id));
            } else if ($type == 3) {
                // SALA COMERCIAL
                self::addQuery($conn, "DELETE FROM salas_comerciais WHERE id_imovel = :realtyId", array(':realtyId' => $id));
            } else if ($type == 4) {
                // SALA COMERCIAL
                self::addQuery($conn, "DELETE FROM terrenos WHERE id_imovel = :realtyId", array(':realtyId' => $id));
            }

            self::addQuery($conn, "DELETE FROM imoveis WHERE id = :id", array(':id' => $id));

            if ($addressId != null) {
                self::addQuery($conn, "DELETE FROM enderecos WHERE id = :id", array(':id' => $addressId));
            }

            self::commit($conn);
        } catch (Exception $e) {
            self::rollback($conn);

            Toast::showToast('Erro ao deletar imóvel!');
        }
    }
}

?>
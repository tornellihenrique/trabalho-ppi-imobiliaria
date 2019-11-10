<?php

class Search extends Controller {

    public static function searchRealties($purpose, $neighborhood, $minValue, $maxValue, $tags) {
        $SQL = "SELECT i.*, ti.descricao as tipo_imovel, c.qtd_quartos as cquartos, c.qtd_suites as csuites, c.qtd_sala_estar as csala_estar, c.qtd_sala_jantar as csala_jantar, c.qtd_vagas_garagem as cvagas_garagem, c.area as carea, c.armario_embutido as carm_emb, a.qtd_quartos as aquartos, a.qtd_suites as asuites, a.qtd_sala_estar as asala_estar, a.qtd_sala_jantar as asala_jantar, a.qtd_vagas_garagem as avagas_garagem, a.area as aarea, a.armario_embutido as aarm_emb, a.andar, a.valor_condominio, a.portaria_24h, sc.area as scarea, sc.qtd_banheiros as scbanheiros, sc.qtd_comodos as sccomodos, t.largura, t.comprimento, t.possui_aclive, e.rua, e.numero, e.cep, e.cidade, e.estado_sigla, b.nome as bairro from imoveis i inner join enderecos e on e.id = i.id_endereco inner join bairros b on b.id = e.bairro_id inner join tipo_imovel ti on ti.id = i.id_tipo_imovel left join casas c on c.id_imovel = i.id left join apartamentos a on a.id_imovel = i.id left join salas_comerciais sc on sc.id_imovel = i.id left join terrenos t on t.id_imovel = i.id where 1=1 ";

        $params = array();

        if ($purpose) {
            $SQL .= "AND i.categoria = :purpose ";
            $params[':purpose'] = $purpose;
        }

        if ($neighborhood) {
            $SQL .= "AND e.bairro_id = :neighborhood ";
            $params[':neighborhood'] = $neighborhood;
        }

        if ($minValue) {
            $SQL .= "AND i.valor > :minValue ";
            $params[':minValue'] = $minValue;
        }

        if ($maxValue) {
            $SQL .= "AND i.valor < :maxValue ";
            $params[':maxValue'] = $maxValue;
        }

        if ($tags) {
            $SQL .= "AND i.descricao like :descr ";
            $params[':descr'] = '%' . $tags . '%';
        }

        return self::query($SQL, $params);
    }

    public static function searchPictures($id) {
        return self::query("SELECT * from fotos_imovel where id_imovel = :id", array(':id' => $id));
    }

    public static function sendMessage($realtyID, $name, $email, $phone, $proposal) {
        try {
            self::query("INSERT INTO `mensagens`(`id`, `nome`, `email`, `telefone`, `proposta`, `id_imovel`) VALUES (null, :nome, :email, :telefone, :proposta, :idImovel)", array(':nome' => $name, ':email' => $email, ':telefone' => $phone, ':proposta' => $proposal, ':idImovel' => $realtyID));
            Toast::showToast("Mensagem enviada com sucesso!");
        } catch (Exception $e) {
            Toast::showToast("Erro ao enviar mensagem");
        }
    }

}

?>
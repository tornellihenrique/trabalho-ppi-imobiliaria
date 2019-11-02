<?php

class RegisterCustomer extends Controller {

    public static function loadUfs() {
        return self::query("SELECT * FROM estados");
    }


    public static function loadNeighborhoods() {
        return self::query("SELECT * FROM bairros");
    }

    public static function createCustomer($name, $cpf, $gender, $email, $tel1, $tel2, $cst, $profession, $cep, $street, $house_number, $neighborhood, $city, $uf) {

        if (count(self::query("SELECT * FROM `clientes` WHERE cpf = :cpf", array(':cpf'=>$cpf))) > 0) {
            Toast::showToast("Cliente já cadastrado!");
            return;
        }

        $conn = self::begin();

        try {
            // Insere endereço
            $sql1 = "INSERT INTO `enderecos`(`id`, `rua`, `numero`, `cep`, `cidade`, `estado_sigla`, `bairro_id`) VALUES (null, :street, :house_number, :cep, :city, :uf, :neighborhood)";
            $params1 = array(':street'=>$street, ':house_number'=>$house_number, ':cep'=>$cep, ':city'=>$city, ':uf'=>$uf, ':neighborhood'=>$neighborhood);

            self::addQuery($conn, $sql1, $params1);

            // Busca ultimo endereço cadastrado
            $sql2 = "SELECT * FROM `enderecos` ORDER BY `id` DESC";
    
            $addresses = self::addQuery($conn, $sql2);

            $sql3 = "INSERT INTO `clientes`(`cpf`, `nome`, `id_endereco`, `telefone_contato`, `telefone_celular`, `email`, `sexo`, `estado_civil`, `profissao`) VALUES (:cpf, :nm, :addressId, :tel1, :tel2, :email, :gender, :cst, :profession)";
            $params3 = array(':cpf'=>$cpf, ':nm'=>$name, ':addressId'=>$addresses[0]['id'], ':tel1'=>$tel1, ':tel2'=>$tel2, ':email'=>$email, ':gender'=>$gender, ':cst'=>$cst, ':profession'=>$profession);

            self::addQuery($conn, $sql3, $params3);

            self::commit($conn);

            Toast::showToast('Cliente cadastrado com sucesso!');
        } catch (Exception $e) {
            self::rollback($conn);

            Toast::showToast('Erro ao cadastrar cliente!');
        }
    }
}

?>
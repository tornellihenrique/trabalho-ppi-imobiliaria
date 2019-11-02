<?php

class RegisterEmployee extends Controller {

    public static function loadJobs() {
        return self::query("SELECT * FROM cargo");
    }

    public static function loadUfs() {
        return self::query("SELECT * FROM estados");
    }


    public static function loadNeighborhoods() {
        return self::query("SELECT * FROM bairros");
    }

    public static function createEmployee($name, $cpf, $job, $tel1, $tel2, $dateadm, $salary, $cep, $street, $house_number, $neighborhood, $city, $uf, $user, $password) {

        if (count(self::query("SELECT * FROM `funcionarios` WHERE usuario = :usuario", array(':usuario'=>$user))) > 0) {
            Toast::showToast("Nome de usuário já cadastrado!");
            return;
        }

        $conn = self::begin();

        try {
            // Verifica se os dados estão inseridos
            if ($street != null && $house_number != null && $cep != null && $city != null && $uf != null && $neighborhood != null) {
                // Insere endereço
                $sql1 = "INSERT INTO `enderecos`(`id`, `rua`, `numero`, `cep`, `cidade`, `estado_sigla`, `bairro_id`) VALUES (null, :street, :house_number, :cep, :city, :uf, :neighborhood)";
                $params1 = array(':street'=>$street, ':house_number'=>$house_number, ':cep'=>$cep, ':city'=>$city, ':uf'=>$uf, ':neighborhood'=>$neighborhood);
    
                self::addQuery($conn, $sql1, $params1);
    
                // Busca ultimo endereço cadastrado
                $sql2 = "SELECT * FROM `enderecos` ORDER BY `id` DESC";
    
                $addresses = self::addQuery($conn, $sql2);

                // Insere funcionario
                $sql3 = "INSERT INTO `funcionarios`(`usuario`, `senha`, `nome`, `cpf`, `id_endereco`, `telefone_contato`, `telefone_celular`, `data_ingresso`, `id_cargo`, `salario`) VALUES (:user, :pass, :nm, :cpf, :addressId, :tel1, :tel2, :dateadm, :jobId, :salary)";
                $params3 = array(':user'=>$user, ':pass'=>$password, ':nm'=>$name, ':cpf'=>$cpf, ':addressId'=>$addresses[0]['id'], ':tel1'=>$tel1, ':tel2'=>$tel2, ':dateadm'=>$dateadm, ':jobId'=>$job, ':salary'=>$salary);

                self::addQuery($conn, $sql3, $params3);
            } else {
                // Insere funcionario apenas com usuario e senha
                $sql3 = "INSERT INTO `funcionarios`(`usuario`, `senha`) VALUES (:user, :pass)";
                $params3 = array(':user'=>$user, ':pass'=>$password);

                self::addQuery($conn, $sql3, $params3);
            }

            self::commit($conn);

            Toast::showToast('Funcionário cadastrado com sucesso!');
        } catch (Exception $e) {
            self::rollback($conn);

            Toast::showToast('Erro ao cadastrar funcionário!');
        }
    }

}

?>
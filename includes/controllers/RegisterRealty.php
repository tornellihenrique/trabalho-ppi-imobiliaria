<?php

class RegisterRealty extends Controller
{

    public static function loadUfs()
    {
        return self::query("SELECT * FROM estados");
    }

    public static function loadNeighborhoods()
    {
        return self::query("SELECT * FROM bairros");
    }

    public static function loadCustomers()
    {
        return self::query("SELECT * FROM clientes");
    }

    public static function createHouse($cep, $street, $house_number, $neighborhood, $city, $uf, $category, $available, $customer, $pictures, $cost, $qtdquartos, $qtdsuites, $qtdsalaestar, $qtdsalajantar, $qtdvagasgaragem, $area, $armarioemb, $description)
    {
        $conn = self::begin();
        
        try {
            // Insere endereço
            $sql1 = "INSERT INTO `enderecos`(`id`, `rua`, `numero`, `cep`, `cidade`, `estado_sigla`, `bairro_id`) VALUES (null, :street, :house_number, :cep, :city, :uf, :neighborhood)";
            $params1 = array(':street' => $street, ':house_number' => $house_number, ':cep' => $cep, ':city' => $city, ':uf' => $uf, ':neighborhood' => $neighborhood);

            self::addQuery($conn, $sql1, $params1);

            // Busca ultimo endereço cadastrado
            $sql2 = "SELECT * FROM `enderecos` ORDER BY `id` DESC";

            $addresses = self::addQuery($conn, $sql2);

            $sql3 = "INSERT INTO `imoveis`(`id`, `id_cliente`, `id_tipo_imovel`, `id_endereco`, `categoria`, `disponivel`, `valor`, `descricao`) VALUES (null, :customer, 1, :addressId, :category, :available, :cost, :descr)";
            $params3 = array(':customer'=>$customer, ':addressId' => $addresses[0]['id'], ':category' => $category, ':available' => $available, ':cost' => $cost, ':descr' => $description);

            self::addQuery($conn, $sql3, $params3);

            $sql4 = "SELECT * FROM `imoveis` ORDER BY `id` DESC";

            $realties = self::addQuery($conn, $sql4);

            $sql5 = "INSERT INTO `casas`(`id_imovel`, `qtd_quartos`, `qtd_suites`, `qtd_sala_estar`, `qtd_sala_jantar`, `qtd_vagas_garagem`, `area`, `armario_embutido`) VALUES (:realtyId, :qtdquartos, :qtdsuites, :qtdSalaEstar, :qtdSalaJantar, :qtdVagasGaragem, :area, :armarioEmbutido)";
            $params5 = array(':realtyId' => $realties[0]['id'], ':qtdquartos' => $qtdquartos, ':qtdsuites' => $qtdsuites, ':qtdSalaEstar' => $qtdsalaestar, ':qtdSalaJantar' => $qtdsalajantar, ':qtdVagasGaragem' => $qtdvagasgaragem, ':area' => $area, ':armarioEmbutido' => $armarioemb);

            self::addQuery($conn, $sql5, $params5);

            $createdPictures = self::handlePictures($pictures, $realties[0]['id']);

            // Percorre os arquivos criados e insere no banco
            foreach ($createdPictures as $createdPicture) {
                $sql6 = "INSERT INTO `fotos_imovel`(`id_imovel`, `file_name`) VALUES (:realtyId, :pictureName)";
                $params6 = array(':realtyId' => $realties[0]['id'], ':pictureName' => $createdPicture);

                self::addQuery($conn, $sql6, $params6);
            }
            
            self::commit($conn);

            Toast::showToast('Imóvel cadastrado com sucesso!');
        } catch (Exception $e) {
            self::rollback($conn);

            Toast::showToast('Erro ao cadastrar imóvel!');
        }
    }

    public static function createApartment($cep, $street, $house_number, $neighborhood, $city, $uf, $category, $available, $customer, $pictures, $cost, $qtdquartos, $qtdsuites, $qtdsalaestar, $qtdsalajantar, $qtdvagasgaragem, $areaCasa, $armarioemb, $description, $floor, $valorcond, $portaria24hrs)
    {
        $conn = self::begin();

        try {
            // Insere endereço
            $sql1 = "INSERT INTO `enderecos`(`id`, `rua`, `numero`, `cep`, `cidade`, `estado_sigla`, `bairro_id`) VALUES (null, :street, :house_number, :cep, :city, :uf, :neighborhood)";
            $params1 = array(':street' => $street, ':house_number' => $house_number, ':cep' => $cep, ':city' => $city, ':uf' => $uf, ':neighborhood' => $neighborhood);

            self::addQuery($conn, $sql1, $params1);

            // Busca ultimo endereço cadastrado
            $sql2 = "SELECT * FROM `enderecos` ORDER BY `id` DESC";

            $addresses = self::addQuery($conn, $sql2);

            $sql3 = "INSERT INTO `imoveis`(`id`, `id_cliente`, `id_tipo_imovel`, `id_endereco`, `categoria`, `disponivel`, `valor`, `descricao`) VALUES (null, :customer, 2, :addressId, :category, :available, :cost, :descr)";
            $params3 = array(':customer'=>$customer, ':addressId' => $addresses[0]['id'], ':category' => $category, ':available' => $available, ':cost' => $cost, ':descr' => $description);

            self::addQuery($conn, $sql3, $params3);

            $sql4 = "SELECT * FROM `imoveis` ORDER BY `id` DESC";

            $realties = self::addQuery($conn, $sql4);

            $sql5 = "INSERT INTO `apartamentos`(`id_imovel`, `qtd_quartos`, `qtd_suites`, `qtd_sala_estar`, `qtd_sala_jantar`, `qtd_vagas_garagem`, `area`, `armario_embutido`, `andar`, `valor_condominio`, `portaria_24h`) VALUES (:realtyId, :qtdquartos, :qtdsuites, :qtdSalaEstar, :qtdSalaJantar, :qtdVagasGaragem, :area, :armarioEmbutido, :andar, :valorCondominio, :portaria)";
            $params5 = array(':realtyId' => $realties[0]['id'], ':qtdquartos' => $qtdquartos, ':qtdsuites' => $qtdsuites, ':qtdSalaEstar' => $qtdsalaestar, ':qtdSalaJantar' => $qtdsalajantar, ':qtdVagasGaragem' => $qtdvagasgaragem, ':area' => $areaCasa, ':armarioEmbutido' => $armarioemb, ':andar' => $floor, ':valorCondominio' => $valorcond, ':portaria' => $portaria24hrs);

            self::addQuery($conn, $sql5, $params5);

            $createdPictures = self::handlePictures($pictures, $realties[0]['id']);

            // Percorre os arquivos criados e insere no banco
            foreach ($createdPictures as $createdPicture) {
                $sql6 = "INSERT INTO `fotos_imovel`(`id_imovel`, `file_name`) VALUES (:realtyId, :pictureName)";
                $params6 = array(':realtyId' => $realties[0]['id'], ':pictureName' => $createdPicture);

                self::addQuery($conn, $sql6, $params6);
            }
            
            self::commit($conn);

            Toast::showToast('Imóvel cadastrado com sucesso!');
        } catch (Exception $e) {
            self::rollback($conn);

            Toast::showToast('Erro ao cadastrar imóvel!');
        }
    }

    public static function createCommercialRoom($cep, $street, $house_number, $neighborhood, $city, $uf, $category, $available, $customer, $pictures, $cost, $areaSalaC, $qtdbanheiros, $qtdcomodos, $description)
    {
        $conn = self::begin();

        try {
            // Insere endereço
            $sql1 = "INSERT INTO `enderecos`(`id`, `rua`, `numero`, `cep`, `cidade`, `estado_sigla`, `bairro_id`) VALUES (null, :street, :house_number, :cep, :city, :uf, :neighborhood)";
            $params1 = array(':street' => $street, ':house_number' => $house_number, ':cep' => $cep, ':city' => $city, ':uf' => $uf, ':neighborhood' => $neighborhood);

            self::addQuery($conn, $sql1, $params1);

            // Busca ultimo endereço cadastrado
            $sql2 = "SELECT * FROM `enderecos` ORDER BY `id` DESC";

            $addresses = self::addQuery($conn, $sql2);

            $sql3 = "INSERT INTO `imoveis`(`id`, `id_cliente`, `id_tipo_imovel`, `id_endereco`, `categoria`, `disponivel`, `valor`, `descricao`) VALUES (null, :customer, 3, :addressId, :category, :available, :cost, :descr)";
            $params3 = array(':customer'=>$customer, ':addressId' => $addresses[0]['id'], ':category' => $category, ':available' => $available, ':cost' => $cost, ':descr' => $description);

            self::addQuery($conn, $sql3, $params3);

            $sql4 = "SELECT * FROM `imoveis` ORDER BY `id` DESC";

            $realties = self::addQuery($conn, $sql4);

            $sql5 = "INSERT INTO `salas_comerciais`(`id_imovel`, `area`, `qtd_banheiros`, `qtd_comodos`) VALUES (:realtyId, :area, :qtdbanheiros, :qtdcomodos)";
            $params5 = array(':realtyId' => $realties[0]['id'], ':area' => $areaSalaC, ':qtdbanheiros' => $qtdbanheiros, ':qtdcomodos' => $qtdcomodos);

            self::addQuery($conn, $sql5, $params5);

            $createdPictures = self::handlePictures($pictures, $realties[0]['id']);

            // Percorre os arquivos criados e insere no banco
            foreach ($createdPictures as $createdPicture) {
                $sql6 = "INSERT INTO `fotos_imovel`(`id_imovel`, `file_name`) VALUES (:realtyId, :pictureName)";
                $params6 = array(':realtyId' => $realties[0]['id'], ':pictureName' => $createdPicture);

                self::addQuery($conn, $sql6, $params6);
            }

            self::commit($conn);

            Toast::showToast('Imóvel cadastrado com sucesso!');
        } catch (Exception $e) {
            self::rollback($conn);

            Toast::showToast('Erro ao cadastrar imóvel!');
        }
    }

    public static function createTerrain($cep, $street, $house_number, $neighborhood, $city, $uf, $category, $available, $customer, $pictures, $cost, $largura, $comprimento, $aclive, $description)
    {
        $conn = self::begin();

        try {
            // Insere endereço
            $sql1 = "INSERT INTO `enderecos`(`id`, `rua`, `numero`, `cep`, `cidade`, `estado_sigla`, `bairro_id`) VALUES (null, :street, :house_number, :cep, :city, :uf, :neighborhood)";
            $params1 = array(':street' => $street, ':house_number' => $house_number, ':cep' => $cep, ':city' => $city, ':uf' => $uf, ':neighborhood' => $neighborhood);

            self::addQuery($conn, $sql1, $params1);

            // Busca ultimo endereço cadastrado
            $sql2 = "SELECT * FROM `enderecos` ORDER BY `id` DESC";

            $addresses = self::addQuery($conn, $sql2);

            $sql3 = "INSERT INTO `imoveis`(`id`, `id_cliente`, `id_tipo_imovel`, `id_endereco`, `categoria`, `disponivel`, `valor`, `descricao`) VALUES (null, :customer, 4, :addressId, :category, :available, :cost, :descr)";
            $params3 = array(':customer'=>$customer, ':addressId' => $addresses[0]['id'], ':category' => $category, ':available' => $available, ':cost' => $cost, ':descr' => $description);

            self::addQuery($conn, $sql3, $params3);

            $sql4 = "SELECT * FROM `imoveis` ORDER BY `id` DESC";

            $realties = self::addQuery($conn, $sql4);

            $sql5 = "INSERT INTO `terrenos`(`id_imovel`, `largura`, `comprimento`, `possui_aclive`) VALUES (:realtyId, :largura, :comprimento, :aclive)";
            $params5 = array(':realtyId' => $realties[0]['id'], ':largura' => $largura, ':comprimento' => $comprimento, ':aclive' => $aclive);

            self::addQuery($conn, $sql5, $params5);

            $createdPictures = self::handlePictures($pictures, $realties[0]['id']);

            // Percorre os arquivos criados e insere no banco
            foreach ($createdPictures as $createdPicture) {
                $sql6 = "INSERT INTO `fotos_imovel`(`id_imovel`, `file_name`) VALUES (:realtyId, :pictureName)";
                $params6 = array(':realtyId' => $realties[0]['id'], ':pictureName' => $createdPicture);

                self::addQuery($conn, $sql6, $params6);
            }

            self::commit($conn);

            Toast::showToast('Imóvel cadastrado com sucesso!');
        } catch (Exception $e) {
            self::rollback($conn);

            Toast::showToast('Erro ao cadastrar imóvel!');
        }
    }

    public static function handlePictures($pictures, $realtyId)
    {
        $files = array();
        $total = count($pictures['name']);

        // Percorre as fotos
        for ($i = 0; $i < $total; $i++) {

            // Caminho temporario da foto
            $tmpFilePath = $pictures['tmp_name'][$i];

            if ($tmpFilePath != "") {
                // Cria o novo caminho
                $name = $realtyId . "-" . $i . "-" . date('Y-m-d-H-i-s') . "." . explode(".", $pictures['name'][$i])[1];
                $newFilePath = file_exists("./pictures") ? "./pictures/" . $name : __DIR__ . "/../pictures/" . $name;

                // Move a foto para o caminho
                if (!move_uploaded_file($tmpFilePath, $newFilePath)) {
                    Toast::showToast("Erro ao enviar foto '$name'");
                }

                $files[] = $name;
            }
        }

        return $files;
    }
}

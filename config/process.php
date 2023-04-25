<?php

session_start();
include_once("connection.php");
include_once("url.php");

$data = $_POST;

if(!empty($data)) { // MODIFICAÇÕES NO BANCO
     
    //criar contato
    if($data['type'] === "create" ) {
        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];

        $query = "INSERT INTO contacts (name, phone, observations) VALUES(:name, :phone, :observations)";

        $stmt = $connection->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);

        try {
            
            $stmt->execute();
            $_SESSION["msg"] = "Contato criado com sucesso";

        } catch(PDOException $e) {
            //erro na conexao
            $error = $e->getMessage();
            echo "Erro: $error";
        }

    } elseif ($data["type"] === "edit") {
        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];
        $id = $data["id"];

        $query = "UPDATE contacts 
                  SET name = :name, phone = :phone, observations = :observations 
                  WHERE id = :id";

        $stmt = $connection->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);
        $stmt->bindParam(":id", $id);

        try {
            
            $stmt->execute();
            $_SESSION["msg"] = "Contato Atualizado com sucesso";

        } catch(PDOException $e) {
            //erro na conexao
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    } elseif ($data["type"] === "delete") {
        $id = $data["id"];

        $query = "DELETE FROM contacts WHERE id = :id";

        $stmt = $connection->prepare($query);

        $stmt->bindParam(":id", $id);

        try {
            
            $stmt->execute();
            $_SESSION["msg"] = "Contato removido com sucesso";

        } catch(PDOException $e) {
            //erro na conexao
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    }

    //Redirect Home
    header("location:" . $BASE_URL . "../index.php");

} else { //SELEÇÃO DE DADOS
    $id;

    if(!empty($_GET)) {
        $id = $_GET['id'];
    }
    
    
    // Retorna o dado de um contato
    if(!empty($_GET)) {
    
        $query = "SELECT * FROM contacts WHERE id = :id";
    
        $stmt = $connection->prepare($query);
    
        $stmt->bindParam(":id", $id);
    
        $stmt->execute();
    
        $contact = $stmt->fetch();
    
    } else {
        //Retorna todos os contatos
        $contacts = [];
    
        $query = "SELECT * FROM contacts";
    
        $stmt = $connection->prepare($query);
    
        $stmt->execute();
    
        $contacts = $stmt->fetchAll();
        }
    
    
}

//FECHAR CONEXÃO
$connection = null;
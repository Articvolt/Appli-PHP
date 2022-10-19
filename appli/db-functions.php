<?php

require 'db-config.php';


//connect PDO 
try {
    $db = new PDO("mysql:host=$servername;dbname=store", $username, $password, $options);
        
        $query = $db->prepare('SELECT * FROM product WHERE id= :id');
        $query->execute(['id'=> $_GET['id']]);
        // FETCHALL
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        //FETCH
        $product = $query->fetch(PDO::FETCH_OBJ);

        echo "Connected successfully";

    } catch(PDOException $e) {

//quand une erreur est rencontrée, elle est tansmise sous forme de message
    echo "Connection failed: ".$e->getMessage();
    }


?>

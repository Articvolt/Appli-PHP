<?php

require 'db-config.php';


//connect PDO 
try {
    // fonction connexion()
    $db = new PDO($dsn, $username, $password, $options);       
    } catch(PDOException $e) {
//quand une erreur est rencontrée, elle est transmise sous forme de message
    echo "Connection failed: ".$e->getMessage();
    }

    // FETCH ALL | fonction findAll()
    $sql = $db->prepare('SELECT * FROM product');
    $sql->execute();
    $findAll = $sql->fetchAll(PDO::FETCH_ASSOC);
    // affichage du FETCH ALL
    foreach($findAll as $findOne) {
        echo '<h2>'.$findOne['name'].'</h2>';
        echo '<p>'.$findOne['description'].' '.$findOne['price'].' € </p>';
    }


        // fonction findOneById()
        $sql1 = $db->prepare('SELECT * FROM product WHERE "id" = ? ');
        $sql1->bindParam("id", $id);
        $id = 1;
        $sql1->execute();
        $findOneById = $sql1->fetch();
        // affichage du findOneById()
        echo '<h2>'.$findOneById['name'].'</h2>';
        echo '<p>'.$findOneById['description'].' '.$findOneById['price'].' € </p>';



?>

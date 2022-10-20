<?php

require 'db-config.php';


//connect PDO 
try {
    $db = new PDO($dsn, $username, $password, $options);
        
        $sql='SELECT * FROM product';
        $results = $db->query($sql);

        // FETCH ALL
        $products = $results->fetchAll(PDO::FETCH_ASSOC);
        // $results->closeCursor(); -> permet de fermer le SELECT, inutile si on veux modifier la base de données.

        var_dump($products);
        //FETCH
        foreach($products as $product) {
            echo '<p>'.$product['name'].'</p>';
            echo '<p>'.$product['description'].'</p>';
            echo '<p>'.$product['price'].'</p>';
        }

    } catch(PDOException $e) {

//quand une erreur est rencontrée, elle est transmise sous forme de message
    echo "Connection failed: ".$e->getMessage();
    }


?>

<?php

require 'db-config.php';
    
    function findAll($findAll) {
        $db=SeConnecter();

        $sql=$db->prepare('SELECT * FROM product');
        $sql->execute();
        $findAll = $sql->fetchAll(PDO::FETCH_ASSOC);
        // affichage
        foreach($findAll as $findOne) {
            echo '<h2>'.$findOne['name'].'</h2>';
            echo '<p>'.$findOne['description'].'<br> '.$findOne['price'].' € </p>';
        }
    };
    
    function findOneByID($id) {
        $db=SeConnecter();
        $id = 26;
        $sql1 = $db->prepare('SELECT * FROM product WHERE id = :id');
        $sql1->bindParam(":id", $id);
        $sql1->execute();
        $findOneById = $sql1->fetch(PDO::FETCH_ASSOC);
        // affichage
        echo '<h2>'.$findOneById['name'].'</h2>';
        echo '<p>'.$findOneById['description'].' '.$findOneById['price'].' € </p>';
    };
       
    function insertProduct($insertProduct) {
        $db=SeConnecter();
        $sql2 = 'INSERT INTO product(name, description, price) VALUES (:name, :description, :price)';
        $insertProduct = $db->prepare($sql2);

        $insertProduct->execute([
            'name' => 'XBOX',
            'description' => 'console de salon',
            'price' => '300'
        ]);
    }

    
?>

<?php

$servername = "localhost";
$username = "root";
$password = "";


// possibilité de mettre les attributs dans un tableau associatif pour la création de la chaîne PDO
$options = [
    // précise le type d'erreur que PDO renvera en cas de requête invalide -> ATTR = attribut
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // définit le mode de récupération des données de la base par défaut. Ici, ce sera rrenvoyé sous forme de tableau associatif (FETCH_ASSOC)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // insère une commande MySQL à l'instanciation de l'objet PDO, cela forcera la prise en charge de l'UTF-8 quand on entrera des données en base (INSERT)
    // UTF-8 : Universal Character Set Transformation Format - 8 bits => codage de caractères informatiques
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
];

//connect PDO 
try {
    $db = new PDO("mysql:host=$servername;dbname=store", $username, $password, $options);
    // https://www.php.net/manual/en/pdo.setattribute.php
    echo "Connected successfully";
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }

//création d'une commande d'éxecution
$SQLexecute = $db->prepare('SELECT name, description, price  FROM product');
//lancement de la commande
$SQLexecute->execute();
// methode pour récuperer les lignes de la base de données
$products = $SQLexecute->fetchAll();
//voir si la commande fonctionne
// PDOStatement::fetchAll — Récupère les lignes restantes d'un ensemble de résultats
var_dump($products);

?>

<!-- :: opérateur de résolution de portée = permet d'accéder à un attibut ou à une fonction statique qui se touve à l'intérieur d'une classe -->
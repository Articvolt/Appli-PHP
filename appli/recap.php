<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Récapitulatif des produits</title>
</head>
<body>

    <?php
        // var_dump($_SESSION);
    ?>

    <h1>RECAPITULATIF</h1>
    <!-- Lien page en navigation -->
    <nav>
        <ul>
            <li><a href="http://localhost/exercices/Appli-PHP/appli/index.php">ACCUEIL</a></li>
            <li><a href="http://localhost/exercices/Appli-PHP/appli/recap.php">RECAPUTILATIF</a></li>
            <li>Total produits : <?php echo count($_SESSION['products']) ?> </li>
        </ul>
    </nav>
    <div class="table">
        <?php 
        // || : ... OU ...
            // si (la variable n'est pas déclarée ou nulle dans la session OU vide) / !XXX correspond à l'inverse
            if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                //alors afficher qu'il n'y a rien
                echo "<p>Aucun produit en session...</p>";
            }
            // sinon on affiche un tableau 
            else {
                // Ossature du thead du tableau
                echo "<table>",
                        "<thead>",
                            "<tr>",
                                "<th>#</th>",
                                "<th>Nom</th>",
                                "<th>Prix</th>",
                                "<th>Quantité</th>",
                                "<th>Total</th>",
                            "</tr>",
                        "</thead>",
                        "<tbody>";
                // On définit le total à 0 initialement 
                $totalGeneral = 0;
                $totalProduit = 0;
                // pour chaque 'products' dans la session, la variable product est dans la variable index
                foreach($_SESSION['products'] as $index => $product) {
                    echo "<tr>",
                            // index est ce qui va définir la ligne du produit à cibler
                            "<td>".$index."</td>",
                            // nom du produit définit dans "index.php"  au name = "name" et énoncé dans traitement
                            "<td>".$product['name']."</td>",
                            // "&nbsp;" correspond à un espace
                            // au format numérique, dans le formulaire, la ligne du prix (name = price")
                            "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                            // affichage du nombre en format numérique (name="qtt") avec ajout de deux boutons
                            "<td>
                            <a href='traitement.php?action=moins&id=".$index."'><button>-</button></a>
                            ".number_format($product['qtt'])."
                            <a href='traitement.php?action=plus&id=".$index."'><button>+</button></a>
                            </td>",
                            // affichage tu total 
                            "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                            // ajout d'un bouton supprimer ligne
                            "<td id='button'><a href='traitement.php?action=supprimer&id=".$index."' ><button>Supprimer</button><a></td>",
                        "</tr>";
                    // On additionne au total chaque 'total' de chaque $product
                    $totalGeneral += $product['total'];
                    $totalProduit += $product['qtt'];
    
                }
                // affichage de la dernière ligne du tableau avec sa fermeture
                echo "<tr>",
                        "<td colspan=4>Total général : </td>",
                        "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>";
                   
            }
        ?>
                    <td id='button'>
                        <a href="traitement.php?action=vider"><button>Vider le panier</button></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <p>
        
    </p>
</body>
</html>

<!-- 
session : C'est un mécanisme permettant de sauvegarder temporairement sur le serveur des informations relatives à un internaute.
La session se conserve tant que le navigateur reste ouvert
https://apprendre-php.com/tutoriels/tutoriel-14-les-sessions.html 
-->

<!-- variable globale : variable qui peut être utilisée dans tout le programme, portée globale (global $b )-->

<!-- 
superglobale : variables créées automatiquement par PHP.
Elles sont accessibles n'importe où dans le script (local ou global) et sont des variables tableaux.
Les superglobales sont toujours en majuscule (convention).

$GLOBALS : variable qui stocke toute les variables globales dans le script
$_SERVER : 

 SUPERGLOBALES pour manipuler les informations envoyées via formulaire HTML
$_GET : transmet les informations en clair dans la barre d'adresse
$_POST : transmet les informations en masqué mais non crypté dans la barre d'adresse
https://apprendre-php.com/tutoriels/tutoriel-12-traitement-des-formulaires-avec-get-et-post.html

$_FILES : variable contenant toute les informations sur un fichier téléchargé ( nom, taille, etc)
$_COOKIE : variable contenant toutes les variables passées via le cookie HTTP
$_REQUEST : variable qui contient toutes les variables envoyées via HTTP GET / HTTP POST
-->

<!-- 
tableau associatif : tableau contenant des clés textuelles associées à des valeurs
EXEMPLE : $ages = ['Mathilde' => 27, 'Pierre' => 29, 'Amandine' => 21];
            
            $mails['Mathilde'] = 'math@gmail.com';
            $mails['Pierre'] = 'pierre.giraud@edhec.com';
            $mails['Amandine'] = 'amandine@lp.fr';
https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/tableau-associatif/        
-->

<!--
cookie : un fichier que le serveur envoi sur l'ordinateur de l'utilisateur, souvent utilisé pour reconnaîtres les users
https://phpsources.net/tutoriel-cookies.htm
-->
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
    <nav>
        <ul>
            <li><a href="http://localhost/exercices/Appli-PHP/appli/index.php">ACCUEIL</a></li>
            <li><a href="http://localhost/exercices/Appli-PHP/appli/recap.php">RECAPUTILATIF</a></li>
            <li>Total produits : <?php echo $product['qtt'] ?> </li>
        </ul>
    </nav>
    <div class="table">
        <?php 
        // || : ... OU ...
            if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                echo "<p>Aucun produit en session...</p>";
            }
            else {
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
                $totalGeneral = 0;
                foreach($_SESSION['products'] as $index => $product) {
                    echo "<tr>",
                            // index est ce qui va définir la ligne du produit à cibler
                            "<td>".$index."</td>",
                            "<td>".$product['name']."</td>",
                            "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                            "<td>
                            <a href='traitement.php?action=moins&id=".$index."'><button>-</button></a>
                            ".number_format($product['qtt'])."
                            <a href='traitement.php?action=plus&id=".$index."'><button>+</button></a>
                            </td>",
                            "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                            "<td id='button'><a href='traitement.php?action=supprimer&id=".$index."' ><button>Supprimer</button><a></td>",
                        "</tr>";
                    $totalGeneral += $product['total'];
    
                }
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
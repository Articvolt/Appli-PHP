<?php
    session_start();

    if(isset($_GET['action'])) {

        switch($_GET['action']) {

            case "ajouter" :
                if(isset($_POST['submit'])) {

                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
            
                    if($name && $price && $qtt) {
                        
                        $product = [
                            "name" => $name,
                            "price" => $price,
                            "qtt" => $qtt,
                            "total" => $price*$qtt
                        ];
            
                        $_SESSION['products'] [] = $product;
                        
                    }
                }
            
                header("Location:recap.php");
                die();
            break;

            case "vider" :
                // vide les tableaux dans session
                unset($_SESSION['products']);
                // redirige à la page 
                header("Location:recap.php");
                die();
            
            break;

            case "supprimer" :
                if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])) {
                    // "id" est lié à l'index de du produit dans "index.php"
                    unset($_SESSION['products'][$_GET['id']]);
                } 
                header("Location:recap.php");
                die();

            break;

            case "plus" :
                if ($_SESSION['products'][$_GET['id']]['qtt'] >= 1) {
                    ++$_SESSION['products'][$_GET['id']]['qtt'];
        
                    // le calcul du total est relancé
                    $_SESSION['products'][$_GET['id']]['total'] =
                    $_SESSION['products'][$_GET['id']]['qtt'] * $_SESSION['products'][$_GET['id']]['price'];
                }
                header("Location:recap.php");
                die();

            break;

            case "moins" :
                if ($_SESSION['products'][$_GET['id']]['qtt'] > 1) {
                    --$_SESSION['products'][$_GET['id']]['qtt'];
        
                    $_SESSION['products'][$_GET['id']]['total'] =
                    $_SESSION['products'][$_GET['id']]['qtt'] * $_SESSION['products'][$_GET['id']]['price'];
                }
                header("Location:recap.php");
                die();
                
            break;
        
        }

        
    }

    
?>
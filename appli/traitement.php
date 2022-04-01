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
        }

        
    }

    
?>
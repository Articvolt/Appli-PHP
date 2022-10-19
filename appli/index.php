<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Ajout produit</title>
    </head>
    <body>

        <h1>Ajouter un produit</h1>
        <nav>
            <ul>
                <!-- href : c'est une redirection -->
                <li><a href="http://localhost/exercices/PHP-application/appli/index.php">ACCUEIL</a></li>
                <li><a href="http://localhost/exercices/PHP-application/appli/recap.php">RECAPUTILATIF</a></li>
            </ul>
        </nav>
<!-- action : Transmet le formulaire à la page "traitement.php" -->
        <form action="traitement.php?action=ajouter" method="POST">
            <p>
                <!-- légende pour un objet dans un interface utilisateur -->
                <label>
                    Nom du produit :
                    <input type="text" name="name">
                </label>
            </p>
            <p>
                <label >
                    Prix du produit : 
                    <input min=0 type="number" step="any" name="price">
            </label>
            </p>
            <p>
                <label >
                    Quantité désirée :
                    <input min=1 type="number" name="qtt" value="1">
                </label>
            </p>
            <p>
                <input type="submit" name="submit" value="Ajouter le produit">
            </p>
        </form>
        
    </body>
</html>

<!-- action : (qui indique la cible du formulaire, le fichier à atteindre lorsque l'utilisateur
soumettra le formulaire)

method : (qui précise par quelle méthode HTTP les données du formulaire seront
transmises au serveur) -->

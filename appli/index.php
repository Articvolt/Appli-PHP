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
<!-- action : Transmet le formulaire à la page "traitement.php" -->
        <form action="traitement.php" method="POST">
            <p>
                <label>
                    Nom du produit :
                    <input type="text" name="name">
                </label>
            </p>
            <p>
                <label >
                    Prix du produit : 
                    <input type="number" step="any" name="price">
            </label>
            </p>
            <p>
                <label >
                    Quantité désirée :
                    <input type="number" name="qtt" value="1">
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

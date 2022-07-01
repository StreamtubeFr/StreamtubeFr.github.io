<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films d'Animations</title>
    <link rel="icon" href="https://icon-library.com/images/youtube-icon-16x16/youtube-icon-16x16-22.jpg">
    <link rel="stylesheet" href="stylefilmsgenre.css">
</head>

<body>
    <?php include_once('HeaderFilms.php'); ?>
    <div class="nomgenre">
        <p><strong>Films D'Animations</strong></p>
    </div>

    <?php
    try
    {
	    // On se connecte à MySQL
	    $mysqlClient = new PDO('mysql:host=localhost;dbname=db_films;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
	    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
    // Si tout va bien, on peut continuer

    // On récupère tout le contenu de la table films
    $sqlQuery = 'SELECT * FROM films WHERE Genre_Film = "Animation"';
    $filmsStatement = $mysqlClient->prepare($sqlQuery);
    $filmsStatement->execute();
    $films = $filmsStatement->fetchAll();
    // On affiche chaque recette une à une
    ?> 
    <div class="container">        
    <div class="list-container">
    <?php  
    foreach ($films as $films) {
    ?>
            <div class="vid-list">
                <?php echo '<a href="../Films/'.$films['Nom_Film'].'.html"><img src="'.$films['Image_Film'].'"'?> class="thumbnail"></a>
                <div class="flex-div">
                    <img src="https://icon-library.com/images/youtube-icon-16x16/youtube-icon-16x16-22.jpg">
                    <div class="vid-info">
                        <?php echo '<a href="#">'.$films['Nom_Film'].'</a>'?>
                        <p>Free Streaming</p>
                    </div>
                </div>
            </div>
        
    <?php
    }
    ?>
    </div>
    <img src="../images/fond.png" class="fondgrey">
    </div>
    
    
    <script src="../script.js"></script>
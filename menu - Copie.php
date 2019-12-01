


<?php

    function affiche_menu()

    {

        // tableaux contenant les liens d'accès et le texte à afficher

        $tab_menu_lien = array( "index.php", "forum.php", "livre_or.php", "equipe.php", "inscription.php", "connexion.php" );

        $tab_menu_texte = array( "Accueil", "Forums", "Livre d'or", "L'équipe", "Inscription", "Connexion" );

        

        // informations sur la page

        $info = pathinfo($_SERVER['PHP_SELF']);

        $menu = "\n<div id=\"menu\">\n    <ul id=\"onglets\">\n";

        $menu .= "</ul>\n    </div>";

        // on renvoie le code xHTML

        return $menu;

    }

?>

Il ne reste plus qu'à parcourir les tableaux, en comparant à chaque fois si le nom du fichier du tableau $tab_menu_lien correspond au nom du fichier de la page courante. Si c'est le cas, on applique la class="active".

Voici le code final de la fonction :

<?php

    function affiche_menu()

    {

      
<?php

    require_once("./menu.php");

    $menu = affiche_menu();

?>

<html>

<head>

    <link href="design.css" type="text/css" rel="stylesheet" />

</head>

<body>

<?php

    echo $menu;

?>

</body>

        // on renvoie le code xHTML

        return $menu;       
    }

?>


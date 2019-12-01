

<?php
echo "Function.php <br>";
    function affiche_menu()

    {
  // tableaux contenant les liens d'accès et le texte à afficher

        $tab_menu_lien = array( "index.php", "forum.php", "livre_or.php", "equipe.php", "inscription.php", "connexion.php" );

        $tab_menu_texte = array( "Accueil", "Forums", "Livre d'or", "L'équipe", "Inscription", "Connexion" );

        

        // informations sur la page

        $info = pathinfo($_SERVER['PHP_SELF']);

        $menu = "\n<div id=\"menu\">\n    <ul id=\"onglets\">\n";
        foreach($tab_menu_lien as $cle=>$lien)

        {

            $menu .= "    <li";

            // si le nom du fichier correspond à celui pointé par l'indice, alors on l'active

            if( $info['basename'] == $lien )

                $menu .= " class=\"active\"";

                

            $menu .= "><a href=\"" . $lien . "\">" . $tab_menu_texte[$cle] . "</a></li>\n";

        }
   

        $menu .= "</ul>\n</div>";

        

        // on renvoie le code xHTML

        return $menu;       
    }

?>


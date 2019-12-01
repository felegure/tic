<?php

/* on vérifie que l'information "menu_destination" existe ET qu'elle n'est pas vide : */

if ( isset($_POST['menu_destination']) && !empty($_POST['menu_destination']) ) 

/* si c'est bien le cas (existe ET non-vide à la fois), on redirige le visiteur vers sa valeur choisie de l'information "menu_direction" : */

     {header("Location: ".$_POST['menu_destination']."");}

/* sinon, on le redirige vers une autre page utile : */

else 

     {header("Location: http://www.monsite.net/plan.html");}

?>

<form method="post" action="http://www.monsite.net/redirection_navigation.php">

<p>

<!-- une balise select ou input ne peut pas être imbriquée directement dans form -->
<label for="menu_destination_liste">Choisissez votre destination</label> 
     <select name="menu_destination" onchange="document.location = this.options[this.selectedIndex].value;">

          <option value="http://www.monsite.net/accueil.html">Accueil</option>

          <option value="http://www.monsite.net/apropos.html">Qui sommes-nous ?</option>

          <option value="http://www.monsite.net/contact.html">Nous contacter</option>

          <option value="http://www.monsite.net/plan.html">Plan du site</option>

     </select>

     <input type="submit" value="Go" title="valider pour aller à la page sélectionnée" />
<input type="image" src="../images/bouton_valider_go.png" alt="Go" title="valider pour aller à la page sélectionnée" />
</p>

</form>
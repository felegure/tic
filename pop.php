<?php

/**
 ------------------------------------------------------------------------------
 * SAISIE DE DATE
 * 8 ao�t 2004
 * Affiche un calendrier, avec dimanche ou lundi comme 1er jour, et permet de
 * reporter la date s�lectionn�e dans un champ INPUT d'un formulaire.
 *
 * Exemple d'utilisation :
 * Soit un fichier (php, html ou autre). Imaginons qu'il y a un champs "date"
 * qui doit contenir une date formatt�e selon certains crit�res. Il faut tout
 * d'abord avoir un formulaire qui a un nom :
 *
 * <from name="test" method="post" action="monFichierDeTraitement.php">
 *
 * Ensuite, il faut un champ qui accueillera le jour choisi via ce fichier.
 * Prenons par exemple un simple champ texte :
 *
 * <input type="texte" name="date" readonly="readonly"/>
 *
 * Finalement, il faut un lien qui ouvre le calendrier. Pour ce faire, on peut
 * utiliser l'�v�nement onClick du Javascript :
 *
 * <a href="#" onClick="window.open('calendrier.php?frm=test&ch=date', 'calendrier', 'width=415,height=170,scrollbars=0').focus();">
 *    <img src="images/calendrier.gif" />
 * </a>
 *
 * On utilise la fonction window.open(). Le 1er param�tre est le nom de la page
 * ainsi que son emplacement par rapport au calendrier (ici, les 2 sont
 * au m�me endroit). Il y a 2 variables � passer, "frm" et "ch". "frm" est �gal
 * au nom du formulaire, "ch" est �gal au nom du champ qui accueillera le jour
 * choisi.
 * Le 2e param�tre est le nom de la fen�tre (optionnel), le reste, ben c'est du
 * connu. Largeur, hauteur, scrollbars. Et un petit focus() pour �tre s�r que
 * le calendrier se mettra en avant-plan lors de son ouverture.
 *
 * NOTE : Le onClick peut se mettre ailleurs. Et c pas oblig� d'avoir une image
 *        Pour un peu plus de s�ret�, on peut mettre un readonly dans le champ.
 *        Ainsi, seul la date pourra s'inscrire dedans.
 ------------------------------------------------------------------------------
 */

/**
 * $anneeMin : Permet la selection d'ann�es ant�rieures � celle actuelle (2 = 2 ans ant�rieur)
 * $anneeMax : Permet la s�lection d'ann�es post�rieures � celle actuelle (3 = 3 ans post�rieur)
 */
$anneeMin = 4;
$anneeMax = 1;

/**
 * Formattage de la date (par exemple : JJ-MM-AAAA ou JJ|MM|AAAA)
 * $checkzero : ajoute un z�ro devant le mois ou le jour s'ils sont inf�rieur � 10
 *              "false" ou "true"
 * $format    : repr�sente la string qui s�pare le mois du jour de l'ann�e
 * $ordre     : d�termine l'ordre, de gauche � droite, du jour, mois et ann�e
 *              "a" pour ann�e, "m" pour mois, "j" pour jour
 * $affichage : Pour pr�senter le calendrier au format anglais ou fran�ais
 *              "fr" = commencer par lundi ou "en" = commencer par dimanche
 */
$checkzero = "true";
$format = "-";

//$ordre = array("a", "m", "j");
$ordre = array("j", "m", "a");
 //$affichage = "fr";
$affichage = "en";
/**
 * Affichage du calendrier en popup ou non
 * $popup     : D�termine si le calendrier s'affichera sous forme de popup ou non
 *              TRUE = sous forme de popup ou FALSE = directement int�gr� � la page
 * $formHtml  : Le nom de la FORM o� il y a le champ concern�
 * $champ     : Le nom du champ o� la date doit �tre inscrite
 * $page      : Le nom de la page o� est inclu le calendrier
 * $larCal    : La largeur du calendrier
 * $marCal    : Les �ventuelles marges � donner au calendrier pour bien le placer dans la page
 */
$popup = true;
$formHtml = "";
$champ = "";
$page = "";

/**
 * Mise en page du calendrier
 */
$larCal = "350px";
$marCal = "10px 0 0 0px";

/**
 * Ci-dessous, le nom des mois et des jours. A changer si on veut d'autres langues (ou utiliser
 * la fonction gettext() de PHP. Ne pas changer les positions dans le tableau
 */
$nomj[0] = "Di";
$nomj[1] = "Lu";
$nomj[2] = "Ma";
$nomj[3] = "Me";
$nomj[4] = "Je";
$nomj[5] = "Ve";
$nomj[6] = "Sa";



$nomm[0] = "Janvier";
$nomm[1] = "F&eacute;vrier";
$nomm[2] = "Mars";
$nomm[3] = "Avril";
$nomm[4] = "Mai";
$nomm[5] = "Juin";
$nomm[6] = "Juillet";
$nomm[7] = "Ao&ucirc;t";
$nomm[8] = "Septembre";
$nomm[9] = "Octobre";
$nomm[10] = "Novembre";
$nomm[11] = "D&eacute;cembre";

















/**
 ---------------------------------------------------------------------------------------------
 * Le reste du code PHP, � priori, y'a plus besoin de le toucher. Par contre, y'a la CSS juste
 * un peu plus bas. Celle-l� est parfaitement modifiable (c'est d'ailleurs recommand�, c'est
 * toujours mieux de personnaliser un peu le truc)
 */
$ajd = getdate();

if ($popup){
	$frm = $_GET["frm"];
	$champ = $_GET["ch"];
	$link = "?frm=".$frm."&ch=".$champ;
}else{
	$frm = $formHtml;
	$ch = $champ;
	$link = $page;
}

if (isset($_POST["mois"])){
    $mois = $_POST["mois"];
    $annee = $_POST["annee"];
}else{
    $mois = $ajd["mon"];
    $annee = $ajd["year"];
}

$aujourdhui = array($ajd["mday"], $ajd["mon"], $ajd["year"]);

$moisCheck = $mois + 1;
$anneeCheck = $annee;
if ($moisCheck > 12){
    $moisCheck = 1;
    $anneeCheck = $annee + 1;
}

$dernierJour = strftime("%d", mktime(0, 0, 0, $moisCheck, 0, $anneeCheck));
$premierJour = date("w", mktime(0, 0, 0, $mois, 1, $annee));

if ($affichage != "en"){
    //On modifie la position du premier jour suivant la disposition des jours qu'on veut
    $origine = 1;
    $j = $origine;
    for ($i = 0; $i < count($nomj); $i++){
        if ($j >= count($nomj)){
            $j = 0;
        }
        $temp[] = $nomj[$j];
        $j++;
    }
    $nomj = $temp;
    //On d�cale le 1er jour en cons�quence
    $premierJour--;
    if ($premierJour < 0){
        $premierJour = 6;
    }
}

/**
 * Renvoie une string qui vaut selected ou non, pour un champs SELECT
 *
 * @param   integer     $temps      L'ann�e ou le mois choisi
 * @param   integer     $i          L'annee en cours
 * @return  string                  La string n�cessaire pour s�lectionner une OPTION
 */
function get_selected($temps, $i){
    $selected = "";
    if ($temps == $i){
        $selected = " selected=\"selected\"";
    }
    return $selected;
}

/**
 * Renvoie une string repr�sentant l'appel � une classe CSS
 *
 * Pour les valeurs par d�faut :
 *      - 1 : ' class="aut"'
 *      - 2 : ''
 *
 * @param   integer     $jour       Le jour en cours
 * @param   integer     $index      La valeur par d�faut de la string
 * @return  string                  La string n�cessaire pour appeller la classe CSS voulue
 */
function get_classe($jour, $index, $mode){
    switch ($index) {
        case 1:
            $classe = " class=\"aut\"";
            break;
        default:
            $classe = "";
    }
    switch ($mode) {
        case "en":
            $x1 = 0;
            $x2 = 6;
            break;
        default:
            $x1 = 6;
            $x2 = 5;
    }
    if ($jour == $x1){
        $classe = " class=\"dim\"";
    }elseif ($jour == $x2){
        $classe = " class=\"sam\"";
    }
    return $classe;
}

/**
 * D�termine si on est sur un dimanche ou un samedi, � partir du 1er du mois
 *
 * @param   array       $ajd            Le jour, mois et ann�e de maintenant
 * @param   integer     $annee          L'ann�e en cours
 * @param   integer     $mois           Le mois en cours
 * @param   integer     $jour           Le jour en cours
 * @param   integer     $cptJour        Le num�ro du jour en cours de la semaine
 * @param   integer     $premierJour    Le num�ro du 1er jour (dans la semaine) du mois
 * @param   array       $nomj           Le tableau des noms des jours
 * @param   integer     $prems          Le num�ro du dernier jour de la semaine du mois pr�c�dent
 * @param   string      $mode           Le mode d'affichage du calendrier ("fr" ou "en")
 * @return  string                      La string n�cessaire pour appeller la classe CSS voulue
 */
function get_classeJour($ajd, $annee, $mois, $jour, $cptJour, $premierJour, $nomj, $prems, $mode){
    $classe = "";
    if ($mode == "en"){
        if (($cptJour == 0 && $jour > 1) || ($jour == 1 && $premierJour == 0)){
            $classe = " class=\"dim\"";
        }elseif ($cptJour == 6 || (count($nomj) - $jour == $prems)){
            $classe = " class=\"sam\"";
        }
    }else{
        if ($cptJour == 6 || (count($nomj) - $jour == $prems)){
            $classe = " class=\"dim\"";
        }else if ($cptJour == 5 || (count($nomj) - $jour - 1 == $prems)){
            $classe = " class=\"sam\"";
        }
    }
    if ($jour == $ajd[0] && $mois == $ajd[1] && $annee == $ajd[2]){
        $classe = " class=\"ajd\"";
    }
    return $classe;
}

/**
 * D�termine si on est sur un samedi, lorsqu'on compl�te le tableau
 *
 * @param   integer     $i              Le jour en cours
 * @param   integer     $cptJour        Le num�ro du dernier jour (dans la semaine) du mois
 * @param   string      $mode           Le mode d'affichage du calendrier ("fr" ou "en")
 * @return  string                      La string n�cessaire pour appeller la classe CSS voulue
 */
function get_classeJourReste($i, $cptJour, $mode){
    $classe = "";
    if ($mode == "en"){
        if ($i == (7 - $cptJour) - 1){
            $classe = " class=\"sam\"";
        }
    }else{
        if ($i == (6 - $cptJour) - 1){
            $classe = " class=\"sam\"";
        }else if ($i == (7 - $cptJour) - 1){
            $classe = " class=\"dim\"";
        }
    }
    return $classe;
}

?>
<html>
<head>
    <title>Calendrier</title>
    <style>
        body, table, select {
            font-family: Arial;
            font-size: 11px;
        }

        body {
            background-image: url("calendrier.gif");
            background-position: center center;
            background-repeat: no-repeat;
        }

<?php
if ($popup) {
?>
		#calendrierEntier {
			width: 100%;
			margin: 0;
		}
<?php
}else{
?>
		#calendrierEntier {
			width: <?php echo $larCal; ?>;
			margin: <?php echo $marCal; ?>;
		}
<?php
}
?>

        #calendar {
            width: 100%;
            border-collapse: collapse;
            border-right: 1px solid #999999;
            border-bottom: 1px solid #999999;
            margin: 0;
            padding: 0;
            text-align: center;
            font-size: 110%;
        }
        #calendar th {
            border-left: 1px solid #999999;
            border-top: 1px solid #999999;
            padding: 0.5em;
            font-weight: bold;
            width: 14%;
        }

        #calendar td {
            border-left: 1px solid #999999;
            border-top: 1px solid #999999;
            margin: 0;
            padding: 0;
        }

        #calendar td a {
            display: block;
            text-decoration: none;
            color: #FF0000;
        }

        #calendar td a:hover {
            background-color: #E99042;
            color: #660000;
        }

        .dim{
            background-color: #D8CDE8;
        }

        .aut {
            background-color: #EEEEEE;
        }

        .sam {
            background-color: #DDD69F;
        }

        .ajd {
            background-color: #EEEE44;
        }

        #calendrier {
            width: 100%;
            margin: 0;
            text-align: center;
        }
        #calendrier select {
            width: 49%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>

<div id="calendrierEntier">
<form id="calendrier" method="post" action="<?php echo $link; ?>">
<select name="mois" id="mois" onChange="reload(this.form)">
<?php
/**
 * Affichage des mois
 */
for ($i = 0; $i < count($nomm); $i++){
    $selected = get_selected($mois - 1, $i);
?>
    <option value="<?php echo ($i + 1); ?>"<?php echo $selected; ?>><?php echo $nomm[$i]; ?></option>
<?php
}
?>
</select>
<select name="annee" id="annee" onChange="reload(this.form)">
<?php
/**
 * Affichage des ann�es
 */
for ($i = $ajd["year"] - $anneeMin; $i < $ajd["year"] + $anneeMax; $i++){
    $selected = get_selected($annee, $i);
?>
    <option value="<?php echo $i; ?>"<?php echo $selected; ?>><?php echo $i; ?></option>
<?php
}
?>
</select>
</form>

<table id="calendar">
    <tr>
<?php
/**
 * Affichage du nom des jours
 */
for ($jour = 0; $jour < 7; $jour++){
    $classe = get_classe($jour, 1, $affichage);
?>
        <th<?php echo $classe; ?>><?php echo $nomj[$jour]; ?></th>
<?php
}
?>
    <tr>
<?php
/**
 * Affichage des cellules vides en d�but de mois, s'il y en a
 */
for ($prems = 0; $prems < $premierJour; $prems++){
    $classe = get_classe($prems, 2, $affichage);
?>
        <td<?php echo $classe; ?>>&nbsp;</td>
<?php
}
/**
 * Affichage des jours du mois
 */
$cptJour = 0;
for ($jour = 1; $jour <= $dernierJour; $jour++){
    $classe = get_classeJour($aujourdhui, $annee, $mois, $jour, $cptJour, $premierJour, $nomj, $prems, $affichage);
    $cptJour++;
?>
        <td<?php echo $classe; ?>><a href="#" onClick="submitDate(<?php echo $jour; ?>)"><?php echo $jour; ?></a></td>
<?php
    if (is_int(($jour + $prems) / 7)){
        $cptJour = 0;
?>
    </tr>
<?php
        if ($jour < $dernierJour){
?>
    <tr>
<?php
        }
    }
}
/**
 * Affichage des cellules vides en fin de mois, s'il y en a
 */
if ($cptJour != 0){
    for ($i = 0; $i < (7 - $cptJour); $i++){
        $classe = get_classeJourReste($i, $cptJour, $affichage);
?>
        <td<?php echo $classe; ?>>&nbsp;</td>
<?php
    }
?>
    </tr>
<?php
}
?>
</table>
</div>

<script type="text/javascript">
    var checkzero = <?php echo $checkzero; ?>;
    var format = "<?php echo $format; ?>";
    var ordre = new Array("<?php echo strtoupper(implode('", "', $ordre)); ?>");

    /**
     * Reload la fen�tre avec les nouveaux mois et ann�e choisis
     *
     * @param   object      frm     L'object document du formulaire
     */
    function reload(frm){
        var mois = frm.elements["mois"];
        var annee = frm.elements["annee"];
        //Debug du mois et ann�e
        var index1 = mois.options[mois.selectedIndex].value;
        var index2 = annee.options[annee.selectedIndex].value;
        //Envoi du formulaire
        frm.submit();
    }

    /**
     * Ajoute un z�ro devant le jour et le mois s'ils sont plus petit que 10
     *
     * @param   integer     jour        Le num�ro du jour dans le mois
     * @param   integer     mois        Le num�ro du mois
     */
    function checkNum(jour, mois){
        tab = new Array();
        tab[0] = jour;
        tab[1] = mois;
        if (this.checkzero){
            if (jour < 10){
                tab[0] = "0" + jour;
            }
            if (mois < 10){
                tab[1] = "0" + mois;
            }
        }
        return tab;
    }

    /**
     * Cr�� la string de retour et la renvoie � la page d'appel
     *
     * C'est ici que la string est cr��. C'est �galement ici que le champ du formulaire
     * de la page d'appel re�oit la valeur. La fen�tre s'auto-fermera ensuite toute
     * seule comme une grande.
     * Paisible est l'�tudiant qui comme la rivi�re peut suivre son cours sans quitter son lit...
     *
     * @param   integer     jour        Le num�ro du jour dans le mois
     */
    function submitDate(jour){
        tab = this.checkNum(jour, <?php echo $mois; ?>);
        jour = tab[0];
        mois = tab[1];
        if (this.ordre[0] && this.ordre[0] == "M"){
            if (this.ordre[1] && this.ordre[1] == "A"){
                val = mois + this.format + "<?php echo $annee; ?>" + this.format + jour;
            }else{
                val = mois + this.format + jour + this.format + "<?php echo $annee; ?>";
            }
        }else if (this.ordre[0] && this.ordre[0] == "J"){
            if (this.ordre[1] == "A"){
                val = jour + this.format + "<?php echo $annee; ?>" + this.format + mois;
            }else{
                val = jour + this.format + mois + this.format + "<?php echo $annee; ?>";
            }
        }else{
            if (this.ordre[1] && this.ordre[1] == "J"){
                val = "<?php echo $annee; ?>" + this.format + jour + this.format + mois;
            }else{
                val = "<?php echo $annee; ?>" + this.format + mois + this.format + jour;
            }
        }
<?php
if ($popup){
?>
        window.opener.document.<?php echo $frm.".elements[\"".$champ."\"]"; ?>.value = val;
		window.close();
<?php
}else{
?>
		document.<?php echo $frm.".elements[\"".$champ."\"]"; ?>.value = val;
<?php
}
?>
    }
</script>

</body>
</html>

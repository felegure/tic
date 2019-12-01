<?php
if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
}

$username=$_SESSION['username'];
echo "<tr>";
echo "<td>Utilisateur:<b>$username </b>          </td>";
echo "<td>";
$date = date("d-m-Y");
$heure = date("H:i");
echo ", la date du jour est $date:$heure" ;
echo "<td>";
echo "<tr>";
?>
<div class="container">
	<div class="row">
			<p>
			</p>
	</div>
 </div>
<div id="mbmcpebul_wrapper" style="max-width: 940px;">
  <ul id="mbmcpebul_table" class="mbmcpebul_menulist css_menu">
  <li><div class="buttonbg gradient_button gradient27" style="width: 100px; border:1px solid black"><div class="arrow"><a>Entités</a></div></div>
    <ul class="gradient_menu gradient95">
    <li class="gradient_menuitem gradient31 first_item"><a href="index_ent.php"  title="">Entité/Client</a></li>
    <li class="gradient_menuitem gradient31"><a href="index_cust.php" title="">Client/Sites</a></li>
	
	<li class="gradient_menuitem gradient31 last_item"><a href="index_cust_contacts.php" title="">Contacts</a>
	 <ul class="gradient_menu gradient95">
	     <li class="gradient_menuitem gradient31"><a href="contact_all_list.php" title="">Contacts existants</a></li>
	 </ul>	
	</li>	     
    </ul>
  </li>
  <li><div class="buttonbg gradient_button gradient27" style="width: 120px;border:1px solid black "><div class="arrow"><a>Parc/Client</a></div></div>
    <ul class="gradient_menu gradient95">
    <li class="gradient_menuitem gradient31 first_item"><a href="index_cust_computers.php"  title="">Ordinateurs</a></li>
    <li class="gradient_menuitem gradient31"><a href="index_cust_monitors.php" title="">Ecrans</a></li>
	<li class="gradient_menuitem gradient31"><a href="index_cust_printers.php" title="">Imprimantes</a></li>
	<li class="gradient_menuitem gradient31"><a href="index_cust_copiers.php" title="">Photocopieurs</a></li>
    <li class="gradient_menuitem gradient31"><a href="index_cust_networks.php" title="">Réseaux</a></li>
    <li class="gradient_menuitem gradient31"><a href="index_cust_softwares.php" title="">Logiciels</a></li>
	<li class="gradient_menuitem gradient31"><a href="index_cust_accessories.php" title="">Accessoires</a></li>
    </ul></li>
	<li><div class="buttonbg gradient_button gradient27" style="width: 100px;border:1px solid black "><div class="arrow"><a>Rapports</a></div></div>
    <ul class="gradient_menu gradient95">
    <li class="gradient_menuitem gradient31 first_item"><a href="RapEntGen.php"  title="">Liste des Entités</a></li>
	 <li class="gradient_menuitem gradient31 first_item"><a href="RapEntClientsGroup.php"  title="">Liste des Clients</a></li>
    <li class="gradient_menuitem gradient31"><a href="RapList_computers.php" title="">Liste des Ordinateurs</a></li>
	 <li class="gradient_menuitem gradient31"><a href="RapList_monitors.php" title="">Liste des Ecrans</a></li>
	<li class="gradient_menuitem gradient31"><a href="RapList_printers.php" title="">Liste des Imprimantes</a></li>
	<li class="gradient_menuitem gradient31"><a href="RapList_copiers.php" title="">Liste des Photocopieurs</a></li>
    <li class="gradient_menuitem gradient31"><a href="RapList_networks.php" title="">Liste des Equipements Réseaux</a></li>
    <li class="gradient_menuitem gradient31"><a href="RapList_softwares.php" title="">Liste des Logiciels</a></li>
	<li class="gradient_menuitem gradient31"><a href="RapList_accessories.php" title="">Liste des Accessoires</a></li>
    </ul></li>
	<li><div class="buttonbg gradient_button gradient27" style="width: 150px; border:1px solid black"><div class="arrow"><a>Administration</a></div></div>
    <ul class="gradient_menu gradient95">
	<li class="gradient_menuitem gradient31 first_item"><a title="">Clients - Groupe</a></li>
	<li class="gradient_menuitem gradient31 first_item"><a title="">Clients - Utilisateurs</a></li>
    <li class="gradient_menuitem gradient31 first_item"><a href="index_users.php" title="">ATTIC - Utilisateurs</a></li>
    <li class="gradient_menuitem gradient31"><a  href="index_profils.php" title="">ATTIC - Profils</a></li>
	<li class="gradient_menuitem gradient31"><a href="index_techstaff.php" title="">ATTIC - Techniciens</a></li>
    <li class="gradient_menuitem gradient31 last_item"><a href="#" title="">ATTIC - Skills Techniciens</a></li>
	<li class="gradient_menuitem gradient31 last_item"><a href="index_computers.php" title="">Ordinateurs</a></li>
	<li class="gradient_menuitem gradient31 last_item"><a href="index_monitors.php" title="">Ecrans</a></li>
	<li class="gradient_menuitem gradient31 last_item"><a href="index_printers.php" title="">Imprimantes</a></li>
	<li class="gradient_menuitem gradient31 last_item"><a href="index_copiers.php" title="">Photocopieurs</a></li>
	<li class="gradient_menuitem gradient31 last_item"><a href="index_networks.php" title="">Réseaux</a></li>
	<li class="gradient_menuitem gradient31 last_item"><a href="index_softwares.php" title="">Logiciels</a></li>
	<li class="gradient_menuitem gradient31 last_item"><a href="index_accessories.php" title="">Accessoires</a></li>
    </ul></li>	
 
	<li><div class="buttonbg gradient_button gradient27" style="width: 150px; background-color:red; border:1px solid black"><div class="arrow"><a>Assistance Client</a></div></div>
    <ul class="gradient_menu gradient95">
    <li class="gradient_menuitem gradient31 first_item"><a title="">Ouverture d'un ticket</a></li>
    <li class="gradient_menuitem gradient31"><a title="">Suivi du problème</a></li>
	<li class="gradient_menuitem gradient31"><a title="">Clotûrer un problème</a></li>
    </ul></li>
    <li><div class="buttonbg gradient_button gradient27" style="width: 150px; background-color:red; border:1px solid black 	"><div class="arrow"><a>Gestion des congés</a></div></div>
    <ul class="gradient_menu gradient95">
    <li class="gradient_menuitem gradient31 first_item"><a title="">Personnel</a></li>
    <li class="gradient_menuitem gradient31"><a title="">Jours de Congés</a></li>
	<li class="gradient_menuitem gradient31"><a title="">Techniciens</a></li>
    <li class="gradient_menuitem gradient31 last_item"><a title="">Skills Techniciens</a></li>
    </ul></li>
	
  <li><div class="buttonbg gradient_button gradient27" style="width: 100px; background-color:orange; border:1px solid black; color:yellow; "><a href="logout.php" title="" >Deconnexion</a>
 </div></li>	
  </ul>
</div>


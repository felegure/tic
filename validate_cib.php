<?php
session_start();

echo "TEST <br> ";
//require ("./connections/connect.php");

$user_name = $_POST['login'];
$password = $_POST['password']; 
$pAccess = "";
echo "username=$user_name   password=$password <br> ";
//Préparation de la requête
define ('USER',"root");
define ('PASSWORD',"");
define ('SERVER',"localhost");
define ('BASE',"tictan");
$connection = mysqli_connect(SERVER, USER, PASSWORD, BASE) or die(mysql_error());
$sqlA = "SELECT userid FROM tictan_users WHERE userid=$user_name and password=$password and is_deleted=0";
$resultat = mysqli_query($connection,"SELECT userid FROM tictan_users WHERE userid=$user_name and password=$password and is_deleted=0");
//$result = mysqli_query($connection, $sqlA);
//$affected_rows = mysqli_num_rows($result);
if (mysqli_num_rows($resultat) != 1) { echo "erreur";}
else echo " tout va bien";
//$affected_rows = mysqli_num_rows($result);
echo ("affected_rows = $affected_rows");
//S'il y a exactement un résultat, l'utilisateur est authentifié, sinon, on l'empêche d'entrer
if($affected_rows == 1) {
$pAccess='1';
$pointeur=mysqli_fetch_object($result); 
$_SESSION['username'] = $user_name; 
$_SESSION['Access'] = $pAccess;
$_SESSION['PROFIL'] = $pointeur->profil;
//require_once ("affiche_maincib_1.php"); 
}

$sqlB = "SELECT userid FROM tictan_users 
WHERE userid=$user_name and password=$password and is_deleted=0
and profil='B'";

echo ("sql = $sqlB <br> ");
$result = mysqli_query($connection, $sqlB);
$affected_rows = mysqli_num_rows($result);
//S'il y a exactement un résultat, l'utilisateur est authentifié, sinon, on l'empêche d'entrer
if($affected_rows == 1) {
$pAccess='2';
$pointeur=mysqli_fetch_object ($result); 
$_SESSION['username'] = $user_name; 
$_SESSION['Access'] = $pAccess;
$_SESSION['PROFIL'] = $pointeur->profil;

}
$sqlC = "SELECT userid FROM tictan_users 
WHERE userid=$user_name and password=$password and is_deleted=0
and profil='C'";

echo ("sql = $sqlC <br> ");
$result = mysqli_query($connection, $sqlC);
$affected_rows = mysqli_num_rows($result);
//S'il y a exactement un résultat, l'utilisateur est authentifié, sinon, on l'empêche d'entrer
if($affected_rows == 1) {
$pAccess='3';
$pointeur=mysqli_fetch_object ($result); 
$_SESSION['username'] = $user_name; 
$_SESSION['Access'] = $pAccess;
$_SESSION['PROFIL'] = $pointeur->profil;
//require_once ("affiche_maincib_1.php"); 
}
mysqli_close($connection);
require_once ("index.php"); 
?>
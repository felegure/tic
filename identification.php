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
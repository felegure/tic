<?php
// RapEntGen.php
// Start the session
if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
// echo "session_started";
$profil =$_SESSION['profilAccess'];
//echo "profil dans RapEntGen.php = $profil <br>";

}


?>

<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="author" content="NextReports">
<meta name="creator" content="NextReports 8.0">
<meta name="subject" content="Created by NextReports Designer 8.0">
<meta name="date" content="Tue Mar 17 10:03:45 UTC 2015">
<meta name="keywords" content="www.next-reports.com">
<title>RapportEntitesGeneral</title>
 <meta charset="utf-8">
 <link   href="css/rapp.css" rel="stylesheet">
 <script src="js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="./css/mbcsmbmcp.css" type="text/css" />
</head> 
<body>


<table style='width:100%'>
<tr>
<th width="126" scope="row"><div align="left" class="Style25"><a href="index_cust.php" title="Retour" class="Style7 Style6 "><span class="Style88">Retour</span></a></div></th>
<td class='Header0_0' rowspan=1 colspan=4>Liste des Entités/Clients </td></tr>
<td class='Header1_0' rowspan=1 colspan=7>
<?php 
$today = date ("D j, M,Y H:i:s");
echo " $today "; 
?>
</td>
</tr>

<tr><td class='Header2_0' rowspan=1 colspan=1>Raison sociale</td><td class='Header2_1' rowspan=1 colspan=1>Code tva</td><td class='Header2_2' rowspan=1 colspan=1>N° compte</td><td class='Header2_3' rowspan=1 colspan=1>Téléphone</td><td class='Header2_4' rowspan=1 colspan=1>Gsm</td><td class='Header2_5' rowspan=1 colspan=1>Fax</td><td class='Header2_6' rowspan=1 colspan=1>Courriel</td><td class='Header2_7' rowspan=1 colspan=1>Site web</td><td class='Header2_8' rowspan=1 colspan=1>Adresse</td><td class='Header2_9' rowspan=1 colspan=1>Code Postal</td><td class='Header2_10' rowspan=1 colspan=1>Ville</td></tr>
 <?php
       include_once ('database.php');
       $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM tictan_entities order by companynament";

        $cpt = 0;
       $save_id = 0;
		 foreach ($pdo->query($sql_view) as $row) {
	
	
         echo '<tr>';
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.''. '</td>';
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['companyname']. '</td>';
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['vatcode']. '</td>';	 
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['phone']. '</td>';	
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['Gsm']. '</td>';
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['Fax']. '</td>';	
		 echo '<td class=Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['email']. '</td>';		 
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['website']. '</td>';
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['Address']. '</td>';	
		 echo '<td class=Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['postcode']. '</td>';			
		 echo '<td class=Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['town']. '</td>';			 
         echo '</tr>';
        }		
		echo '<td class=Footer0_0 rowspan=1 colspan=1>&nbsp;</td><td class='.'Footer0_1 rowspan=1 colspan=1>&nbsp;</td><td class=Footer0_2  rowspan=1 colspan=1>&nbsp;</td><td class='. 'Footer0_3 rowspan=1 colspan=1>&nbsp;</td><td class='.'Footer0_4 rowspan=1 colspan=1>&nbsp;</td><td class='.'Footer0_5 rowspan=1 colspan=1>&nbsp;</td><td class='.' Footer0_6 rowspan=1 colspan=1>&nbsp;</td></tr>';
		echo '</table>';
        Database::disconnect();
?>

</table>
</body>
</html>

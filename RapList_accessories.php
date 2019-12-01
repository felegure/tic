<?php
// RapClientAccess.php
// Start the session
if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
// echo "session_started";
$profil =$_SESSION['profilAccess'];
//echo "profil dans RapClientAccess.php = $profil <br>";

}


?>

<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="author" content="NextReports">
<meta name="creator" content="NextReports 8.0">
<meta name="subject" content="Created by NextReports Designer 8.0">
<meta name="date" content="Tue Mar 17 10:03:45 UTC 2015">
<meta name="keywords" content="www.next-reports.com">
<title>Rapport Liste Accessoires</title>
 <meta charset="utf-8">
 <link   href="css/rapp.css" rel="stylesheet">
 <script src="js/bootstrap.min.js"></script>
</head> 
<body>


<table style='width:100%'>
<tr>
<th width="126" scope="row"><div align="left" class="Style25"><a href="index_cust.php" title="Retour" class="Style7 Style6 "><span class="Style88">Retour</span></a></div></th>
<td class='Header0_0' rowspan=1 colspan=4>Liste des accessoires</td></tr>
<td class='Header1_0' rowspan=1 colspan=7>
<?php 
$today = date ("D j, M,Y H:i:s");
echo " $today "; 
?>
</td>
</tr>

<tr><td class='Header2_0' rowspan=1 colspan=1>Nom Client</td><td class='Header2_1' rowspan=1 colspan=1>Nom accessoire</td><td class='Header2_2' rowspan=1 colspan=1>Modèle</td><td class='Header2_3' rowspan=1 colspan=1>Type</td><td class='Header2_4' rowspan=1 colspan=1>N° série</td><td class='Header2_5' rowspan=1 colspan=1>Localisation</td><td class='Header2_6' rowspan=1 colspan=1>Utilisateur</td></tr>
 
  <?php
       include_once ('database.php');
       $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql_view = "SELECT * FROM vtictan_customers_accessories v6 
	     order by v6.customers_id";

        $cpt = 0;
        $save_id = 0;
		 foreach ($pdo->query($sql_view) as $row) {
		 if (($cpt==0) || ($save_id <> $row['customers_id'])) {
		 echo '<tr><td class='. 'Group_Header10_0 rowspan=1 colspan=1>'. $row['customer_name']. '</td><td class='. 'Group_Header10_1'. ' rowspan=1 colspan=6>&nbsp;</td></tr>';
		 $cpt = $cpt + 1;
		 }
		  
         echo '<tr>';
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.''. '</td>';
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['name']. '</td>';		 
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['namemodel']. '</td>';
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['nametype']. '</td>';	 
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['serialacc']. '</td>';	
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['location']. '</td>';
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['users_id']. '</td>';	 
         $save_id = $row['customers_id'];

        echo '</tr>';
        }		
		echo '<td class=Footer0_0 rowspan=1 colspan=1>&nbsp;</td><td class='.'Footer0_1 rowspan=1 colspan=1>&nbsp;</td><td class=Footer0_2  rowspan=1 colspan=1>&nbsp;</td><td class='. 'Footer0_3 rowspan=1 colspan=1>&nbsp;</td><td class='.'Footer0_4 rowspan=1 colspan=1>&nbsp;</td><td class='.'Footer0_5 rowspan=1 colspan=1>&nbsp;</td><td class='.' Footer0_6 rowspan=1 colspan=1>&nbsp;</td></tr>';
		echo '</table>';
        Database::disconnect();
?>

</body>
</html>

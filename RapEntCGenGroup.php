<?php
// RapEntCLientsGroup.php
// Start the session
if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
// echo "session_started";
$profil =$_SESSION['profilAccess'];
//echo "profil dans RapEntCLientsGroup.php = $profil <br>";

}


?>

<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="author" content="NextReports">
<meta name="creator" content="NextReports 8.0">
<meta name="subject" content="Created by NextReports Designer 8.0">
<meta name="date" content="Tue Mar 17 10:03:45 UTC 2015">
<meta name="keywords" content="www.next-reports.com">
<title>RapportEntitesClients</title>
 <meta charset="utf-8">
 <link   href="css/rapp.css" rel="stylesheet">
 <script src="js/bootstrap.min.js"></script>
</head> 
<body>


<table style='width:100%'>
<tr>
<th width="126" scope="row"><div align="left" class="Style25"><a href="index_cust.php" title="Retour" class="Style7 Style6 "><span class="Style88">Retour</span></a></div></th>
<td class='Header0_0' rowspan=1 colspan=4>Liste des Clients </td></tr>
<td class='Header1_0' rowspan=1 colspan=7>
<?php 
$today = date ("D j, M,Y H:i:s");
echo " $today "; 
?>
</td>
</tr>

<tr><td class='Header2_0' rowspan=1 colspan=1>Compagnie</td><td class='Header2_1' rowspan=1 colspan=1>Nom du Client</td><td class='Header2_2' rowspan=1 colspan=1>GSM</td><td class='Header2_3' rowspan=1 colspan=1>Téléphone</td><td class='Header2_4' rowspan=1 colspan=1>Courriel</td><td class='Header2_5' rowspan=1 colspan=1>Adresse</td><td class='Header2_6' rowspan=1 colspan=1>Ville</td></tr>
 <?php
       include_once ('database.php');
       $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql_view = "SELECT * FROM vtictan_customers group by companynament";
/*
		$qview = $pdo->prepare($sql_view);
		$qview->execute(array());
        $row = $qview->fetch(PDO::FETCH_ASSOC);
		$companynament = $row['companynament'];
*/
        $cpt = 0;
       $save_id = 0;
		 foreach ($pdo->query($sql_view) as $row) {
		 if (($cpt==0) || ($save_id <> $row['idencust'])) {
		 echo '<tr><td class='. 'Group_Header10_0 rowspan=1 colspan=1>'. $row['companynament']. '</td><td class='. 'Group_Header10_1'. ' rowspan=1 colspan=6>&nbsp;</td></tr>';
		 $cpt = $cpt + 1;
		 }
		  
         echo '<tr>';
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.''. '</td>';
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['customer_name']. '</td>';
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['mobilecust']. '</td>';	 
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['phonecust']. '</td>';	
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['emailcust']. '</td>';
		 echo '<td class='.'Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['addresscust']. '</td>';	
		 echo '<td class=Detail0_0'. ' '.' rowspan=1 colspan=1>'.$row['towncust']. '</td>';		 
         $save_id = $row['idencust'];

        echo '</tr>';
        }		
		echo '<td class=Footer0_0 rowspan=1 colspan=1>&nbsp;</td><td class='.'Footer0_1 rowspan=1 colspan=1>&nbsp;</td><td class=Footer0_2  rowspan=1 colspan=1>&nbsp;</td><td class='. 'Footer0_3 rowspan=1 colspan=1>&nbsp;</td><td class='.'Footer0_4 rowspan=1 colspan=1>&nbsp;</td><td class='.'Footer0_5 rowspan=1 colspan=1>&nbsp;</td><td class='.' Footer0_6 rowspan=1 colspan=1>&nbsp;</td></tr>';
		echo '</table>';
        Database::disconnect();
?>

</body>
</html>

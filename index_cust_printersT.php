<?php
if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
}
include_once 'database.php';	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./css/mbcsmbmcp.css" type="text/css" />
<script language=JavaScript>
<!--
function reload(form)
{
var val=form.entities_id.options[form.entities_id.options.selectedIndex].value;
self.location='index_cust_printers.php?entities_id=' + val ;
}
//-->
</script>	
</head>
 
<<body onload=disableselect();>

<div class="container">
	<div class="row">
			<p>
			</p>
	<?php
 // index_cust_techstaff.php               
				$profil = $_SESSION['profilAccess'];
                $inclure='./entete'.$profil.'.php';
		        include $inclure ;
				
// include_once 'database.php';	

			
@$entities_id=$_GET['entities_id']; // Use this line or below line if register_global is off
if(strlen($entities_id) > 0 and !is_numeric($entities_id)){ // to check if $cat is numeric data or not. 
echo "Data Error";
exit;
}
///////// Getting the data from Mysql table for first list box//////////
$quer2="SELECT DISTINCT companyname, id FROM tictan_entities order by companyname"; 
///////////// End of query for first list box////////////
echo "quer2=$quer2 <br>";
/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($entities_id) and strlen($entities_id) > 0){
$quer="SELECT DISTINCT customer_name FROM tictan_customers where entities_id=$entities_id order by customer_name"; 
}else{$quer="SELECT distinct customer_name FROM tictan_customers order by customer_name"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////
echo "quer=$quer  length(entities_id) = strlen($entities_id) <br>";				


	?>
	</div>
</div>
    <div class="container">
            <div class="row">
                <h3>Gestion de Client/Site</h3>
            </div>
            <div class="row">
            <p>			
    		</p>
	
			
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Client/Site</th>
                          <th>Adresse</th>
                          <th>Localité</th>		                          
						  <th>Téléphone</th>	
                          <th>Adresse email</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
					  
echo "<form method=post name=f1 action='index_cust_list.php?customer_id=$data[customer_name]'>";
/// Add your form processing page address to action in above line. Example  action=dd-check.php////
//////////        Starting of first drop downlist /////////
echo "<select name='entities_id' onchange=\"reload(this.form)\"><option value=''>Choisir une Entité</option>";
  $pdo = Database::connect();
foreach ($pdo->query($quer2) as $data2) {
$noter=$data2['id'] ;
//echo "data2(id) = $noter <br>";
// while($data2 = mysql_fetch_array($quer2)) { 
if($data2['id']==@$entities_id){echo "<option selected value='$data2[id]'>$data2[companyname]</option>"."<BR>";
}
else{echo  "<option value='$data2[id]'>$data2[companyname]</option>";}
}
echo "</select>";
//////////////////  This will end the first drop down list ///////////


//////////        Starting of second drop downlist /////////
echo "<select name='client'><option value=''>Choisir un site</option>";
//while($data = mysql_fetch_array($quer)) { 
foreach ($pdo->query($quer) as $data) {
echo  "<option value='$data[customer_name]'>$data[customer_name]</option>";
}
echo "</select>";
//////////////////  This will end the second drop down list ///////////
//// Add your other form fields as needed here/////
echo "<input type=submit value=Submit>";
echo "</form>";					  
					  
                       include 'database.php';
	//				   $profil = $_SESSION['profilAccess'];
	//				   echo " index_cust ====>  profil = $profil <br>";
                       $pdo = Database::connect();
                       $sql = 'SELECT * FROM tictan_customers WHERE is_deleted = 0 ORDER BY id DESC';
                       foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['customer_name'] . '</td>';
                                echo '<td>'. $row['address'] . '</td>';
                                echo '<td>'. $row['town'] . '</td>';								
                                echo '<td>'. $row['phone'] . '</td>';								
                                echo '<td>'. $row['email'] . '</td>';
								if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
    							echo '<td width=250>';
								else echo '<td width=50>';
                                echo '<a class="btn" href="read_cust.php?id='.$row['id'].'">Voir</a>';
                                echo ' ';
								if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {
                                echo '<a class="btn btn-success" href="update_cust.php?id='.$row['id'].'">Modifier</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_cust.php?id='.$row['id'].'">Supprimer</a>';
								}
								echo '</td>';
                                echo '</tr>';
                       }
                       Database::disconnect();
                      ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
<script language="javascript">	
function ValidateON()
{
 var m="mon texte"; 
 var confirmation=confirm("Pas d'accès pour votre profil");  
 alert ("Pas d'accès a cette fonctionalité");
}
</script>	
</body>
</html>

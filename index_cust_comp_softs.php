<?php
if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
// echo "session_started";
$profil =$_SESSION['profilAccess'];

 if ( !empty($_GET['id'])) {
        $id  = $_REQUEST['id'];
//		echo "1.  id=$id <br>";
		
    }
	if ( !empty($_GET['entities_id'])) {
 //       $entities_id  = $_REQUEST['entities_id'];
//		$_SESSION['entities_id']=$entities_id;		
		$entities_id = $_SESSION['entities_id'];		
		$entities_save=$entities_id;
//			echo "2.  entities_id=$entities_id , entities_save=$entities_save <br>";
    }
	else  {
	$entities_id=$_SESSION['entities_id'];
	$entities_save=$entities_id;
//	echo "apres session entities_id=$entities_id <br>";
	}
	if ( !empty($_GET['customers_id'])) {
        $customers_id  = $_REQUEST['customers_id'];
//		echo "3.  customers_id=$customers_id <br>";
		$_SESSION['customers_id']=$customers_id;		
    }
	else  {
	$customers_id=$_SESSION['customers_id'];
//	echo "apres session customers_id=$customers_id  entities_save=$entities_save <br>";
	}
 //   
     
 //$id  = $_REQUEST['id'];
//	 		echo " 2.  id=$id <br>";
//	$_SESSION['customers_id']=$customers_id;	
	
	if ( !empty($_GET['computers_id'])) {
        $computers_id  = $_REQUEST['computers_id'];
//		echo "3.  computers_id=$computers_id <br>";
		$_SESSION['customers_id']=$customers_id;		
    }
	else  {
	$computers_id=$_SESSION['computers_id'];
//	echo "apres session computers_id=$computers_id  entities_save=$entities_save <br>";
	}
	if ( !empty($_GET['pcname'])) {
        $pcname  = $_REQUEST['pcname'];
//		echo "8.  pcname=$pcname <br>";
		$_SESSION['pcname']=$pcname;		
    }
	else  {
	$pcname=$_SESSION['pcname'];
//	echo "apres session pcname=$pcname  entities_save=$entities_save <br>";
	}
		if ( !empty($_GET['name'])) {
        $name  = $_REQUEST['name'];
//		echo "9.  name=$name <br>";
		$_SESSION['name']=$name;		
    }
//  else  {
//	$name=$_SESSION['name'];
//	echo "apres session name=$name <br>";
//	}

if ( !empty($_GET['computers_id'])) {
        $computers_id  = $_REQUEST['computers_id'];
//		echo "index_cust_comp_disks.  computers_id=$computers_id <br>";
		$_SESSION['computers_id']=$computers_id;		
    }
	else  {
	$computers_id=$_SESSION['computers_id'];
//	echo "apres session computers_id=$computers_id   <br>";
	}

}


?>

<html>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <link   href="css/bootstrap.min.css" rel="stylesheet">
 <script src="js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="./css/mbcsmbmcp.css" type="text/css" />
</head>
 
<body>
 <div class="container">
 <div class="row">

 <?php
 include 'entete_variables.php';					
?>			
 </div>
 <p>
 </p>
 <div class="row">
<?php 
// echo "entities_id=$entities_id, customers_id=$customers_id, computers_id=$computers_id <br>";
 if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 		
echo ' <a href="create_cust_comp_softs.php?pcname='.$pcname.'&entities_id='.$entities_id.'&companyname='.$companyname.'&customers_id='.$customers_id.'&customer_name='.$customer_name.'&computers_id='.$computers_id.'" class="btn btn-success">Ajout logiciel</a>';
 else
 echo ' <a href="create_cust_comp_softs.php?pcname='.$pcname.'&entities_id='.$entities_id.'&companyname='.$companyname.'&customers_id='.$customers_id.'&customer_name='.$customer_name.'&computers_id='.$computers_id.'" onClick="ValidateON()" class="btn btn-success">Ajout logiciel</a>';
?>
 <table class="table table-striped table-bordered" >
 <thead>
 <tr class="rowcomputer">
 <th>Logiciel</th>
 <th>Description logiciel</th>
 <th>Type de logiciel</th>								  
 <th>License</th>	
 <th>Date début</th>	
  <th>Date fin</th>	
 <th>Ordinateur</th>						  
 <th>Choix</th>
 </thead>
 <tbody>
 <?php
   include 'database.php';
  $profil = $_SESSION['profilAccess'];
  $pdo = Database::connect();					   
  echo "<h5> Liste des logiciels du Client $companyname/ $customer_name </h5>";

  $sql = 'select * from vtictan_cust_comp_soft where customers_id='; 
  $sql = $sql.$customers_id.' and entities_id='.$entities_id. ' and computers_id='.$computers_id .' and is_deleted = 0 order by name';
 // echo "sql = $sql <br>";
  foreach ($pdo->query($sql) as $row) {
  echo '<tr class="rowcomputer">';
  echo '<td>'. $row['name'] . '</td>';			
  echo '<td>'. $row['namemodel'] . '</td>';	
  echo '<td>'. $row['nametype'] . '</td>';	
  echo '<td>'. $row['licence'] . '</td>';	
  echo '<td>'. $row['start_date'] . '</td>';
  echo '<td>'. $row['end_date'] . '</td>';
  echo '<td>'. $row['pcname'] . '</td>';	

  // parametre 	 a passer
  if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
  echo '<td width=250>';
  else echo '<td width=50>';						
  echo '<a class="btn" href="read_cust_comp_softs.php?id='.$row['id'].'">Voir</a>';
  echo ' ';
  if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {
   echo '<a class="btn btn-success" href="update_cust_comp_softs.php?id='.$row['id'].'&pcname='.$pcname.'&entities_id='.$entities_id.'&companyname='.$companyname.'&customers_id='.$customers_id.'&customer_name='.$customer_name.'&computers_id='.$computers_id.'&name='.$row['name'].'">Modifier</a>';  
  echo ' ';
  echo '<a class="btn btn-danger" href="delete_cust_comp_softs.php?id='.$row['id'].'&pcname='.$pcname.'&entities_id='.$entities_id.'&companyname='.$companyname.'&customers_id='.$customers_id.'&customer_name='.$customer_name.'&computers_id='.$computers_id.'">Supprimer</a>';
  }
  echo '</td>';
  echo '</tr>';
  } 

  Database::disconnect();				   
 ?>					  
 </tbody>
</table>
 <div class="form-actions">
 <?php 
//   $customers_id = $row['customers_id'] ;
//  $customer_name = $row['customer_name'] ;
 ?>
 
 <table  width="900" height="30" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
 <tr valign="baseline">
      <td width="100" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">	
        </div></td>
      <td width="200">
      </td>
	  <td width="300" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
	    </div>
	  </td>
      <td width="300" height="42" align="right" nowrap >
	  <div>
	  </div>
	  <p>
	  </p>
	  
 <a class="btn" href="softs_list.php?entities_id=<?php echo $entities_id; ?>&customers_id=<?php echo $customers_id; ?>&customer_name=<?php echo $customer_name;?> &type=softwares">Retour</a>
	  </td>  
 </tr> 
  </table>	
 </div> <!-- /container -->
<script language="javascript">	
function ValidateON()
{
 var m="mon texte"; 
 var confirmation=confirm("Pas d'accès pour votre profil"); 
 // alert ("validateOn");
	
 //if (confirmation){ 
  //action à faire pour la valeur true 
alert ("Pas d'accès a cette fonctionalité");

//	}
	   
}
</script>	
</body>
</html>

<?php
 session_start(); 
// recuperation des variables de session pour le passage de parametres d'une forme a une autre

   include 'database.php';

  if ( !empty($_GET['id'])) {
        $id  = $_REQUEST['id'];
//		echo "1.  id=$id <br>";
		
    }
	if ( !empty($_GET['entities_id'])) {
        $entities_id  = $_REQUEST['entities_id'];
		$_SESSION['entities_id']=$entities_id;		
		$entities_save=$entities_id;
//			echo "2.  entities_id=$entities_id , entities_save=$entities_save <br>";
    }
	else  {
	$entities_id=$_SESSION['entities_id'];
	$entities_save=$entities_id;
//	echo "apres session entities_id=$entities_id <br>";
	}
	if ( !empty($_GET['companyname'])) {
        $companyname  = $_REQUEST['companyname'];
		$_SESSION['companyname']=$companyname;		
		$companyname_save=$companyname;
//			echo "2.  companyname=$companyname  <br>";
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
     
 $id  = $_REQUEST['id'];
//	 		echo " 2.  id=$id <br>";
	$_SESSION['customers_id']=$customers_id;	
	
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
		if ( !empty($_GET['drivename'])) {
        $name  = $_REQUEST['name'];
//		echo "9.  drivename=$drivename <br>";
		$_SESSION['name']=$drivename;		
    }
	else  {
	$name=$_SESSION['drivename'];
//	echo "apres session drivename=$drivename <br>";
	}
	
	if(isset($_POST['submit'])){
		 $id = $_REQUEST['id'];
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tictan_cust_comp_virdrive SET is_deleted=1 WHERE id =".$id;
//	    echo "SUBMIT <br> sql=$sql <br>";
		
        $q = $pdo->prepare($sql); 
        $q->execute(array($id));
		$sql1 = "select * from vtictan_cust_comp_virtuels where id=".$id;
//   echo "            <br> sql1=$sql1 <br>";		
		$q1 = $pdo->prepare($sql1);
        $q1->execute(array($id));
        $data1 = $q1->fetch(PDO::FETCH_ASSOC);	
        $entities_id = $data1[entities_id];		
//        $customers_id = $data1[customers_id];	
//		$computers_id = $data1[computers_id];
		$companyname = $data1[companyname];
		echo "entities_id=$entities_id <br>";
//		echo "companyname=$companyname <br>";
		header ("Location: index_cust_comp_virtuels.php?entities_id=$entities_id&companyname=$companyname&computers_id=$computers_id&type=virtuels");

	 
		$id=0;
    } 
	else { 
	$idsave = $id;
//	echo "pas MIS A JOUR <br>";
    }
    Database::disconnect();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row" align="center">
                        <h3>Suppression d'un lecteur</h3>
                    </div>
                     
                    <form name="delete_cust_comp_virtuels" class="form-horizontal" action="delete_cust_comp_virtuels.php?id=<?php echo $id; ?>&pcname=<?php echo $pcname; ?>&entities_id=<?php echo $entities_id; ?>&companyname=<?php echo $companyname; ?>&customers_id=<?php echo $customers_id; ?>" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <div class="form-actions" align="center">					  
                      <p class="alert alert-error">Confirmer la suppression du lecteur virtuel ?</p>
                      </div> 
    <div class="form-actions" align="center">
                         <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Suppression" >
                         <a class="btn" href="index_cust_comp_virtuels.php?entities_id=<?php echo $entities_id; ?> &companyname=<?php echo $companyname;?>&computers_id=<?php echo $computers_id;?>&type=disks">Retour</a>
	              </td>  
                          
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
<SCRIPT language="javascript">	
	function ValidateON()
{
 var m="mon texte"; 
 var confirmation=confirm("Confirmez-vous la Suppression?"); 
 // alert ("validateOn");
	
 if (confirmation){ 
  //action à faire pour la valeur true 
 alert ("Enregistrement supprimé");

	}
	   
}
</script>
  </body>
</html>
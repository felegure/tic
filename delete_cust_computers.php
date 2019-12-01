<?php
 session_start(); 
// recuperation des variables de ssion pour le passage de parametres d'une forme a une autre

   include 'database.php';

    $id = 0;
  	if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
		$idsave=$id;
		
	} 

	if(isset($_POST['submit'])){
		 $id = $_REQUEST['id'];
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tictan_customers_computers  SET is_deleted=1 WHERE id =".$id;
//	echo "SUBMIT <br> sql=$sql <br>";
		
        $q = $pdo->prepare($sql); 
        $q->execute(array($id));
		$sql1 = "select * from tictan_customers_computers where id=".$id;
		$q1 = $pdo->prepare($sql1);
        $q1->execute(array($id));
        $data1 = $q1->fetch(PDO::FETCH_ASSOC);	
        $entities_id = $data1[entities_id];		
        $customers_id = $data1[customers_id];	
//		header("Location: computer_comp_list.php");		
	 header("Location: computer_comp_list.php?entities_id=$entities_id&customers_id=$customers_id&type=computers_comp");
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
                        <h3>Suppression d'un Ordinateur</h3>
                    </div>
                     
                    <form name="delete_cust_computers" align="center" class="form-horizontal" action="delete_cust_computers.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
		              <div class="form-actions" align="center">			  
                      <p class="alert alert-error">Confirmer la suppression de l'ordinateur ?</p>
					  </div>
                      <div class="form-actions" align="center">
                         <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Suppression" >
                          <a class="btn" href="computer_comp_list.php">Non</a>
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
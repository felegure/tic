<?php
  session_start();   
  include 'database.php';
  $profil = $_SESSION['profilAccess'];
  $id = 0;
  if ( !empty($_GET['id'])) {
     $id = $_REQUEST['id'];
	 $idsave=$id;
  } 
  if(isset($_POST['submit'])){
	 $id = $_REQUEST['id'];
	 $pdo = Database::connect();
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "UPDATE tictan_customers_coprinters  SET is_deleted=1 WHERE id =".$id;
     $q = $pdo->prepare($sql);
     $q->execute(array($id));
	 header("Location: printer_list.php");
	 $id=0;
    } 
	else { 
	$idsave = $id;
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
                        <h3>Suppression d'une Imprimante</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete_cust_printers.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error" align="center" >Confirmer la suppression de l'imprimante ?</p>
                      <div class="form-actions" align="center" >
                          <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Suppression" >
                          <a class="btn" href="printer_list.php">Non</a>
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
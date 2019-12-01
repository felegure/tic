<?php
    session_start();
    include 'database.php';
	$profil = $_SESSION['profilAccess'];
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
		$idsave=$id;
//		echo "1. id=$id <br> ";
    }
   
	if(isset($_POST['submit'])){
//echo "POST <br> ";
  //      $id = $_REQUEST['id'];       // keep track post values     
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tictan_entities  SET is_deleted=1 WHERE id =".$id;
//		echo "sql=$sql <br>";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: index_ent.php");
        $id=null;       
    }
	else { 
	
	$idsave = $id;
//	echo " NOT POST xxxxxxxxxxxxxxxxxxxxxx  idsave  = $idsave <br>";
    }
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
                        <h3>Suppression d'une Entité/Client</h3>
                    </div>
                     
                    <form class="form-horizontal"  name="delete_entities" align="center" action="delete_entities.php?id=$id" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>">
                      <p class="alert alert-error" align="center" >Confirmer la suppression de l'Entité/Client ?</p>
                      <div class="form-actions" align="center">
                          <input name="submit" type="submit"  class="btn btn-danger"  onClick='ValidateON()' value="Suppression" >
                          <a class="btn"  href="index_ent.php">Non</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
<script language="javascript">	
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
  </body>
</html>
<?php
session_start(); 
   
  include 'database.php';
  $profil = $_SESSION['profilAccess'];

  $id = 0;
  	if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
		$_SESSION['id'] = $id;	
	} 

	 if(isset($_POST['submit'])){

		$pdo = Database::connect();
		$id=$_SESSION['id'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tictan_users  SET is_deleted=1 WHERE id =".$id;
//	   echo "sqlNOT EMPTY =$sql <br>";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
			header("Location: index_users.php");
	//	}
	//	$id=0;
    } 
	else { 
   // echo  "not submit id=$id <br>";
   // echo "not POST <br>";
	$idsave = $id;

    }

    Database::disconnect();
////////////////

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
                        <h3>Suppression d'un utilisateur</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete_users.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error" align="center">Confirmer la suppression?</p>
                      <div class="form-actions" align="center">
                          <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Suppression" >
                          <a class="btn" href="index_users.php">Non</a>
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
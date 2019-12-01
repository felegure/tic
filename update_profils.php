<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index_profils.php");
    }

	
	    if ( !empty($_POST)) {

	//	require 'checkFields.php';

        $profilError = null;
        $descriptionError = null;
        $commentError = null;
        $authorError = null;
        $mod_dateError = null;
        $is_deletedError	 = null;
		
		$profil = $_POST['profil'];
        $description = $_POST['description'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
        $mod_date = $_POST['mod_date'];
		$is_deleted = $_POST['is_deleted'];
	
	   $valid = true;
	
        if (empty($profil)) {
            $profilError = 'Entrez le profil de l\'employé';
            $valid = false;
        }
  
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE tictan_profil set profil = ?, description = ?,comment = ?,author = ?, mod_date = ?, is_deleted = ? 
			WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($profil,$description, $comment, $author, $mod_date, $is_deleted, $id));
            Database::disconnect();
            header("Location: index_profils.php");
        }
       
        } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tictan_profil where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		
		$profil = $data['profil'];
		$description = $data['description'];
		$comment = $data['comment'];
		$author = $data['author'];
		$mod_date = $data['mod_date'];
		$is_deleted = $data['is_deleted'];
        Database::disconnect();
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
                    <div class="row">
                        <h3>Modifier un profil</h3>
                    </div>
             
                    <form class="form-horizontal" action="update_profils.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($profilError)?'error':'';?>">					
                     <label class="control-label">Profil</label>
						 <div class="controls">
							 <input name="profil" type="text"  placeholder="profil" value="<?php echo !empty($profil)?$profil:'';?>">
                            <?php if (!empty($profilError)): ?>
                                <span class="help-inline"><?php echo $profilError;?></span>
                            <?php endif; ?>
                         </div>
					   </div>
                       <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
					     <label class="control-label">Description</label>
						 <div class="controls">
							 <input name="description" type="text"  placeholder="description" value="<?php echo !empty($description)?$description:'';?>">
                            <?php if (!empty($descriptionError)): ?>
                                <span class="help-inline"><?php echo $descriptionError;?></span>
                            <?php endif; ?>
                         </div>
					   </div>					   
					  <div class="control-group <?php echo !empty($commentError)?'error':'';?>">
                        <label class="control-label">Zone remarque</label>
                        <div class="controls">
                            <input name="comment" type="text"  placeholder="Remarque" value="<?php echo !empty($comment)?$comment:'';?>">
                            <?php if (!empty($commentError)): ?>
                                <span class="help-inline"><?php echo $commentError;?></span>
                            <?php endif;?>
                        </div>
                      </div>				                        
                      <div class="control-group <?php echo !empty($authorError)?'error':'';?>">
                        <label class="control-label">Modifie par</label>
                        <div class="controls">
                            <input name="author" type="text"  placeholder="Modifié par" value="<?php echo !empty($author)?$author:'';?>">
                            <?php if (!empty($authorError)): ?>
                                <span class="help-inline"><?php echo $authorError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($mod_dateError)?'error':'';?>">
                        <label class="control-label">Modifie le</label>
                        <div class="controls">
                            <input name="mod_date" type="text"  placeholder="Modifié le" value="<?php echo !empty($mod_date)?$mod_date:'';?>">
                            <?php if (!empty($mod_dateError)): ?>
                                <span class="help-inline"><?php echo $mode_dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
					  <div class="control-group <?php echo !empty($is_deletedError)?'error':'';?>">
                        <label class="control-label">Code suppression</label>
                        <div class="controls">
                            <input name="is_deleted" type="text"  placeholder="is_deleted" value="<?php echo !empty($is_deleted)?$is_deleted:'';?>">
                            <?php if (!empty($is_deletedError)): ?>
                                <span class="help-inline"><?php echo $is_deletedError;?></span>
                            <?php endif;?>
                        </div>
                      </div> 
					  
                      <div class="form-actions">
				          <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Mise a jour" >					  
                          <a class="btn" href="index_profils.php">Retour</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
		<SCRIPT language="javascript">	
	function ValidateON()
{
 var m="mon texte"; 
 var confirmation=confirm("Confirmez-vous la modification?"); 
 // alert ("validateOn");
	
 if (confirmation){ 
  //action à faire pour la valeur true 
 alert ("Enregistrement Modifié");

	}
	   
}
</script>
  </body>
</html>			
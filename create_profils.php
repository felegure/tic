<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
   
		require_once ('checkFields_profil.php');
		 
         // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tictan_profil (profil,description, comment,author, mod_date,is_deleted) 
			values(?, ?, ?,?, ?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($profil, $description, $comment, $author, $mod_date,$is_deleted));
            Database::disconnect();
            header("Location: index_profils.php");
        }
      
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
                        <h3>Ajouter un Profil</h3>
                    </div>
             
                    <form class="form-horizontal" action="create_profils.php" method="post">             
					   <div class="control-group <?php echo !empty($profilError)?'error':'';?>">
					     <label class="control-label">Profil</label>
						 <div class="controls">
							 <input name="profil" type="text" placeholder="profil" value="<?php echo !empty($profil)?$profil:'';?>">
                            <?php if (!empty($profilError)): ?>
                                <span class="help-inline"><?php echo $profilError;?></span>
                            <?php endif; ?>
                         </div>
					   </div>
					   <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
					     <label class="control-label">Description</label>
						 <div class="controls">
							 <input name="description" height="30" type="textarea" size="250" placeholder="description" value="<?php echo !empty($description)?$description:'';?>">
                            <?php if (!empty($descriptionError)): ?>
                                <span class="help-inline"><?php echo $descriptionError;?></span>
                            <?php endif; ?>
                         </div>
					   </div>					   
					  <div class="control-group <?php echo !empty($commentError)?'error':'';?>">
                        <label class="control-label">Zone remarque</label>
                        <div class="controls">
                            <input name="comment" type="textarea"  placeholder="Remarque" value="<?php echo !empty($comment)?$comment:'';?>">
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
					
                                         <div class="form-actions">
                          <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Ajout" >					  
                          <a class="btn" href="index_profils.php">Retour</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->  
	<SCRIPT language="javascript">	
	function ValidateON()
{
 var m="mon texte"; 
 var confirmation=confirm("Confirmez-vous l'ajout?"); 
 // alert ("validateOn");
	
 if (confirmation){ 
  //action à faire pour la valeur true 
 alert ("Enregistrement Inséré");

	}
	   
}
</script>
</body>
</html>

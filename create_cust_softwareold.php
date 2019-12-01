<?php
    session_start(); 
// recuperation des variables de ssion pour le passage de parametres d'une forme a une autre
	$customer_id = $_SESSION["customer_id"];
	$entities_id = $_SESSION["entities_id"];

	$companynament = $_SESSION["companynament"];										
	$customer_name = $_SESSION["customer_name"] ;


    require 'database.php';
    $pdo = Database::connect();
    $profil = $_SESSION['profilAccess'];
    if ($profil != 'A' && $profil != 'S') 
	header("Location: index_cust_software.php");
    if ( !empty($_POST)) {
        // keep track validation errors
			require_once ('checkFields_cust_software.php');				 
         // insert data
	
         if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tictan_customers_software(customers_id, entities_id, name, licence, editor, supplier, softmodel_id, softype_id,  
			users_id,groups_id,comment,author, start_date, end_date,date_mod, is_deleted ) 
			values(  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			
            $q = $pdo->prepare($sql);
            $q->execute(array($customer_id, $entities_id, $name, $licence, $editor, $supplier, $softmodel_id, $softype_id,
			$users_id, $groups_id, $comment, $author, $start_date, $end_date, $date_mod,$is_deleted ));

            Database::disconnect();	
           header("Location: index_cust_software.php");
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
                        <h3>Ajouter un nouveau logiciel/Site</h3>
                    </div>            
                    <form class="form-horizontal" action="create_cust_software.php" method="post">  
					 <div class="control-group <?php echo !empty($entities_idError)?'error':'';?>">
					      <label class="control-label">Nom Entite Client</label> 					 
						 <div class="controls">
							 <input name="entities_id" type="hidden"  placeholder="entities_id" readonly="true" value="<?php echo !empty($entities_id)?$entities_id:'';?>">
                             <input name="entities_name" type="text"  placeholder="entities_name" readonly="true" value="<?php echo !empty($companynament)?$companynament:'';?>">
						   <?php if (!empty($entities_idError)): ?>
                                <span class="help-inline"><?php echo $entities_idError;?></span>
                            <?php endif; ?> 							
                         </div>
					 </div> 
					 <div class="control-group <?php echo !empty($customer_idError)?'error':'';?>">
					     <label class="control-label">Nom site/Client</label>
						 					 <div class="controls">
							 <input name="customer_id" type="hidden"  placeholder="customer_id" readonly="true" value="<?php echo !empty($customer_id)?$customer_id:'';?>">
                             <input name="customers_name" type="text"  placeholder="customers_name" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
						   <?php if (!empty($customer_idError)): ?>
                                <span class="help-inline"><?php echo $customer_idError;?></span>
                            <?php endif; ?> 		
                     </div>
				     </div>	
					 <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					<label class="control-label">Nom du logiciel</label>
                        <div class="controls">
                            <input name="name" type="text" placeholder="Entrez le nom du logiciel" size=40 value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif;?>
					    </div>
						</div>	
					
						<div class="control-group <?php echo !empty($licenceError)?'error':'';?>">
					      <label class="control-label">Licence</label>
                          <div class="controls">
                            <input name="licence" type="text" placeholder="Licence" size="50" value="<?php echo !empty($licence)?$licence:'';?>">
                            <?php if (!empty($licenceError)): ?>
                                <span class="help-inline"><?php echo $licenceError;?></span>
                            <?php endif;?>
					    </div>
						</div>	
						
 					<div class="control-group <?php echo !empty($softmodel_idError)?'error':'';?>">
					     <label class="control-label">Modele</label>
						 <div class="controls">
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="softmodel_id" class="softmodel_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_softwaremodels WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						</dd>						
                    </div>
				    </div>	
					<div class="control-group <?php echo !empty($softype_idError)?'error':'';?>">
					     <label class="control-label">Type</label>
						 <div class="controls">
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="softype_id" class="softype_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_softwaretypes WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						</dd>						
                    </div>
				    </div>		

						<div class="control-group <?php echo !empty($start_dateError)?'error':'';?>">
					      <label class="control-label">Date début validité</label>
                          <div class="controls">
                            <input name="start_date" type="text" placeholder="Date debut validite" size="50" value="<?php echo !empty($start_date)?$start_date:'';?>">
                            <?php if (!empty($start_dateError)): ?>
                                <span class="help-inline"><?php echo $start_dateError;?></span>
                            <?php endif;?>
						 </div>
						 </div>	
	                       <div class="control-group <?php echo !empty($end_dateError)?'error':'';?>">						   
							 <label class="control-label">Date fin validité</label>
						     <div class="controls">
                             <input name="end_date" type="text" placeholder="Date fin validite" size="50" value="<?php echo !empty($end_date)?$end_date:'';?>">
                            <?php if (!empty($end_dateError)): ?>
                                <span class="help-inline"><?php echo $end_dateError;?></span>
                            <?php endif;?>
					    </div>
						</div>		

						<div class="control-group <?php echo !empty($editorError)?'error':'';?>">
					      <label class="control-label">Editeur</label>
                          <div class="controls">
                            <input name="editor" type="text" placeholder="Editeur" size="50" value="<?php echo !empty($editor)?$editor:'';?>">
                            <?php if (!empty($editorError)): ?>
                                <span class="help-inline"><?php echo $editorError;?></span>
                            <?php endif;?>
					    </div>
						</div>	

						<div class="control-group <?php echo !empty($supplierError)?'error':'';?>">
					      <label class="control-label">Fournisseur</label>
                          <div class="controls">
                            <input name="supplier" type="text" placeholder="Fournisseur" size="50" value="<?php echo !empty($supplier)?$supplier:'';?>">
                            <?php if (!empty($supplierError)): ?>
                                <span class="help-inline"><?php echo $supplierError;?></span>
                            <?php endif;?>
					    </div>
						</div>							
					  <div class="control-group <?php echo !empty($locationError)?'error':'';?>">
                        <label class="control-label">Lieu/salle</label>
                        <div class="controls">
                            <input name="location" type="text"  placeholder="Lieu" value="<?php echo !empty($location)?$location:'';?>">
                            <?php if (!empty($locationError)): ?>
                                <span class="help-inline"><?php echo $location;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($users_idError)?'error':'';?>">
                        <label class="control-label">Utilisateur</label>
                        <div class="controls">
                            <input name="users_id" type="text"  placeholder="Utilisateur" value="<?php echo !empty($users_id)?$users_id:'';?>">
                            <?php if (!empty($users_idError)): ?>
                                <span class="help-inline"><?php echo $users_id;?></span>
                            <?php endif;?>
                        </div>
                      </div>					  
					  <div class="control-group <?php echo !empty($groups_idError)?'error':'';?>">
                        <label class="control-label">Groupe</label>
                        <div class="controls">
                            <input name="groups_id" type="text"  placeholder="Groupe" value="<?php echo !empty($groups_id)?$groups_id:'';?>">
                            <?php if (!empty($groups_idError)): ?>
                                <span class="help-inline"><?php echo $groups_id;?></span>
                            <?php endif;?>
                        </div>
                      </div>					  
					  <div class="control-group <?php echo !empty($commentError)?'error':'';?>">
                        <label class="control-label">Zone remarque</label>
                        <div class="controls">
                            <textarea name="comment" type="text"  placeholder="Zone commentaire" value="<?php echo !empty($comment)?$comment:'';?>"></textarea>
                            <?php if (!empty($commentError)): ?>
                                <span class="help-inline"><?php echo $commentError;?></span>
                            <?php endif;?>
                        </div>
                      </div>				                        
                      <div class="control-group <?php echo !empty($authorError)?'error':'';?>">
                        <label class="control-label">Modifie par</label>
                        <div class="controls">
                            <input name="author" type="text"  placeholder="Modifie par" value="<?php echo !empty($author)?$author:'';?>">
                            <?php if (!empty($authorError)): ?>
                                <span class="help-inline"><?php echo $authorError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($date_modError)?'error':'';?>">
                        <label class="control-label">Modifie le</label>
                        <div class="controls">
                            <input name="date_mod" type="text"  placeholder="Modifie le" value="<?php echo !empty($date_mod)?$date_mod:'';?>">
                            <?php if (!empty($date_modError)): ?>
                                <span class="help-inline"><?php echo $date_modError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
					
     <div class="form-actions">
                          <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Ajout" >					  
                          <a class="btn" href="index_cust_software.php">Retour</a>
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
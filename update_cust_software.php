<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id '])) {
        $id  = $_REQUEST['id'];
//	echo "1.  id=$id <br>";
		
    }
     $id  = $_REQUEST['id'];
//	 		echo "                       2.  id=$id <br>";
			
    if ( null==$id  ) {
        header("Location: software_list.php");
    }
	
	
	if ( !empty($_POST)) {

    require 'checkFields_cust_upd_software.php';
		
        // update data
    if ($valid) {		
     require 'init_fields_upd_software.php';
     require 'maj_fields_upd_valid_software.php';
    } 
    } 
   
else {
 // 
 //echo "pas dans Post <br> ";
        require 'maj_fields_upd_else_post_software.php';
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
                        <h3>Modification du logiciel</h3>
                    </div>
             
                    <form class="form-horizontal" action="update_cust_software.php?id=<?php echo $id?>" method="post">
					  <div class="control-group <?php echo !empty($entities_idError)?'error':'';?>">
					      <label class="control-label">Nom Entite Client</label> 					 
						 <div class="controls">
							 <input name="entities_id" type="text"  placeholder="entities_id" readonly="true" value="<?php echo !empty($companynament)?$companynament:'';?>">
                            <?php if (!empty($entities_idError)): ?>
                                <span class="help-inline"><?php echo $entities_idError;?></span>
                            <?php endif; ?> 
							<input name="customers_id" type = "hidden" value="<?php echo $customers_id;?>"> 
                         </div>
					    </div> 
					   <div class="control-group <?php echo !empty($customer_nameError)?'error':'';?>">						   
                       <label class="control-label">Site/Client</label>
						 <div class="controls">
							 <input name="customer_name" type="text"  placeholder="customer_name" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
                            <?php if (!empty($customer_nameError)): ?>
                                <span class="help-inline"><?php echo $customer_nameError;?></span>
                            <?php endif; ?>
                         </div>
					    </div> 
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">						   
                     <label class="control-label">Nom du logiciel</label>
						 <div class="controls">
							 <input name="name" type="text"  placeholder="Nom du logiciel" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
				
                         </div>
					   </div>
				   
					   <div class="control-group <?php echo !empty($softwaremodels_idError)?'error':'';?>">						   
                       <label class="control-label">Modele</label>
						 <div class="controls">
						 <input name="softmodels_id2" type="text" readonly="true" size="20" value="<?php echo !empty($namemodel)?$namemodel:'';?>">	  
                            <?php if (!empty($namemodelError)): ?>
                                <span class="help-inline"><?php echo $namemodelError;?></span>
                            <?php endif; ?>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="softmodel_id" class="softmodel_id">
						<option value="0">NULL </option>
						<?php 
						$sql=mysqli_query($conn, "SELECT * FROM tictan_softwaremodels where is_deleted = 0");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
					    <input name="softmodels_id0" type="hidden" value="<?php echo $softmodel_id;?>">													
                         </div>
					   </div> 	
					   
						<div class="control-group <?php echo !empty($softype_idError)?'error':'';?>">						
                        <label class="control-label">Type</label>
						 <div class="controls">
						 <input name="softypes_id2" type="text" readonly="true" size="20" value="<?php echo !empty($nametype)?$nametype:'';?>">	  		 
                            <?php if (!empty($nametypeError)): ?>
                                <span class="help-inline"><?php echo $nametypeError;?></span>
                            <?php endif; ?>					
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="softype_id" class="softype_id">
						<option value="0">NULL </option>
						<?php 
						$sql=mysqli_query($conn, "SELECT * FROM tictan_softwaretypes where is_deleted = 0");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
				        <input name="softypes_id0" type="hidden" value="<?php echo $softype_id;?>">						
						
                         </div>
					   </div> 
                      <div class="control-group <?php echo !empty($licenceError)?'error':'';?>">
                        <label class="control-label">Numero de licence</label>
                        <div class="controls">
                            <input name="licence" type="text"  placeholder="Numero de licence" value="<?php echo !empty($licencesoft)?$licencesoft:'';?>">
                            <?php if (!empty($licenceError)): ?>
                                <span class="help-inline"><?php echo $licenceError;?></span>
                            <?php endif;?>
                        </div>
                      </div>						
  	                        
                       <div class="control-group <?php echo !empty($start_dateError)?'error':'';?>">
                        <label class="control-label">Date début validité</label>
                        <div class="controls">
                            <input name="start_date" type="text"  placeholder="Date début validité" value="<?php echo !empty($start_date)?$start_date:'';?>">
                            <?php if (!empty($start_dateError)): ?>
                                <span class="help-inline"><?php echo $start_dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
                       <div class="control-group <?php echo !empty($end_dateError)?'error':'';?>">
                        <label class="control-label">Date fin validité</label>
                        <div class="controls">
                            <input name="end_date" type="text"  placeholder="Date fin validité" value="<?php echo !empty($end_date)?$end_date:'';?>">
                            <?php if (!empty($end_dateError)): ?>
                                <span class="help-inline"><?php echo $end_dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>						  
                       <div class="control-group <?php echo !empty($editorError)?'error':'';?>">
                        <label class="control-label">Nom de l'editeur</label>
                        <div class="controls">
                            <input name="editor" type="text"  placeholder="editor" value="<?php echo !empty($editorsoft)?$editorsoft:'';?>">
                            <?php if (!empty($editorError)): ?>
                                <span class="help-inline"><?php echo $editorError;?></span>
                            <?php endif;?>
                        </div>
                      </div>						
  	                        
                        <div class="control-group <?php echo !empty($supplierError)?'error':'';?>">
                        <label class="control-label">Nom du fournisseur</label>
                        <div class="controls">
                            <input name="supplier" type="text"  placeholder="supplier" value="<?php echo !empty($suppliersoft)?$suppliersoft:'';?>">
                            <?php if (!empty($supplierError)): ?>
                                <span class="help-inline"><?php echo $supplierError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	                    
						  					  
					  <div class="control-group <?php echo !empty($groups_idError)?'error':'';?>">
                        <label class="control-label">Groupe</label>
                        <div class="controls">
                            <input name="groups_id" type="text"  placeholder="Groupe" value="<?php echo !empty($groups_id)?$groups_id:'';?>">
                            <?php if (!empty($groups_idError)): ?>
                                <span class="help-inline"><?php echo $groups_idError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
					  <div class="control-group <?php echo !empty($users_idError)?'error':'';?>">
                        <label class="control-label">Utilisateur</label>
                        <div class="controls">
                            <input name="users_id" type="text"  placeholder="Utilisateur" value="<?php echo !empty($users_id)?$users_id:'';?>">
                            <?php if (!empty($users_idError)): ?>
                                <span class="help-inline"><?php echo $users_idError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($commentError)?'error':'';?>">
                        <label class="control-label">Zone commentaire</label>
                        <div class="controls">
                            <input name="comment" type="text"  placeholder="Commentaire" value="<?php echo !empty($comment)?$comment:'';?>">
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
					  <div class="control-group <?php echo !empty($date_modError)?'error':'';?>">
                        <label class="control-label">Modifie le</label>
                        <div class="controls">
                            <input name="mod_date" type="text"  placeholder="Modifié le" value="<?php echo !empty($mod_date)?$mod_date:'';?>">
                            <?php if (!empty($mod_dateError)): ?>
                                <span class="help-inline"><?php echo $mod_dateError;?></span>
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
                          <a class="btn" href="software_list.php">Retour</a>
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
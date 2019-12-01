<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id '])) {
        $idcust  = $_REQUEST['id'];
    }
     $id  = $_REQUEST['id'];		
    if ( null==$id  ) {
        header("Location: network_list.php");
    }    
   if ( !empty($_POST)) {
    	require 'checkFields_cust_upd_networks.php';
        if ($valid) {		
        require 'init_fields_upd_networks.php';
        require 'maj_fields_upd_valid_networks.php';
	    } 
    } 
    else {
        require 'maj_fields_upd_else_post_networks.php';
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
                        <h3>Modification Equipement reseau</h3>
                    </div>
             
                    <form class="form-horizontal" action="update_cust_networks.php?id=<?php echo $id?>" method="post">
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
                     <label class="control-label">Nom du photocopieur</label>
						 <div class="controls">
							 <input name="namenetwork" type="text"  placeholder="namenetwork" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
				
                         </div>
					   </div>
				   
					   <div class="control-group <?php echo !empty($networkmodels_idError)?'error':'';?>">						   
                       <label class="control-label">Modele</label>
						 <div class="controls">
						 <input name="networkmodels_id2" type="text" readonly="true" size="20" value="<?php echo !empty($namemodel)?$namemodel:'';?>">		 
                            <?php if (!empty($namemodelError)): ?>
                                <span class="help-inline"><?php echo $namemodelError;?></span>
                            <?php endif; ?>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="networkmodels_id" class="networkmodels_id">
						<option value="0">NULL </option>
						<?php 
						$sql=mysqli_query($conn, "SELECT * FROM tictan_networkmodels where is_deleted = 0");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						<input name="networkmodels_id0" type="hidden" value="<?php echo $networkmodels_id;?>">					
                         </div>
					   </div> 	
					   
						<div class="control-group <?php echo !empty($networktypes_idError)?'error':'';?>">						
                        <label class="control-label">Type</label>
						 <div class="controls">
						 <input name="networktypes_id2" type="text" readonly="true" size="20" value="<?php echo !empty($nametype)?$nametype:'';?>">		 	 
                            <?php if (!empty($nametypeError)): ?>
                                <span class="help-inline"><?php echo $nametypeError;?></span>
                            <?php endif; ?>					
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="networktypes_id" class="networktypes_id">
						<option value="0">NULL </option>
						<?php 
						$sql=mysqli_query($conn, "SELECT * FROM tictan_networktypes where is_deleted = 0");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						<input name="networktypes_id0" type="hidden" value="<?php echo $networktypes_id;?>">	
                         </div>
					   </div> 
                      <div class="control-group <?php echo !empty($serialError)?'error':'';?>">
                        <label class="control-label">Numero de serie</label>
                        <div class="controls">
                            <input name="serial" type="text"  placeholder="Numero de serie" value="<?php echo !empty($serial)?$serial:'';?>">
                            <?php if (!empty($serialError)): ?>
                                <span class="help-inline"><?php echo $serialError;?></span>
                            <?php endif;?>
                        </div>
                      </div>						           
					  <div class="control-group <?php echo !empty($locationError)?'error':'';?>">
                        <label class="control-label">Localisation</label>
                        <div class="controls">
                            <input name="location" type="text"  placeholder="Localisation" value="<?php echo !empty($location)?$location:'';?>">
                            <?php if (!empty($locationError)): ?>
                                <span class="help-inline"><?php echo $locationError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
					  <div class="control-group <?php echo !empty($adresseipError)?'error':'';?>">
                        <label class="control-label">Adresse ip</label>
                        <div class="controls">
                            <input name="adresseip" type="text"  placeholder="Adresse ip" value="<?php echo !empty($adresseip)?$adresseip:'';?>">
                            <?php if (!empty($adresseipError)): ?>
                                <span class="help-inline"><?php echo $adresseipError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
					  
					  <div class="control-group <?php echo !empty($typeadressageError)?'error':'';?>">
                        <label class="control-label">Type adressage</label>
                        <div class="controls">
                            <input name="typeadressage" type="text"  placeholder="Type adressage" value="<?php echo !empty($typeadressage)?$typeadressage:'';?>">
                            <?php if (!empty($typeadressageError)): ?>
                                <span class="help-inline"><?php echo $typeadressageError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
					  <div class="control-group <?php echo !empty($connexionviaError)?'error':'';?>">
                        <label class="control-label">Connexion via</label>
                        <div class="controls">
                            <input name="connexionvia" type="text"  placeholder="Connexion via" value="<?php echo !empty($connexionvia)?$connexionvia:'';?>">
                            <?php if (!empty($connexionviaError)): ?>
                                <span class="help-inline"><?php echo $connexionviaError;?></span>
                            <?php endif;?>
                        </div>
                      </div>						  
					  <div class="control-group <?php echo !empty($locationError)?'error':'';?>">
                        <label class="control-label">Localisation</label>
                        <div class="controls">
                            <input name="location" type="text"  placeholder="Localisation" value="<?php echo !empty($location)?$location:'';?>">
                            <?php if (!empty($locationError)): ?>
                                <span class="help-inline"><?php echo $locationError;?></span>
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
                            <input name="comment" type="text"  placeholder="comment" value="<?php echo !empty($comment)?$comment:'';?>">
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
                            <input name="date_mod" type="text"  placeholder="Modifié le" value="<?php echo !empty($mod_date)?$mod_date:'';?>">
                            <?php if (!empty($date_modError)): ?>
                                <span class="help-inline"><?php echo $date_modError;?></span>
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
                          <a class="btn" href="network_list.php?entities_id=<?php echo $entities_id ?> &customer_id=<?php echo $data['customers_id'] ?>">Retour</a>
                        </div>			
                    </form>>
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
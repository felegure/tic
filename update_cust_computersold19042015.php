<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id '])) {
        $id  = $_REQUEST['id'];
	//	echo "1.  id=$id <br>";
		
    }
     $id  = $_REQUEST['id'];
	 //		echo " 2.  id=$id <br>";
			
    if ( null==$id  ) {
    require 'computer_list.php?entities_id=$entities_id';		
    }
	   if ( !empty($_POST)) {
 //    echo "dans POST <br> ";
    	require 'checkFields_cust_upd_computers.php';
        // update data
        if ($valid) {		
//	echo "valid???????????????????? <br>";
      require 'init_fields_upd_comp.php';
        require 'maj_fields_upd_valid_comp.php';
} 
} 

else {
 //       echo "PAS DANS POST <br>";
        require 'maj_fields_upd_else_post_comp.php';
//	

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
                        <h3>Modification Ordinateur</h3>
                    </div>
             
                    <form class="form-horizontal" action="update_cust_computers.php?id=<?php echo $id; ?>" method="post">
					  <div class="control-group <?php echo !empty($entities_idError)?'error':'';?>">
					      <label class="control-label">Nom Entite Client</label> 					 
						 <div class="controls">
							 <input name="entities_id" type="text"  placeholder="entities_id" readonly="true" value="<?php echo !empty($companynament)?$companynament:'';?>">
                            <?php if (!empty($companynamentError)): ?>
                                <span class="help-inline"><?php echo $companynamentError;?></span>
                            <?php endif; ?> 
					
                         </div>
					    </div> 
					   <div class="control-group <?php echo !empty($customer_nameError)?'error':'';?>">						   
                       <label class="control-label">Site/Client</label>
						 <div class="controls">
							 <input name="customers_id" type="text"  placeholder="customers_id" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
                            <?php if (!empty($customers_idError)): ?>
                                <span class="help-inline"><?php echo $customers_idError;?></span>
                            <?php endif; ?>
                         </div>
					    </div> 
                      <div class="control-group <?php echo !empty($pcnameError)?'error':'';?>">						   
                     <label class="control-label">Nom du Pc</label>
						 <div class="controls">
							 <input name="pcname" type="text"  placeholder="pcname" value="<?php echo !empty($pcname)?$pcname:'';?>">
                            <?php if (!empty($pcnameError)): ?>
                                <span class="help-inline"><?php echo $pcnameError;?></span>
                            <?php endif; ?>
				
                         </div>
					   </div>
				   
					   <div class="control-group <?php echo !empty($computermodels_idError)?'error':'';?>">						   
                       <label class="control-label">Modele</label>
						 <div class="controls">
						 <input name="computermodels_id2" type="text"  readonly="true" size="20" value="<?php echo !empty($namemodel)?$namemodel:'';?>">

						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="computermodels_id" class="computermodels_id">
						<option value="0">NULL </option>
						<?php 
						$sql=mysqli_query($conn, "SELECT * FROM tictan_computermodels where is_deleted = 0");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						<input name="computermodels_id0" type="hidden" value="<?php echo $computermodels_id;?>">
                         </div>
					   </div> 	
					   
						<div class="control-group <?php echo !empty($computertypes_idError)?'error':'';?>">						
                        <label class="control-label">Type</label>
						 <div class="controls">
						 <input name="computertypes_id2" type="text" readonly="true" size="20" value="<?php echo !empty($nametype)?$nametype:'';?>">
                            <?php if (!empty($nametypeError)): ?>
                                <span class="help-inline"><?php echo $nametypeError;?></span>
                            <?php endif; ?>					
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="computertypes_id" class="computertypes_id">
						<option value="0">NULL </option>
						<?php 
						$sql=mysqli_query($conn, "SELECT * FROM tictan_computertypes where is_deleted = 0");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
					    <input name="computertypes_id0" type="hidden" value="<?php echo $computertypes_id;?>">						
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
  	                        
                      <div class="control-group <?php echo !empty($processorError)?'error':'';?>">
                        <label class="control-label">Processeur</label>
                        <div class="controls">
                            <input name="processor" type="text"  placeholder="Processeur" value="<?php echo !empty($processor)?$processor:'';?>">
                            <?php if (!empty($processorError)): ?>
                                <span class="help-inline"><?php echo $processorError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ramError)?'error':'';?>">
                        <label class="control-label">Memoire vive</label>
                        <div class="controls">
                            <input name="ram" type="text"  placeholder="Memoire vide" value="<?php echo !empty($ram)?$ram:'';?>">
                            <?php if (!empty($ramError)): ?>
                                <span class="help-inline"><?php echo $ramError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($hddError)?'error':'';?>">
                        <label class="control-label">Disque dur</label>
                        <div class="controls">
                            <input name="hdd" type="text"  placeholder="Disque dur" value="<?php echo !empty($hdd)?$hdd:'';?>">
                            <?php if (!empty($ramError)): ?>
                                <span class="help-inline"><?php echo $hddError;?></span>
                            <?php endif;?>
                        </div>
                      </div>					  
                      <div class="control-group <?php echo !empty($cartegraphError)?'error':'';?>">
                        <label class="control-label">Carte graphique </label>
                        <div class="controls">
                            <input name="cartegraph" type="text"  placeholder="Carte graphique" value="<?php echo !empty($cartegraph)?$cartegraph:'';?>">
                            <?php if (!empty($cartegraphError)): ?>
                                <span class="help-inline"><?php echo $cartegraphError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
					   
						<div class="control-group <?php echo !empty($os_idError)?'error':'';?>">						
                        <label class="control-label">S.Expl</label>
						 <div class="controls"> 
						 <input name="os_id2" type="text"  readonly="true" size="20" value="<?php echo !empty($osname)?$osname:'';?>">
                            <?php if (!empty($osnameError)): ?>
                                <span class="help-inline"><?php echo $osnameError;?></span>
                            <?php endif; ?>					
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="os_id" class="os_id">
						<option value="0">NULL </option>
						<?php 
						$sql=mysqli_query($conn, "SELECT * FROM tictan_os where is_deleted = 0");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
					    <input name="os_id0" type="hidden" value="<?php echo $os_id;?>">						
                         </div>
					   </div> 	
						<div class="control-group <?php echo !empty($osvp_idError)?'error':'';?>">						
                        <label class="control-label">Version</label>
						 <div class="controls">
						 <input name="osvp_id2" type="text" readonly="true" size="20" value="<?php echo !empty($osvpname)?$osvpname:'';?>">
                            <?php if (!empty($osvpnameError)): ?>
                                <span class="help-inline"><?php echo $osvpnameError;?></span>
                            <?php endif; ?>					
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="osvp_id" class="osvp_id">
						<option value="0">NULL </option>
						<?php 
						$sql=mysqli_query($conn, "SELECT * FROM tictan_osvp where is_deleted = 0");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
					    <input name="osvp_id0" type="hidden" value="<?php echo $osvp_id;?>">					
                         </div>
					   </div> 	
						<div class="control-group <?php echo !empty($sessionameError)?'error':'';?>">
                        <label class="control-label">Nom de session</label>
                        <div class="controls">
                            <input name="sessioname" type="text"  placeholder="Nom de session" value="<?php echo !empty($sessioname)?$sessioname:'';?>">
                            <?php if (!empty($sessionameError)): ?>
                                <span class="help-inline"><?php echo $sessionameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($domainameError)?'error':'';?>">
                        <label class="control-label">Domaine</label>
                        <div class="controls">
                            <input name="domainame" type="text"  placeholder="Nom du domaine" value="<?php echo !empty($domainame)?$domainame:'';?>">
                            <?php if (!empty($domainameError)): ?>
                                <span class="help-inline"><?php echo $domainameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	 
						  <div class="control-group <?php echo !empty($spasswordError)?'error':'';?>">
                        <label class="control-label">Mot de passe</label>
                        <div class="controls">
                            <input name="spassword" type="text"  placeholder="Mot de passe" value="<?php echo !empty($spassword)?$spassword:'';?>">
                            <?php if (!empty($spasswordError)): ?>
                                <span class="help-inline"><?php echo $spasswordError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	 				  
 						  <div class="control-group <?php echo !empty($teamv_lognameError)?'error':'';?>">
                        <label class="control-label">Teamviewer logoname</label>
                        <div class="controls">
                            <input name="teamv_logname" type="text"  placeholder="Teamviewer logoname" value="<?php echo !empty($teamv_logname)?$teamv_logname:'';?>">
                            <?php if (!empty($teamv_lognameError)): ?>
                                <span class="help-inline"><?php echo $teamv_lognameError;?></span>
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
                        <label class="control-label">Zone remarque</label>
                        <div class="controls">
					<input name="comment" placeholder="Zone commentaire" cols="60" value="<?php echo !empty($comment)?$comment:'';?>">
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
                          <a class="btn" href="computer_list.php?entities_id=<?php echo $entities_id ?> &customer_id=<?php echo $data['customers_idcust'] ?>">Retour</a>
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
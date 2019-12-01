<?php
    session_start(); 
// recuperation des variables de ssion pour le passage de parametres d'une forme a une autre
	$customer_id = $_SESSION["customer_id"];
	$entities_id = $_SESSION["entities_id"];

	$companynament = $_SESSION["companynament"];
	$customer_id = $_SESSION["customer_id"];												
	$customer_name = $_SESSION["customer_name"] ;


    require 'database.php';
    $pdo = Database::connect();
   $profil = $_SESSION['profilAccess'];
    if ($profil != 'A' && $profil != 'S') 
	  header("Location: index_cust_network.php");
    if ( !empty($_POST)) {
        // keep track validation errors
			require_once ('checkFields_cust_network.php');				 
         // insert data
	
         if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tictan_customer_network(customers_id, entities_id, serial, name, networkmodels_id, networktypes_id,  
			adresseip, typeadressage, connexionvia, location, users_id,groups_id,comment,author, date_mod, is_deleted ) 
			values( ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			
//	A VOIR
// 		echo "INSERTION = $sql <br>";
// 				echo "Un contact créé <br>";
			
            $q = $pdo->prepare($sql);
            $q->execute(array($customer_id, $entities_id, $serial, $name, $networkmodels_id, $networktypes_id,
			 $adresseip, $typeadressage, $connexionvia, $location, $users_id, $groups_id, $comment, $author, $date_mod,$is_deleted ));

            Database::disconnect();
			
           header("Location: index_cust_network.php");
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
                        <h3>Ajouter un Equipement reseau/Site</h3>
                    </div>            
                    <form class="form-horizontal" action="create_cust_network.php" method="post">  
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
					<label class="control-label">Nom equipement</label>
                        <div class="controls">
                            <input name="name" type="text" placeholder="Entrez l'identification de l'equipement" size=40 value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif;?>
					    </div>
						</div>	
		
						<div class="control-group <?php echo !empty($networkmodels_idError)?'error':'';?>">
					     <label class="control-label">Modele</label>
						 <div class="controls">
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="networkmodels_id" class="networkmodels_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_networkmodels WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						</dd>						
                    </div>
				    </div>	
	                 <div class="control-group <?php echo !empty($networktypes_idError)?'error':'';?>">
					     <label class="control-label">Type</label>
						 <div class="controls">
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="networktypes_id" class="networktypes_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_networktypes WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						</dd>						
                    </div>
				    </div>		
		
					<div class="control-group <?php echo !empty($serialError)?'error':'';?>">
					<label class="control-label">Numero de serie</label>
                        <div class="controls">
                            <input name="serial" type="text" placeholder="Entrez le numero de serie" size="40" value="<?php echo !empty($serial)?$serial:'';?>">
                            <?php if (!empty($serialError)): ?>
                                <span class="help-inline"><?php echo $serialError;?></span>
                            <?php endif;?>
					    </div>
						</div>		
	
					  <div class="control-group <?php echo !empty($adresseipError)?'error':'';?>">
                        <label class="control-label">Adresse ip</label>
                        <div class="controls">
                            <input name="adresseip" type="text"  placeholder="Adresse ip" value="<?php echo !empty($adresseip)?$adresseip:'';?>">
                            <?php if (!empty($teamv_lognameError)): ?>
                                <span class="help-inline"><?php echo $$adresseip;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
					  <div class="control-group <?php echo !empty($typeadressageError)?'error':'';?>">
                        <label class="control-label">Type adressage</label>
                        <div class="controls">
                            <input name="typeadressage" type="text"  placeholder="Type adressage" value="<?php echo !empty($typeadressage)?$typeadressage:'';?>">
                            <?php if (!empty($teamv_lognameError)): ?>
                                <span class="help-inline"><?php echo $$adresseip;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
					  <div class="control-group <?php echo !empty($connexionviaError)?'error':'';?>">
                        <label class="control-label">Connexion via</label>
                        <div class="controls">
                            <input name="connexionvia" type="text"  placeholder="Connexion via" value="<?php echo !empty($connexionvia)?$connexionvia:'';?>">
                            <?php if (!empty($connexionviaError)): ?>
                                <span class="help-inline"><?php echo $connexionvia;?></span>
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
                          <a class="btn" href="index_cust_network.php">Retour</a>
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

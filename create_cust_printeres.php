<?php
session_start(); 
// recupration des variables de ssion pour le passage de parametres d'une forme a une autre

include 'recuperation_variables.php';
require 'database.php';
$pdo = Database::connect();
$profil = $_SESSION['profilAccess'];
if ($profil != 'A' && $profil != 'S') 
header("Location: index_cust_printers.php");
if ( !empty($_POST)) {
        // keep track validation errors
			require_once ('checkFields_cust_printers.php');				 
         // insert data
	
if ($valid) {
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO tictan_customers_coprinters(customers_id, entities_id, serial, name, coprintersmodels_id, coprinterstypes_id,  
    	adresseip, typeadressage, connexionvia, location, users_id,groups_id,comment,author, date_mod, is_deleted ) 
		values( ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			
$q = $pdo->prepare($sql);
$q->execute(array($customer_id, $entities_id, $serial, $name, $coprintersmodels_id, $coprinterstypes_id,
              	  $adresseip, $typeadressage, $connexionvia, $location, $users_id, $groups_id, $comment, $author, $date_mod,$is_deleted ));
		
echo "Un enregistrement ajoute  "; 
for ($i=0; $i<3000; $i++) {
             //echo 'Ceci est une boucle for en PHP';
;
}

Database::disconnect();		
header("Location: index_cust_printers.php");
}

}
	// a voir
	/// <form action="" method="post" name="SuppressionL" target="_parent"><table width="963" border="1" cellpadding="2" cellspacing="2">
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<title>Ajout imprimante</title>
<style type="text/css">
<!--
.Style25 {
	font-size: 16px;
	color: #000099;
	font-weight: bold;
}
.Style31 {color: #000000}
-->


<!--
.Style1 {
	font-size: 18px;
	color: #0000FF;
	font-weight: bold;
}
.Style19 {
	font-size: 18px;
	color: #006600;
	font-weight: bold;
}
.Style21 {font-size: 9px}
.Style22 {color: #000033 ;
font-size:12px}
.Style23 {color: #00CC66}
.Style24 {color: #000066}
.Style30 {color: #000099; font-weight: bold; }
.Style32 {color: #000000; font-weight: bold; }
-->
</style>

</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Ajouter une imprimante/Site</h3>
                    </div>            
                    <form class="form-horizontal" action="create_cust_printers.php" method="post">  
                    <table  width="1200" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">					
					 <div class="control-group <?php echo !empty($entities_idError)?'error':'';?>">
					      <label class="control-label">Nom Entite Client</label> 					 
				
							 <input name="entities_id" type="hidden"  placeholder="entities_id" readonly="true" value="<?php echo !empty($entities_id)?$entities_id:'';?>">
                             <input name="entities_name" type="text"  placeholder="entities_name" readonly="true" value="<?php echo !empty($companynament)?$companynament:'';?>">
						   <?php if (!empty($entities_idError)): ?>
                                <span class="help-inline"><?php echo $entities_idError;?></span>
                            <?php endif; ?> 							

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
					<label class="control-label">Nom de l'imprimante</label>
                        <div class="controls">
                            <input name="name" type="text" placeholder="Entrez le Nom de l'imprimante" size=40 value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif;?>
					    </div>
						</div>	
		
						<div class="control-group <?php echo !empty($coprintersmodels_idError)?'error':'';?>">
					     <label class="control-label">Modele</label>
						 <div class="controls">
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="coprintersmodels_id" class="coprintersmodels_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_coprintersmodels WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						</dd>						
                    </div>
				    </div>	
	                 <div class="control-group <?php echo !empty($coprinterstypes_idError)?'error':'';?>">
					     <label class="control-label">Type</label>
						 <div class="controls">
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="coprinterstypes_id" class="coprinterstypes_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_coprinterstypes WHERE is_deleted = 0 order by id ASC");
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
</table>					
               <div class="form-actions">
                          <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Ajout" >					  
                          <a class="btn" href="index_cust_printers.php">Retour</a>
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

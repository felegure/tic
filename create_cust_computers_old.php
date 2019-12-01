<?php
    session_start(); 
// recuperation des variables de select session pour le passage de parametres d'une forme a une autre
	$customers_id = $_SESSION["customer_id"];
	$entities_id = $_SESSION["entities_id"];
	$companynament = $_SESSION["companynament"];
	$customers_id = $_SESSION["customer_id"];												
	$customer_name = $_SESSION["customer_name"] ;
//	echo "create_cust_computers , entities_id = $entities_id , companynament = $companynament <br>";
//	echo "create_cust_computers.php customers_id = $customers_id , customer_name = $customer_name <br>";

    require 'database.php';
    $pdo = Database::connect();
	$profil = $_SESSION['profilAccess'];
    if ($profil != 'A' && $profil != 'S') 
	  header("Location: index_cust_computers.php");
    if ( !empty($_POST)) {
        // keep track validation errors
			require_once ('checkFields_cust_computers.php');	
			echo "!empty <br>";
	
    if ($valid) {
       $pdo = Database::connect();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "INSERT INTO tictan_customer_computers (customers_id, entities_id, serial,pcname, computermodels_id, computertypes_id, processor, ram, hdd,cartegraph, 
	   os_id,osvp_id, domainame, sessioname, spassword,teamv_logname, adresseip, typeadressage, connexionvia, location, 
	   users_id,groups_id,comment,author, 
	   mod_date, is_deleted ) 
	   values( ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  ?, ?, ?, ?, ?,?,?,?, ?, ?, ?)";
		echo "sql=$sql <br>";	
		$processor = $_POST['processor'];
        $ram = $_POST['ram'];
        $hdd = $_POST['hdd'];
        $cartegraph = $_POST['cartegraph'];
			
        $q = $pdo->prepare($sql);
        $q->execute(array($customers_id, $entities_id, $serial,$pcname, $computermodels_id, $computertypes_id, $processor, $ram, $hdd, $cartegraph, $os_id, $osvp_id,
		$domainame, $sessioname, $spassword,$teamv_logname, $adresseip, $typeadressage, $connexionvia, $location,  
		$users_id,$groups_id,$comment,$author, $mod_date,$is_deleted ));
		
        Database::disconnect();
			
        header("Location: index_cust_computers.php");
        }
else echo "not valid <br>";
  }
  else 	echo "Eempty <br>";
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
                        <h3>Ajouter un ordinateur/Site</h3>
                    </div>            
                    <form class="form-horizontal" action="create_cust_computers.php" method="post">  
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
					 <div class="control-group <?php echo !empty($customers_idError)?'error':'';?>">
					     <label class="control-label">Nom site/Client</label>
						 					 <div class="controls">
							 <input name="customerS_id" type="hidden"  placeholder="customers_id" readonly="true" value="<?php echo !empty($customers_id)?$customers_id:'';?>">
                             <input name="customers_name" type="text"  placeholder="customers_name" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
						   <?php if (!empty($customers_idError)): ?>
                                <span class="help-inline"><?php echo $customers_idError;?></span>
                            <?php endif; ?> 		
                     </div>
				     </div>	
					 <div class="control-group <?php echo !empty($pcnameError)?'error':'';?>">
					<label class="control-label">Entrez le Nom du Pc</label>
                        <div class="controls">
                            <input name="pcname" type="text" placeholder="Nom du PC" size="60" value="<?php echo !empty($pcname)?$pcname:'';?>">
                            <?php if (!empty($pcnameError)): ?>
                                <span class="help-inline"><?php echo $pcnameError;?></span>
                            <?php endif;?>
					    </div>
						</div>		
						<div class="control-group <?php echo !empty($computermodels_idError)?'error':'';?>">
					     <label class="control-label">Modele</label>
						 <div class="controls">
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="computermodels_id" class="computermodels_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_computermodels WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						</dd>						
                    </div>
				    </div>	
	                 <div class="control-group <?php echo !empty($computertypes_idError)?'error':'';?>">
					     <label class="control-label">Type</label>
						 <div class="controls">
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="computertypes_id" class="computertypes_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_computertypes WHERE is_deleted = 0 order by id ASC");
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

					<div class="control-group <?php echo !empty($processorError)?'error':'';?>">
					<label class="control-label">Type de processeur</label>
                        <div class="controls">
                            <input name="processor" type="text" placeholder="Entrez le type de processeur" size="40" value="<?php echo !empty($processor)?$processor:'';?>">
                            <?php if (!empty($processorError)): ?>
                                <span class="help-inline"><?php echo $processorError;?></span>
                            <?php endif;?>
					    </div>
						</div>
					<div class="control-group <?php echo !empty($ramError)?'error':'';?>">
					<label class="control-label">Ram</label>
                        <div class="controls">
                            <input name="ram" type="text" placeholder="Entrez la capacité ram" size="40" value="<?php echo !empty($ram)?$ram:'';?>">
                            <?php if (!empty($ramError)): ?>
                                <span class="help-inline"><?php echo $ramError;?></span>
                            <?php endif;?>
					    </div>
						</div>		
					<div class="control-group <?php echo !empty($hddError)?'error':'';?>">
					<label class="control-label">hdd</label>
                        <div class="controls">
                            <input name="hdd" type="text" placeholder="Entrez la capacite Disque" size="40" value="<?php echo !empty($hdd)?$hdd:'';?>">
                            <?php if (!empty($hddError)): ?>
                                <span class="help-inline"><?php echo $hddError;?></span>
                            <?php endif;?>
					    </div>
						</div>	
					<div class="control-group <?php echo !empty($cartegraphError)?'error':'';?>">
					<label class="control-label">cartegraph</label>
                        <div class="controls">
                            <input name="cartegraph" type="text" placeholder="Type de carte graphique" size="60" value="<?php echo !empty($cartegraph)?$cartegraph:'';?>">
                            <?php if (!empty($cartegraphError)): ?>
                                <span class="help-inline"><?php echo $cartegraphError;?></span>
                            <?php endif;?>
					    </div>
						</div>							
					<div class="control-group <?php echo !empty($os_idError)?'error':'';?>">
					     <label class="control-label">Entrez le systeme d'exploitation</label>
						 <div class="controls">
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="os_id" class="os_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_os WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						</dd>						
                    </div>
				    </div>	
					<div class="control-group <?php echo !empty($osvp_idError)?'error':'';?>">
					     <label class="control-label">Service pack</label>
						 <div class="controls">
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="osvp_id" class="osvp_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_osvp WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						</dd>						
                    </div>
				    </div>	
					<div class="control-group <?php echo !empty($domainameError)?'error':'';?>">
                        <label class="control-label">Nom domaine</label>
                        <div class="controls">
                            <input name="domainame" type="text"  placeholder="Nom du domaine" value="<?php echo !empty($domainame)?$domainame:'';?>">
                            <?php if (!empty($domainError)): ?>
                                <span class="help-inline"><?php echo $domainError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
					  <div class="control-group <?php echo !empty($sessionameError)?'error':'';?>">
                        <label class="control-label">Nom de la session</label>
                        <div class="controls">
                            <input name="sessioname" type="text"  placeholder="Nom de la session" value="<?php echo !empty($sessioname)?$sessioname:'';?>">
                            <?php if (!empty($sessionameError)): ?>
                                <span class="help-inline"><?php echo $sessionError;?></span>
                            <?php endif;?>
                        </div>
                       </div>	
						<div class="control-group <?php echo !empty($spasswordError)?'error':'';?>">
                        <label class="control-label">Mot de passe session</label>
                        <div class="controls">
                            <input name="spassword" type="text"  placeholder="Mot de passe session" value="<?php echo !empty($spassword)?$spassword:'';?>">
                            <?php if (!empty($spasswordError)): ?>
                                <span class="help-inline"><?php echo $sessionError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
					  <div class="control-group <?php echo !empty($teamv_lognameError)?'error':'';?>">
                        <label class="control-label">Logname Teamviewer</label>
                        <div class="controls">
                            <input name="teamv_logname" type="text"  placeholder="Logname Teamviewer" value="<?php echo !empty($teamv_logname)?$teamv_logname:'';?>">
                            <?php if (!empty($teamv_lognameError)): ?>
                                <span class="help-inline"><?php echo $teamv_logname;?></span>
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
						  <textarea name="comment" placeholder="Zone commentaire" cols="60"></textarea>
                          
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
                      <div class="control-group <?php echo !empty($mod_dateError)?'error':'';?>">
                        <label class="control-label">Modifie le</label>
                        <div class="controls">
                            <input name="mod_date" type="text"  placeholder="Modifie le" value="<?php echo !empty($mod_date)?$mod_date:'';?>">
                            <?php if (!empty($mod_dateError)): ?>
                                <span class="help-inline"><?php echo $mode_dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
					
                      <div class="form-actions">
                          <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Ajout" >					  
                          <a class="btn" href="index_cust_computers.php">Retour</a>
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
 alert ("Enregistrement Insere");

	}
	   
}
</script>
</body>
</html>

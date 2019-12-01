<?php
     // je dois mettre le choix et le type d'ordinateur/Site
	 ///
	 session_start();
	// if (isset($_POST

// Echo session variables that were set on previous page
	echo 'create_cust_computers.php entity=$_SESSION["Entity"], customer=$_SESSION["Customer"] <br>';
echo 'session variables that were set on previous page';
echo "Favorite color is " . $_SESSION["Entity"] . ".<br>";
echo "Favorite animal is " . $_SESSION["Customer"] . ".";
if (isset($_GET["first"])) {
	     $first = $_GET["first"];
		 if ($first == 0) { 
		 $entity=$_GET["entity"];
		 $customer=$_GET["customer_name"];
	     echo "first = 0 entity=$entity   customer=$customer <br>";
//        $vEntity=$_SESSION["entity"]; 
//		$vCustomer=$_SESSION["customer"];
//	  echo "first = 0 vEntity=$vEntity   vCustomer=$vCustomer <br>";	

         } else {
			  $entity=$_GET["entity"];
		      $customer=$_GET["customer_name"];
	//		 	$vE = $_SESSION["Entity"];
	//			$vC = $_SESSION["Customer"] ;
//				$vEntity=$_SESSION["Entity"];
//				$vCustomer=$_SESSION["Customer"];
          	echo "first <> 0 entity=$entity   customer=$customer <br>";
//				echo "ELSE first <> vEntity=$vEntity   vCustomer=$vCustomer <br>";		
//				echo "Session variables are set. <br>";
//				echo 'computer_list.php <br> Entity=$vEntity ,  Customer=$vCustomer <br>';		  
           }
}
?>

<!DOCTYPE html>
<html>
<body>

<?php


    require 'database.php';
    $pdo = Database::connect();

    if ( !empty($_POST)) {
        // keep track validation errors
			require_once ('checkFields_cust_computers.php');				 
         // insert data

		 
       if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tictan_customer_computers (customers_id, entities_id, serial, pcname,  processor, ram, hdd, cartegraph,
			computermodels_id, computertypes_id,os_id, osvp_id, domainame, sessioname, spassword,teamv_logname, adresseip, 
			typeadressage, connexionvia, location, users_id,groups_id,comment,author, 
			mod_date, is_deleted ) 
			values( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
//	A VOIR
 //		echo "INSERTION = $sql <br>";
// 				echo "Un contact créé <br>";
			
            $q = $pdo->prepare($sql);
            $q->execute(array($customers_id, $entities_id, $serial,$pcname, $processor, $ram, $hdd, $cartegraph, $computermodels_id, $computertypes_id,  
			$os_id, $osvp_id,$domainame, $sessioname, $spassword,$teamv_logname, $adresseip, $typeadressage, $connexionvia, $location, $users_id,
			$groups_id,$comment,$author, $mod_date, $is_deleted ));
		
            Database::disconnect();
			
           header("Location:computer_list.php");
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
                        <h3>Ajouter un ordinateur/Site</h3>
                    </div>          				 	
                    <form class="form-horizontal" action="create_cust_computers.php">             
					<div class="control-group <?php echo !empty($entities_idError)?'error':'';?>">
					     <label class="control-label">Nom Entite Client</label>
						 <div class="controls">
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="entities_id" class="entities_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, companyname from tictan_entities WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['companyname'].'</option>';
						} 
						?>
						</select>
						</dd>	
					
                    </div>
				    </div>
					<div class="control-group <?php echo !empty($customers_idError)?'error':'';?>">			
					     <label class="control-label">Nom site/Client</label>
						 <div class="controls">
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="customers_id" class="customers_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, customer_name from tictan_customers WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['customer_name'].'</option>';
						} ?>
						</select>
						</dd>	
                    </div>
				    </div>					
					<div class="control-group <?php echo !empty($computermodels_idError)?'error':'';?>">
					     <label class="control-label">Choisissez un ordinateur</label>
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
					     <label class="control-label">Type PC</label>
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
					<label class="control-label">Numéro de série</label>
                        <div class="controls">
                            <input name="serial" type="text" placeholder="Entrez le numéro de série" size="40" value="<?php echo !empty($serial)?$serial:'';?>">
                            <?php if (!empty($serialError)): ?>
                                <span class="help-inline"><?php echo $serialError;?></span>
                            <?php endif;?>
					    </div>
						</div>		
 
			        <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					<label class="control-label">Entrez le Nom du Pc</label>
                        <div class="controls">
                            <input name="pcname" type="text" placeholder="Nom du PC" size="40" value="<?php echo !empty($pcname)?$pcname:'';?>">
                            <?php if (!empty($pcnameError)): ?>
                                <span class="help-inline"><?php echo $pcnameError;?></span>
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
                            <input name="hdd" type="text" placeholder="Entrez la capacité Disque" size="40" value="<?php echo !empty($hdd)?$hdd:'';?>">
                            <?php if (!empty($hddError)): ?>
                                <span class="help-inline"><?php echo $hddError;?></span>
                            <?php endif;?>
					    </div>
						</div>	
					<div class="control-group <?php echo !empty($cartegraphError)?'error':'';?>">
					<label class="control-label">carte graphique</label>
                        <div class="controls">
                            <input name="cartegraph" type="text" placeholder="Type de carte graphique" size="40" value="<?php echo !empty($cartegraph)?$cartegraph:'';?>">
                            <?php if (!empty($cartegraphError)): ?>
                                <span class="help-inline"><?php echo $cartegraphError;?></span>
                            <?php endif;?>
					    </div>
						</div>							
					<div class="control-group <?php echo !empty($os_idError)?'error':'';?>">
					     <label class="control-label">Entrez le système d'exploitation</label>
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
                                <span class="help-inline"><?php echo $adresseip;?></span>
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
						<dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="users_id" class="users_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select * from vtictan_customers_users order by customer_name_user ASC");
						while($row=mysqli_fetch_array($sql))
						{
					     echo '<option value="'.$row['user_id'].'">'.$row['username']. '  ' .$row['customer_name']. '</option>'; 		
						} ?>
						</select>
						</dd>	
					    </div>
                        </div>	
					  <div class="control-group <?php echo !empty($groups_idError)?'error':'';?>">
                        <label class="control-label">Groupe</label>
                        <div class="controls">
												<dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="groups_id" class="groups_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select * from vtictan_customers_group order by groupname ASC");
						while($row=mysqli_fetch_array($sql))
						{
					     echo '<option value="'.$row['group_id'].'">'.$row['groupname']. '  ' .$row['customer_name']. '</option>'; 		
						} ?>
						</select>
						</dd>
                        </div>
                      </div>					  
					  <div class="control-group <?php echo !empty($commentError)?'error':'';?>">
                        <label class="control-label">Zone remarque</label>
                        <div class="controls">
                            <input name="comment" type="text"  placeholder="Zone commentaire" value="<?php echo !empty($comment)?$comment:'';?>">
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
                      
                        <div class="controls">
                            <input name="mod_date" type="hidden"  value="<?php $today = date ("Y-m-j"); echo "$today";?>">
                            <?php if (!empty($mod_dateError)): ?>
                                <span class="help-inline"><?php echo $mode_dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
					
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Ajouter</button>
                          <a class="btn" href="computer_list.php?entity=$entities&customer_name=$row['customer_name']&first=1" method="post">Retour</a>
						 
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->  </body>
</html>

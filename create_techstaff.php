<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
   
		require_once ('checkFields_techstaff.php');
		 
         // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tictan_tecstaff (name,firstName, mobile, email, postcode,
			town, state, country, comment,author, mod_date,is_deleted) 
			values(?, ?, ?,?, ?,?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name, $firstName, $mobile, $email, $postcode,
			$town, $state, $country,$comment, $author, $mod_date,$is_deleted));
            Database::disconnect();
            header("Location: index_techstaff.php");
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
                        <h3>Ajouter un technicien</h3>
                    </div>
             
                    <form class="form-horizontal" action="create_techstaff.php" method="post">             

					<div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					<label class="control-label">Nom</label>
                        <div class="controls">
                            <input name="name" type="text" placeholder="Entrez le nom" size="40" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif;?>
					    </div>
						</div>		
					<div class="control-group <?php echo !empty($firstNameError)?'error':'';?>">
					<label class="control-label">Prénom</label>
                        <div class="controls">
                            <input name="firstName" type="text" placeholder="Entrez le prénom" size="40" value="<?php echo !empty($firstName)?$firstName:'';?>">
                            <?php if (!empty($firstNameError)): ?>
                                <span class="help-inline"><?php echo $firstNameError;?></span>
                            <?php endif;?>
					    </div>
						</div>	
					
					<div class="control-group <?php echo !empty($addressError)?'error':'';?>">
					<label class="control-label">Adresse</label>
                        <div class="controls">
                            <input name="address" type="text" placeholder="Entrez l'adresse" size="40" value="<?php echo !empty($address)?$address:'';?>">
                            <?php if (!empty($addressError)): ?>
                                <span class="help-inline"><?php echo $addressError;?></span>
                            <?php endif;?>
					    </div>
						</div>
   					   <div class="control-group <?php echo !empty($townError)?'error':'';?>">
					   <label class="control-label">Localite</label>
                        <div class="controls">
                            <input name="town" type="text" placeholder="Entrez la ville" size="30" value="<?php echo !empty($town)?$town:'';?>">
                            <?php if (!empty($townError)): ?>
                                <span class="help-inline"><?php echo $townError;?></span>
                            <?php endif;?>
					    </div>  
                        </div>						
                        <div class="control-group <?php echo !empty($postcodeError)?'error':'';?>">
						<label class="control-label">Code postal</label>
                       <div class="controls">
                            <input name="postcode" type="text" placeholder="Entrez le code postal" value="<?php echo !empty($postcode)?$postcode:'';?>">
                            <?php if (!empty($postcodeError)): ?>
                                <span class="help-inline"><?php echo $postcodeError;?></span>
                            <?php endif;?>
						</div>
						</div>
                        <div class="control-group <?php echo !empty($stateError)?'error':'';?>">
						<label class="control-label">Region</label>
                        <div class="controls">						  
                            <input name="state" type="text" placeholder="Entrez la région" value="<?php echo !empty($state)?$state:'';?>">
                            <?php if (!empty($stateError)): ?>
                                <span class="help-inline"><?php echo $stateError;?></span>
                            <?php endif;?>   
                        </div>	
						</div>						
                        <div class="control-group <?php echo !empty($countryError)?'error':'';?>">                     
						<label class="control-label">Pays</label>
                       <div class="controls">						   
                            <input name="country" type="text" placeholder="Entrez le pays" value="<?php echo !empty($country)?$country:'';?>">
                            <?php if (!empty($countryError)): ?>
                                <span class="help-inline"><?php echo $countryError;?></span>
                            <?php endif;?> 
						</div> 
						</div>
                        <div class="control-group <?php echo !empty($phoneError)?'error':'';?>">    
					    <label class="control-label">Numero de Telephone</label>
                       <div class="controls">						
                        <input name="phone" type="text"  placeholder="Entrez le numéro de télephone" value="<?php echo !empty($phone)?$phone:'';?>">
                            <?php if (!empty($phoneError)): ?>
                                <span class="help-inline"><?php echo $phoneError;?></span>
                            <?php endif;?>
						</div>	
						</div>
                        <div class="control-group <?php echo !empty($phone2Error)?'error':'';?>">    
					    <label class="control-label">Numero de Telephone (2ème)</label>
                       <div class="controls">						
                        <input name="phone2" type="text"  placeholder="Entrez le 2ème numéro de télephone" value="<?php echo !empty($phone2)?$phone2:'';?>">
                            <?php if (!empty($phone2Error)): ?>
                                <span class="help-inline"><?php echo $phone2Error;?></span>
                            <?php endif;?>
						</div>	
						</div>						
					   <div class="control-group <?php echo !empty($faxError)?'error':'';?>">    
						<label class="control-label">Numero de Fax</label>
						 <div class="controls">	
                        <input name="fax" type="text"  placeholder="Entrez le numéro de fax" value="<?php echo !empty($fax)?$fax:'';?>">
                            <?php if (!empty($phone2Error)): ?>
                                <span class="help-inline"><?php echo $phone2Error;?></span>
                            <?php endif;?>	
                       </div> 
					   </div>  
					   <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
                        <label class="control-label">Numero de Mobile</label>
                        <div class="controls">
                            <input name="mobile" type="text"  placeholder="Entrez le numéro de Mobile" value="<?php echo !empty($mobile)?$mobile:'';?>">
                            <?php if (!empty($mobileError)): ?>
                                <span class="help-inline"><?php echo $mobileError;?></span>
                            <?php endif;?>
                        </div>
			            </div>
                       <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Adresse email</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Entrez l'adresse email" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($websiteError)?'error':'';?>">
                        <label class="control-label">Site web</label>
                        <div class="controls">
                            <input name="website" type="text"  placeholder="Entrez le Site web" value="<?php echo !empty($website)?$website:'';?>">
                            <?php if (!empty($websiteError)): ?>
                                <span class="help-inline"><?php echo $websiteError;?></span>
                            <?php endif;?>
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
                          <a class="btn" href="index_techstaff.php">Retour</a>
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
 //alert ("Enregistrement Inséré");

	}
	   
}
</script>
</body>
</html>

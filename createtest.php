<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $companynameError = null;
        $vatcodeError = null;
		$account1Error = null;
		$account2Error = null;
        $customtypeError = null;
        $phoneError = null;
        $phone2Error = null;
        $mobileError = null;
        $faxError = null;
        $emailError = null;
        $websiteError = null;
        $addressError = null;
        $postcodeError = null;
        $townError = null;
        $stateError = null;
        $countryError = null;
        $commentError = null;
        $authorError = null;
        $mod_dateError = null;
        $is_delete = null;
		
        // keep track post values
  
		$companyname = $_POST['companyname'];
        $vatcode = $_POST['vatcode'];
        $account1 = $_POST['account1'];
        $account2 = $_POST['account2'];		
        $customtype = $_POST['customtype'];
        $phone = $_POST['phone'];
        $phone2 = $_POST['phone2'];
        $mobile = $_POST['mobile'];
        $fax = $_POST['fax'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $address = $_POST['address'];
        $postcode = $_POST['postcode'];
        $town = $_POST['town'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
        $mod_date = $_POST['mod_date'];
		$is_delete = 0;
		
	//	require_once ('checkFields.php');
		
		
		 $valid = true;
        if (empty($companyname)) {
            $companynameError = 'Entrez le nom/raison sociale';
            $valid = false;
        }
        if (empty($vatcode)) {
		    $vatcodeError = 'Entrez le code tva';
            $valid = false;
        }
		if (empty($account1)) {
            $account1Error = 'Entrez le numero de compte';
            $valid = false;
        }
		if (empty($account2)) {
            $account2Error = 'Entrez le 2ème numéro de compte';
            $valid = false;
        }
		if (empty($address)) {
            $addressError = 'Entrez l"adresse' ;
            $valid = false;
        }
		if (empty($town)) {
            $townError = 'Entrez la localité' ;
            $valid = false;
        }
		if (empty($postcode)) {
            $postcodeError = 'Entrez le code postal' ;
            $valid = false;
        }	
		if (empty($country)) {
            $countryError = 'Entrez le pays' ;
            $valid = false;
        }			
	    if (empty($phone)) {
            $phoneError = 'Entrez le numero de telephone fixe';
            $valid = false;
        }
	/*
     	if (empty($phone2)) {
            $phone2Error = 'Entrez le numero de telephone';
            $valid = false;
        }
	*/
		if (empty($mobile)) {
            $mobileError = 'Entrez le 2eme de mobile';
            $valid = false;
        }
		
		if (empty($fax)) {
            $faxError = 'Entrez le numero de fax';
            $valid = false;
        }
		if (empty($customtype)) {
            $customtypeError = 'Entrez le type de client';
            $valid = false;
        }
	/*	
	/*	
	if (empty($website)) {
            $websiteError = 'Entrez l'adresse du site web';
            $valid = false;
        }
        $customtype = $_POST['customtype'];
    */
		 
        if (empty($email)) {
            $emailError = 'Entrez une adresse email';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Entrez une adresse Email valide';
            $valid = false;
        }
         
		 
		 
         // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tictan_entities (companyname,vatcode,account1, account2, customtype,phone,phone2,mobile,fax,email,website,
			comment,is_delete,address,postcode,town,state,country,author) 
			values(?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($companyname,$vatcode,$account1, $account2, $customtype, $phone,
			$phone2, $mobile, $fax, $email, $website,$comment, $is_delete, $address, $postcode, $town, $state, $country, $author));

            Database::disconnect();
            header("Location: index.php");
        }
       
	
		
        // validate input  je dois continuer les controles de validités
		// pour les principaux champs à mettre dans une fonction php avec un require_once
		// fichier checkfields.php
		/*  
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
         
        if (empty($mobile)) {
            $mobileError = 'Please enter Mobile Number';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customers (name,email,mobile) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$email,$mobile));
            Database::disconnect();
            header("Location: index.php");
        }
		*/
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
                        <h3>Ajouter un Client</h3>
                    </div>
             
                    <form class="form-horizontal" action="createtest.php" method="post">             
					   <div class="control-group <?php echo !empty($companynameError)?'error':'';?>">
					     <label class="control-label">Raison sociale</label>
						 <div class="controls">
							 <input name="companyname" type="text"  placeholder="companyname" value="<?php echo !empty($companyname)?$companyname:'';?>">
                            <?php if (!empty($companynameError)): ?>
                                <span class="help-inline"><?php //echo $companynameError;?></span>
                            <?php endif; ?>
                         </div>
					   </div>
					   <div class="control-group <?php echo !empty($vatcodeError)?'error':'';?>">
					     <label class="control-label">Code tva</label>
						 <div class="controls">
							 <input name="vatcode" type="text"  placeholder="vatcode" value="<?php echo !empty($vatcode)?$vatcode:'';?>">
                            <?php if (!empty($vatcodeError)): ?>
                                <span class="help-inline"><?php echo $vatcodeError;?></span>
                            <?php endif; ?>
                         </div>
					   </div>					   
					   <div class="control-group <?php echo !empty($account1Error)?'error':'';?>">
					     <label class="control-label">Numero de compte</label>
						 <div class="controls">
							 <input name="account1" type="text"  placeholder="account1" value="<?php echo !empty($account1)?$account1:'';?>">
                            <?php if (!empty($account1Error)): ?>
                                <span class="help-inline"><?php echo $account1Error;?></span>
                            <?php endif; ?>
                         </div>
					   </div>
					   <div class="control-group <?php echo !empty($account2Error)?'error':'';?>">
					     <label class="control-label">Numero de compte (2eme)</label>
						 <div class="controls">
							 <input name="account2" type="text"  placeholder="account2" value="<?php echo !empty($account2)?$account2:'';?>">
                            <?php if (!empty($account2Error)): ?>
                                <span class="help-inline"><?php echo $account2Error;?></span>
                            <?php endif; ?>
                         </div>
					   </div>					  
					  <div class="control-group <?php echo !empty($addressError)?'error':'';?>">
					  <label class="control-label">Adresse</label>
                        <div class="controls">
                            <input name="address" type="text" placeholder="address" size="40" value="<?php echo !empty($address)?$address:'';?>">
                            <?php if (!empty($addressError)): ?>
                                <span class="help-inline"><?php echo $addressError;?></span>
                            <?php endif;?>
					    </div>
						</div>
   					   <div class="control-group <?php echo !empty($townError)?'error':'';?>">
					   <label class="control-label">Localite</label>
                        <div class="controls">
                            <input name="town" type="text" placeholder="town" size="30" value="<?php echo !empty($town)?$town:'';?>">
                            <?php if (!empty($townError)): ?>
                                <span class="help-inline"><?php echo $townError;?></span>
                            <?php endif;?>
					    </div>  
                        </div>						
                        <div class="control-group <?php echo !empty($postcodeError)?'error':'';?>">
						<label class="control-label">Code postal</label>
                       <div class="controls">
                            <input name="postcode" type="text" placeholder="postcode" value="<?php echo !empty($postcode)?$postcode:'';?>">
                            <?php if (!empty($postcodeError)): ?>
                                <span class="help-inline"><?php echo $postcodeError;?></span>
                            <?php endif;?>
						</div>
						</div>
                        <div class="control-group <?php echo !empty($stateError)?'error':'';?>">
						<label class="control-label">Region</label>
                        <div class="controls">						  
                            <input name="state" type="text" placeholder="state" value="<?php echo !empty($state)?$state:'';?>">
                            <?php if (!empty($stateError)): ?>
                                <span class="help-inline"><?php echo $stateError;?></span>
                            <?php endif;?>   
                        </div>	
						</div>						
                        <div class="control-group <?php echo !empty($countryError)?'error':'';?>">                     
						<label class="control-label">Pays</label>
                       <div class="controls">						   
                            <input name="country" type="text" placeholder="country" value="<?php echo !empty($country)?$country:'';?>">
                            <?php if (!empty($countryError)): ?>
                                <span class="help-inline"><?php echo $countryError;?></span>
                            <?php endif;?> 
						</div> 
						</div>
	                    <div class="control-group <?php echo !empty($customtypeError)?'error':'';?>">                     
						<label class="control-label">Type de Client</label>
                       <div class="controls">						   
                            <input name="customtype" type="text" placeholder="customtype" value="<?php echo !empty($customtype)?$customtype:'';?>">
                            <?php if (!empty($customtypeError)): ?>
                                <span class="help-inline"><?php echo $customtypeError;?></span>
                            <?php endif;?> 
						</div> 
						</div>
                        <div class="control-group <?php echo !empty($phoneError)?'error':'';?>">    
					    <label class="control-label">Numero de Téléphone</label>
                       <div class="controls">						
                        <input name="phone" type="text"  placeholder="phone" value="<?php echo !empty($phone)?$phone:'';?>">
                            <?php if (!empty($phoneError)): ?>
                                <span class="help-inline"><?php echo $phoneError;?></span>
                            <?php endif;?>
						</div>	
						</div>
						<div class="control-group <?php echo !empty($phone2Error)?'error':'';?>">    
						<label class="control-label">Numéro de Telephone (2eme)</label>
						 <div class="controls">	
                        <input name="phone2" type="text"  placeholder="phone2" value="<?php echo !empty($phone2)?$phone2:'';?>">
                            <?php if (!empty($phone2Error)): ?>
                                <span class="help-inline"><?php echo $phone2Error;?></span>
                            <?php endif;?>	
                       </div> 
					   </div>
					   <div class="control-group <?php echo !empty($faxError)?'error':'';?>">    
						<label class="control-label">Numero de Fax</label>
						 <div class="controls">	
                        <input name="fax" type="text"  placeholder="fax" value="<?php echo !empty($fax)?$fax:'';?>">
                            <?php if (!empty($phone2Error)): ?>
                                <span class="help-inline"><?php echo $phone2Error;?></span>
                            <?php endif;?>	
                       </div> 
					   </div>  
					   <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
                        <label class="control-label">Numero de Mobile</label>
                        <div class="controls">
                            <input name="mobile" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
                            <?php if (!empty($mobileError)): ?>
                                <span class="help-inline"><?php echo $mobileError;?></span>
                            <?php endif;?>
                        </div>
			            </div>
                       <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Adresse email</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($websiteError)?'error':'';?>">
                        <label class="control-label">Site web</label>
                        <div class="controls">
                            <input name="website" type="text"  placeholder="Site web" value="<?php echo !empty($website)?$website:'';?>">
                            <?php if (!empty($websiteError)): ?>
                                <span class="help-inline"><?php echo $websiteError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($commentError)?'error':'';?>">
                        <label class="control-label">Zone remarque</label>
                        <div class="controls">
                            <input name="comment" type="text"  placeholder="Remarque" value="<?php echo !empty($comment)?$comment:'';?>">
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
                            <input name="mod_date" type="text"  placeholder="Modifié par" value="<?php echo !empty($author)?$author:'';?>">
                            <?php if (!empty($mod_dateError)): ?>
                                <span class="help-inline"><?php echo $mode_dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
					  
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Ajoutez</button>
                          <a class="btn" href="index.php">Retour</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->  </body>
</html>

<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index_ent.php");
    }

	
	    if ( !empty($_POST)) {

	//	require 'checkFields.php';
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
        $is_deletedError	 = null;
		
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
		$is_deleted = $_POST['is_deleted'];
	
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
        

	
     
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE tictan_entities set companyname = ?, vatcode = ?,account1 = ?, account2 = ?, customtype = ?,
			phone = ?, phone2 = ?, mobile =? ,fax = ?,email = ?, website = ?,address = ? ,postcode = ? ,town = ?, state = ?,country = ?,comment = ?,
			author = ?, mod_date = ?, is_deleted = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($companyname,$vatcode, $account1, $account2, $customtype, $phone, $phone2, $mobile, $fax, $email, $website,
			$address, $postcode, $town, $state, $country, $comment, $author, $mod_date, $is_deleted, $id));
            Database::disconnect();
            header("Location: index_ent.php");
        }
       
        } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tictan_entities where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		
		$companyname = $data['companyname'];
		$vatcode = $data['vatcode'];
		$account1 = $data['account1'];
		$account2 = $data['account2'];
		$customtype =  $data['customtype'];
		$phone = $data['phone'];
		$phone2 = $data['phone2'];
		$mobile = $data['mobile'];
		$fax = $data['fax'];
		$email = $data['email'];
		$town = $data['town'];
		$website = $data['website'];
		$comment = $data['comment'];
		$address =  $data['address'];
		$postcode = $data['postcode'];
		$town = $data['town'];
	    $state = $data['state'];	
		$country = $data['country'];
		$author = $data['author'];
		$mod_date = $data['mod_date'];
		$is_deleted = $data['is_deleted'];
        Database::disconnect();
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
                        <h3>Modifier une Entité/Client</h3>
                    </div>
             
                    <form class="form-horizontal" action="update_ent.php?id=<?php echo $id?>" method="post">
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
                          <button type="submit" class="btn btn-success">Mise a jour</button>
                          <a class="btn" href="index_ent.php">Retour</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
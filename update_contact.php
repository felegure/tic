<?php
    require 'database.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index_contact.php");
    }

	  $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql_contacttype = "SELECT * FROM tictan_contacttypes where is_deleted = 0";
        $q_contacttype = $pdo->prepare($sql_contacttype);
        $q_contacttype->execute(array($id));
        $data_contacttype = $q_contacttype->fetch(PDO::FETCH_ASSOC);     
	    $contacttype_name = $data_contacttype['name'];
	    if ( !empty($_POST)) {

		require 'checkFields_contact.php';
    echo "dans post <br>";
      
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// pas de mise a jour de entities_id et customers_id
            $sql = "UPDATE tictan_customers_contacts set  name = ?, firstName = ?,phone = ?, phone2 = ?, 
			mobile =? ,fax = ?,email = ?,contacttypes_id = ?,comment = ?, address = ? ,postcode = ? , town = ?, state = ?,
			country = ?, author = ?, mod_date = ?, is_deleted = ? WHERE id = ?";
			
            $q = $pdo->prepare($sql);
            $q->execute(array( $name, $firstName, $phone, $phone2, $mobile, $fax, $email, $contacttypes_id, $comment,
			$address, $postcode, $town, $state, $country, $author, $mod_date, $is_deleted, $id));
            Database::disconnect();
            header("Location: index_contact.php");
        }
       
        } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tictan_customers_contacts where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);

		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];

		$name = $data['name'];
		$firstName = $data['firstName'];
		$phone = $data['phone'];
		$phone2 = $data['phone2'];
		$mobile = $data['mobile'];
		$fax = $data['fax'];
		$email = $data['email'];
		$town = $data['town'];
//		$website = $data['website'];
		$comment = $data['comment'];
		$address =  $data['address'];
		$postcode = $data['postcode'];
		$state = $data['state'];
		$country = $data['country'];
        $contacttypes_id = $data['contacttypes_id'];
		$author = $data['author'];
		$mod_date = $data['mod_date'];
		$is_deleted = $data['is_deleted'];
//	       Database::disconnect();	
	   $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sqlview = "SELECT * FROM vtictan_customers_contacts where customers_id_contacts = $customers_id and entities_id_contacts = $entities_id
		and is_deleted_contacts = 0 ";
        $qview = $pdo->prepare($sqlview);
        $qview->execute(array($id));
        $dataview = $qview->fetch(PDO::FETCH_ASSOC);
		$customer_name = $dataview['customer_name'];
		$contacttype_name = $dataview['name_contacttypes'];
		$contacttypes_id = $data['contacttypes_id'];
		$sql = "SELECT * from tictan_contacttypes where id = $contacttypes_id ";
		$q = $pdo->prepare($sql);
        $q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		
		$contacttypes_name = $data['name'];
		$companynament = $dataview['companynament'];
		$companynament = $dataview['companynament'];
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
                        <h3>Modifier un Contact Site/Client</h3>
                    </div>
             
                    <form class="form-horizontal" action="update_contact.php?id=<?php echo $id?>" method="post">
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
                     <label class="control-label">Nom du contact</label>
						 <div class="controls">
							 <input name="name" type="text"  placeholder="name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
				
                         </div>
					   </div>
					 <div class="control-group <?php echo !empty($firstNameError)?'error':'';?>">						   
                     <label class="control-label">Prenom du contact</label>
						 <div class="controls">
							 <input name="firstName" type="text"  placeholder="firstName" value="<?php echo !empty($firstName)?$firstName:'';?>">
                            <?php if (!empty($firstNameError)): ?>
                                <span class="help-inline"><?php echo $firstNameError;?></span>
                            <?php endif; ?>
                         </div>
					   </div> 
				   
					   <div class="control-group <?php echo !empty($contacttypes_idError)?'error':'';?>">						   
                       <label class="control-label">Type de contact</label>
						 <div class="controls">
						 <input name="contacttypes_id" type="text" placeholder="contacttypes_id" readonly="true" value="<?php echo !empty($contacttype_name)?$contacttype_name:'';?>">
                            <?php if (!empty($contacttype_nameError)): ?>
                                <span class="help-inline"><?php echo $contacttype_nameError;?></span>
                            <?php endif; ?>
						
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="contacttypes_id" class="contacttypes_id">
						<option value="0">NULL </option>
						<?php 
						$sql=mysqli_query($conn, "SELECT * FROM tictan_contacttypes where is_deleted = 0");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
					 

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
                        <label class="control-label">Region/Province : </label>
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

                        <div class="control-group <?php echo !empty($phoneError)?'error':'';?>">    
					    <label class="control-label">Numero de Telephone</label>
                       <div class="controls">						
                        <input name="phone" type="text"  placeholder="phone" value="<?php echo !empty($phone)?$phone:'';?>">
                            <?php if (!empty($phoneError)): ?>
                                <span class="help-inline"><?php echo $phoneError;?></span>
                            <?php endif;?>
						</div>	
						</div>
						
                        <div class="control-group <?php echo !empty($phoneError)?'error':'';?>">    
					    <label class="control-label">Numero de Téléphone (2ème)</label>
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
                          <a class="btn" href="index_contact.php">Retour</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
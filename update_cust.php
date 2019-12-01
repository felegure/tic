<?php
// modification : 25/03/2015
// enlever le state (rejion) et inverser code postal avec ville
    require_once 'database.php';
//
    $id = null;
    if ( !empty($_GET['id '])) {
        $id  = $_REQUEST['id'];
//		echo "1.  id=$id <br>";	
    }
     $id  = $_REQUEST['id'];
//	 		echo " 2.  id=$id <br>";			
    if ( null==$id  ) {
        header("Location: index_cust.php");
    }
	   if (!empty($_POST)) {
 //     echo "dans POST <br> ";
    	require 'checkFields_cust_upd.php';
        // update data
        if ($valid) {		
//		echo "valid???????????????????? <br>";
        require_once 'init_fields_upd_cust.php';
        require_once'maj_fields_upd_valid_cust.php';
} 
} 
else {
 //        echo "Pas dans POST <br>";
        require 'maj_fields_upd_else_post_cust.php';
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
                        <h3>Modifier un Site/Client</h3>
                    </div>
             
                    <form class="form-horizontal" action="update_cust.php?id=<?php echo $id?>" method="post">
					<div class="control-group <?php echo !empty($entities_idError)?'error':'';?>">
					    <label class="control-label">Nom Entite Client</label>
					    <div class="controls">            
						 <input name="customer_name" type="text"  readonly="true" placeholder="customer_name" 
						  value="<?php echo $customer_name;?>">
                    
                         </div>
					   </div>	
				       <div class="control-group <?php echo !empty($customtype_idError)?'error':'';?>">
					     <label class="control-label">Type Client</label>
						 <div class="controls">
	                     <input name="customtype_id2" type="text"  readonly="true" size="20" value="<?php echo !empty($namecustomtype)?$namecustomtype:'';?>">						 
						 <?php if (!empty($namecustomtypeError)): ?>
                                <span class="help-inline"><?php echo $namecustomtypeError;?></span>
                            <?php endif; ?>

				 
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="customtype_id" class="customtype_id">
						<option value="0">NULL </option>
						<?php 
						$sql=mysqli_query($conn, "select * from tictan_customtype WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
			            <input name="customtype_id0" type="hidden" value="<?php echo $customtype_id;?>">				

                     </div>
				    </div>						   
					   
                    <div class="control-group <?php echo !empty($customer_nameError)?'error':'';?>">						   
                     <label class="control-label">Site/Client</label>
						 <div class="controls">
							 <input name="customer_name" type="text"  placeholder="customer_name" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
                            <?php if (!empty($customer_nameError)): ?>
                                <span class="help-inline"><?php echo $customer_nameError;?></span>
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
                        <div class="control-group <?php echo !empty($postcodeError)?'error':'';?>">
						<label class="control-label">Code postal</label>
                       <div class="controls">
                            <input name="postcode" type="text" placeholder="postcode" value="<?php echo !empty($postcode)?$postcode:'';?>">
                            <?php if (!empty($postcodeError)): ?>
                                <span class="help-inline"><?php echo $postcodeError;?></span>
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
					    <label class="control-label">Numero de Téléphone</label>
                       <div class="controls">						
                        <input name="phone" type="text"  placeholder="phone" value="<?php echo !empty($phone)?$phone:'';?>">
                            <?php if (!empty($phoneError)): ?>
                                <span class="help-inline"><?php echo $phoneError;?></span>
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
				          <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Mise a jour" >					  
                          <a class="btn" href="index_cust.php">Retour</a>
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
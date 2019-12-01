<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
    if ( null==$id ) {
        header("Location: index_contact.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM vtictan_customers_contacts where idcontact = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
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
                        <h3>Détails du contact</h3>
                    </div>
           
		   <table class="table table-striped table-bordered"> 
             <thead>
     		   <div class="form-horizontal" >
			        <div class="control-group">
                        <label class="control-label">Nom Entite/Client : </label>
						<div class="controls">
                        <label class="checkbox">
					    <input name="companynament" type="text"  readonly="true" placeholder="companynament" 
					    value="<?php echo $data['companynament'];?>"						
                        </label>
                       </div>
					  </div>
                      <div class="control-group">
                        <label class="control-label">Nom Site/Client : </label>
						<div class="controls">
                        <label class="checkbox">
					    <input name="customer_name" type="text"  readonly="true" placeholder="customer_name" 
					    value="<?php echo $data['customer_name'];?>"											
                        </label>
                       </div>
					  </div>
					  <div class="control-group">
                        <label class="control-label">Nom : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="name_contacts" type="text"  readonly="true" placeholder="name_contacts" 
					        value="<?php echo $data['name_contacts'];?>"													
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Prénom : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="firstName_contacts" type="text"  readonly="true" placeholder="firstName_contacts" 
					        value="<?php echo $data['firstName_contacts'];?>"						
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Type de contact : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="name_contacttypes" type="text"  readonly="true" placeholder="name_contacttypes" 
					        value="<?php echo $data['name_contacttypes'];?>"						
                            </label>
                        </div>
                      </div>

					  
					  <div class="control-group">
                        <label class="control-label">Adresse : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="address_contacts" type="text"  readonly="true" placeholder="address_contacts" 
					        value="<?php echo $data['address_contacts'];?>"						
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Localité : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="town_contacts" type="text"  readonly="true" placeholder="town_contacts" 
					        value="<?php echo $data['town_contacts'];?>"						
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Code postal : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="postcode_contacts" type="text"  readonly="true" placeholder="postcode_contacts" 
					        value="<?php echo $data['postcode_contacts'];?>"						
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Région/Province : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="state_contacts" type="text"  readonly="true" placeholder="state_contacts" 
					        value="<?php echo $data['state_contacts'];?>"										
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Pays : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="country_contacts" type="text"  readonly="true" placeholder="country_contacts" 
					        value="<?php echo $data['country_contacts'];?>"				
                            </label>
                        </div>
                      </div>
					 
					  <div class="control-group">
                        <label class="control-label">Téléphone : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="phone_contacts" type="text"  readonly="true" placeholder="phone_contacts" 
					        value="<?php echo $data['phone_contacts'];?>"										
                            </label>
                        </div>
					  <div class="control-group">
                        <label class="control-label">Téléphone (2ème): </label>
                        <div class="controls">
                            <label class="checkbox">
				        <input name="phone2_contacts" type="text"  readonly="true" placeholder="phone2_contacts" 
					        value="<?php echo $data['phone2_contacts'];?>"																	
                            </label>
                        </div>						
					  <div class="control-group">
                        <label class="control-label">Fax : </label>
                        <div class="controls">
                            <label class="checkbox">
				        <input name="fax_contacts" type="text"  readonly="true" placeholder="fax_contacts" 
					        value="<?php echo $data['fax_contacts'];?>"																	
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Mobile : </label>
                        <div class="controls">
                            <label class="checkbox">
				            <input name="mobile_contacts" type="text"  readonly="true" placeholder="mobile_contacts" 
					        value="<?php echo $data['mobile_contacts'];?>"																	
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Adresse mail : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="email_contacts" type="text"  readonly="true" placeholder="email_contacts" 
					        value="<?php echo $data['email_contacts'];?>"																							
                            </label>
                        </div>
                      </div>
					   <div class="control-group">
                        <label class="control-label">Modifié par : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="author_contacts" type="text"  readonly="true" placeholder="author_contacts" 
					        value="<?php echo $data['author_contacts'];?>"																							
                            </label>
                        </div>
                      </div>
					   <div class="control-group">
                        <label class="control-label">Modifié le : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="mod_date_contacts" type="text"  readonly="true" placeholder="mod_date_contacts" 
					        value="<?php echo $data['mod_date_contacts'];?>"											
                            </label>
                        </div>
                      </div>
					 </thead>
				</table>	 
                        <div class="form-actions">
                          <a class="btn" href="index_contact.php">Retour</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

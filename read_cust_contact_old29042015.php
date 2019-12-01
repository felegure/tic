<?php
    require 'database.php';
	    $contacts_id = null;
    if ( !empty($_GET['contacts_id'])) {
        $contacts_id = $_REQUEST['contacts_id'];
    }
    if ( null==$contacts_id ) {
        header("Location: contact_all_list.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM vtictan_customers_contacts where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($contacts_id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
	    Database::disconnect();
    }
/*	
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
    if ( null==$id ) {
        header("Location: contact_all_list.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM vtictan_customers_contacts where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
	    Database::disconnect();
    }
*/
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
					    <input name="companyname" type="text"  readonly="true" placeholder="companyname" 
					    value="<?php echo $data['companyname'];?>"						
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
					        <input name="name" type="text"  readonly="true" placeholder="name" 
					        value="<?php echo $data['name'];?>"													
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Prénom : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="firstName" type="text"  readonly="true" placeholder="firstName" 
					        value="<?php echo $data['firstName'];?>"						
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Type de contact : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="contactypename" type="text"  readonly="true" placeholder="contactypename" 
					        value="<?php echo $data['contactypename'];?>"						
                            </label>
                        </div>
                      </div>

					  
					  <div class="control-group">
                        <label class="control-label">Adresse : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="address" type="text"  readonly="true" placeholder="address" 
					        value="<?php echo $data['address'];?>"						
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Localité : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="town" type="text"  readonly="true" placeholder="town" 
					        value="<?php echo $data['town'];?>"						
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Code postal : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="postcode" type="text"  readonly="true" placeholder="postcode" 
					        value="<?php echo $data['postcode'];?>"						
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Téléphone : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="phone" type="text"  readonly="true" placeholder="phone" 
					        value="<?php echo $data['phone'];?>"										
                            </label>
                        </div>
				
					  <div class="control-group">
                        <label class="control-label">Fax : </label>
                        <div class="controls">
                            <label class="checkbox">
				        <input name="fax" type="text"  readonly="true" placeholder="fax" 
					        value="<?php echo $data['fax'];?>"																	
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Mobile : </label>
                        <div class="controls">
                            <label class="checkbox">
				            <input name="mobile" type="text"  readonly="true" placeholder="mobile" 
					        value="<?php echo $data['mobile'];?>"																	
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Adresse mail : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="email" type="text"  readonly="true" placeholder="email" 
					        value="<?php echo $data['email'];?>"																							
                            </label>
                        </div>
                      </div>
					   <div class="control-group">
                        <label class="control-label">Modifié par : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="author" type="text"  readonly="true" placeholder="author" 
					        value="<?php echo $data['author'];?>"																							
                            </label>
                        </div>
                      </div>
					   <div class="control-group">
                        <label class="control-label">Modifié le : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="date_mod" type="text"  readonly="true" placeholder="date_mod" 
					        value="<?php echo $data['date_mod'];?>"											
                            </label>
                        </div>
                      </div>
					 </thead>
				</table>	 
                        <div class="form-actions">
                          <a class="btn" href="contact_all_list.php">Retour</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

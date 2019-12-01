
<?php
    session_start();
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }


 if ( null==$id ) {
        header("Location: network_list.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM vtictan_customers_network where id_network = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$_SESSION["companynament"] = $data['companynament'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$_SESSION["customer_id"] = $data['customers_id'];			
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
                        <h3>Détails de l'équipement</h3>
                    </div>
           
		   <table class="table table-striped table-bordered"> 
             <thead>
     		   <div class="form-horizontal" >
			        <div class="control-group">
                        <label class="control-label">Identification : </label>
						<div class="controls">
                        <label class="checkbox">		
							 <input name="namenetwork" type="text"  readonly="true" placeholder="namenetwork" 
							 value="<?php echo $data['namenetwork'];?>"
                                
                            </label>
                       </div>
					  </div>
                      <div class="control-group">
                        <label class="control-label">Modele : </label>
						<div class="controls">
                        <label class="checkbox">
                        <input name="namemodel" type="text"  readonly="true" placeholder="namemodel" 
							 value="<?php echo $data['namemodel'];?>"						
                            </label>
                       </div>
					  </div>
					  <div class="control-group">
                        <label class="control-label">Type : </label>
                        <div class="controls">
                            <label class="checkbox">
							<input name="nametype" type="text"  readonly="true" placeholder="nametype" 
							 value="<?php echo $data['nametype'];?>"	
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Numero de serie : </label>
                        <div class="controls">
                            <label class="checkbox">
							<input name="serial_network" type="text"  readonly="true" placeholder="serial_network" 
							 value="<?php echo $data['serial_network'];?>"	
                            </label>
                        </div>
                      </div>
				  
					  <div class="control-group">
                        <label class="control-label">Adresse ip : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="adresseip" type="text"  readonly="true" placeholder="adresseip" 
							 value="<?php echo $data['adresseip'];?>"																
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Type adressage : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="typeadressage" type="text"  readonly="true" placeholder="typeadressage" 
							 value="<?php echo $data['typeadressage'];?>"																
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Connexion via : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="connexionvia" type="text"  readonly="true" placeholder="connexionvia" 
							 value="<?php echo $data['connexionvia'];?>"																
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Lieu/emplacement : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="location" type="text"  readonly="true" placeholder="location" 
							 value="<?php echo $data['location'];?>"										
                            </label>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Utilisateur : </label>
                        <div class="controls">
                            <label class="checkbox">
						     <input name="users_id" type="text"  readonly="true" placeholder="users_id" 
							 value="<?php echo $data['users_id'];?>"																					
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Groupe : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="groups_id" type="text"  readonly="true" placeholder="groups_id" 
							 value="<?php echo $data['groups_id'];?>"																
                            </label>
                        </div>
                      </div>
					   <div class="control-group">
                        <label class="control-label">Commentaire : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="comment" type="text"  readonly="true" placeholder="comment" 
							 value="<?php echo $data['comment'];?>"									
                            </label>
                        </div>
                      </div>
				</table>	 
                        <div class="form-actions">
                          <a class="btn" href="network_list.php">Retour</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

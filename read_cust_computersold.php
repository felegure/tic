
<?php
    session_start();
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }


 if ( null==$id ) {
        header("Location: index_cust_choose.php?type=computers");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM vtictan_customers_computers where idcust = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$_SESSION["companynament"] = $data['companynament'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_idcust'];
		$entities_id = $data['entities_idcust'];
		$_SESSION["customer_id"] = $data['customers_idcust'];		
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
                        <h3>Détails de l'ordinateur</h3>
                    </div>
           
		   <table class="table table-striped table-bordered"> 
             <thead>
     		   <div class="form-horizontal" >
			        <div class="control-group">
                        <label class="control-label">Nom du PC : </label>
						<div class="controls">
                        <label class="checkbox">		
							 <input name="pcnamecust" type="text"  readonly="true" placeholder="pcnamecust" 
							 value="<?php echo $data['pcnamecust'];?>"						
                            </label>
							
                      
					  </div>
                      <div class="control-group">
                        <label class="control-label">Modele : </label>
						<div class="controls">
                        <label class="checkbox">
                        <input name="modelnamecust" type="text"  readonly="true" placeholder="modelnamecust" 
							 value="<?php echo $data['modelnamecust'];?>"						
                            </label>
                       </div>
					  </div>
					  <div class="control-group">
                        <label class="control-label">Type : </label>
                        <div class="controls">
                            <label class="checkbox">
							<input name="typenamecust" type="text"  readonly="true" placeholder="typenamecust" 
							 value="<?php echo $data['typenamecust'];?>"	
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Numero de serie : </label>
                        <div class="controls">
                            <label class="checkbox">
							<input name="serialcust" type="text"  readonly="true" placeholder="serialcust" 
							 value="<?php echo $data['serialcust'];?>"	
                            </label>
                        </div>
                      </div>
					  
					  <div class="control-group">
                        <label class="control-label">Processeur : </label>
	                    <div class="controls">
                            <label class="checkbox">
					        <input name="processorcust" type="text"  readonly="true" placeholder="processorcust" 
							 value="<?php echo $data['processorcust'];?>"
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Disque Dur : </label>
                        <div class="controls">
                            <label class="checkbox">
 					        <input name="hddcust" type="text"  readonly="true" placeholder="hddcust" 
							 value="<?php echo $data['hddcust'];?>"							
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Carte graphique : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="cartegraphcust" type="text"  readonly="true" placeholder="cartegraphcust" 
							 value="<?php echo $data['cartegraphcust'];?>"							
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Systeme d'exploitation : </label>
                       
                            <label class="checkbox">
					        <input name="osname" type="text"  readonly="true" placeholder="osname" 
							 value="<?php echo $data['osname'];?>"							
                           
                            <label class="control-label">Version (Pack) :                
					        <input name="osvpname" type="text"  readonly="true" placeholder="osvpname" 
							 value="<?php echo  $data['osvpname'];?>"							
                            </label>
                      </div>
					  
					  <div class="control-group">
                        <label class="control-label">Domaine : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="domainamecust" type="text"  readonly="true" placeholder="domainamecust" 
							 value="<?php echo $data['domainamecust'];?>"									
                            </label>
                        </div>
					  </div>
					  <div class="control-group">
                        <label class="control-label">Session : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="sessionamecust" type="text"  readonly="true" placeholder="sessionamecust" 
							 value="<?php echo $data['sessionamecust'];?>"									
                            </label>
                        </div>	
					  </div>
					  <div class="control-group">
                        <label class="control-label">Mot de passe : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="spasswordcust" type="text"  readonly="true" placeholder="spasswordcust" 
							 value="<?php echo $data['spasswordcust'];?>"									
                            </label>
                        </div>	
					  </div>					  
					  <div class="control-group">
                        <label class="control-label">Teamviewer : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="tlognamecust" type="text"  readonly="true" placeholder="tlognamecust" 
							 value="<?php echo $data['tlognamecust'];?>"									
                            </label>
                        </div>	
					  </div>						  
					  <div class="control-group">
                        <label class="control-label">Adresse ip : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="adresseipcust" type="text"  readonly="true" placeholder="adresseipcust" 
							 value="<?php echo $data['adresseipcust'];?>"																
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Type adressage : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="typeadressagecust" type="text"  readonly="true" placeholder="typeadressagecust" 
							 value="<?php echo $data['typeadressagecust'];?>"																
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Connexion via : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="connexionviacust" type="text"  readonly="true" placeholder="connexionviacust" 
							 value="<?php echo $data['connexionviacust'];?>"																
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Lieu/emplacement : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="locationcust" type="text"  readonly="true" placeholder="locationcust" 
							 value="<?php echo $data['locationcust'];?>"										
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
					        <input name="commentcust" type="text"  readonly="true" placeholder="commentcust" 
							 value="<?php echo $data['commentcust'];?>"									
                            </label>
                        </div>
                      </div>
				</table>	 
                        <div class="form-actions">
                          <a class="btn" href="computer_list.php?entities_id=<?php echo $entities_id ?> &customer_id=<?php echo $data['customers_idcust'] ?>">Retour</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

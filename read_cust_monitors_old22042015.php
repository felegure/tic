
<?php
    session_start();
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

 if ( null==$id ) {
        header("Location: index_cust_choose.php?type=monitors");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM vtictan_customers_monitors where id_monitor = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$_SESSION["companynament"] = $data['companynament'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$_SESSION["customer_id"] = $data['customers_id'];	
		$entities_id = $data['entities_id'];
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
                        <h3>Détails du Moniteur</h3>
                    </div>
           
		   <table class="table table-striped table-bordered"> 
             <thead>
     		   <div class="form-horizontal" >
			        <div class="control-group">
                        <label class="control-label">Nom du moniteur : </label>
						<div class="controls">
                        <label class="checkbox">		
							 <input name="namemonitor" type="text"  readonly="true" placeholder="namemonitor" 
							 value="<?php echo $data['namemonitor'];?>"
                                
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
                        <label class="control-label">Numero de série : </label>
                        <div class="controls">
                            <label class="checkbox">
							<input name="serial_monitor type="text"  readonly="true" placeholder="serial_monitor" 
							 value="<?php echo $data['serial_monitor'];?>"	
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
                          <a class="btn" href="monitor_list.php?entities_id=<?php echo $entities_id ?> &customer_id=<?php echo $data['customers_id'] ?>">Retour</a>
                       </div>
                     </form>
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

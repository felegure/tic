
<?php
    session_start();
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }


 if ( null==$id ) {
        header("Location: software_list.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM vtictan_customers_software where id_soft = ?";
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
                        <h3>Détails du logiciel</h3>
                    </div>
           
		   <table class="table table-striped table-bordered"> 
             <thead>
     		   <div class="form-horizontal" >
			        <div class="control-group">
                        <label class="control-label">Nom du logiciel : </label>
						<div class="controls">
                        <label class="checkbox">		
							 <input name="namesoft" type="text"  readonly="true" placeholder="namesoft" 
							 value="<?php echo $data['namesoft'];?>"
                                
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
                        <label class="control-label">Numero de licence : </label>
                        <div class="controls">
                            <label class="checkbox">
							<input name="licence_soft" type="text"  readonly="true" placeholder="licencesoft" 
							 value="<?php echo $data['licencesoft'];?>"	
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Date début validité : </label>
                        <div class="controls">
                            <label class="checkbox">
							<input name="start_date" type="text"  readonly="true" placeholder="start_date" 
							 value="<?php echo $data['start_date'];?>"	
                            </label>
                        </div>
                      </div>				  
					  <div class="control-group">
                        <label class="control-label">Date fin validité : </label>
                        <div class="controls">
                            <label class="checkbox">
							<input name="end_date" type="text"  readonly="true" placeholder="end_date" 
							 value="<?php echo $data['end_date'];?>"	
                            </label>
                        </div>
                      </div>						
					  <div class="control-group">
                        <label class="control-label">Editeur : </label>
                        <div class="controls"> 	
                            <label class="checkbox">
					        <input name="editor_soft" type="text"  readonly="true" placeholder="editor_soft" 
							 value="<?php echo $data['editorsoft'];?>"																
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Fournisseur : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="suppliersoft" type="text"  readonly="true" placeholder="suppliersoft" 
							 value="<?php echo $data['suppliersoft'];?>"																
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
                          <a class="btn" href="software_list.php">Retour</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

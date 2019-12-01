<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index_skills.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_skilltech where id = ?";
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
                        <h3>Détails de la competence du technicien</h3>
                    </div>
           
		   <table class="table table-striped table-bordered"> 
             <thead>
     		   <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Nom et Prenom : </label>
						<div class="controls">
                        <label class="checkbox">
                                <?php echo $data['name'];?>
                            </label>
                       </div>
					  </div>	
					  <div class="control-group">
                        <label class="control-label">description : </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['description'];?>
                            </label>
                        </div>
                      </div>					  
					  <div class="control-group">
                        <label class="control-label">email : </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['email'];?>
                            </label>
                        </div>
                      </div>
						  <div class="control-group">
                        <label class="control-label">mobile : </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['mobile'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">adresse : </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['address'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">postcode : </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['postcode'];?>	
                            </label>
                        </div>
                      </div>	
					  <div class="control-group">
                        <label class="control-label">town : </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['town'];?>	
                            </label>
                        </div>
                      </div>				  
 					  <div class="control-group">
                        <label class="control-label">state : </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['state'];?>	
                            </label>
                        </div>
                      </div>
 					  <div class="control-group">
                        <label class="control-label">country : </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['country'];?>	
                            </label>
                        </div>
                      </div>					  
					  
					<div class="control-group">
                        <label class="control-label">Code suppression : </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['is_deleted'];?>
                            </label>
                        </div>
                      </div>
					   <div class="control-group">
                        <label class="control-label">Modifié par : </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['author'];?>
                            </label>
                        </div>
                      </div>
					   <div class="control-group">
                        <label class="control-label">Modifié le : </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['mod_date'];?>
                            </label>
                        </div>
                      </div>
					 </thead>
				</table>	 
                        <div class="form-actions">
                          <a class="btn" href="index_skills.php">Retour</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

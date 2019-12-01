<?php
session_start();   
   require 'database.php';
   require 'test_globvar.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: computer_list.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'select * from vtictan_customers_computers 
		where customers_id='; 
		$sql = $sql.$customer_id.' and entities_id='.$entities_id;	
		echo "sql=$sql <br>";
		
 //       $sql = "SELECT * FROM vtictan_customers_computers where customers_idcust = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$id_entities = $data['entities_id'];
		$sql_view = "SELECT * FROM vtictan_customers where ident = $id_entities";
		$qview = $pdo->prepare($sql_view);
		$qview->execute(array($id));
        $dataview = $qview->fetch(PDO::FETCH_ASSOC);
		$companynament = $dataview['companynament'];
	   
    //    Database::disconnect();
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
                        <h3>Détails du Client</h3>
                    </div>
           
		   <table class="table table-striped table-bordered"> 
             <thead>
     		   <div class="form-horizontal" >
			        <div class="control-group">
                        <label class="control-label">Nom Entite/Client : </label>
						<div class="controls">
                        <label class="checkbox">		
							 <input name="companynament" type="text"  readonly="true" placeholder="companynament" 
							 value="<?php echo $companynament;?>"
                                
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
                        <label class="control-label">Région/Province : </label>
                        <div class="controls">
                            <label class="checkbox">
 					        <input name="state" type="text"  readonly="true" placeholder="state" 
							 value="<?php echo $data['state'];?>"							
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Pays : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="country" type="text"  readonly="true" placeholder="country" 
							 value="<?php echo $data['country'];?>"							
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
                        <label class="control-label">Site web : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="website" type="text"  readonly="true" placeholder="website" 
							 value="<?php echo $data['website'];?>"										
                            </label>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Email Address : </label>
                        <div class="controls">
                            <label class="checkbox">
						     <input name="email" type="text"  readonly="true" placeholder="email" 
							 value="<?php echo $data['email'];?>"																					
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Mobile Number : </label>
                        <div class="controls">
                            <label class="checkbox">
					        <input name="mobile" type="text"  readonly="true" placeholder="mobile" 
							 value="<?php echo $data['mobile'];?>"																
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
					        <input name="mod_date" type="text"  readonly="true" placeholder="mod_date" 
							 value="<?php echo $data['mod_date'];?>"								
                            </label>
                        </div>
                      </div>
					 </thead>
				</table>	 
                        <div class="form-actions">
                          <a class="btn" href="index_cust.php">Retour</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

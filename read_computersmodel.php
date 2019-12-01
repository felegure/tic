<?php
    
    require 'database.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index_computersmodel.php");
    } else {
        $pdo = Database::connect();

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
        $sql = "SELECT * FROM tictan_computermodels where is_deleted = 0 and id = ?";
 echo "sql=$sql id=$id<br";
 $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Consultation du modèle</h3>
                    </div>
   <form class="form-actions" accept-charset="utf-8" method="post" name="read_computers" action="read_computers.php" method="post" >         
		   <table class="table table-striped table-bordered"> 
             <thead>
     		   <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Modèle : </label>
						<div class="controls">
                        <label class="checkbox">
                                <?php echo $data['name'];?>
                            </label>
                       </div>
					  </div>				  
					  <div class="control-group">
                        <label class="control-label">Commentaire : </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['comment'];?>
                            </label>
                        </div>
                      </div>

					 </thead>
				</table>
</form>				
<table  width="900" height="30" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
 <tr valign="baseline">
      <td width="100" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">	
        </div></td>
      <td width="200">
      </td>
	  <td width="300" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
	    </div>
	  </td>
      <td width="300" height="42" align="right" nowrap >
	  <div>
	  </div>
	  <p>
	  </p>			  
        <a class="btn" href="index_computersmodel.php">Retour</a>
	  </td>  
 </tr> 
  </table>
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

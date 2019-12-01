<?php
    
    require 'database.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     if ( !empty($_GET['table_name'])) {
        $table_name = $_REQUEST['table_name'];
//		echo "1.  table_name=$table_name <br>";
		
    }
	if ( !empty($_GET['form_name'])) {
        $form_name = $_REQUEST['form_name'];
		$_SESSION['form_name']=$form_name;		
		$form_name_save=$form_name;
//			echo "2.  form_name=$form_name <br>";
    }
	else  {
	$form_name=$_SESSION['form_name'];
	$form_name_save=$form_name;
//	echo "apres session form_name=$form_name <br>";
	}
	if ( !empty($_GET['table_name'])) {
 	$table_name = $_REQUEST['table_name'];
	$_SESSION['table_name']=$table_name;		
	$table_name_save=$table_name;
//	echo "22.  table_name=$table_name <br>";
    }
	else  {
	$table_name=$_SESSION['table_name'];
	$table_name_save=$table_name;
//	echo "apres session table_name=$table_name <br>";
	}
	if ( !empty($_GET['type'])) {
 	$type = $_REQUEST['type'];
	$_SESSION['type']=$type;		
	$type_save=$type;
//	echo "22.  type=$type <br>";
    }

	if ( !empty($_GET['entete'])) {
 	$entete = $_REQUEST['entete'];
	$_SESSION['entete']=$entete;		
	$entete_save=$entete;
//	echo "22.  entete=$entete <br>";
    }
	else  {
	$entete=$_SESSION['entete'];
	$entete_save=$entete;
	echo "apres session entete=$entete <br>";
	}
    $form_namephp=$form_name;
 //   echo "form_namephp=$form_namephp <br>";  
    if ( null==$id ) {
        header("Location: index_computersmodel.php");
    } else {
        $pdo = Database::connect();

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
        $sql = "SELECT * FROM ". $table_name . " where is_deleted = 0 and id = ?";
//      echo "sql=$sql id=$id<br";
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
                    <div class="row" align="center" >
                        <h3>Consultation  <?php echo $entete; ?></h3>
                    </div>
   <form class="form-actions" accept-charset="utf-8" method="post" name="read_computers" action="read_computers.php" method="post" >         
		   <table class="table table-striped table-bordered"> 
             <thead>
     		   <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label"><?php echo $entete; ?> : </label>
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
        <a class="btn"  href="<?php echo $form_name ; ?>"> Retour</a>
	  </td>  
 </tr> 
  </table>
</div>
</div>                
</div> <!-- /container -->
  </body>
</html>

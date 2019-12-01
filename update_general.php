<?php
    session_start();
    require 'database.php';
 	$username=$_SESSION["username"] ;
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
	
	    if ( !empty($_POST)) {

	//	require 'checkFields.php';

        $nameError = null;
        $commentError = null;
        $authorError = null;
        $date_modError = null;
        $is_deletedError	 = null;

        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
        $date_mod = $_POST['date_mod'];

	
	   $valid = true;
	
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE ".$table_name. "set name = ?,comment = ?,author = ?, date_mod = ?
			WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name, $comment, $author, $date_mod, $id));
            Database::disconnect();
            header("Location: $form_name");
        }
       
        } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM ".$table_name. " where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		
		$name = $data['name'];
		$comment = $data['comment'];
		$author = $data['author'];
		$date_mod = $data['date_mod'];
//		$is_deleted = $data['is_deleted'];
        Database::disconnect();
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	
<title>Modification </title>
<style type="text/css">
<!--
.Style25 {
	font-size: 16px;
	color: #000099;
	font-weight: bold;
}
.Style31 {color: #000000}
-->
<!--
.Style1 {
	font-size: 18px;
	color: #0000FF;
	font-weight: bold;
}
.Style19 {
	font-size: 18px;
	color: #006600;
	font-weight: bold;
}
.Style21 {font-size: 9px}
.Style22 {color: #000033 ;
font-size:12px}
.Style23 {color: #00CC66}
.Style24 {color: #000066}
.Style30 {color: #000099; font-weight: bold; }
.Style32 {color: #000000; font-weight: bold; }
-->
</style>	
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row" align="center">
                        <h3>Modification <?php echo $entete; ?></h3>
                    </div>
 <form class="form-actions" method="post" name="update_general" action="update_general.php?id=<?php echo $id; ?>" method="post" > 

  <table  width="900" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
 
   <tr valign="baseline">
      <td width="100" height="32" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Description:<span class="Style21"></span></div>
		</dd>
      </div></td>	
      <td width="250">
	  <dd>
       <input name="name" type="textarea"  placeholder="Description" value="<?php echo !empty($name)?$name:'';?>">	
	  </dd>
      </td>
 </tr>
 <tr valign="baseline"> 
	 <td width="100" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
		  Commentaire:<span class="Style21"></span></div>
		  </dd>
	  </div></td>  
	   <td width="250">
	   <dd>
	  	 <input name="comment" type="textarea" size="100" placeholder="Commentaire" value="<?php echo !empty($comment)?$comment:'';?>">					
	   </dd>
      </td>

</tr>
	 <tr valign="baseline"> 
	   <td width="20">
	  	 <input name="author" type="hidden"  placeholder="Auteur" value="<?php echo $username ;?>">
		 <input name="date_mod" type="hidden"  placeholder="Date modification" value='<?php echo date("d-m-Y");?>'>
      </td>
    </tr> 
  </table>

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
    <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Mise a jour" >					  
 <a class="btn" href="<?php echo $form_name; ?>">Retour</a>
	  </td>  
 </tr> 
  </table>
                  
   </div> <!-- /container -->
<script language="javascript">	
function ValidateON()
{
 var m="mon texte"; 
 var confirmation=confirm("Confirmez-vous la modification?"); 
 // alert ("validateOn");
	
 if (confirmation){ 
  //action à faire pour la valeur true 
 alert ("Enregistrement Modifié");

	}
	   
}
</script>
  </body>
</html>			
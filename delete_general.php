<?php
    session_start();
    include 'database.php';
	$profil = $_SESSION['profilAccess'];
    $id = 0;
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
//	echo "apres session entete=$entete <br>";
	}
    $form_namephp=$form_name;
 //   echo "form_namephp=$form_namephp <br>";  
    if ( null==$id ) {
        header("Location: $form_name");
    } else {
        $pdo = Database::connect();

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
        $sql = "SELECT * FROM ". $table_name . " where is_deleted = 0 and id=".$id;
        $sqlupd = "UPDATE ".$table_name." set is_deleted = 1 where id=".$id;
//		echo "SSSSSSSSSSSSSSSSS sqlupd=$sqlupd <br>";
//     echo "sql=$sql ffffffffffffffffid=$id<br";
		$q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    } 
 if ($id==0) 
	   header("Location: $form_name");
 if(isset($_POST['submit'])){
//echo "POST <br> ";
  //      $id = $_REQUEST['id'];       // keep track post values     
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //       $sql = "UPDATE ".$tablename. "  SET is_deleted=1 WHERE id =".$id;
//		echo "WWWWWWWWWWWW sql=$sql <br>";
        $q = $pdo->prepare($sqlupd);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: $form_name");
        $id=null;       
    }
	else { 
	
	$idsave = $id;
//	echo " NOT POST xxxxxxxxxxxxxxxxxxxxxx  idsave  = $idsave <br>";
    }
?>
 
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	
<title>Suppression general </title>
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
                        <h3>Suppression <?php echo $entete ; ?></h3>
                    </div>
                     
                    <form class="form-horizontal"  name="delete_general" align="center" action="delete_general.php?id=$id" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>">
                      <p class="alert alert-error" align="center" >Confirmer la suppression ?</p>
                      <div class="form-actions" align="center">
                          <input name="submit" type="submit"  class="btn btn-danger"  onClick='ValidateON()' value="Suppression" >
                          <a class="btn"  href="<?php echo $form_name; ?>">Non</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
<script language="javascript">	
function ValidateON()
{
 var m="mon texte"; 
 var confirmation=confirm("Confirmez-vous la Suppression?"); 
 // alert ("validateOn");
	
 if (confirmation){ 
  //action à faire pour la valeur true 
 alert ("Enregistrement supprimé");

}
	   
}
</script>
  </body>
</html>	
  </body>
</html>
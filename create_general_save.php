<?php
     
    require 'database.php';
	$type='general';
	require 'recuperation_variables.php';
 // parametres : 1. table_name, 2. form_name  
 //
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
	echo "apres session table_name=$table_name <br>";
	}
	if ( !empty($_GET['type'])) {
 	$type = $_REQUEST['type'];
	$_SESSION['type']=$type;		
	$type_save=$type;
	echo "TYPEEEEEEEEE.  type=$type <br>";
    }
	//else  {
	//$type=$_SESSION['type'];
	//$type_save=$type;
	//echo "apres session type=$type <br>";
	// }
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
    echo "form_namephp=$form_namephp <br>";
    if ( !empty($_POST)) {
        // keep track validation errors
        if ($type=='users')
	    require_once ('checkFields_users.php');	
        else		
		require_once ('checkFields_general.php');
		 
         // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    if ($type=='users'){
		    $sql = "INSERT INTO ".$table_name." (userid,password, profil, staff_id, comment,author, date_mod, is_deleted)
			values( ?,?, ?, ?, ?, ?, ?, ?)";
			echo "valeur de sql =$sql <br>";
            $q = $pdo->prepare($sql);
			$q->execute(array($userid, $password, $profil, $staff_id, $comment,$author, $mod_date,$is_deleted ));
            }
            else {			
            $sql = "INSERT INTO ".$table_name." (name, comment,author, date_mod,is_deleted)
			values(?, ?, ?,?, ?)";
            echo "valeur de sql =$sql <br>";
            $q = $pdo->prepare($sql);
            $q->execute(array($name, $comment, $author, $date_mod,$is_deleted));			
			}
            Database::disconnect();
 //          header("Location: $form_namephp");
        }
		else "PAS VALID <br>";
      
    }
?>
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	
<title>Creation general </title>
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
<div class="container"> 
                <div class="span10 offset1">
                    <div class="row" align="center">
                        <h3>Ajout  <?php echo $entete;?></h3>
                    </div>  
 
<form class="form-actions" method="post" name="create_general" action="create_general.php?form_name=<?php echo $form_name; ?>&table_name=<?php echo $table_name; ?>&entete=<?php echo $entete ;?>" method="post" > 
  <table  width="900" height="100" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
    <tr valign="baseline" align="center">
      <td width="80" height="42" align="center" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">
		<dd>
		Description:<span class="Style21"></span></div>
		</dd>
      </div></td>
      <td width="200" align="left">
	  <dd>
	  	 <input name="name" size="100" type="textarea" placeholder="name">
      </dd>
	 </tr>
	
    <tr valign="baseline" align="center">
    <td width="80" height="42" align="center" nowrap><div align="center" class="Style23">
          <div align="center" class="Style22"> 
		  <dd>
		  Commentaire:<span class="Style21"></span></div>
		  </dd>
	  </div></td>
    <td width="200" align="left">
	<dd>
	  	 <input name="comment"  type="textarea" size="100"  placeholder="Commentaire">	
    </dd>		 
    </td > 
	 
   </tr>
	 <tr valign="baseline"> 
	   <td width="200">
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
	 <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Ajout" >					  
 <a class="btn" href="<?php echo $form_namephp ?>"> Retour</a>
	  </td>  
 </tr> 
 
<p>&nbsp;</p> 
</table>
</div> <!-- /container --> 

<script language="javascript">
function ValidateON()
{
 var m="mon texte"; 
 var confirmation=confirm("Confirmez-vous l'ajout?"); 
 // alert ("validateOn");
	
 if (confirmation){ 
  //action à faire pour la valeur true 
 alert ("Enregistrement Insere");

	}
	   
}
</script>
</body>
</html>



<?php
    session_start(); 
// recuperation des variables de ssion pour le passage de parametres d'une forme a une autre
//	$customer_id = $_SESSION["customer_id"];
//	$entities_id = $_SESSION["entities_id"];

//	$companynament = $_SESSION["companynament"];
//  $customer_id = $_SESSION["customer_id"];												
//	$customer_name = $_SESSION["customer_name"] ;

    $username=$_SESSION["username"] ;
	echo "XXXXXXXXX username=$username <br>";
    require 'database.php';
    $pdo = Database::connect();

    if ( !empty($_POST)) {
        // keep track validation errors
			require_once ('checkFields_users.php');				 
         // insert data
	
         if ($valid) {
//		 echo "valid <br> ";
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tictan_users(userid, password, profil, staff_id, comment,author, date_mod, is_deleted ) 
			values( ?,?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($userid, $password, $profil, $staff_id, $comment,$author, $date_mod,$is_deleted ));
//            Database::disconnect();	
            header("Location: index_users.php");
        }
//		else echo "   Not Valid  <br>";
    }
//	else echo "   EMPTY POST <br>";
	
?>


</div> <!-- /container --> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
<title>Ajout Utilisateur</title>
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
     
<div class="span10 offset1">
 <div class="row" align="center">
    <h3>Ajouter un Utilisateur WebTic</h3>
 </div>   
<form class="form-actions" method="post" name="create_users" action="create_users.php" method="post" > 
  <table  width="900" height="100" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border"    <tr valign="baseline" align="center">
 <tr valign="baseline"> 
   <td width="100" height="42" align="right" nowrap >
	<dd> 
	 <label class="control-label">Nom d'utilisateur</label>
	</td>
    <td width="200">  
	 <dd>
     <input name="userid" type="text" placeholder="Entrez le nom d'utilisateur" size=40 value="<?php echo !empty($userid)?$userid:'';?>">
     <?php if (!empty($useridError)): ?>
     <span class="help-inline"><?php echo $useridError;?></span>
     <?php endif;?>
	 </dd>

	</td>
   <td width="100" height="42" align="right" nowrap >
   <dd>
     <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">						
     <label class="control-label">Mot de passe</label>
	 </dd>
	 </td>
	<td width="200">  
	<dd>
     <div class="controls">
     <input name="password" type="text" placeholder="Entrez le mot de passe" size=40 value="<?php echo !empty($password)?$password:'';?>">
     <?php if (!empty($passwordError)): ?>
     <span class="help-inline"><?php echo $passwordError;?></span>
     <?php endif;?>
	 </dd>
	</td>
	</tr>
 <tr valign="baseline"> 
	
	<div class="control-group <?php echo !empty($staff_idError)?'error':'';?>">
	<label class="control-label">staff_id</label>
	<div class="controls">
	 <dd>
	 <?php
	$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
	mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
	?>
	<select name="staff_id" class="staff_id">
	<option  value="0">NULL</option>
	<?php 
	$sql=mysqli_query($conn, "select id, name from tictan_tecstaff WHERE is_deleted = 0 order by id ASC");
	while($row=mysqli_fetch_array($sql))
	{
	echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
	} ?>
	</select>
	</dd>						
    </div>
	</div>	
   </tr>
	<tr valign="baseline">
	<td width="80" height="42" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">Selection Staff:<span class="Style21"></span></div>
	</div>
    <td width="20">
	<?php
	$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
	mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
	?>
    <fieldset>
	<select name="staff_id" class="staff_id">
	<option  value="0">NULL</option>
	<?php 
	$sql=mysqli_query($conn, "select id, name from tictan_techstaff WHERE is_deleted = 0 order by name");
	while($row=mysqli_fetch_array($sql))
	{
	echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
	} ?>
	</select>
   </fieldset>			
    </div>
    </td>
     <td width="80" height="10" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">Type:<span class="Style21"></span></div>
	</div>
	 <td width="80">
	 <?php
	$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
	mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
	?>
   <fieldset>
	<select name="profil" class="profil">
	<option  value="0">NULL</option>
	<?php 
	$sql=mysqli_query($conn, "select id, name from tictan_profil WHERE is_deleted = 0 order by description");
	while($row=mysqli_fetch_array($sql))
	{
	echo '<option value="'.$row['profil'].'">'.$row['description'].'</option>';
	} ?>
	</select>
	</fieldset>					
    </div>
    </td>
 </tr>
 </tr>	

    <tr valign="baseline"> 
	
	<div class="control-group <?php echo !empty($staff_idError)?'error':'';?>">
	<label class="control-label">staff_id</label>
	<div class="controls">
	 <dd>
	 <?php
	$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
	mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
	?>
	<select name="staff_id" class="staff_id">
	<option  value="0">NULL</option>
	<?php 
	$sql=mysqli_query($conn, "select id, name from tictan_tecstaff WHERE is_deleted = 0 order by id ASC");
	while($row=mysqli_fetch_array($sql))
	{
	echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
	} ?>
	</select>
	</dd>						
    </div>
	</div>	
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
 <a class="btn" href="index_users.php"> Retour</a>
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

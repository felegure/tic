<?php
session_start();
    require 'database.php';	
    $id = null;
	if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
	else {	
 //    $id  = $_REQUEST['id'];
       $id=$_SESSION['id'];
 //	echo " 2.  id=$id <br>";			
    }
    if ( null==$id ) {
	echo "NULL == id<br>";
 //       header("Location: contact_all_list.php");
    }
	
	if (!empty($_POST)) {
 //    echo "dans POST <br> ";
    	require 'checkFields_upd_users.php';
        // update data
        if ($valid) {		
//		echo "valid???????????????????? <br>";
        require 'init_fields_upd_users.php';
        require'maj_fields_upd_valid_users.php';
}
// else echo "Pas VALID <br>"; 
} 
else {
//         echo "Pas dans POST <br>";
        require 'maj_fields_upd_else_post_users.php';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./css/mbcsmbmcp.css" type="text/css" />

	
<title>update_users </title>
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
                    <div class="row" align="center" >
                        <h3> Modification utilisateur</h3>
                    </div>    

<form class="form-actions" method="post" name="update_users" action="update_users.php?id=<?php echo $id; ?>" method="post" > 

  <table  width="1200" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
 <tr valign="baseline"> 
   <td width="200" height="42" align="center" nowrap >
	<dd> 
	 <label class="control-label">Nom d'utilisateur</label>
	</td>
    <td width="250">  
	 <dd>
	<div class="controls align="center"">
     <input name="userid" type="text" placeholder="Entrez le nom d'utilisateur" size=40 value="<?php echo !empty($userid)?$userid:'';?>">
     <?php if (!empty($useridError)): ?>
     <span class="help-inline"><?php echo $useridError;?></span>
     <?php endif;?>
	 </dd>
	</div>
	</td>
   <td width="200" height="42" align="center" nowrap >
   <dd>
     <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">						
     <label class="control-label">Mot de passe</label>
	 </dd>
	 </td>
    <td width="250">  
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
  <td width="200" height="42" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">
	<dd>
	<label class="control-label">Selection Staff</label> 
	</dd>	
	<dd>
  	<label class="control-label">Choix</label> 
	</dd>
	</div>
    <td width="250">  
    <dd> 	
	<input name="staff_id2" type="text" align="right" readonly="true" value="<?php echo $name; ?>">  
	<input name="staff_id0" type="hidden" align="right" readonly="true" value="<?php echo $staff_id; ?>"> 	  
    </dd>
	 <dd>
	 <?php
     $conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
	 mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
	 ?>
	<select name="staff_id" class="staff_id">
	<option  value="0">NULL</option>
	<?php 
	$sql=mysqli_query($conn, "select id, name from tictan_tecstaff WHERE is_deleted = 0 order by name");
	while($row=mysqli_fetch_array($sql))
	{
	echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
	} ?>
	</select>
	<input name="staff_id0" type="hidden" value="<?php echo $staff_id;?>">			
	</dd>						
    </td> 
    <td width="200" height="42" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">
	 <dd>
	 <label class="control-label">Profil</label> 	 
	 </dd>
    <dd>
    <label class="checkbox">	
       Choix
	</label> 	 
	</dd>
	<td width="250" align="center">
     <dd> 	
	  <input name="profil_id2" type="text" align="right" readonly="true" value="<?php echo $description; ?>">  
	  <input name="profil_id0" type="hidden" align="right" readonly="true" value="<?php echo $profil; ?>"> 	  
     </dd>
     <dd>
	  <?php
	  $conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
	  mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
	  ?>
	  <select name="profil" class="profil">
	  <option  value="0">NULL</option>
	 <?php
	 
	$sql=mysqli_query($conn, "select id, profil, description from tictan_profil WHERE is_deleted = 0 order by profil");
	while($row=mysqli_fetch_array($sql))
	{
	echo '<option value="'.$row['profil'].'">'.$row['description'].'</option>';
	} ?>
	</select>
	<input name="profil_id0" type="hidden" value="<?php echo $profil;?>">						
	</fieldset>		
	</dd>						
    </div>
    </td>  	
    </tr>
 
<tr valign="baseline">
    
	 <td width="200" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center"> <span class="Style22">
		  <dd>
		 <label class="control-label"> Commentaire</label>		  
		  </dd>
	  </div></td>  
	   <td width="250">
	   <dd>
    <label class="checkbox">
	<input name="comment" type="textarea" placeholder="Commentaire" value="<?php echo $comment;?>">										
    </label>		   				
    </dd>
    </td>

    </tr>
	 <tr valign="baseline"> 
	   <td width="200">

	  	 <input name="author" type="hidden"  placeholder="Auteur" value="<?php echo  $author ;?>">
		 <input name="date_mod" type="hidden"  placeholder="Date modification" value='<?php echo  $date_mod;?>'>
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
	  <td width="200" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
	    </div>
	  </td>
      <td width="200" height="42" align="right" nowrap >
	  <div>
	  </div>
	  <p>
	  </p>	
    <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Mise à jour" >			  
	<a class="btn" href="index_users.php">Retour</a>  
 
	  </td>  
 </tr> 
  </table>
 </form>
 
<p>&nbsp;</p> 
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
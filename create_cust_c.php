<?php
    session_start(); 
// recuperation des variables de select session pour le passage de parametres d'une forme a une autre
	$customers_id = $_SESSION["customer_id"];
	$entities_id = $_SESSION["entities_id"];
	$companynament = $_SESSION["companynament"];
	$customers_id = $_SESSION["customer_id"];												
	$customer_name = $_SESSION["customer_name"] ;
	$username=$_SESSION["username"] ;
//	echo "create_cust_computers , entities_id = $entities_id , companynament = $companynament <br>";
//	echo "create_cust_computers.php customers_id = $customers_id , customer_name = $customer_name <br>";

    require 'database.php';
    $pdo = Database::connect();
	$profil = $_SESSION['profilAccess'];
    if ($profil != 'A' && $profil != 'S') 
//	  header("Location: index_cust_computers.php");
	   header("Location: index_cust_choose.php?entities_id=$entities_id&type=computers");	  
    if ( !empty($_POST)) {
        // keep track validation errors
			require_once ('checkFields_cust_computers.php');	
			echo "!empty <br>";
		
    if ($valid) {
       $pdo = Database::connect();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "INSERT INTO tictan_customers_computers (customers_id, entities_id, serial,pcname, computermodels_id, computertypes_id, processor, 
	   ram, domain_name, session_admin_name,session_admin_pwd, session_user_name,session_user_pwd,teamv_logname, teamv_pwd,adresseip, 
		location, comment,author, date_mod, is_deleted ) 
	   values( ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  ?, ?, ?, ?, ?,?,?)";
			
		$processor = $_POST['processor'];
        $ram = $_POST['ram'];
		echo "sql=$sql <br>";	
        $q = $pdo->prepare($sql);
        $q->execute(array($customers_id, $entities_id, $serial,$pcname, $computermodels_id, $computertypes_id, $processor, $ram, $domain_name, 
		$session_admin_name, $session_admin_pwd, $session_user_name, $session_user_pwd, $teamv_logname, $teamv_pwd, $adresseip,
		$location, $comment, $author, $date_mod, $is_deleted ));
		
        Database::disconnect();
	    header("Location: index_cust_choose.php?entities_id=$entities_id&type=computers");			
 //       header("Location: index_cust_computers.php");
        }

  }
  else 	echo "Eempty <br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<title>Ajout equipement reseau</title>
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
                    <div class="row">
                        <h3>Ajouter un ordinateur/Site</h3>
                    </div>            

<form class="form-actions" method="post" name="creat_cust_c" action="create_cust_c.php" method="post" > 					
 <table  width="1200" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
<tr valign="baseline">
      <td width="100" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Nom entit&eacute;:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="entities_id" type="hidden"  placeholder="entities_id" readonly="true" value="<?php echo !empty($entities_id)?$entities_id:'';?>">
         <input name="entities_name" type="text"  placeholder="entities_name" readonly="true" value="<?php echo !empty($companynament)?$companynament:'';?>">
		 <?php if (!empty($entities_idError)): ?>
         <span class="help-inline"><?php echo $entities_idError;?></span>
        <?php endif; ?> 							
      </td>
      <td width="100" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Client/Site:<span class="Style21"></span></div>
	  </div></td>
      <td width="400">	  
		  <input name="customer_id" type="hidden"  placeholder="customer_id" readonly="true" value="<?php echo !empty($customer_id)?$customer_id:'';?>">
         <input name="customer_name" type="text"  placeholder="customer_name" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
		 <?php if (!empty($customer_idError)): ?>
         <span class="help-inline"><?php echo $customer_idError;?></span>
        <?php endif; ?> 
      </td>    
    </tr>
	<tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Entrez le Nom du Pc:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="pcname" type="text"  placeholder="pcname">						
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Numero de s&eacute;ie:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="serial"	 type="text"  placeholder="serial">						
      </td> 
    </tr>
    <tr valign="baseline">
	<td width="80" height="42" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">Modele:<span class="Style21"></span></div>
	</div>
    <td width="20">
	<?php
	$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
	mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
	?>
    <fieldset>
	<select name="computermodels_id" class="computermodels_id">
	<option  value="0">NULL</option>
	<?php 
	$sql=mysqli_query($conn, "select id, name from tictan_computermodels WHERE is_deleted = 0 order by id ASC");
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
	<select name="computertypes_id" class="computertypes_id">
	<option  value="0">NULL</option>
	<?php 
	$sql=mysqli_query($conn, "select id, name from tictan_computertypes WHERE is_deleted = 0 order by id ASC");
	while($row=mysqli_fetch_array($sql))
	{
	echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
	} ?>
	</select>
	</fieldset>					
    </div>
    </td>
 </tr>
 </tr>	


 <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Processeur:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="processor" type="text"  placeholder="Processor">						
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Memoire vive: <span class="Style1"></span></div>
	  </div></td>
     <td width="200">
	  	 <input name="ram" type="text"  placeholder="Ram">						
     </td>
    </tr>
    <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">compte adm:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="session_admin_name" type="text"  placeholder="compte adm">						
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">mot de passe adm: <span class="Style1"></span></div>
	  </div></td>
     <td width="200">
	  	 <input name="session_admin_pwd" type="text"  placeholder="mot de passe adm">						
     </td>
    </tr>	
    <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">teamviewer login:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="teamv_logname" type="text"  placeholder="teamv_logname">						
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">teamviewer mot de passe: <span class="Style1"></span></div>
	  </div></td>
     <td width="200">
	  	 <input name="teamv_pwd" type="text"  placeholder="Teamviewer mot de passe">						
     </td>
    </tr>	
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">compte util.:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="session_user_name" type="text"  placeholder="compte util.">						
      </td>
	  <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">mot de passe util.:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="session_user_pwd" type="text"  placeholder="mot de passe util.">						
      </td>  
     </tr> 


 <tr valign="baseline">
     <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">nom domaine:<span class="Style21"></span></div>
      </div></td>	  
  <td width="200">
	  	 <input name="domain_name" type="text"  placeholder="nom domaine">						
      </td>
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Type adressage:<span class="Style21"></span>
    </td>
      <td width="80">
	  <fieldset>
        <select name="typeadressage">
            <option value="dhcp">DHCP</option>
            <option value="wifi">WIFI</option>
            <option value="fixe">FIXE</option>
        </select>
    </fieldset>				
      </td>
    
</div>
    </tr>	 
 <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Plage Adresse ip:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="adressrange" type="text"  placeholder="Plage adresse ip">						
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Adresse Ip: <span class="Style1"></span></div>
	  </div></td>
     <td width="200">
	  	 <input name="adresseip" type="text"  placeholder="Adresse ip">						
     </td>
    </tr>	
	
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Masque:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="mask" type="text"  placeholder="Masque">						
      </td>
	  <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Passerelle:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="bridge" type="text"  placeholder="Passerelle">						
      </td>  
     </tr> 
  <tr valign="baseline">
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" class="Style22"> Fax:</div>
	  </div></td>
    <td width="200">
	  	 <input name="fax" class="Style22"  type="text"  placeholder="Fax">						
      </td > 
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Lieu:<span class="Style21"></span></div>
	  </div></td>  
	   <td width="200">
	  	 <input name="location" type="text"  placeholder="localisation">						
      </td>
    </tr>	
   <tr valign="baseline">
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" class="Style22"> Commentaire:</div>
	  </div></td>
    <td width="400">
	  	 <input name="comment" class="Style22"  type="textarea"  placeholder="Commentaire">						
      </td > 
</tr>
	 <tr valign="baseline"> 
	   <td width="200">
	  	 <input name="author" type="hidden"  placeholder="Auteur" value="<?php echo $username ;?>">
		 <input name="date_mod" type="hidden"  placeholder="Date modification" value='<?php echo date("d-m-Y");?>'>
      </td>
    </tr> 	
</table>	
    <div class="form-actions">
    <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Ajout" >					  
    <a class="btn" href="index_cust_choose.php?entities_id=<?php echo $entities_id; ?> &type=computers">Retour</a>
    </div>
  </form>                
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

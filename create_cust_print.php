<?php
session_start(); 
// recuperation des variables de select session pour le passage de parametres d'une forme a une autre
include 'recuperation_variables.php';

require 'database.php';
$pdo = Database::connect();
$profil = $_SESSION['profilAccess'];
if ($profil != 'A' && $profil != 'S') 
header("Location: index_cust_printers.php");
if ( !empty($_POST)) {
        // keep track validation errors
require_once ('checkFields_cust_printers.php');	
		//	echo "!empty <br>";
	
if ($valid) {
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO tictan_customers_coprinters(customers_id, entities_id, serial, name, coprintersmodels_id, coprinterstypes_id,  
    	adresseip, typeadressage, connexionvia, location, comment,author, date_mod, is_deleted ) 
		values( ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
$serial = $_POST['serial'];
$name = $_POST['name'];
$adresseip = $_POST['adresseip'];
$typeadressage = $_POST['typeadressage'];
$adressrange=$_POST['adressrange'];
$typeadressage=$_POST['typeadressage'];
$location=$_POST['location'];	
$connexionvia = $_POST['connexionvia'];
$location = $_POST['location'];
$comment = $_POST['comment'];
$date_mod=$_POST['date_mod'];
$author=$_POST['author'];
$is_deleted = 0;
		echo "sql=$sql <br>";
	echo "customers_id=$customers_id <br>";
$q = $pdo->prepare($sql);

$q->execute(array($customers_id, $entities_id, $serial, $name, $coprintersmodels_id, $coprinterstypes_id,
              	  $adresseip, $typeadressage, $connexionvia, $location, $comment, $author, $date_mod,$is_deleted ));
		
Database::disconnect();
			
    //    header("Location: index_cust_networks.php");
header("Location: index_cust_choose.php?entities_id=$entities_id&type=printers");
}

}
 // else 	echo "Eempty <br>";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<title>Ajout imprimante</title>
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
                        <h3>Ajouter une imprimante/Site</h3>
                    </div>   
<form class="form-actions" method="post" name="create_cust_printers" action="creat_cust_printers.php" method="post" > 

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
		  <input name="customers_id" type="hidden"  placeholder="customers_id" readonly="true" value="<?php echo !empty($customer_id)?$customers_id:'';?>">
         <input name="customer_name" type="text"  placeholder="customer_name" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
		 <?php if (!empty($customers_idError)): ?>
         <span class="help-inline"><?php echo $customers_idError;?></span>
        <?php endif; ?> 
      </td>    
    </tr>
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Num&eacute;ro de s&eacute;rie:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="serial" type="text"  placeholder="num&eacute;ro de s&eacute;rie">						
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Nom &eacute;quipemement:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="name"	 type="text"  placeholder="Nom equipement">						
      </td> 
    </tr>
	<tr valign="baseline">
	<td width="80" height="42" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">Modele:<span class="Style21"></span></div>
	</div>
       <td width="80">
      
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="networkmodels_id" class="networkmodels_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_coprintersmodels WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						</dd>						
    </div>
    </td>
     <td width="80" height="10" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">Type:<span class="Style21"></span></div>
	</div>
	 <td width="80">
      
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="networktypes_id" class="networktypes_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_coprintersypes WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						</dd>						
    </div>
    </td>
 </tr>
 </tr>
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Type adressage:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  <dd>
	   <fieldset>
        <select name="typeadressage">
            <option value="dhcp">DHCP</option>
            <option value="wifi">WIFI</option>
            <option value="fixe">FIXE</option>
        </select>
    </fieldset>
	</dd>  					
      </td>

    </tr>
 <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Adresse Ip: <span class="Style1"></span></div>
	  </div></td>
     <td width="200">
	  	 <input name="adresseip" type="text"  placeholder="Adresse ip">						
     </td>
    </tr>		

    <tr valign="baseline">
 
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
     <a class="btn" href="printer_list.php?entities_id=<?php echo $entities_id; ?> &type=printers">Retour</a>
 </div>

 </form>
 
<p>&nbsp;</p> 
    </div> <!-- /container --> 
<script language="javascript">

function ValidateON()
{
 var m="mon texte"; 
 var confirmation=confirm("Confirmez-vous l'ajout?"); 
 // alert ("validateOn");
	
 if (confirmation){ 
  //action � faire pour la valeur true 
 alert ("Enregistrement Insere");

	}
	   
}
</script>
</body>
</html>



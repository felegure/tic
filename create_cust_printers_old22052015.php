<?php
session_start(); 
// recuperation des variables de ssion pour le passage de parametres d'une forme a une autre
$type='printers';
include 'recuperation_variables.php';
require 'database.php';
$pdo = Database::connect();
$profil = $_SESSION['profilAccess'];
//echo "profil=$profil <br>";
if ($profil != 'A' && $profil != 'S') 
header("Location: index_cust_printers.php");
if ( !empty($_POST)) {
require_once ('checkFields_cust_coprinters.php');			
if ($valid) {
//echo "valid <br>";
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO tictan_customers_coprinters(customers_id, entities_id, serial, name, coprintersmodels_id, coprinterstypes_id,  
    	adresseip, typeadressage, location,comment,author, date_mod, is_deleted ) 
		values( ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			
$q = $pdo->prepare($sql);
$q->execute(array($customers_id, $entities_id, $serial, $name, $coprintersmodels_id, $coprinterstypes_id,
              	  $adresseip, $typeadressage, $location, $comment, $author, $date_mod,$is_deleted ));
header("Location: printer_list.php?entities_id=$entities_id&type=printers");		
}
// else 
//echo "not valid <br>";
//Database::disconnect();		

}
// else 
//echo "POST EMPTY<br>";


	
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
                    <div class="row" align="center" >
                        <h3>Ajouter une imprimante/Site</h3>
                    </div>    

<form class="form-actions" method="post" name="create_cust_printers" action="create_cust_printers.php" method="post" > 

  <table  width="900" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
    <tr valign="baseline">
      <td width="200" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		Nom entit&eacute;:<span class="Style21"></span></div>
      </td>
      <td width="400">
	  <dd>
	  	 <input name="entities_id" type="hidden"  placeholder="entities_id" readonly="true" value="<?php echo !empty($entities_id)?$entities_id:'';?>">
         <input name="entities_name" type="text"  placeholder="entities_name" readonly="true" value="<?php echo !empty($companynament)?$companynament:'';?>">
	  </dd>	 							
      </td>
      <td width="200" height="42" align="right" nowrap>
          <div align="center" <span class="Style22">
		  Client/Site:<span class="Style21"></span></div>
	   </div></td>
      <td width="400">	
		<dd>	  
		  <input name="customers_id" type="hidden"  placeholder="customers_id" readonly="true" value="<?php echo !empty($customers_id)?$customers_id:'';?>">
         <input name="customer_name" type="text"  placeholder="customer_name" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
        </dd>		
      </td>    
    </tr>
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">
		<dd>
		Num&eacute;ro de s&eacute;rie:<span class="Style21"></span></div>
		</dd>
      </div></td>
      <td width="200">
	  <dd>
	  	 <input name="serial" type="text"  placeholder="num&eacute;ro de s&eacute;rie">						
	  </dd>
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Nom &eacute;quipemement:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  <dd>
	  	 <input name="name"	 type="text"  placeholder="Nom equipement">						
      </dd>
	  </td> 
    </tr>
	<tr valign="baseline">
	<td width="100" height="42" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">
	 <dd>
	 Modele:<span class="Style21"></span></div>
	 </dd>
	</div>
       <td width="100">
      
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="coprintersmodels_id" class="coprintersmodels_id">
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
     <td width="100" height="10" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">
	 <dd>
	 Type:<span class="Style21"></span></div>
	 </dd>
	</div>
	 <td width="100">
      
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="coprinterstypes_id" class="coprinterstypes_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_coprinterstypes WHERE is_deleted = 0 order by id ASC");
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
        <div align="center"><span class="Style22">
		<dd>
		Type connexion:<span class="Style21"></span></div>
		</dd>
      </div></td>
      <td width="400">
	  <dd>

        <select name="typeadressage">
            <option value="dhcp">DHCP</option>
            <option value="wifi">WIFI</option>
            <option value="fixe">FIXE</option>
        </select>

	</dd>  					
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
		  Adresse Ip: <span class="Style1"></span></div>
		  </dd>
	  </div></td>
     <td width="200">
	 <dd>
	  	 <input name="adresseip" type="text"  placeholder="Adresse ip" 
		  onChange="ControlFields(document.aic_form_input.tbuying_qu.value,'Quantité ',1);
			 
			          document.aic_form_input.tbuying_price_per_pack.disabled=true;
	                  document.aic_form_input.tbuying_qty_pack.disabled=true;">
		  						
     </dd>
	 </td>
    </tr>		
	
    <tr valign="baseline">
    
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
		  Lieu:<span class="Style21"></span></div>
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
	  	 <input name="location" type="text"  placeholder="localisation">						
	   </dd>
      </td>
	  
    <td width="30" height="42" align="right" nowrap>
          <div align="center" class="Style22"> 
		  <dd>
		  Commentaire:
		  </dd>
	  </div></td>
    <td width="400">
	<dd>
	  	 <input name="comment" class="Style22"  type="textarea"  placeholder="Commentaire">						
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
 <a class="btn" href="printer_list.php?entities_id=<?php echo $entities_id; ?> &type=printers">Retour</a>
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

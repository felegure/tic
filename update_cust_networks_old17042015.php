<?php
session_start();

    $type='networks';
    include 'recuperation_variables.php';
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id '])) {
        $id  = $_REQUEST['id'];
    }
     $id  = $_REQUEST['id'];		
    if ( null==$id  ) {
        header("Location: network_list.php");
    }    
   if ( !empty($_POST)) {
    	require 'checkFields_cust_upd_networks.php';
        if ($valid) {		
        require 'init_fields_upd_networks.php';
        require 'maj_fields_upd_valid_networks.php';
	    } 
    } 
    else {
        require 'maj_fields_upd_else_post_networks.php';
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
<title>Modification equipement reseau</title>
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
      <h3>Modification Equipement reseau</h3>
    </div>
             
    <form class="form-actions" action="update_cust_networks.php?id=<?php echo $id?>" method="post">
	<table  width="1200" height="800" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
	<tr valign="baseline">
    <td width="100" height="42" align="right" nowrap >
    <span class="Style22">Nom entit&eacute;:
	<input name="entities_id" type="hidden"  placeholder="entities_id" readonly="true" align="right" value="<?php echo !empty($entities_id)?$entities_id:'';?>">
    <input name="entities_name" type="text"  placeholder="entities_name" readonly="true" align="right" value="<?php echo !empty($companynament)?$companynament:'';?>">
		 <?php if (!empty($entities_idError)): ?>
         <span class="help-inline"><?php echo $entities_idError;?></span>
        <?php endif; ?> 							
   </td>
   <td width="30" height="82" align="right" nowrap >
      <span class="Style22">Client/Site:<span class="Style21" align="right"> 	   
		  <input name="customers_id" type="hidden"  placeholder="customers_id" readonly="true" value="<?php echo !empty($customers_id)?$customers_id:'';?>">
         <input name="customer_name" type="text"  placeholder="customer_name" readonly="true"  align="right" value="<?php echo !empty($customer_name)?$customer_name:'';?>"></span>
		 <?php if (!empty($customers_idError)): ?>
         <span class="help-inline"><?php echo $customer_idError;?>
        <?php endif; ?> 
   </td> 
	<tr valign="baseline">
      <td width="30" height="42" align="right" nowrap >
     <span class="Style22">N° s&eacute;rie:
	  	 <input name="serial" type="text"  placeholder="num&eacute;ro de s&eacute;rie" align="right" value="<?php echo !empty($serial)?$serial:'';?>"></span>					   
      <td width="60" height="42" align="right" nowrap><div align="right" class="Style23">
     <span class="Style22">Nom &eacute;quipemement:<span class="Style21" align="right"></span>
  	 <input name="name"	 type="text"  placeholder="Nom equipement" align="right"value="<?php echo !empty($name)?$name:'';?>"></span> 						
      </td> 
    </tr>
      
     <span class="Style22">
	<td width="80"  height="42" align="right" nowrap><div align="right" class="Style23">			   
	 <span class="Style22">Modele:
	  <input name="namemodel" type="text" align="right" readonly="true" value="<?php echo $data['namemodel']; ?>"></span>
	<dd> 
		
	<?php
	$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
	mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
	?> 
	<span class="Style22">Choix</span>
	<select name="networkmodels_id" class="networkmodels_id" align="right" >
	<option value="0">NULL </option>
	<?php 
	$sql=mysqli_query($conn, "SELECT * FROM tictan_networkmodels where is_deleted = 0");
	while($row=mysqli_fetch_array($sql))
	{
	echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
	} ?>
	</select>
	</dd>
	<input name="networkmodels_id0" type="hidden" value="<?php echo $networkmodels_id;?>" align="right" >					
    </div>
	</div> 	
	</td>				   
<td width="80"  height="42" align="right" nowrap><div align="right" class="Style23">	
    <span class="Style22"> Type ___________<span class="Style21" align="right"></span>
	<input name="nametype" type="text" align="right" readonly="true" value="<?php echo $data['nametype']; ?> "align="right" >    
	<dd>
	<?php
	$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
	mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
	?>
	 <span class="Style22">Choix__________</span>
	<select name="networktypes_id" class="networktypes_id">
	<option  value="0">NULL</option>
	<?php 
	$sql=mysqli_query($conn, "select id, name from tictan_networktypes WHERE is_deleted = 0 order by id ASC");
	while($row=mysqli_fetch_array($sql))
	{
	echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
	} ?>
	</select>
	</dd>						
    </div>
    </td>
 </tr>
 
  <td width="30" height="42" align="right" nowrap><div align="right" class="Style23">	
	  <span class="Style22">Type d'adressage:<span class="Style21"></span>
	  <input name="typeadressagev" type="text" align="right" readonly="true" value="<?php echo $data['typeadressage']; ?>">    
	  <dd>
	   <fieldset>
	    <span class="Style22">Choix___</span>
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
      <td width="30" height="42" align="right" nowrap ><div align="right" class="Style23">
     <span class="Style22">Plage Adresse ip:<span class="Style21"></span>
  	 <input name="adressrange" type="text" align="right" placeholder="Plage adresse ip">						
   </td>
   <td width="30" height="42" align="right" nowrap><div align="right" class="Style23">
   <span class="Style22">Adresse ip:<span class="Style21"></span>
   <input name="adresseip" type="text"  placeholder="adresseip" value="<?php echo $data['adresseip']; ?>">  						
   </td>
     <td width="30" height="42" align="right" nowrap><div align="right" class="Style23">
   <span class="Style22">Masque:<span class="Style21"></span>
   <input name="mask" type="text"  placeholder="mask" value="<?php echo $data['mask']; ?>"> 				
   </td> 
    <td width="30" height="42" align="right" nowrap><div align="right" class="Style23">
   <span class="Style22">Passerelle:<span class="Style21"></span>
   <input name="bridge" type="text"  placeholder="bridge"align="right" value="<?php echo $data['bridge']; ?>">  						
   </td>  
    </tr>	
   <tr valign="baseline">
   <td width="30" height="42" align="right" nowrap><div align="right" class="Style23">
  <span class="Style22">Serveur smtp:<span class="Style21" align="right" > </span>
	  	 <input name="smtpserver" type="text"  placeholder="Serveur smtp" align="right" value="<?php echo $data['adresseip']; ?>"> 						
      </td>
   <td width="30" height="42" align="right" nowrap >
   <div align="right" class="Style23">
   <span class="Style22">Login:<span class="Style21" align="right"> </span>
 	 <input name="login" type="text"  placeholder="Login" align="right" value="<?php echo $data['login']; ?>">	
   </td>  
   <td width="30" height="42" align="right" nowrap ><div align="right" class="Style23"> 
    <span class="Style22">Mot de passe:<span class="Style21" align="right"></span>
	 <input name="password" type="text"  placeholder="Mot de passe" align="right" value="<?php echo $data['password']; ?>">
   </td>
   </div>
   </tr>		
    <tr valign="baseline">
    <td width="30" height="42" align="right" nowrap><div align="right" class="Style23">
     <span class="Style22"> Fax:<span class="Style21" align="right"></span>
	  	 <input name="fax" class="Style22"  type="text"  placeholder="Fax" value="<?php echo $data['fax']; ?>">  						
      </td > 
	 <td width="30" height="42" align="right" nowrap><div align="right" class="Style23">
          <div align="right" <span class="Style22">Lieu:<span class="Style21"></span>
	   
	  	 <input name="location" type="text"  placeholder="localisation" value="<?php echo $data['location']; ?>"> 					
      </td>
    </tr>	
   <tr valign="baseline">
    <td width="30" height="42" align="right" nowrap><div align="right" class="Style23">
          <div align="right" class="Style22"> Commentaire:<span class="Style21" align="right"></span>
	  	 <input name="comment" class="Style22"  type="textarea"  placeholder="Commentaire" align="right" value="<?php echo $data['comment']; ?>">  						
      </td > 
   <td width="30" height="42" align="right" nowrap><div align="right" class="Style23">
          <div align="right" <span class="Style22">
	      </div>
	      <div align="right" <span class="Style22">
	      </div>						
      </td>	 
	<td width="30" height="42" align="right" nowrap><div align="right" class="Style23">
          <div align="right" <span class="Style22">
	      </div>
	      <div align="right" <span class="Style22">
	      </div>						
      </td>	  
</tr>
	 <tr valign="baseline"> 
	   <td width="200">
	  	 <input name="author" type="hidden"  placeholder="Auteur" value="<?php echo $username ;?>">
		 <input name="date_mod" type="hidden"  placeholder="Date modification" value='<?php echo date("d-m-Y");?>'>
      </td>
    </tr> 
  </table>
                   <div class="form-actions1">
				          <input name="submit" type="submit" class="btn btn-danger"   onClick='ValidateON()' value="Mise a jour" >					  
                          <a class="btn" href="network_list.php?entities_id=<?php echo $entities_id ?> &customer_id=<?php echo $data['customers_id'] ?>&customer_name=<?php echo $data['customer_name']?>">Retour</a>
                        </div>			
                    </form>
                </div>
                 
    </div> <!-- /container -->
		<SCRIPT language="javascript">	
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
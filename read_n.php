<?php
   session_start();
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }


 if ( null==$id ) {
        header("Location: network_list.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM vtictan_customers_network where id_network = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$_SESSION["companynament"] = $data['companynament'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$_SESSION["customer_id"] = $data['customers_id'];			
	    Database::disconnect();
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<title> Consultation des equipements reseaux</title>
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
                        <h3>Consultation d'un equipement reseau/Site</h3>
                    </div>   
<form class="form-actions" method="post" name="read_cust_networks" > 

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
        <div align="center"><span class="Style22">Num&eacute;ro de s&eacute;rie:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="serial" type="text"  readonly="true"  placeholder="num&eacute;ro de s&eacute;rie" value="<?php echo !empty($serial)?$serial:'';?>">  
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Nom &eacute;quipemement:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="name"	 type="text"  placeholder="Nom equipement" readonly="true" value="<?php echo !empty($namenetwork)?$namenatwork:'';?>">  					
      </td> 
    </tr>
	<tr valign="baseline">
	<td width="80" height="42" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">Modele:<span class="Style21"></span></div>
	</div>
      <td width="80">
      <input name="namemodel" type="text" readonly="true" value="<?php echo !empty($namemodel)?$namemodel:'';?>"> 							
    </div>
    </td>
     <td width="80" height="10" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">Type:<span class="Style21"></span></div>
	</div>
	 <td width="80">
       <input name="nametype" type="text" readonly="true" value="<?php echo !empty($nametype)?$nametype:'';?>"> 											
    </div>
    </td>
 </tr>
 </tr>
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Type adressage:<span class="Style21"></span></div>
      </div></td>
      <input name="typeadressage" type="text" readonly="true" value="<?php echo !empty($typeadressage)?$typeadressage:'';?>"> 			      </td>
    </tr>
 <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Plage Adresse ip:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="adressrange" type="text"  placeholder="Plage adresse ip" readonly="true" value="<?php echo !empty($adressrange)?$adressarange:'';?>"> 	 
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Adresse Ip: <span class="Style1"></span></div>
	  </div></td>
     <td width="200">
	  	 <input name="adresseip" type="text"  placeholder="Adresse ip" readonly="true" value="<?php echo !empty($adresseip)?$adresseip:'';?>">  						
     </td>
    </tr>		
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Masque:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="mask" type="text"  placeholder="Masque" readonly="true" value="<?php echo !empty($mask)?$mask:'';?>"> 						
      </td>
	  <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Passerelle:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="bridge" type="text"  placeholder="Passerelle" readonly="true" value="<?php echo !empty($bridge)?$bridge:'';?>"> 					
      </td>  
</tr>  
 
   <tr valign="baseline">
   <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Serveur smtp:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="smtpserver" type="text"  placeholder="Serveur smtp" readonly="true" value="<?php echo !empty($smtpserver)?$smtpserver:'';?>"> 					
      </td>
     
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Passerelle:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="bridge" type="text"  placeholder="Passerelle"  readonly="true" value="<?php echo !empty($bridge)?$bridge:'';?>">						
      </td>  
    </tr>	
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Login:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="login" type="text"  placeholder="Login" readonly="true" value="<?php echo !empty($login)?$login:'';?>"> 										
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Mot de passe:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="password" type="text"  placeholder="Mot de passe" readonly="true" value="<?php echo !empty($password)?$password:'';?>"> 										
      </td>  
    </tr>		
    <tr valign="baseline">
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" class="Style22"> Fax:</div>
	  </div></td>
    <td width="200">
	  	 <input name="fax" class="Style22"  type="text"  placeholder="Fax"readonly="true" value="<?php echo !empty($fax)?$fax:'';?>"> 										
      </td > 
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Lieu:<span class="Style21"></span></div>
	  </div></td>  
	   <td width="200">
	  	 <input name="location" type="text"  placeholder="localisation" readonly="true" value="<?php echo !empty($location)?$location:'';?>"> 											
      </td>
    </tr>	
   <tr valign="baseline">
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" class="Style22"> Commentaire:</div>
	  </div></td>
    <td width="400">
	  	 <input name="comment" class="Style22"  type="textarea"  placeholder="Commentaire"readonly="true" value="<?php echo !empty($comment)?$comment:'';?>"> 						
      </td > 
</tr>
	 <tr valign="baseline"> 
	   <td width="200">
	  	 <input name="author" type="hidden"  placeholder="Auteur" value"<?php echo $username ?>">
		 <input name="date_mod" type="hidden"  placeholder="Date modification" value'<?php echo date("d-m-Y");?>'>
      </td>
    </tr> 
  </table>

  <div class="form-actions">
     <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Ajout" >					  
     <a class="btn" href="index_cust_choose.php?entities_id=<?php echo $entities_id; ?> &type=networks">Retour</a>
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
  //action à faire pour la valeur true 
 alert ("Enregistrement Insere");

	}
	   
}
</script>
</body>
</html>



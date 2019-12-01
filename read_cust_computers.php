
<?php
    session_start();
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }


 if ( null==$id ) {
        header("Location: index_cust_choose.php?type=computers");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM vtictan_customers_computers where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$_SESSION["companyname"] = $data['companyname'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$entities_id = $data['entities_id'];
		$companyname = $data['companyname'];
		$_SESSION["customers_id"] = $data['customers_id'];		
	    Database::disconnect();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row" align="center">
                        <h3>Détails de l'ordinateur</h3>
                    </div>
           

<form class="form-actions" method="post" name="read_cust_computers" action="read_cust_customers.php" method="post" > 					
 <table  width="900" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
<tr valign="baseline">
      <td width="100" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Nom entit&eacute;:<span class="Style21"></span></div>
      </div></td>
      <td width="300">
	    <input name="entities_name" type="text"  placeholder="entities_name" readonly="true" value="<?php echo $data['companyname'];?>"> 							
      </td>
      <td width="100" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Client/Site:<span class="Style21"></span></div>
	  </div></td>
      <td width="400">	  
         <input name="customer_name" type="text"  placeholder="customer_name" readonly="true" value="<?php echo $data['customer_name'];?>">
      </td>    
    </tr>
	<tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Nom du Pc:<span class="Style21"></span></div>
      </div></td>
      <td width="300">
	  	 <input name="pcname" type="text"  placeholder="pcname" readonly="true" value="<?php echo $data['pcname'];?>">					
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Numero de s&eacute;rie:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="serial"	 type="text"  placeholder="serial" readonly="true" value="<?php echo $data['serial'];?>">						
      </td> 
    </tr>
	<td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Modele:<span class="Style21"></span></div>
	  </div></td>
	<td width="200">
	  	 <input name="namemodel"	 type="text"  placeholder="namemodel" readonly="true" value="<?php echo $data['namemodel'];?>">						
    </td>   
   <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Type:<span class="Style21"></span></div>
	  </div></td>
	<td width="200">
	  	 <input name="nametype"	 type="text"  placeholder="nametype" readonly="true" value="<?php echo $data['nametype'];?>">						
    </td>   
   
 </tr>	


 <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Processeur:<span class="Style21"></span></div>
      </div></td>
      <td width="300">
	  	 <input name="processor" type="text"  placeholder="Processor" readonly="true" value="<?php echo $data['processor'];?>">						
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Memoire vive: <span class="Style1"></span></div>
	  </div></td>
     <td width="200">
	  	 <input name="ram" type="text"  placeholder="Ram" readonly="true" value="<?php echo $data['ram'];?>">						
     </td>
    </tr>
    <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">compte adm:<span class="Style21"></span></div>
      </div></td>
      <td width="300">
	  	 <input name="session_admin_name" type="text"  placeholder="compte adm"  readonly="true" value="<?php echo $data['session_admin_name'];?>">					
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">mot de passe adm: <span class="Style1"></span></div>
	  </div></td>
     <td width="200">
	  	 <input name="session_admin_pwd" type="text"  placeholder="mot de passe adm" readonly="true" value="<?php echo $data['session_admin_pwd'];?>">						
     </td>
    </tr>	
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">compte util.:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="session_user_name" type="text"  placeholder="compte util." readonly="true" value="<?php echo $data['session_user_name'] ;?>">						
      </td>
	  <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">mot de passe util.:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="session_user_pwd" type="text"  placeholder="mot de passe util." readonly="true" value="<?php echo $data['session_user_pwd'];?>">				
      </td>  
     </tr> 
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">nom domaine:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="domain_name" type="text"  placeholder="nom domaine" readonly="true" value="<?php echo $data['domain_name'];?>">						
      </td>

      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Type Connexion:<span class="Style21"></span>
     <td width="200">
	  	 <input name="typeconnexion" type="text"  placeholder="mot de passe util." readonly="true" value="<?php echo $data['typeconnexion'];?>">						
      </td> 				
       </div>
    </tr>	 
 <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Plage Adresse ip:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="adressrange" type="text"  placeholder="Plage adresse ip" readonly="true" value="<?php  echo $data['adressrange'];?>">						
      </td> 										
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Adresse Ip: <span class="Style1"></span></div>
	  </div></td>
     <td width="200">
	  	 <input name="adresseip" type="text"  placeholder="Adresse ip" readonly="true" value="<?php echo $data['adresseip'];?>">												
     </td>
    </tr>	
	
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Masque:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="mask" type="text"  placeholder="Masque" readonly="true" value="<?php echo $data['mask'];?>">											
      </td>
	  <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Passerelle:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="bridge" type="text"  placeholder="Passerelle" readonly="true" value="<?php echo $data['bridge'];?>">										
      </td>  
     </tr> 
     
     <tr valign="baseline">	  
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Lieu:<span class="Style21"></span></div>
	  </div></td>  
	   <td width="200">
	  	 <input name="location" type="text"  placeholder="localisation" readonly="true" value="<?php echo $data['location'];?>">												
      </td>
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" class="Style22"> Commentaire:</div>
	  </div></td>
    <td width="400">
	  	 <input name="comment" class="Style22"  type="textarea"  placeholder="Commentaire" readonly="true" value="<?php echo $data['comment'];?>">												
      </td > 
</tr>
	 <tr valign="baseline"> 
	   <td width="200">
	  	 <input name="author" type="hidden"  placeholder="Auteur" readonly="true" value="<?php echo $data['author'] ;?>">
		 <input name="date_mod" type="hidden"  placeholder="Date modification" readonly="true" value='<?php echo $data['date_mod'];?>'>
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
   <a class="btn" href="computer_comp_list.php?entities_id=<?php echo $entities_id; ?> &companyname=<?php echo $companyname;?>&type=computers_comp">Retour</a>
	  </td>  
 </tr> 
  </table>

  </form>                
    </div> <!-- /container -->              
  </body>
</html>

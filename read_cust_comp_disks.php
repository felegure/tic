
<?php
    session_start();
	$username=$_SESSION["username"] ;	
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }


 if ( null==$id ) {
        header("Location: disks_list.php?type=disks");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT * FROM vtictan_cust_comp_disk where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$_SESSION["companyname"] = $data['companyname'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$entities_id = $data['entities_id'];
		$companyname = $data['companyname'];
		$pcname = $data['pcname'];
		$name = $data['name'];		
		$namemodel= $data['namemodel'];	
		$typename = $data['nametype'];	
		$supplier = $data['supplier'];	
        $computers_id = $data['computers_id'];
        $customers_id = $data['customers_id'];	
        $customer_name = $data['customer_name'];	
// echo "customer_name=$customer_name <br>";		
		$_SESSION["customers_id"] = $data['customers_id'];		
	    Database::disconnect();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<title>Detail disque</title>
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
                        <h3>Detail disque/ordinateur</h3>
                    </div>  
 <div align="left"> <span class="Style1"> 
 <?php echo "<h6> Ordinateur:  $pcname </h6>";?>	</span>				
<form class="form-actions" method="post" name="read_cust_comp_disks" action="read_cust_comp_disks.php?pcname=<?php echo $pcname; ?>" method="post" > 

  <table  width="900" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
    <tr valign="baseline" align="center">
      <td width="100" height="42" align="center" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Nom entit&eacute;:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="entities_id" type="hidden"  placeholder="entities_id" readonly="true" value="<?php echo !empty($entities_id)?$entities_id:'';?>">
         <input name="entities_name" type="text"  placeholder="entities_name" readonly="true" value="<?php echo !empty($companyname)?$companyname:'';?>">
		 <?php if (!empty($entities_idError)): ?>
         <span class="help-inline"><?php echo $entities_idError;?></span>
        <?php endif; ?> 							
      </td>
      <td width="100" height="42" align="center" nowrap><div align="center" class="Style23">
          <div align="center"> <span class="Style22">Client/Site:<span class="Style21"></span></div>
	  </div></td>
      <td width="400">	  
		  <input name="customers_id" type="hidden"  placeholder="customers_id" readonly="true" value="<?php echo !empty($customers_id)?$customers_id:'';?>">
          <input name="computers_id" type="hidden"  placeholder="computers_id" readonly="true" value="<?php echo !empty($computers_id)?$customers_id:'';?>">
		  <input name="customer_name" type="text"  placeholder="customer_name" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
		 <?php if (!empty($customer_idError)): ?>
         <span class="help-inline"><?php echo $customers_idError;?></span>
        <?php endif; ?> 
      </td>    
    </tr>
     <tr valign="baseline" align="center">
      <td width="30" height="42" align="center" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Nom du disque:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="name"	 type="text"  placeholder="Nom du disque" readonly="true" value="<?php echo $data['name'];?>">					
      </td>   
      <td width="30" height="42" align="center" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Numero de serie:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="serial" type="text"  placeholder="Numero de serie" readonly="true" value="<?php echo $data['serial'];?>">								
      </td> 	  
    </tr>
    <tr valign="baseline" align="center">
     <td width="30" height="42" align="center" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Modele:<span class="Style21"></span></div>
	 </div>
	 </td>
	<td width="200">
	  	 <input name="namemodel"	 type="text"  placeholder="namemodel" readonly="true" value="<?php echo $data['namemodel'];?>">						
    </td>   
   <td width="30" height="42" align="center" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Type:<span class="Style21"></span></div>
	  </div></td>
	<td width="200">
	  	 <input name="nametype"	 type="text"  placeholder="nametype" readonly="true" value="<?php echo $data['nametype'];?>">						
    </td>   
 </tr>
    <tr valign="baseline" align="center">
      <td width="30" height="42" align="center" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Fournisseur:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="supplier" type="text"  placeholder="Fournisseur" readonly="true" value="<?php echo $data['supplier'];?>">						
      </td>
  </tr>   
    <tr valign="baseline" align="center">
      <td width="30" height="42" align="center" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Partition 1:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="partition1" type="text"  placeholder="Partition 1" readonly="true" value="<?php echo $data['partition1'];?>">						
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Partition 2: <span class="Style1"></span></div>
	  </div></td>
     <td width="200">
	  	 <input name="partition2" type="text"  placeholder="Partition 2" readonly="true" value="<?php echo $data['partition2'];?>">									
     </td>
    </tr>		
    <tr valign="baseline" align="center">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Partition 3:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="partition3" type="text"  placeholder="Partition 3" readonly="true" value="<?php echo $data['partition3'];?>">								
      </td>	
   </tr>  

    <tr valign="baseline" align="center">
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" class="Style22"> Commentaire:</div>
	  </div></td>
    <td width="400">
	  	 <input name="comment" class="Style22"  type="textarea"  placeholder="Commentaire" readonly="true" value="<?php echo $data['comment'];?>">									
      </td > 
</tr>
    <tr valign="baseline" align="center">
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
 <a class="btn" href="index_cust_comp_disks.php?entities_id=<?php echo $entities_id; ?> &pcname=<?php echo $pcname; ?>&computers_id=<?php echo $computers_id; ?>&type=disks">Retour</a>
	  </td>  
 </tr> 
<p>&nbsp;</p> 
</div> <!-- /container --> 

</script>
</body>
</html>




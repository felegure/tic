
<?php
    session_start();
	$username=$_SESSION["username"] ;	
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }


 if ( null==$id ) {
        header("Location: softs_list.php?type=softwares");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM vtictan_cust_comp_soft where id =?";
		echo "              sql=$sql  id=$id <br>";
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
//		$namemodel= $data['namemodel'];	
		$editor = $data['editor'];	
		$supplier = $data['supplier'];	
        $computers_id = $data['computers_id'];
        $customers_id = $data['customers_id'];	
        $customer_name = $data['customer_name'];	
		$start_date = $data['start_date'];
		$end_date = $data['end_date'];		
echo "customer_name=$customer_name <br>";		
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

<title>Detail logiciel</title>
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
                        <h3>Detail logiciel/ordinateur</h3>
                    </div>  
 <div align="left"> <span class="Style1"> 
 <?php echo "<h6> Ordinateur:  $pcname </h6>";?>	</span>				
<form class="form-actions" method="post" name="read_cust_comp_virtuels" action="read_cust_comp_virtuels.php?pcname=<?php echo $pcname; ?>" method="post" > 

  <table  width="900" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
    <tr valign="baseline">
      <td width="100" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Nom entit&eacute;:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="entities_id" type="hidden"  placeholder="entities_id" readonly="true" value="<?php echo !empty($entities_id)?$entities_id:'';?>">
         <input name="entities_name" type="text"  placeholder="entities_name" readonly="true" value="<?php echo !empty($companyname)?$companyname:'';?>">
		 <?php if (!empty($entities_idError)): ?>
         <span class="help-inline"><?php echo $entities_idError;?></span>
        <?php endif; ?> 							
      </td>
      <td width="100" height="42" align="right" nowrap><div align="center" class="Style23">
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
     <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Nom du logiciel:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="namemodel"	 type="text"  placeholder="Nom du logiciel" readonly="true" value="<?php echo $data['namemodel'];?>">					
      </td>  
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Famille:<span class="Style21"></span></div>
	  </div></td>	
      <td width="200">
	  	 <input name="nametype" type="text"  placeholder="Famille" readonly="true" value="<?php echo $data['nametype'];?>">								
      </td> 	  
    </tr>
     <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Num. Licence:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="licence"	 type="text"  placeholder="Num. Licence" readonly="true" value="<?php echo $data['licence'];?>">					
      </td>  
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Editeur:<span class="Style21"></span></div>
	  </div></td>	
      <td width="200">
	  	 <input name="editor" type="text"  placeholder="Editeur" readonly="true" value="<?php echo $data['editor'];?>">								
      </td> 	  
    </tr>	
     <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Fournisseur:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="supplier"	 type="text"  placeholder="Fournisseur" readonly="true" value="<?php echo $data['supplier'];?>">					
      </td>  	  
    </tr>	

     <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Valable de:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="start_date"	 type="text"  placeholder="Date debut" readonly="true" value="<?php echo $data['start_date'];?>">					
      </td>  
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Au :<span class="Style21"></span></div>
	  </div></td>	
      <td width="200">
	  	 <input name="end_date" type="text"  placeholder="Date fin" readonly="true" value="<?php echo $data['end_date'];?>">								
      </td> 	  
    </tr>		
<tr valign="baseline">
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" class="Style22"> Commentaire:</div>
	  </div></td>
    <td width="400">
	  	 <input name="comment" class="Style22"  type="textarea"  placeholder="Commentaire" readonly="true" value="<?php echo $data['comment'];?>">									
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
 <a class="btn" href="index_cust_comp_softs.php?entities_id=<?php echo $entities_id; ?> &pcname=<?php echo $pcname; ?>&computers_id=<?php echo $computers_id; ?>&type=softwares">Retour</a>
	  </td>  
 </tr> 
<p>&nbsp;</p> 
</div> <!-- /container --> 

</script>
</body>
</html>




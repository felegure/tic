<?php
session_start();
   require 'database.php';
   $id = null;
 
    if ( !empty($_GET['id'])) {
        $id  = $_REQUEST['id'];
		echo "1.  id=$id <br>";
	    $_SESSION['id']=$id;	
    }
	else $id =  $_SESSION['id']=$id;;
	if ( !empty($_GET['entities_id'])) {
        $entities_id  = $_REQUEST['entities_id'];
		$_SESSION['entities_id']=$entities_id;		
		$entities_save=$entities_id;
			echo "2.  entities_id=$entities_id , entities_save=$entities_save <br>";
    }
	else  {
	$entities_id=$_SESSION['entities_id'];
	$entities_save=$entities_id;
	echo "apres session entities_id=$entities_id <br>";
	}
	if ( !empty($_GET['customers_id'])) {
        $customers_id  = $_REQUEST['customers_id'];
		echo "3.  customers_id=$customers_id <br>";
		$_SESSION['customers_id']=$customers_id;		
    }
	else  {
	$customers_id=$_SESSION['customers_id'];
//	echo "apres session customers_id=$customers_id  entities_save=$entities_save <br>";
	}    
 $id  = $_REQUEST['id'];
//	 		echo " 2.  id=$id <br>";
	$_SESSION['customers_id']=$customers_id;	
	
	if ( !empty($_GET['computers_id'])) {
        $computers_id  = $_REQUEST['computers_id'];
//		echo "3.  computers_id=$computers_id <br>";
		$_SESSION['customers_id']=$customers_id;		
    }
	else  {
	$computers_id=$_SESSION['computers_id'];
//	echo "apres session computers_id=$computers_id  entities_save=$entities_save <br>";
	}
	if ( !empty($_GET['pcname'])) {
        $pcname  = $_REQUEST['pcname'];
		echo "8.  pcname=$pcname <br>";
		$_SESSION['pcname']=$pcname;		
    }
	else  {
	$pcname=$_SESSION['pcname'];
	echo "apres session pcname=$pcname  entities_save=$entities_save <br>";
	}
		if ( !empty($_GET['drivename'])) {
        $drivename  = $_REQUEST['drivename'];
		echo "9.  drivename=$drivename <br>";
		$_SESSION['drivename']=$drivename;		
    }
	else  {
	$drivename=$_SESSION['drivename'];
	echo "apres session drivename=$drivename <br>";
	}
    if ( null==$id  ) {
echo "null==$id <br> ";
      header("Location: index_cust_comp_virtuels.php?entities_id=<?php echo $entities_id; ?>&pcname=$pcname&computers_id=$computers_id&type=disks");
echo " null==$id <br>"; 
 }
	   if ( !empty($_POST)) {
     echo "dans POST <br> ";
    	require 'checkFields_cust_upd_virtuels.php';
        // update data
        if ($valid) {		
	echo "valid???????????????????? <br>";
      require 'init_fields_upd_virtuels.php';
      require 'maj_fields_upd_valid_virtuels.php';
} 
} 

else {
     echo "PAS DANS POST <br>";
        require 'maj_fields_upd_else_post_virtuels.php';
//	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<title>Modification lecteur virtuel</title>
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
                        <h3>Modifier un lecteur/ordinateur</h3>
						<?php
					//	include_once 'identification.php';
						?>				
                    </div>   
					

<form class="form-actions" method="post" name="update_cust_comp_virtuels" action="update_cust_comp_virtuels.php?id=<?php echo $id; ?>&pcname=<?php echo $pcname; ?>&entities_id=<?php echo $entities_id; ?>&companyname=<?php echo $companyname; ?>&customers_id=<?php echo $customers_id; ?>&customer_name=<?php echo $customer_name; ?>&computers_id=<?php echo $computers_id; ?>&drivename=<?php echo $drivename; ?>&type=<?php echo 'virtuels'; ?>" method="post" > 					  

<table  width="900" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
<tr valign="baseline">
      <td width="150" height="42" align="right" nowrap ><div align="center" class="Style22">
	  <dd>
       Nom entit&eacute;:<span class="Style21"></span></div>
	   </dd>
      </div>
	  </td> 
      <td width="300" height="42" align="right" nowrap ><div align="center" class="Style22">
	    <dd>
	  	 <input name="entities_id" type="hidden"  placeholder="entities_id" readonly="true" value="<?php echo !empty($entities_id)?$entities_id:'';?>">
         <input name="entities_name" type="text"  placeholder="entities_name" readonly="true" value="<?php echo !empty($companyname)?$companyname:'';?>">
         </dd>
		 <?php if (!empty($entities_idError)): ?>
         <span class="help-inline"><?php echo $entities_idError;?></span>
        <?php endif; ?> 							
      </td>
   <td width="150" height="42" align="right" nowrap ><div align="center" class="Style22">
	  <dd>
       Client/Site:<span class="Style21"></span></div>
	   </dd>
      </div>
	  </td> 
      <td width="300" height="42" align="right" nowrap ><div align="center" class="Style22">
	    <dd>
		  <input name="customers_id" type="hidden"  placeholder="customers_id" readonly="true" value="<?php echo !empty($customers_id)?$customers_id:'';?>">
		  <input name="customer_name" type="text"  placeholder="customer_name" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
         </dd>
		 <?php if (!empty($entities_idError)): ?>
         <span class="help-inline"><?php echo $entities_idError;?></span>
        <?php endif; ?> 							
      </td>
      
    </tr>
	<tr valign="baseline">
      <td width="80" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Nom lecteur:<span class="Style21"></span></div>
		</dd>
      </div></td>
      <td width="300">
	  <dd>
	  	 <input name="drivename" type="text"  placeholder="Nom lecteur"  value="<?php echo !empty($drivename)?$drivename:'';?>"></span> 					
      </dd>
	  </td>
       <td width="30" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Mot de passe:<span class="Style21"></span></div>
        </dd>
	  </div></td>
      <td width="300">
	  <dd>
	      <input name="computers_id" type="hidden"  placeholder="computers_id" align="right" value="<?php echo !empty($computers_id)?$computers_id:'';?>"></span>					
	  	 <input name="password" type="text"  placeholder="Mote de passe" align="right" value="<?php echo !empty($password)?$password:'';?>"></span>					
      </dd>
	 </td>
	  </td> 	
  
    </tr>	
 <tr valign="baseline"> 
   <td width="30" height="42" align="right" nowrap>
          <div align="center"> <span class="Style22"> 	
          <dd>		  
		  Commentaire:<span class="Style21"></span></div>
		  </dd>

	  </div></td>
    <td width="300">
	 <dd>
	  	 <input name="comment" class="Style22"  type="textarea"  placeholder="Commentaire" value="<?php echo !empty($comment)?$comment:'';?>">									
	 </dd>	 
      </td> 
    </tr>	
   
	 <tr valign="baseline"> 
	   <td width="300">
	  	 <input name="author" type="hidden"  placeholder="Auteur" value="<?php echo $author ;?>">
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
	  <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Mise a jour" >					  
     <a class="btn" href="index_cust_comp_virtuels.php?entities_id=<?php echo $entities_id; ?> &companyname=<?php echo $companyname;?>&computers_id=<?php echo $computers_id;?>&type=virtuels">Retour</a>
	  </td>  
 </tr> 
  </table>
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
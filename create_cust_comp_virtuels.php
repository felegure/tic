<?php
    session_start();
$type='disks';	
	include 'recuperation_variables.php';

    require 'database.php';
    $pdo = Database::connect();
	$profil = $_SESSION['profilAccess'];
    if ($profil != 'A' && $profil != 'S') 
	header("Location: index_cust_choose.php?entities_id=$entities_id&computers_id=$computers_id&type=virtuels");		
    if ( !empty($_POST)) {
        // keep track validation errors
			require_once ('checkFields_cust_virtuels.php');	
		//	echo "!empty <br>";
	
    if ($valid) {
	        $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tictan_cust_comp_virdrive(customers_id, entities_id, computers_id,drivename,comment,author, date_mod, is_deleted ) 
			values( ?,?, ?, ?, ?, ?, ?, ?)";
			
		$drivename = $_POST['drivename'];
        $comment = $_POST['comment'];
		$date_mod=$_POST['date_mod'];
		$author=$_POST['author'];
        $is_deleted = 0;
		echo "sql=$sql <br>";
//		echo "customers_id=$customers_id <br>";
		$q = $pdo->prepare($sql);
        $q->execute(array($customers_id, $entities_id, $computers_id, $drivename, $comment, $author, $date_mod,$is_deleted ));
		
        Database::disconnect();
			
		  header("Location: index_cust_comp_virtuels.php?entities_id=$entities_id&type=virtuels");
        }

  }
 // else 	echo "Eempty <br>";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<title>Ajout du lecteur virtuel</title>
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
                        <h3>Ajouter un lecteur virtuel/ordinateur</h3>
                    </div>  
	<?php echo "<h6> Ordinateur $pcname </h6>";?>						
<form class="form-actions" method="post" name="create_cust_comp_virtuels" action="create_cust_comp_virtuels.?pcname=$pcname" method="post" > 

  <table  width="800" height="300" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
    <tr valign="baseline">
      <td width="30" height="20" align="right" nowrap >
        <div align="center"><span class="Style22">Nom entit&eacute;:<span class="Style21"></span></div>
      </td>
      <td width="80">
	  	 <input name="entities_id" type="hidden"  placeholder="entities_id" readonly="true" value="<?php echo !empty($entities_id)?$entities_id:'';?>">
         <input name="entities_name" type="text"  placeholder="entities_name" readonly="true" value="<?php echo !empty($companyname)?$companyname:'';?>">							
      </td>
      <td width="100" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Client/Site:<span class="Style21"></span></div>
	  </td>
      <td width="30">	  
		  <input name="customers_id" type="hidden"  placeholder="customers_id" readonly="true" value="<?php echo !empty($customers_id)?$customers_id:'';?>">
		  <input name="computers_id" type="hidden"  placeholder="computers_id" readonly="true" value="<?php echo !empty($computers_id)?$computers_id:'';?>">
          <input name="customer_name" type="text"  placeholder="customer_name" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">

     </td>    
    </tr>
	<td width="0">
	</td>
   <tr valign="baseline">
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Nom du disque virtuel:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="drivename"	 type="text"  placeholder="Nom du disque virtuel">						
      </td> 
 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
       <div align="center"><span class="Style22">Mot de passe:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="password" type="text"  placeholder="Mot de passe"  value="<?php echo !empty($password)?$password:'';?>"> 						
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
     <a class="btn" href="index_cust_comp_virtuels.php?entities_id=<?php echo $entities_id; ?> &type=computers">Retour</a>
	  </td>  
 </tr> 
  </table>
 
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



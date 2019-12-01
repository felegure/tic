<?php
// modification : 25/03/2015
// enlever le state (rejion) et inverser code postal avec ville

    session_start(); 
	$username=$_SESSION["username"] ;	
    require 'database.php';
	 $entities_id = 0;
	$companyname = 0;
  	if ( !empty($_GET['entities_id'])) {
        $entities_id = $_REQUEST['entities_id'];
		$idsaventities=$entities_id;
		echo "entities_id=$entities_id <br>";
		echo "idsaventities=$idsaventities <br>";
	} 
		if ( !empty($_GET['companyname'])) {
        $companyname = $_REQUEST['companyname'];
		$companyname_save=$companyname;
		echo "companyname=$companyname<br>";
		echo "companyname_save=$companyname_save <br>";
	}
	
    $profil = $_SESSION['profilAccess'];
    if ($profil != 'A' && $profil != 'S') 
	  header("Location: index_cust.php");
    if ( !empty($_POST)) {
        // keep track validation errors
			require_once ('checkFields_cust.php');				 
         // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tictan_customers (customer_name, entities_id,customtype_id,phone,mobile,fax,email,website,
			comment,address,postcode,town,country,author, date_mod ) 
			values( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			echo "dans VALID sql=$sql <br>";
            $q = $pdo->prepare($sql);
            $q->execute(array($customer_name, $entities_id,$customtype_id,$phone,$mobile,$fax,$email,$website,
			$comment,$address,$postcode,$town,$country,$author, $date_mod));
            Database::disconnect();
           header("Location: customer_list.php?entities_id=$entities_id");
        }

    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<title>Ajout client</title>
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
                        <h3>Ajouter un Client/Site</h3>
                    </div>    

<form class="form-actions" method="post" name="create_customers" action="create_customers.php" method="post" > 

  <table  width="900" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
 
  <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">
	<dd>
		Nom Entite Client:<span class="Style21"></span></div>
		</dd>
      </div></td>
	  <td width="80">
      <dd>
	   <input name="entities_id" type="hidden"  readonly="true" placeholder="entities_id" value="<?php echo $entities_id;?>">
	  <input name="companyname" type="text"  readonly="true" placeholder="companyname" value="<?php echo $companyname;?>">
	  </dd>						
      </div>
    </td>	
    </td>	
	<td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">
		<dd>
		Type Client:<span class="Style21"></span></div>
		</dd>
       </div></td>
	   <td width="80">
       <dd>
		<?php
		$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
		mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
		?>
		<select name="customtype_id" class="customtype_id">
		<option  value="0">NULL</option>
		<?php 
		$sql=mysqli_query($conn, "select id, name from tictan_customtype WHERE is_deleted = 0 order by id ASC");
		while($row=mysqli_fetch_array($sql))
		{
		echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
		} 
		?>
		</select>
		</dd>						
    </div>
    </td> 
	</tr>  
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">
		<dd>
		Nom Site/Client:<span class="Style21"></span></div>
		</dd>
      </div></td>
      <td width="200">
	  <dd>
	  	 <input name="customer_name" type="text"  placeholder="Nom Client">						
	  </dd>
      </td>
     
    </tr>

     <tr valign="baseline">
    
 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
		  Adresse:<span class="Style21"></span></div>
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
	  	 <input name="address" type="text"  placeholder="Adresse">						
	   </dd>
      </td>
	  
   
    </tr>
    <tr valign="baseline"> 
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
		  Code postal:<span class="Style21"></span></div>
		  </dd>
	  </div></td> 
	  <td width="200">
	   <dd>
	  	 <input name="postcode" type="text"  placeholder="Code postal">						
	   </dd>
      </td>	
    <td width="30" height="42" align="right" nowrap>
          <div align="center" class="Style22"> 
		  <dd>
	     Localite:
		  </dd>
	  </div></td>
    <td width="400">
	<dd>
	 <input name="town" class="Style22"  type="text"  placeholder="Localite">						
	</dd>
    </td> 
	</tr>
    <tr valign="baseline">
    <td width="30" height="42" align="right" nowrap>
          <div align="center" class="Style22"> 
		  <dd>
	     Pays:
		  </dd>
	  </div></td>
    <td width="400">
	<dd>
	 <input name="country" class="Style22"  type="text"  placeholder="Pays">						
	</dd>
      </td > 
    </tr>

    <tr valign="baseline">
    
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
		  Telephone:<span class="Style21"></span></div>
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
	  	 <input name="phone" type="text"  placeholder="Telephone">						
	   </dd>
      </td>
	  
    <td width="30" height="42" align="right" nowrap>
          <div align="center" class="Style22"> 
		  <dd>
	     Fax:
		  </dd>
	  </div></td>
    <td width="400">
	<dd>
	  	 <input name="fax" class="Style22"  type="text"  placeholder="Fax">						
	</dd>
      </td > 
</tr>
<tr valign="baseline">
    
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
		  Mobile:<span class="Style21"></span></div>
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
	  	 <input name="mobile" type="text"  placeholder="Gsm">						
	   </dd>
      </td>
 </tr> 
 <tr valign="baseline">
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
		  Courriel:<span class="Style21"></span></div>
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
	  	 <input name="email" type="text"  placeholder="Courriel">						
	   </dd>
      </td>
	  
    <td width="30" height="42" align="right" nowrap>
          <div align="center" class="Style22"> 
		  <dd>
	     Site web:
		  </dd>
	  </div></td>
    <td width="400">
	<dd>
	  	 <input name="website" class="Style22"  type="text"  placeholder="Site web">						
	</dd>
      </td > 
</tr>
<tr valign="baseline">
    
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
		  Commentaire:<span class="Style21"></span></div>
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
	  	 <input name="comment" type="textarea"  placeholder="Commentaire">						
	   </dd>
      </td>

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
 <a class="btn" href="customer_list.php?entities_id=$entities_id&companyname=$compnayname">Retour</a>
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

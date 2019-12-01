<?php
// modification : 25/03/2015
// enlever le state (region) et inverser code postal avec ville
  session_start();
  
  $username=$_SESSION['username'] ;
  require 'database.php';

  $customers_id = null;
    if ( !empty($_GET['customers_id'])) {
        $customers_id  = $_REQUEST['customers_id'];
//		echo "1.  id=$id <br>";	
//		$_SESSION["id"]=$id;
    }
	else {	
 //    $id  = $_REQUEST['id'];
       $customers_id=$_SESSION['customers_id'];
//	 	echo " 2.  id=$id <br>";			
    }
    if ( null==$customers_id  ) {
//	    $entities_id=$_SESSION['entities_id'];
//		echo "header    entities_id=$entities_id <br>";
       header("Location: customer_list.php?entities_id=$entities_id");
    }
	if (!empty($_POST)) {
 //    echo "dans POST <br> ";
    	require 'checkFields_cust_upd.php';
        // update data
        if ($valid) {		
//		echo "valid???????????????????? <br>";
        require 'init_fields_upd_cust.php';
        require'maj_fields_upd_valid_cust.php';
} 
} 
else {
 //        echo "Pas dans POST customers_id=$customers_id <br><br>";
        require 'maj_fields_upd_else_post_cust.php';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<title>Modification client</title>
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
                        <h3>Modifier un Client/Site</h3>
                    </div>    

<form class="form-actions" method="post" name="update_customers" action="update_customers.php" method="post" > 

  <table  width="900" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
 
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">
		<dd>
		Nom Site/Client:<span class="Style21"></span></div>
		</dd>
      </div></td>
      <td width="80">
	  <dd>
	  	 <input name="entities_id" type="hidden"  placeholder="entities_id" value="<?php echo $entities_id; ?>">   						
	  	 <input name="customer_name" type="text"  placeholder="Nom Client" value="<?php echo $customer_name; ?>">   						
	  </dd>
      </td>
     	<td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">
	 <dd>
	 Type:<span class="Style21"></span></div>
	 </dd>

		<div align="center"><span class="Style22">
		<dd>
		Choix:<span class="Style21"></span></div>
		</dd>
	</div>
       <td width="80">
        <dd>
	  <input name="customtype_id2" type="text" align="right" readonly="true" value="<?php echo $customtype_name; ?>">    
      </dd>

						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="customtype_id" class="customtype_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_customtype WHERE is_deleted = 0 order by name");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
			            <input name="customtype_id0" type="hidden" value="<?php echo $customtype_id;?>">			
						</dd>						
    </div>
    </td> 
    </tr>

     <tr valign="baseline">
    
 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
		  Adresse:<span class="Style21"></span></div>
		  </dd>
	  </div></td>  
	   <td width="80">
	   <dd>
	  	 <input name="address" type="text"  placeholder="Adresse" value="<?php echo $address; ?>">   
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
	  <td width="80">
	   <dd>
	  	 <input name="postcode" type="text"  placeholder="Code postal" value="<?php echo $data['postcode']; ?>">   					
	   </dd>
      </td>	
    <td width="30" height="42" align="right" nowrap>
          <div align="center" class="Style22"> 
		  <dd>
	     Localite:
		  </dd>
	  </div></td>
    <td width="80">
	<dd>
	 <input name="town" class="Style22"  type="text"  placeholder="Localite" value="<?php echo $data['town']; ?>">   						
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
    <td width="80">
	<dd>
	 <input name="country" class="Style22"  type="text"  placeholder="Pays" value="<?php echo $data['country']; ?>">   						
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
	   <td width="80">
	   <dd>
	  	 <input name="phone" type="text"  placeholder="Telephone" value="<?php echo $data['phone']; ?>">   					
	   </dd>
      </td>
	  
    <td width="30" height="42" align="right" nowrap>
          <div align="center" class="Style22"> 
		  <dd>
	     Fax:
		  </dd>
	  </div></td>
    <td width="80">
	<dd>
	  	 <input name="fax" class="Style22"  type="text"  placeholder="Fax" value="<?php echo $data['fax']; ?>">   						
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
	   <td width="80">
	   <dd>
	  	 <input name="mobile" type="text"  placeholder="Gsm" value="<?php echo $data['mobile']; ?>">   						
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
	   <td width="80">
	   <dd>
	  	 <input name="email" type="text"  placeholder="Courriel"  value="<?php echo $data['email']; ?>">   					
	   </dd>
      </td>
	  
    <td width="30" height="42" align="right" nowrap>
          <div align="center" class="Style22"> 
		  <dd>
	     Site web:
		  </dd>
	  </div></td>
    <td width="80">
	<dd>
	  	 <input name="website" class="Style22"  type="text"  placeholder="Site web" value="<?php echo $data['website']; ?>">   						
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
	   <td width="80">
	   <dd>
	  	 <input name="comment" type="textarea"  placeholder="Commentaire" value="<?php echo $data['comment']; ?>">   					
	   </dd>
      </td>

</tr>
	 <tr valign="baseline"> 
	   <td width="30">
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
    <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Mise a jour" >					  
 <a class="btn" href="customer_list.php?entities_id=<?php echo $entities_id; ?>">Retour</a>
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
<?php
session_start();
    require 'database.php';	
	$username=$_SESSION["username"] ;
   echo "XXXXXXXXX username=$username <br>";	
    $id = null;
	if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
	else {	
 //    $id  = $_REQUEST['id'];
       $id=$_SESSION['id'];
	 	echo " 2.  id=$id <br>";			
    }
    if ( null==$id ) {
	echo "NULL == id<br>";
 //       header("Location: user_all_list.php");
    }
	
	if (!empty($_POST)) {
 //    echo "dans POST <br> ";
    	require 'checkFields_upd_users.php';
        // update data
        if ($valid) {		
//		echo "valid???????????????????? <br>";
        require 'init_fields_upd_users.php';
        require'maj_fields_upd_valid_users.php';
} 
} 
else {
 //        echo "Pas dans POST customers_id=$customers_id <br><br>";
        require 'maj_fields_upd_else_post_users.php';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

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
                        <h3> Modification Utilisateur</h3>
                    </div>    

<form class="form-actions" method="post" name="update_cust_contacts" action="update_cust_contacts.php?id=<?php echo $id?>" method="post" > 

  <table  width="900" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
 
  <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">
		<dd>
		<label class="control-label">Nom Entite/Client : </label>
		</dd>
      </div></td>
	  <td width="300">
      <dd>
	  <label class="checkbox">
	  <input name="companyname" type="text"  readonly="true" placeholder="companyname" value="<?php echo $companyname;?>">
	  </dd>	
      </label>	  
      </div>
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">
		<dd>
		<label class="control-label">Client/Site : </label>
		</dd>
      </div></td>
      <td width="200">
	  <dd>
	  <label class="checkbox">
       <input name="customers_id" type="hidden"  readonly="true" placeholder="customers_id" value="<?php echo $customers_id;?>">		  
       <input name="customer_name" type="text"  readonly="true" placeholder="customer_name" value="<?php echo $customer_name;?>">						
      </label>				
	  </dd>
      </td>
     
    </tr>
 
   <tr valign="baseline">
      <td width="150" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">
		<dd>
		<label class="control-label">Nom Contact Client:</label>

		</dd>
      </div></td>
      <td width="150">
	  <dd>
	  <label class="checkbox">
        <input name="name" type="text"  placeholder="name" value="<?php echo $name;?>">						
      </label>				
	  </dd>
      </td>
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">
		<dd>
		<label class="control-label">Prenom :</label>
		</dd>
      </div></td>
      <td width="200">
	  <dd>
	  <label class="checkbox">
        <input name="firstName" type="text"  placeholder="firstName" value="<?php echo $firstName;?>">						
      </label>				
	  </dd>
      </td>
    </tr>
  <tr valign="baseline">
 <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">
	 <dd>
	 Type:<span class="Style21"></span></div>
	 </dd>
 		<div align="center"><span class="Style22">
	  <dd>
<p> </p>	  
		Choix:<span class="Style21"></span></div>
		</dd>
	</div>
       <td width="80"align="center" >
        <dd> 	
	  <input name="contacttypes_id2" type="text" align="right" readonly="true" value="<?php echo $contactypename; ?>">  
	  <input name="contacttypes_id0" type="hidden" align="right" readonly="true" value="<?php echo $contacttypes_id; ?>"> 	  
      </dd>

						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="contacttypes_id" class="contacttypes_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_contacttypes WHERE is_deleted = 0 order by name");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
			            <input name="contacttypes_id0" type="hidden" value="<?php echo $contacttypes_id;?>">			
						</dd>						
    </div>
    </td> 
    </tr>
     <tr valign="baseline">
    
 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
		<label class="control-label">Adresse:</label>		  
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
	   <label class="checkbox">
	    <input name="address" type="text"  placeholder="address" value="<?php echo $address;?>">	
       </label>			
	   </dd>
      </td>
    </tr>
    <tr valign="baseline"> 
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center"> <span class="Style22">
		  <dd>
	      <label class="control-label">Code postal:</label>			  
		  </dd>
	  </div></td> 
	  <td width="200">
	   <dd>
       <label class="checkbox">
	   <input name="postcode" type="text" placeholder="postcode" value="<?php echo $postcode;?>">
       </label>			
	   </dd>
      </td>	
    <td width="30" height="42" align="right" nowrap>
          <div align="center" class="Style22"> 
		  <dd>
	      <label class="control-label">  Localite:</label>			  
		  </dd>
	  </div></td>
    <td width="400">
	<dd>
    <label class="checkbox">
	<input name="town" type="text" placeholder="town" value="<?php echo $town;?>">	
    </label>					
	</dd>
    </td> 
	</tr>
   
    <tr valign="baseline">
    
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center"> <span class="Style22">
		  <dd>
       <label class="control-label">  Telephone:</label>
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
       <label class="checkbox">
	   <input name="phone" type="text" placeholder="phone" value="<?php echo $phone;?>">									
       </label>			
	   </dd>
      </td>
	  
    <td width="30" height="42" align="right" nowrap>
          <div align="center" class="Style22"> 
		  <dd>
       <label class="control-label">  Fax:</label>
		  </dd>
	  </div></td>
    <td width="400">
	<dd>
    <label class="checkbox">
	<input name="fax" type="text" placeholder="fax" value="<?php echo $fax;?>">																
    </label>			
	</dd>
    </td > 
</tr>
<tr valign="baseline">
    
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
       <label class="control-label">  Mobile:</label>		  
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
       <label class="checkbox">
	   <input name="mobile" type="text" placeholder="mobile" value="<?php echo $mobile;?>">																
       </label>					
	   </dd>
      </td>
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center"> <span class="Style22">
		  <dd>
       <label class="control-label"> Courriel:</label>	
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
      <label class="checkbox">
	  <input name="email" type="text" placeholder="Courriel" value="<?php echo $email;?>">																
      </label>				
	   </dd>
      </td>	
 </tr> 

<tr valign="baseline">
    
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center"> <span class="Style22">
		  <dd>
		 <label class="control-label"> Commentaire:</label>		  
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
    <label class="checkbox">
	<input name="comment" type="textarea" placeholder="Commentaire" value="<?php echo $comment;?>">										
    </label>		   				
    </dd>
    </td>

</tr>
	 <tr valign="baseline"> 
	   <td width="200">

	  	 <input name="author" type="hidden"  placeholder="Auteur" value="<?php echo  $author ;?>">
		 <input name="date_mod" type="hidden"  placeholder="Date modification" value='<?php echo  $date_mod;?>'>
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
	<a class="btn" href="contact_all_list.php">Retour</a>  
 
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
<?php
    require 'database.php';
    $contacts_id = null;
    if ( !empty($_GET['contacts_id'])) {
        $contacts_id = $_REQUEST['contacts_id'];
    }
    if ( null==$contacts_id ) {
        header("Location: contact_all_list.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM vtictan_customers_contacts where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($contacts_id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
	    Database::disconnect();
    }
?>
 
 <title>Detail Client</title>
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
                        <h3>Detail Contact/Client</h3>
                    </div>    

<form class="form-actions" method="post" name="read_cust_contacts" action="read_cust_contacts.php" method="post" > 

  <table  width="900" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
 
  <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">
		<dd>
		<label class="control-label">Nom Entite/Client : </label>
		</dd>
      </div></td>
	  <td width="80">
      <dd>
	  <label class="checkbox">
	  <input name="companyname" type="text"  readonly="true" placeholder="companyname" value="<?php echo $data['companyname'];?>">
	  </dd>	
      </label>	  
      </div>
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">
		<dd>
		<label class="control-label">Nom Client/Site : </label>
		</dd>
      </div></td>
      <td width="200">
	  <dd>
	  <label class="checkbox">
       <input name="customers_id" type="hidden"  readonly="true" placeholder="customers_id" value="<?php echo $data['customers_id'];?>">		  
       <input name="customer_name" type="text"  readonly="true" placeholder="customer_name" 
		value="<?php echo $data['customer_name'];?>">						
      </label>				
	  </dd>
      </td>
     
    </tr>
 
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">
		<dd>
		<label class="control-label">Nom Contact/Client:</label>

		</dd>
      </div></td>
      <td width="200">
	  <dd>
	  <label class="checkbox">
        <input name="name" type="text"  placeholder="name" value="<?php echo $data['name'];?>">						
      </label>				
	  </dd>
      </td>
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">
		<dd>
		<label class="control-label">Prenom Contact/Client:</label>
		</dd>
      </div></td>
      <td width="200">
	  <dd>
	  <label class="checkbox">
        <input name="firstName" type="text"  placeholder="firstName" value="<?php echo $data['firstName'];?>">						
      </label>				
	  </dd>
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
	    <input name="address" type="text"  readonly="true" placeholder="address" value="<?php echo $data['address'];?>">	
       </label>			
	   </dd>
      </td>
    </tr>
    <tr valign="baseline"> 
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
	      <label class="control-label">Code postal:</label>			  
		  </dd>
	  </div></td> 
	  <td width="200">
	   <dd>
       <label class="checkbox">
	   <input name="postcode" type="text"  readonly="true" placeholder="postcode" value="<?php echo $data['postcode'];?>">
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
	<input name="town" type="text"  readonly="true" placeholder="town" value="<?php echo $data['town'];?>">	
    </label>					
	</dd>
    </td> 
	</tr>
   
    <tr valign="baseline">
    
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
       <label class="control-label">  Telephone:</label>
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
       <label class="checkbox">
	   <input name="phone" type="text"  readonly="true" placeholder="phone" value="<?php echo $data['phone'];?>">									
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
	<input name="fax" type="text"  readonly="true" placeholder="fax" value="<?php echo $data['fax'];?>">																
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
	   <input name="mobile" type="text"  readonly="true" placeholder="mobile" value="<?php echo $data['mobile'];?>">																
       </label>					
	   </dd>
      </td>
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
       <label class="control-label"> Courriel:</label>	
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
      <label class="checkbox">
	  <input name="email" type="text"  readonly="true" placeholder="Courriel" value="<?php echo $data['email'];?>">																
      </label>				
	   </dd>
      </td>	
 </tr> 

<tr valign="baseline">
    
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
		 <label class="control-label"> Commentaire:</label>		  
		  Commentaire:<span class="Style21"></span></div>
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
    <label class="checkbox">
	<input name="website" type="textarea"  readonly="true" placeholder="Commentaire" value="<?php echo $data['comment'];?>">										
    </label>		   				
    </dd>
    </td>

</tr>
	 <tr valign="baseline"> 
	   <td width="200">

	  	 <input name="author" type="hidden"  placeholder="Auteur" value="<?php echo  $data['author'] ;?>">
		 <input name="date_mod" type="hidden"  placeholder="Date modification" value='<?php echo  $data['date_mod'];?>'>
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


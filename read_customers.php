<?php
// modification 25/03/2015
// enlever state 

   require 'database.php';	
   $customers_id = null;
    if ( !empty($_GET['customers_id'])) {
        $customers_id = $_REQUEST['customers_id'];
    }
     
    if ( null==$customers_id) {
 //       header("Location: index_cust.php");
        header("Location: customer_list.php?entities_id=$entities_id&companyname=$companyname");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tictan_customers where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($customers_id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$id_entities = $data['entities_id'];
		$sql_view = "SELECT * FROM vtictan_customers where customers_id =".$customers_id;
//		echo "read_customers.php sql_view=$sql_view <br>";
		$qview = $pdo->prepare($sql_view);
		$qview->execute(array($customers_id));
        $dataview = $qview->fetch(PDO::FETCH_ASSOC);
		$companyname = $dataview['companyname'];	
    }
?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

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
                        <h3>Detail Client/Site</h3>
                    </div>    

<form class="form-actions" method="post" name="read_customers" action="read_customers.php" method="post" > 

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
	  <input name="companyname" type="text"  readonly="true" placeholder="companyname" value="<?php echo $companyname;?>">
	  </dd>						
      </div>
    </td>	
	<td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">
		<dd>
		Type Client:<span class="Style21"></span></div>
		</dd>
       </div></td>
	   <td width="80">
       <dd>
		<label class="checkbox">		
		 <input name="customtype_id" type="text"  readonly="true" placeholder="Type client" value="<?php echo $dataview['customtype_name'];?>">
        </label>
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
	  <label class="checkbox">
       <input name="customers_id" type="hidden"  readonly="true" placeholder="customers_id" value="<?php echo $dataview['customers_id'];?>">		  
       <input name="customer_name" type="text"  readonly="true" placeholder="customer_name" 
		value="<?php echo $data['customer_name'];?>">						
      </label>				
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
		  Code postal:<span class="Style21"></span></div>
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
	     Localite:
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
    <td width="30" height="42" align="right" nowrap>
          <div align="center" class="Style22"> 
		  <dd>
	     Pays:
		  </dd>
	  </div></td>
    <td width="400">
	<dd>
    <label class="checkbox">
	<input name="country" type="text"  readonly="true" placeholder="country" value="<?php echo $data['country'];?>">							
    </label>				
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
       <label class="checkbox">
	   <input name="phone" type="text"  readonly="true" placeholder="phone" value="<?php echo $data['phone'];?>">									
       </label>			
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
		  Mobile:<span class="Style21"></span></div>
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
       <label class="checkbox">
	   <input name="mobile" type="text"  readonly="true" placeholder="mobile" value="<?php echo $data['mobile'];?>">																
       </label>					
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
      <label class="checkbox">
	  <input name="email" type="text"  readonly="true" placeholder="Courriel" value="<?php echo $data['email'];?>">																
      </label>				
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
    <label class="checkbox">
	<input name="website" type="text"  readonly="true" placeholder="website" value="<?php echo $data['website'];?>">										
    </label>	
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
 <a class="btn" href="customer_list.php?entities_id=<?php echo $dataview['entities_id']; ?>&companyname=<?php echo $dataview['companyname'];?>">Retour</a>
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

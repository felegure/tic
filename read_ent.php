<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index_ent.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tictan_entities where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<title>Detail Entite</title>
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
                        <h3>Detail Entite/Client</h3>
                    </div>    

<form class="form-actions" method="post" name="read_entities" action="read_entities.php" method="post" > 

  <table  width="1300" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
 
   <tr valign="baseline">
      <td width="200" height="32" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Raison sociale:<span class="Style21"></span></div>
		</dd>
      </div></td>	
      <td width="250">
	  <dd>
       <input name="companyname" type="text" readonly="true"  placeholder="companyname" value="<?php echo !empty($companyname)?$companyname:'';?>">	
	  </dd>
      </td>
      <td width="200" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
		  Code tva:<span class="Style21"></span></div>
		  </dd>
	  </div></td>
      <td width="200">
	  <dd>
	  	<input name="vatcode" type="text"  readonly="true" placeholder="vatcode" value="<?php echo !empty($vatcode)?$vatcode:'';?>">					
      </dd>
	  </td> 
    </tr>

     <tr valign="baseline">
    
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
		  Numero de compte (1):<span class="Style21"></span></div>
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
	  	<input name="account1" type="text" readonly="true" placeholder="Numero de compte (1)" value="<?php echo !empty($account1)?$account1:'';?>">		
	   </dd>
      </td>
	  
    <td width="30" height="42" align="right" nowrap>
          <div align="center" class="Style22"> 
		  <dd>
	     Numero de compte (2):
		  </dd>
	  </div></td>
    <td width="400">
	<dd>
		<input name="account2" type="text" readonly="true" placeholder="Numero de compte (2)" value="<?php echo !empty($account2)?$account2:'';?>">								
	</dd>
      </td > 
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
	  	 <input name="address" type="text" readonly="true" placeholder="Adresse" size="40" value="<?php echo !empty($address)?$address:'';?>">
				
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
 <input name="town" type="text"readonly="true"  placeholder="Localite" size="30" value="<?php echo !empty($town)?$town:'';?>">			
	</dd>
      </td > 
</tr>
<tr valign="baseline">
    
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center"  class="Style22">
		  <dd>
		  Code postal:<span class="Style21"></span></div>
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
    <input name="postcode" type="text"readonly="true"  placeholder="Code postal" value="<?php echo !empty($postcode)?$postcode:'';?>">			
	   </dd>
      </td>
	  
    <td width="30" height="42" align="right" nowrap>
          <div align="center" class="Style22"> 
		  <dd>
	     Pays:
		  </dd>
	  </div></td>
    <td width="400">
	<dd>
        <input name="country" type="text" readonly="true" placeholder="Pays" value="<?php echo !empty($country)?$country:'';?>">
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
 <input name="phone" type="text" readonly="true" placeholder="Telephone" value="<?php echo !empty($phone)?$phone:'';?>">				
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
     <input name="fax" type="text" readonly="true" placeholder="Fax" value="<?php echo !empty($fax)?$fax:'';?>">					
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
   <input name="mobile" type="text" readonly="true" placeholder="Gsm" value="<?php echo !empty($mobile)?$mobile:'';?>">					
	   </dd>
      </td>
 </tr> 
 <tr valign="baseline">
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center"  class="Style22">
		  <dd>
		  Courriel:<span class="Style21"></span></div>
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
        <input name="email" type="text" readonly="true" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">					
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
   <input name="website" type="text" readonly="true" placeholder="Site web" value="<?php echo !empty($website)?$website:'';?>">					
	</dd>
      </td > 
</tr>
<tr valign="baseline">
    
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center"  class="Style22">
		  <dd>
		  Commentaire:<span class="Style21"></span></div>
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
	  	 <input name="comment" type="textarea" readonly="true" placeholder="Commentaire" value="<?php echo !empty($comment)?$comment:'';?>">					
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
				  
      <a class="btn" href="index_ent.php">Retour</a>
	  </td>  
 </tr> 
  </table>
 </form>
 
<p>&nbsp;</p> 
    </div> <!-- /container -->  

  </body>
</html>

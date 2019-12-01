<?php
    session_start();
	require 'database.php';
	$username=$_SESSION["username"] ;
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
 //     header("Location: index_ent.php");
// echo "id est null = $id <br>";
    }


	    if ( !empty($_POST)) {
	echo "dans le NOT empty de post <br>";
	//	require 'checkFields.php';
        $companynameError = null;
        $vatcodeError = null;
		$account1Error = null;
		$account2Error = null;
 //       $customtypeError = null;
        $phoneError = null;
        $phone2Error = null;
        $mobileError = null;
        $faxError = null;
        $emailError = null;
        $websiteError = null;
        $addressError = null;
        $postcodeError = null;
        $townError = null;
//        $stateError = null;
        $countryError = null;
        $commentError = null;
        $authorError = null;
        $date_modError = null;
        $is_deletedError	 = null;
		
		$companyname = $_POST['companyname'];
        $vatcode = $_POST['vatcode'];
        $account1 = $_POST['account1'];
        $account2 = $_POST['account2'];		
//        $customtype = $_POST['customtype'];
        $phone = $_POST['phone'];
        $mobile = $_POST['mobile'];
        $fax = $_POST['fax'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $address = $_POST['address'];
        $postcode = $_POST['postcode'];
        $town = $_POST['town'];
//        $state = $_POST['state'];
        $country = $_POST['country'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
        $date_mod = $_POST['date_mod'];
//		$is_deleted = $_POST['is_deleted'];	
	   $valid = true;
	
        if (empty($companyname)) {
            $companynameError = 'Entrez le nom/raison sociale';
            $valid = false;
        }

        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE tictan_entities set companyname = ?, vatcode = ?,account1 = ?, account2 = ?, 
			phone = ?, mobile =? ,fax = ?,email = ?, website = ?,address = ? ,postcode = ? ,town = ?, country = ?,comment = ?,
			author = ?, date_mod = ? WHERE id =".$id;
//          echo "sql=$sql <br>";

/*
          echo "1.$companyname 2.$vatcode, 3.$account1, 4.$account2, 5.$phone, 6.$mobile, 7.$fax, 8.$email, 9.$website,
          10.$address, 11.$postcode, 12.$town, 13.$country, 14.$comment, 15.$author, 16.$date_mod <br>";
*/
            $q = $pdo->prepare($sql);
            $q->execute(array($companyname,$vatcode, $account1, $account2, $phone,$mobile, $fax, $email, $website,
			$address, $postcode, $town,  $country, $comment, $author, $date_mod));
            Database::disconnect();
            header("Location: index_ent.php");
        }
//		else 
//		echo "NOT valid <br>";
       
        } 
		else {
//		echo "EMPTY POST <br>";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tictan_entities where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		
		$companyname = $data['companyname'];
		$vatcode = $data['vatcode'];
		$account1 = $data['account1'];
		$account2 = $data['account2'];
		$customtype =  $data['customtype'];
		$phone = $data['phone'];
		$phone2 = $data['phone2'];
		$mobile = $data['mobile'];
		$fax = $data['fax'];
		$email = $data['email'];
		$town = $data['town'];
		$website = $data['website'];
		$comment = $data['comment'];
		$address =  $data['address'];
		$postcode = $data['postcode'];
		$town = $data['town'];
		$country = $data['country'];
		$author = $data['author'];
		$date_mod = $data['date_mod'];
		$is_deleted = $data['is_deleted'];
        Database::disconnect();
    }
   
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<title>Modification Entite</title>
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
                        <h3>Modifier une Entite/Client</h3>
                    </div>    

<form class="form-actions" method="post" name="update_entities" action="update_entities.php?id=<?php echo $id; ?>" method="post" > 

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
	   <input name="id" type="hidden"  placeholder="entities_id" value="<?php echo !empty($id)?$id:'';?>">	
       <input name="companyname" type="text"  placeholder="companyname" value="<?php echo !empty($companyname)?$companyname:'';?>">	
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
	  	<input name="vatcode" type="text"  placeholder="vatcode" value="<?php echo !empty($vatcode)?$vatcode:'';?>">					
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
	  	<input name="account1" type="text"  placeholder="Numero de compte (1)" value="<?php echo !empty($account1)?$account1:'';?>">		
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
		<input name="account2" type="text"  placeholder="Numero de compte (2)" value="<?php echo !empty($account2)?$account2:'';?>">								
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
	  	 <input name="address" type="text"  placeholder="Adresse" size="40" value="<?php echo !empty($address)?$address:'';?>">
				
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
 <input name="town" type="text" placeholder="Localite" size="30" value="<?php echo !empty($town)?$town:'';?>">			
	</dd>
      </td > 
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
    <input name="postcode" type="text" placeholder="Code postal" value="<?php echo !empty($postcode)?$postcode:'';?>">			
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
        <input name="country" type="text" placeholder="Pays" value="<?php echo !empty($country)?$country:'';?>">
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
 <input name="phone" type="text"  placeholder="Telephone" value="<?php echo !empty($phone)?$phone:'';?>">				
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
     <input name="fax" type="text"  placeholder="Fax" value="<?php echo !empty($fax)?$fax:'';?>">					
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
   <input name="mobile" type="text"  placeholder="Gsm" value="<?php echo !empty($mobile)?$mobile:'';?>">					
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
        <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">					
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
   <input name="website" type="text"  placeholder="Site web" value="<?php echo !empty($website)?$website:'';?>">					
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
	  	 <input name="comment" type="textarea"  placeholder="Commentaire" value="<?php echo !empty($comment)?$comment:'';?>">					
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
    <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Mise a jour" >					  
 <a class="btn" href="index_ent.php">Retour</a>
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
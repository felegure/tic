<?php

    session_start(); 
// recuperation des variables de select session pour le passage de parametres d'une forme a une autre
	$customers_id = $_SESSION["customer_id"];
	$entities_id = $_SESSION["entities_id"];

	$companynament = $_SESSION["companynament"];
	$customers_id = $_SESSION["customer_id"];												
	$customer_name = $_SESSION["customer_name"] ;
//	echo "create_cust_computers , entities_id = $entities_id , companynament = $companynament <br>";
//	echo "create_cust_computers.php customers_id = $customers_id , customer_name = $customer_name <br>";

    require 'database.php';
    $pdo = Database::connect();
	$profil = $_SESSION['profilAccess'];
    if ($profil != 'A' && $profil != 'S') 
	  header("Location: index_cust_networks.php");
    if ( !empty($_POST)) {
        // keep track validation errors
			require_once ('checkFields_cust_network.php');	
			echo "!empty <br>";
	
    if ($valid) {
	
	 $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tictan_customer_network(customers_id, entities_id, serial, name, networkmodels_id, networktypes_id,  
			adresseip, mask, bridge,adressrange,typeadressage, connexionvia, fax, login, password,location, comment,author, date_mod, is_deleted ) 
			values( ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,)";
			
		$serial = $_POST['serial'];
        $name = $_POST['name'];
		$adresseip = $_POST['adresseip'];
        $typeadressage = $_POST['typeadressage'];
        $connexionvia = $_POST['connexionvia'];
        $fax = $_POST['fax'];
		$login = $_POST['login'];
        $password = $_POST['password'];
		$location = $_POST['location'];
        $comment = $_POST['comment'];

		$q = $pdo->prepare($sql);
        $q->execute(array($customer_id, $entities_id, $serial, $name, $networkmodels_id, $networktypes_id,
		$adresseip, $mask, $bridge, $adressrangenge, $typeadressage, $connexionvia, $fax, $login, $password,
		$location, $comment, $author, $date_mod,$is_deleted ));
		
        Database::disconnect();
			
        header("Location: index_cust_computers.php");
        }

  }
  else 	echo "Eempty <br>";
?>

?>

<!DOCTYPE html public "-//w3c//dtd html 4.01 Transitional//en" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<title>Ajout equipement reseau</title>
<style type="text/css">
<!--
.Style25 {
	font-size: 16px;
	color: #000099;
	font-weight: bold;
}
.Style31 {color: #000000}
-->
</style>
</head>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
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
<script language="JavaScript" type="text/JavaScript" >
<!--

function Controle()
{
// alert(' COntrole debut XXXXXXXXXXXXXXXXXXXXXX');

if(document.aic_form_input.tbuying_ppu.value=='') // 1
{
alert('Unit Price is a Mandatory field !');
document.aic_form_input.tbuying_ppu.focus();

}
else if(isNaN(document.aic_form_input.tbuying_ppu.value)) // 2
{
alert('Unit price is a Numeric field !');
document.aic_form_input.tbuying_ppu.focus();
}
else if(document.aic_form_input.tbuying_qu.value=='') // 1
{
alert('Quantity is a Mandatory field !');
document.aic_form_input.tbuying_qu.focus();

}
else if(isNaN(document.aic_form_input.tbuying_qu.value)) // 2
{
alert('Quantity is a Numeric value !');
document.aic_form_input.tbuying_qu.focus();
}
else if(document.aic_form_input.tbuying_pack_size.value!='') // 1
{
	if(isNaN(document.aic_form_input.tbuying_pack_size.value))
	{
	
		alert('Pack size is a Numeric field !');
		document.aic_form_input.tbuying_pack_size.focus();
		return false;
    }
	else 
	{
	    if(document.aic_form_input.tbuying_price_per_pack=='')
		{
			alert('Price per pack is Mandatory !');
			document.aic_form_input.tbuying_price_per_pack.focus();
			return false;
		}
		else
		{
			if(isNaN(document.aic_form_input.tbuying_price_per_pack.value))
			{
				alert('Price per pack is a Numeric field !');
				document.aic_form_input.tbuying_price_per_pack.focus();
				return false;
			}
			
			
		} // ferme la boucle price_per_pack 
}  // pack_size est un champ vide
	

else if(document.aic_form_input.tbuying_lead_time!='') // 2   if(document.aic_form_input.tbuying_price_per_pack=='')
{
	if(isNaN(document.aic_form_input.tbuying_pack_size.value))
	{
	
		alert('Lead Time is a Numeric field !');
		document.aic_form_input.tbuying_lead_time.focus();
		return false;
    }
 }

//else


// }
}
//-->
</script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<body> 
<SCRIPT language="javascript">

function ChoosePrice(radio) {
	
	document.aic_form_input.tbuying_ok.value=0;
    
	  for (var i=0; i<radio.length;i++) {
	
         if (radio[i].checked) 
          {  
		
			if ( i == 0) 
				{
					document.aic_form_input.tbuying_price_per_pack.disabled=true;
		  			document.aic_form_input.tbuying_qty_pack.disabled=true;
					document.aic_form_input.tbuying_ppu.disabled=false;
		  			document.aic_form_input.tbuying_qu.disabled=false;
				}
				else {
			
					document.aic_form_input.tbuying_ppu.disabled=true;
		  			document.aic_form_input.tbuying_qu.disabled=true;
					document.aic_form_input.tbuying_price_per_pack.disabled=false;
					document.aic_form_input.tbuying_qty_pack.disabled=false;
			    }
         }
       }
   }

  function CalculateTotalPrice(radio) {
	  for (var i=0; i<radio.length;i++) {
	      if (radio[i].checked) 
          {  
		  document.aic_form_input.tbuying_ok.value=1;
	//	 virgule(document.aic_form_input.tbuying_qty_pack.value);
		 // virgule(document.aic_form_input.tbuying_price_per_pack.value);
		 // virgule(document.aic_form_input.tbuying_qu.value);
		 // virgule(document.aic_form_input.tbuying_pack_size.value); 
		 // virgule(document.aic_form_input.tbuying_price_per_pack.value);
		  //virgule(document.aic_form_input.tbuying_ppu.value); 
		   if ( i == 0) {
					
			document.aic_form_input.tbuying_tcost.value=document.aic_form_input.tbuying_qty_pack.value * document.aic_form_input.tbuying_price_per_pack.value;
			document.aic_form_input.tbuying_qty_pack.value=document.aic_form_input.tbuying_qu.value / document.aic_form_input.tbuying_pack_size.value; 
			document.aic_form_input.tbuying_price_per_pack.value=document.aic_form_input.tbuying_ppu.value * document.aic_form_input.tbuying_pack_size.value;
			document.aic_form_input.tbuying_ppu2.value=document.aic_form_input.tbuying_ppu.value;
			document.aic_form_input.tbuying_qu2.value=document.aic_form_input.tbuying_qu.value;
		    document.aic_form_input.tbuying_tcost2.value=document.aic_form_input.tbuying_tcost.value;
			document.aic_form_input.tbuying_qty_pack2.value=document.aic_form_input.tbuying_qty_pack.value; 
			document.aic_form_input.tbuying_ppu2.value=document.aic_form_input.tbuying_ppu.value;
			document.aic_form_input.tbuying_tcost2.value=document.aic_form_input.tbuying_qty_pack2.value * document.aic_form_input.tbuying_price_per_pack.value;
			document.aic_form_input.tbuying_tcost.value=document.aic_form_input.tbuying_qty_pack2.value * document.aic_form_input.tbuying_price_per_pack.value;
			document.aic_form_input.tbuying_ppp2.value=document.aic_form_input.tbuying_price_per_pack.value;
					
			}
			else {
			
			document.aic_form_input.tbuying_tcost.value=document.aic_form_input.tbuying_price_per_pack.value * document.aic_form_input.tbuying_qty_pack.value;
		    document.aic_form_input.tbuying_ppu.value=document.aic_form_input.tbuying_price_per_pack.value/document.aic_form_input.tbuying_pack_size.value;
			document.aic_form_input.tbuying_qu.value=document.aic_form_input.tbuying_pack_size.value*document.aic_form_input.tbuying_qty_pack.value;
			document.aic_form_input.tbuying_ppu2.value=document.aic_form_input.tbuying_ppu.value;
			document.aic_form_input.tbuying_qu2.value=document.aic_form_input.tbuying_qu.value;
			document.aic_form_input.tbuying_tcost2.value=document.aic_form_input.tbuying_ppu2.value * document.aic_form_input.tbuying_qty_pack2.value;
		    }
         }
   
	  }
   }
   
function ControlFields(champ,nomchamp,ordre)
{

retour=parseInt(champ);
//alert ('retour'+retour);
// parseInt(string, radix
//alert ('champ'+champ);

	if (isNaN(retour)) 
	{
	 if (nomchamp=='Date') alert
	alert(nomchamp+' est un champ Obligatoire et Numérique !');
	document.aic_form_input.champ.focus();
	}
	// alert ('isNaN'+retour);
	else ('else isNaN'+retour);
   
}
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

 <div class="container">
     
                <div class="span10 offset1">
                    <div class="row" align="center">
                        <h3>Ajouter un Equipement reseau/Site</h3>
                    </div>   
<form class="form-actions" method="post" name="create_cust_n" action="creat_n.php" method="post" > 

  <table  width="1200" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
    <tr valign="baseline">
      <td width="100" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Nom entit&eacute;:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="entities_id" type="hidden"  placeholder="entities_id" readonly="true" value="<?php echo !empty($entities_id)?$entities_id:'';?>">
         <input name="entities_name" type="text"  placeholder="entities_name" readonly="true" value="<?php echo !empty($companynament)?$companynament:'';?>">
		 <?php if (!empty($entities_idError)): ?>
         <span class="help-inline"><?php echo $entities_idError;?></span>
        <?php endif; ?> 							
      </td>
      <td width="100" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Client/Site:<span class="Style21"></span></div>
	  </div></td>
      <td width="400">	  
		  <input name="customer_id" type="hidden"  placeholder="customer_id" readonly="true" value="<?php echo !empty($customer_id)?$customer_id:'';?>">
         <input name="customer_name" type="text"  placeholder="customer_name" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
		 <?php if (!empty($customer_idError)): ?>
         <span class="help-inline"><?php echo $customer_idError;?></span>
        <?php endif; ?> 
      </td>    
    </tr>
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Num&eacute;ro de s&eacute;rie:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="serial" type="text"  placeholder="num&eacute;ro de s&eacute;rie">						
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Lieu:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="localisation" type="text"  placeholder="localisation">						
      </td> 
    </tr>
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Plage Adresse ip:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="addresrange" type="text"  placeholder="Plage adresse ip">						
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22"><span class="Style21"></span></div>
	  </div></td>
     
    </tr>
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Adresse ip:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="addresseip" type="text"  placeholder="Adresse ip">						
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Serveur smtp:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="smtpserver" type="text"  placeholder="Serveur smtp">						
      </td>  
    </tr>	 
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Masque:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="mask" type="text"  placeholder="Masque">						
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Passerelle:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="bridge" type="text"  placeholder="Passerelle">						
      </td>  
    </tr>	
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Login:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="login" type="text"  placeholder="Login">						
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Mot de passe:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="password" type="text"  placeholder="Mot de passe" <span class="Style22"></span>						
      </td>  
    </tr>		
    <tr valign="baseline">
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" class="Style22"> Fax:</div>
	  </div></td>
    <td width="200">
	  	 <input name="fax" class="Style22"  type="text"  placeholder="Fax">						
      </td > 
    </tr>	
   
  </table>
</form> 
 <div class="form-actions">
     <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Ajout" >					  
     <a class="btn" href="index_cust_choose.php?entities_id=<?php echo $entities_id; ?> &type=networks ">Retour</a>
 </form>	
<p>&nbsp;</p> 

</body>
</html>

<?php
function ControleInsert ($buying)
{

$message = "";
$message1="Obligatoire !";
$message2="est Numérique !";
$message20="Valeur Numérique ! ";
$message3="Mauvais format de date";
$message4="Valeur manquante !";

if ($buying['tbuying_dbid'] =="")
$message .="Date d'ouverture des plis ".$message1." <BR>";
else
{
// Verifier ta date aussi
  $vardbid = GetSQLValueString($buying['tbuying_dbid'] ,"date");
 //  echo "XXXXXXXXXXXXXXvardbid=$vardbid <BR>";
 //  $vardbid2 = GetSQLValueString($dbid ,"date");
 //  echo " vardbid=$vardbid<BR>";
   $LaDate= explode("-", $vardbid);
  $annee = substr($vardbid,7,4);
  $mois = substr($vardbid,4,2);
  $jour = substr($vardbid,1,2);
  $ok=0;
  $longueur=strlen($vardbid) ;

  if (strlen($vardbid) == 12 ) {
     if (checkdate($mois,$jour,$annee))
     {
       $LaDate=formater($buying['tbuying_dbid'], true);
     }
     else $message .="Date ouverture des plis ".$message3." <BR>";
   }
   else  $message .="  Date ouverture des plis ".$message3." <BR>";
 } 

if ($buying['tbuying_cur_id'] =="")
$message .="Currency_id ".$message1." <BR>" ; 

if (!is_numeric($buying['tbuying_exr']))
$message .="Taux d'échange Obligatoire et Numérique ! <BR>";

if ($buying['tbuying_srcfund_id'] =="")
$message .="Source de financement ".$message1." <BR>";  
if ($buying['tbuying_prov_id'] =="")
$message .="Provider_id ".$message1." <BR>";  
if ($buying['tbuying_type_prov_id'] =="")
$message .="Provider Type_id ".$message1." <BR>";                    
if ($buying['tbuying_manu_id'] =="")
$message .="Manufacturer_id ".$message1." <BR>";  

if ($buying['tbuying_transport_id'] =="")
$message .="Transport_id ".$message1." <BR>" ;

if ($buying['tbuying_lead_time'] !="")
{
	if (!is_numeric($buying['tbuying_lead_time']))
         $message .= "Date de livraison ".$message2." <BR>";
}

if ($message) {
 
echo "<b> Liste des erreurs rencontrées :</b><BR>$message";
echo "<b> Prière de Verifier les champs ci-dessus </b> <BR>";
// redisplay the insert form function
return false;
}

return true;
}

function ControleDate ($date, $vers_mysql)
{
// JJ/MM/AAAA => AAAA-MM-JJ
if($vers_mysql)
{

$pattern = "([0-9]{2})/([0-9]{2})/([0-9]{4})";
$replacement = "$3-$2-$1";
}
else
{
$pattern = "([0-9]{4})-([0-9]{2})-([0-9]{2})";
$replacement = "$3/$2/$1";
}

return $replacement;
} 
 function formater($date,$vers_mysql)
{
// JJ/MM/AAAA => AAAA-MM-JJ
if($vers_mysql)
{

// echo " FFFFFFFFFFFFF formater date fonction";
$pattern = "`([0-9]{2})/([0-9]{2})/([0-9]{4})`";
$replacement = "$3-$2-$1";
 // echo " THEN XXXXXXXXX";
}

// AAAA-MM-JJ => JJ/MM/AAAA
else
{
$pattern = "`([0-9]{4})-([0-9]{2})-([0-9]{2})`";
$replacement = "$3/$2/$1";
// echo "ELSE YYYYYYYYYYYY";
}

return preg_replace($pattern, $replacement, $date);
}
function execute_query($query){
//echo "XXXXXXXXXXXXXXXXXX execute_query<BR>";
if(!$return = mysql_query($query))
{
     // Création d'une exception
     // afin de pouvoir récuper la trace
     // et remonter a la source de l'appel de la fonction
    	 $return = new Exception("Erreur SQL");
     	$tbl = $return->getTrace();
     	echo'<table class="mysql_error"><tr><td><b>erreur dans la base de donnée. Faites en part à l\'administrateur</b></td></tr><tr><td><b>'.mysql_errno().' :</b> '.mysql_error().'</td></tr><tr><td colspan="2">Dans '.$tbl[1]['file'].' ligne '.$tbl[1]['line'].'</table>';
     	mysql_close();
     	exit;
}
return $return;
}

?>

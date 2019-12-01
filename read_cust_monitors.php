
<?php
    session_start();
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }


 if ( null==$id ) {
        header("Location: index_cust_choose.php?type=monitors");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM vtictan_customers_monitors where id_monitor = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$_SESSION["companynament"] = $data['companynament'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$_SESSION["customers_id"] = $data['customers_id'];	
		$entities_id = $data['entities_id'];
	    Database::disconnect();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<title> Consultation des moniteurs</title>
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
                        <h3>D&eacute;tails du Moniteur/Site</h3>
                    </div>   
<form class="form-actions" method="post" name="read_cust_networks" > 
  <table  width="1200" height="300" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
    <tr valign="baseline">
      <td width="100" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Nom entit&eacute;:<span class="Style21"></span></div>
		</dd>
      </div></td>
      <td width="400">
	     <dd>
	  	 <input name="entities_id" type="hidden"  placeholder="entities_id" readonly="true" value="<?php echo !empty($entities_id)?$entities_id:'';?>">
         <input name="entities_name" type="text"  placeholder="entities_name" readonly="true" value="<?php echo !empty($data['companynament'])?$data['companynament']:'';?>">
         </dd>
		 							
      </td>
      <td width="100" height="42" align="right" nowrap>
          <div align="center"> <span class="Style22">
		  <dd>
		  Client/Site:<span class="Style21"></span></div>
		  </dd>
	  </div></td>
      <td width="400">	
       <dd>	  
		 <input name="customers_id" type="hidden"  placeholder="customers_id" readonly="true" value="<?php echo !empty($customers_id)?$customers_id:'';?>">
         <input name="customer_name" type="text"  placeholder="customer_name" readonly="true" value="<?php echo !empty($data['customer_name'])?$data['customer_name']:'';?>">
		</dd>
      </td>    
    </tr>
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">
		<dd>
		Num&eacute;ro de s&eacute;rie:<span class="Style21"></span></div>
		</dd>
      </div></td>
      <td width="400">
	  <dd>
	  	 <input name="serial" type="text"  readonly="true"  placeholder="num&eacute;ro de s&eacute;rie" value="<?php echo !empty($data['serial'])?$data['serial']:'';?>">  
	  </dd>
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd> 
		  Nom du moniteur:<span class="Style21"></span></div>
		 </dd>
	  </div></td>
      <td width="200">
	  <dd>
	  	 <input name="namemonitor"	 type="text"  placeholder="Nom equipement" readonly="true" value="<?php echo !empty($data['namemonitor'])?$data['namemonitor']:'';?>">  					
	  </dd>
      </td> 
    </tr>
	<tr valign="baseline">
	<td width="80" height="42" align="right" nowrap >
	 <div align="center"><span class="Style22">
	 <dd>
	 Modele:<span class="Style21"></span></div>
	 </dd>
	</div>
	</td>
	<td>
	<dd>
      <input name="namemodel" type="text" readonly="true" value="<?php echo !empty($data['namemodel'])?$data['namemodel']:'';?>"> 							
    </dd>
    </td>
	</div>
     <td width="80" height="10" align="right" nowrap >
	 <div align="center"><span class="Style22">
	 <dd>
	 Type:<span class="Style21"></span></div>
	 </dd>
	</div>
	 <td width="80">
	 <dd>
	 <input name="nametype" type="text" readonly="true" value="<?php echo !empty($data['nametype'])?$data['nametype']:'';?>"> 											
	 </dd> 
    </div>
    </td>
   </tr>

    <tr valign="baseline">
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">
		  <dd>
		  Lieu:<span class="Style21"></span></div>
		  </dd>
	  </div></td>  
	   <td width="200">
	   <dd>
	  	 <input name="location" type="text"  placeholder="localisation" readonly="true" value="<?php echo !empty($data['location'])?$data['location']:'';?>"> 											
	   </dd>
      </td>
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" class="Style22"> 
		  <dd>
		  Commentaire:</div>
		  </dd>
	  </div></td>
    <td width="400">
	<dd>
	  	 <input name="comment" class="Style22"  type="textarea"  placeholder="Commentaire" readonly="true" value="<?php echo !empty($data['comment'])?$data['comment']:'';?>"> 						
	</dd>	 
      </td > 
   </tr>
   <tr valign="baseline"> 
	   <td width="200">
	  	 <input name="author" type="hidden"  placeholder="Auteur" value="<?php echo $data['author'] ?>">
		 <input name="date_mod" type="hidden"  placeholder="Date modification" value='<?php echo $data['date_mod'];?>'>
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
     <a class="btn" href="monitor_list.php?entities_id=<?php echo $entities_id; ?> &type=monitors">Retour</a>
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


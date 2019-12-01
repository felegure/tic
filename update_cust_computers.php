<?php
session_start();
//include_once 'identification.php';
   require 'database.php';
 //  $id = null;
    if ( !empty($_GET['id'])) {
        $id  = $_REQUEST['id'];
//		echo "1.  id=$id <br>";
		
    }
	if ( !empty($_GET['entities_id'])) {
        $entities_id  = $_REQUEST['entities_id'];
		$_SESSION['entities_id']=$entities_id;		
		$entities_save=$entities_id;
//			echo "2.  entities_id=$entities_id , entities_save=$entities_save <br>";
    }
	else  {
	$entities_id=$_SESSION['entities_id'];
	$entities_save=$entities_id;
//	echo "apres session entities_id=$entities_id <br>";
	}
	if ( !empty($_GET['customers_id'])) {
        $customers_id  = $_REQUEST['customers_id'];
//		echo "3.  customers_id=$customers_id <br>";
		$_SESSION['customers_id']=$customers_id;		
    }
	else  {
	$customers_id=$_SESSION['customers_id'];
//	echo "apres session customers_id=$customers_id  entities_save=$entities_save <br>";
	}
 //    $id  = $_REQUEST['id'];
//	 		echo " 2.  id=$id <br>";
	$_SESSION['customers_id']=$customers_id;	
    if ( null==$id  ) {
  //  require 'computer_list.php?entities_id=$entities_id';		
   header("Location: computer_comp_list.php?entities_id=$entities_id&type=computers_comp");	  
//	    require 'computer_list.php';	
    }
	   if ( !empty($_POST)) {
 //    echo "dans POST <br> ";
    	require 'checkFields_cust_upd_computers.php';
        // update data
        if ($valid) {		
      require 'init_fields_upd_comp.php';
      require 'maj_fields_upd_valid_comp.php';
       } 
	   else echo "PAS VALIDE <br>";
} 

else {
//     echo "PAS DANS POST <br>";
        require 'maj_fields_upd_else_post_comp.php';
//	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<title>Modification ordinateur</title>
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
                        <h3>Modifier un ordinateur/Site</h3>
						<?php
					//	include_once 'identification.php';
						?>				
                    </div>   
					

<form class="form-actions" method="post" name="update_cust_computers" action="update_cust_computers.php?id=$id&entities_id=$entities_id&type=computers_comp" method="post" > 					
<table  width="900" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
<tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style22">
	  <dd>
       Nom entit&eacute;:<span class="Style21"></span></div>
	   </dd>
      </div>
	  </td> 
      <td width="300" height="42" align="right" nowrap ><div align="center" class="Style22">
	    <dd>
	  	 <input name="entities_id" type="hidden"  placeholder="entities_id" readonly="true" value="<?php echo !empty($entities_id)?$entities_id:'';?>">
         <input name="entities_name" type="text"  placeholder="entities_name" readonly="true" value="<?php echo !empty($companyname)?$companyname:'';?>">
         </dd>
		 <?php if (!empty($entities_idError)): ?>
         <span class="help-inline"><?php echo $entities_idError;?></span>
        <?php endif; ?> 							
      </td>
      <td width="150" height="42" align="right" nowrap><div align="center" class="Style22">
        <dd>
		  Client/Site:<span class="Style21"></span></div>
		</dd>
	  </div></td>
      <td width="500">	  
	     <dd>
		  <input name="customers_id" type="hidden"  placeholder="customers_id" readonly="true" value="<?php echo !empty($customers_id)?$customers_id:'';?>">
		  <input name="customer_name" type="text"  placeholder="customer_name" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
		  </dd>
		  <?php if (!empty($customer_idError)): ?>
         <span class="help-inline"><?php echo $customers_idError;?></span>
        <?php endif; ?> 
      </td>    
    </tr>
	<tr valign="baseline">
      <td width="80" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Nom Ordinateur:<span class="Style21"></span></div>
		</dd>
      </div></td>
      <td width="300">
	  <dd>
	  	 <input name="pcname" type="text"  placeholder="pcname"  value="<?php echo !empty($pcname)?$pcname:'';?>"></span> 					
      </dd>
	  </td>
       <td width="30" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Num&eacute;ro de s&eacute;rie:<span class="Style21"></span></div>
        </dd>
	  </div></td>
      <td width="300">
	  <dd>
	  	 <input name="serial" type="text"  placeholder="num&eacute;ro de s&eacute;rie" align="right" value="<?php echo !empty($serial)?$serial:'';?>"></span>					
      </dd>
	 </td>
	  </td> 
    </tr>
    <tr valign="baseline">
	<td width="80" height="42" align="right" nowrap >
	 <div align="center">
	 <span class="Style22" align="center" >
	 <dd>
	 Modele:<span class="Style21"></span></div>
	 </dd>
	 <p> </p>
		<div align="center"><span class="Style22">Choix:<span class="Style21"></span></div>
	</div>
    <td width="80" align="center" nowrap >
     <dd>
	 <input name="computermodels_id2" type="text"  readonly="true" size="20" value="<?php echo !empty($namemodel)?$namemodel:'';?>">
     <input name="computermodels_id0" type="hidden"  readonly="true" size="20" value="<?php echo $computermodels_id;?>">
	 <input name="id" type="hidden"  readonly="true" size="20" value="<?php echo !empty($id)?$id:'';?>">
    </dd>  	
    <dd>	                 
	            <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="computermodels_id" class="computermodels_id">
						<option value="0">NULL </option>
						<?php 
						$sql=mysqli_query($conn, "SELECT * FROM tictan_computermodels where is_deleted = 0");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
</dd>
						<input name="computermodels_id0" type="hidden" value="<?php echo $computermodels_id;?>">
                         </div>
					   </div> 	
    </td>
     <td width="80" align="center" nowrap >
	 <div align="center">
	 <span class="Style22" align="l">
	 <dd>
	 Type:<span class="Style21"></span></div>
	 </dd>
	 <p> </p>
	<div align="center"><span class="Style22">
		Choix:<span class="Style21"></span></div>

	 <td width="80" height="42" align="center" nowrap >
	 <dd>
	 <input name="computertypes_id2" type="text" readonly="true" size="20" value="<?php echo !empty($nametype)?$nametype:'';?>">
     <input name="computertypes_id0" type="hidden" readonly="true" size="20" value="<?php echo $data['computertypes_id'];?>">
     </dd>

		<?php
		$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
		mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
		?>
		
		<select name="computertypes_id" class="computertypes_id">
		<option value="0">NULL </option>

		<?php 
		$sql=mysqli_query($conn, "SELECT * FROM tictan_computertypes where is_deleted = 0");
		while($row=mysqli_fetch_array($sql))
		{
		echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
		} 
		?>
		</select>

		<input name="computertypes_id0" type="hidden" value="<?php echo $computertypes_id;?>">	
</div>
</div>		
    </td>
 </tr>


 <tr valign="baseline">
      <td width="80" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Processeur:<span class="Style21"></span></div>
        </dd>
	  </div></td>
      <td width="300">
	  <dd>
	  	 <input name="processor" type="text"  placeholder="Processor" value="<?php echo !empty($processor)?$processor:'';?>">	
     </dd>
	  </td>
      <td width="30" height="42" align="right" nowrap>
          <div align="center"> <span class="Style22">
		  <dd>
		  Memoire vive: <span class="Style1"></span></div>
          </dd>
		  </div></td>
     <td width="300">
	 <dd>
	  	 <input name="ram" type="text"  placeholder="Ram" value="<?php echo !empty($ram)?$ram:'';?>">						
     </dd>
	 </td>
    </tr>
    <tr valign="baseline">
      <td width="80" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Compte adm:<span class="Style21"></span></div>
		</dd>
      </div></td>
      <td width="300">
	  <dd>
	  	 <input name="session_admin_name" type="text"  placeholder="compte adm" value="<?php echo !empty($session_admin_name)?$session_admin_name:'';?>">				
      </dd>
	  </td>
	  
      <td width="30" height="42" align="right" nowrap>
          <div align="center"><span class="Style22">
		  <dd>
		  Mot de passe adm: <span class="Style1"></span></div>
		  </dd>
	  </div></td>
	  
     <td width="300">
	 <dd>
	  	 <input name="session_admin_pwd" type="text"  placeholder="mot de passe adm" value="<?php echo !empty($session_admin_pwd)?$session_admin_pwd:'';?>">				
     </dd>
	 </td>
    </tr>	
  
    </tr>	
   <tr valign="baseline">
      <td width="80" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Compte util.:<span class="Style21"></span></div>
		</dd>
      </div></td>
      <td width="300">
	  <dd>
	  	 <input name="session_user_name" type="text"  placeholder="compte util."value="<?php echo !empty($session_user_name)?$session_user_name:'';?>">				
      </dd>
	  </td>
	  <td width="30" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Mot de passe util.:<span class="Style21"></span></div>
		</dd>
      </div></td>
      <td width="300">
	  <dd>
	  	 <input name="session_user_pwd" type="text"  placeholder="mot de passe util."value="<?php echo !empty($session_user_pwd)?$session_user_pwd:'';?>">				
	  </dd> 
      </td>  
     </tr> 

  <tr valign="baseline">
      <td width="80" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Teamviewer login:<span class="Style21"></span></div>
        </dd>
	  </div></td>
      <td width="300">
	  <dd>
	  	 <input name="teamv_logname" type="text"  placeholder="teamv_logname" value="<?php echo !empty($teamv_logname)?$teamv_logname:'';?>">									
      </dd>
	  </td>
      <td width="30" height="42" align="right" nowrap>
          <div align="center" <span class="Style22">
		  <dd>
		  Teamviewer mot de passe: <span class="Style1"></span></div>
		  </dd>
	  </div></td>
     <td width="300">
	 <dd>
	  	 <input name="teamv_pwd" type="text"  placeholder="Teamviewer mot de passe" value="<?php echo !empty($teamv_pwd)?$teamv_pwd:'';?>">					
    </dd>
 </td>
 <tr valign="baseline">
     <td width="30" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Nom domaine:<span class="Style21"></span></div>
		</dd>
      </div></td>	  
     <td width="200" align="center" nowrap >
	  	 <input name="domain_name" type="text"  placeholder="nom domaine" value="<?php echo !empty($domain_name)?$domain_name:'';?>">							
      </td>
      <td width="30" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Type conn.:<span class="Style21"></span>
		</dd>
		<p>
		</p>
      <div align="center"><span class="Style22">Choix:<span class="Style21"></span></div>
   
		</div></td>
      <td width="300">
      <dd>
	  <input name="typeconnexion_01" type="text" align="right" readonly="true" value="<?php echo $data['typeconnexion']; ?>">    
      </dd>
      <dd>
        <select name="typeconnexion">
            <option value="dhcp">DHCP</option>
            <option value="wifi">WIFI</option>
            <option value="fixe">FIXE</option>
			<option value="autres">Autres</option>
        </select>
		</dd>
					  				
    </tr>	
  	 
 <tr valign="baseline">
      <td width="80" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Plage Adresse ip:<span class="Style21"></span></div>
		</dd>
      </div></td>
      <td width="300">
	  <dd>
	  	 <input name="adressrange" type="text"  placeholder="Plage adresse ip" value="<?php echo !empty($adressrange)?$adressrange:'';?>">										
      </dd>
	  </td>
      <td width="30" height="42" align="right" nowrap>
          <div align="center" <span class="Style22">
		  <dd>
		  Adresse Ip: <span class="Style1"></span></div>
		  </dd>
	  </div></td>
     <td width="300">
	 <dd>
	  	 <input name="adresseip" type="text"  placeholder="Adresse ip" value="<?php echo !empty($adresseip)?$adresseip:'';?>">									
     </dd>
  </td>
    </tr>	
	
   <tr valign="baseline">
      <td width="80" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Masque:<span class="Style21"></span></div>
		</dd>
      </div></td>
      <td width="300">
	 <dd>
	  	 <input name="mask" type="text"  placeholder="Masque" value="<?php echo !empty($mask)?$mask:'';?>">								
     </dd>
		 </td>
	  <td width="30" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		<dd>
		Passerelle:<span class="Style21"></span></div>
		</dd>
      </div></td>
      <td width="300">
	 <dd>
	  	 <input name="bridge" type="text"  placeholder="Passerelle"  value="<?php echo !empty($bridge)?$bridge:'';?>">							
 	 <dd> 
		 </td>  
     </tr> 
  <tr valign="baseline">
   
	 <td width="30" height="42" align="right" nowrap>
          <div align="center"> <span class="Style22">
		  <dd>
		  Lieu:<span class="Style21"></span></div>
		  </dd>
	  </div></td>  
	   <td width="300">
	 <dd>
	  	 <input name="location" type="text" placeholder="localisation" value="<?php echo !empty($location)?$location:'';?>">											
     </dd>
   </td>
   <td width="30" height="42" align="right" nowrap>
          <div align="center"> <span class="Style22"> 	
          <dd>		  
		  Commentaire:<span class="Style21"></span></div>
		  </dd>

	  </div></td>
    <td width="300">
	 <dd>
	  	 <input name="comment" class="Style22"  type="textarea"  placeholder="Commentaire" value="<?php echo !empty($comment)?$comment:'';?>">									
	 </dd>	 
      </td> 
    </tr>	
   
	 <tr valign="baseline"> 
	   <td width="300">
	  	 <input name="author" type="hidden"  placeholder="Auteur" value="<?php echo $author ;?>">
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
     <a class="btn" href="computer_comp_list.php?entities_id=<?php echo $entities_id; ?> &companyname=<?php echo $companyname;?>&type=computers_comp">Retour</a>
	  </td>  
 </tr> 
  </table>
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
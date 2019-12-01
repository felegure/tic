<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id '])) {
        $id  = $_REQUEST['id'];
	//	echo "1.  id=$id <br>";
		
    }
     $id  = $_REQUEST['id'];
	 //		echo " 2.  id=$id <br>";
			
    if ( null==$id  ) {
    require 'computer_list.php?entities_id=$entities_id';		
    }
	   if ( !empty($_POST)) {
 //    echo "dans POST <br> ";
    	require 'checkFields_cust_upd_computers.php';
        // update data
        if ($valid) {		
//	echo "valid???????????????????? <br>";
      require 'init_fields_upd_comp.php';
        require 'maj_fields_upd_valid_comp.php';
} 
} 

else {
 //       echo "PAS DANS POST <br>";
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
                    <div class="row">
                        <h3>Ajouter un ordinateur/Site</h3>
                    </div>            

<form class="form-actions" method="post" name="create_cust_computers" action="create_cust_computers.php" method="post" > 					
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
		  <input name="customers_id" type="hidden"  placeholder="customers_id" readonly="true" value="<?php echo !empty($customers_id)?$customers_id:'';?>">
         <input name="customer_name" type="text"  placeholder="customer_name" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
		 <?php if (!empty($customer_idError)): ?>
         <span class="help-inline"><?php echo $customers_idError;?></span>
        <?php endif; ?> 
      </td>    
    </tr>
	<tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Entrez le Nom du Pc:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="pcname" type="text"  placeholder="pcname"  value="<?php echo !empty($pcname)?$pcname:'';?>">					
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Numero de s&eacute;ie:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="serial"	 type="text"  placeholder="serial" value="<?php echo !empty($serial)?$serial:'';?>">						
      </td> 
    </tr>
    <tr valign="baseline">
	<td width="80" height="42" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">Modele:<span class="Style21"></span></div>
	</div>
    <td width="20">
		 <input name="computermodels_id2" type="text"  readonly="true" size="20" value="<?php echo !empty($namemodel)?$namemodel:'';?>">

						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
					 <fieldset>
						<select name="computermodels_id" class="computermodels_id">
						<option value="0">NULL </option>
						<?php 
						$sql=mysqli_query($conn, "SELECT * FROM tictan_computermodels where is_deleted = 0");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
					</fieldset>
						<input name="computermodels_id0" type="hidden" value="<?php echo $computermodels_id;?>">
                         </div>
					   </div> 	
    </td>
     <td width="80" height="10" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">Type:<span class="Style21"></span></div>
	</div>
	 <td width="80">
	 <input name="computertypes_id2" type="text" readonly="true" size="20" value="<?php echo !empty($nametype)?$nametype:'';?>">
        <?php if (!empty($nametypeError)): ?>
        <span class="help-inline"><?php echo $nametypeError;?></span>
        <?php endif; ?>					
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
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Processeur:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="processor" type="text"  placeholder="Processor" value="<?php echo !empty($processor)?$processor:'';?>">	
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Memoire vive: <span class="Style1"></span></div>
	  </div></td>
     <td width="200">
	  	 <input name="ram" type="text"  placeholder="Ram">						
     </td>
    </tr>
    <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">compte adm:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="session_admin_name" type="text"  placeholder="compte adm" value="<?php echo !empty($session_admin_name)?$session_admin_name:'';?>">				
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">mot de passe adm: <span class="Style1"></span></div>
	  </div></td>
     <td width="200">
	  	 <input name="session_admin_pwd" type="text"  placeholder="mot de passe adm" value="<?php echo !empty($session_admin_pwd)?$session_admin_pwd:'';?>">				
     </td>
    </tr>	
    <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">teamviewer login:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="teamv_logname" type="text"  placeholder="teamv_logname" value="<?php echo !empty($teamv_logname)?$teamv_logname:'';?>">									
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">teamviewer mot de passe: <span class="Style1"></span></div>
	  </div></td>
     <td width="200">
	  	 <input name="teamv_pwd" type="text"  placeholder="Teamviewer mot de passe" value="<?php echo !empty($teamv_pwd)?$teamv_pwd:'';?>">					
     </td>
    </tr>	
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">compte util.:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="session_user_name" type="text"  placeholder="compte util."value="<?php echo !empty($session_user_name)?$session_user_name:'';?>">				
      </td>
	  <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">mot de passe util.:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="session_user_pwd" type="text"  placeholder="mot de passe util."value="<?php echo !empty($session_user_pwd)?$session_user_pwd:'';?>">				
      </td>  
     </tr> 


  <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Type adressage:<span class="Style21"></span></div>
		  <p> </p>
		<div align="center"><span class="Style22">Choix:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  <dd>
	  <input name="typeadressage_01" type="text" align="right" readonly="true" value="<?php echo $data['typeadressage']; ?>">    
      </dd>
	  <dd>
	   <fieldset>
        <select name="typeadressage">
            <option value="dhcp">DHCP</option>
            <option value="wifi">WIFI</option>
            <option value="fixe">FIXE</option>
        </select>
    </fieldset>
	</dd>  						  				
    </td>

    </tr>>	 
 <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Plage Adresse ip:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="adressrange" type="text"  placeholder="Plage adresse ip" value="<?php echo !empty($adressrange)?$adressrange:'';?>">										
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Adresse Ip: <span class="Style1"></span></div>
	  </div></td>
     <td width="200">
	  	 <input name="adresseip" type="text"  placeholder="Adresse ip" value="<?php echo !empty($adresseip)?$adresse_ip:'';?>">									
     </td>
    </tr>	
	
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Masque:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="mask" type="text"  placeholder="Masque" value="<?php echo !empty($mask)?$mask:'';?>">								
      </td>
	  <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Passerelle:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="bridge" type="text"  placeholder="Passerelle"  value="<?php echo !empty($bridge)?$bridge:'';?>">							
      </td>  
     </tr> 
  <tr valign="baseline">
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" class="Style22"> Passerelle:</div>
	  </div></td>
    <td width="200">
	  	 <input name="bridge" class="Style22"  type="text"  placeholder="Passerelle" value="<?php echo !empty($bridge)?$bridge:'';?>">					
      </td > 
	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Lieu:<span class="Style21"></span></div>
	  </div></td>  
	   <td width="200">
	  	 <input name="location" type="text"  placeholder="localisation" value="<?php echo !empty($location)?$location:'';?>">											
      </td>
    </tr>	
   <tr valign="baseline">
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" class="Style22"> Commentaire:</div>
	  </div></td>
    <td width="400">
	  	 <input name="comment" class="Style22"  type="textarea"  placeholder="Commentaire" value="<?php echo !empty($comment)?$comment:'';?>">									
      </td > 
</tr>
	 <tr valign="baseline"> 
	   <td width="200">
	  	 <input name="author" type="hidden"  placeholder="Auteur" value="<?php echo $username ;?>">
		 <input name="date_mod" type="hidden"  placeholder="Date modification" value='<?php echo date("d-m-Y");?>'>
      </td>
    </tr> 	
</table>	
    <div class="form-actions">
    <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Mise a jour" >					  
    <a class="btn" href="computer_comp_list.php?entities_id=<?php echo $entities_id; ?> &type=computers_comp">Retour</a>
    </div>
  </form>                
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
<?php
    session_start();
	$type='copiers';
    include 'recuperation_variables.php';	
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id '])) {
        $id  = $_REQUEST['id'];
//	echo "1.  id=$id <br>";		
    }
     $id  = $_REQUEST['id'];
			
    if ( null==$id  ) {
        header("Location: copier_list.php");
    }
	
	if ( !empty($_POST)) {
  //    echo "dans POST <br> ";
    require 'checkFields_cust_upd_copiers.php';
		
        // update data
    if ($valid) {		
//		echo "valid???????????????????? <br>";
     require 'init_fields_upd_copiers.php';
     require 'maj_fields_upd_valid_copiers.php';
} 
} 
   
else {
// echo "pas dans Post <br> ";
        require 'maj_fields_upd_else_post_copiers.php';
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
<title>Modification photocopieur</title>
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
      <h3>Modification Photocopieur</h3>
    </div>
  <form class="form-actions" action="update_cust_copiers.php?id=<?php echo $id?>" method="post">

  <table  width="900" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
    <tr valign="baseline">
      <td width="100" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Nom entit&eacute;:<span class="Style21"></span></div>
      </div></td>
      <td width="300">
	  	 <input name="entities_id" type="hidden"  placeholder="entities_id" readonly="true" value="<?php echo !empty($entities_id)?$entities_id:'';?>">
        <dd>        
		<input name="entities_name" type="text"  placeholder="entities_name" readonly="true" value="<?php echo !empty($companynament)?$companynament:'';?>">
		</dd> 
		 <?php if (!empty($entities_idError)): ?>
         <span class="help-inline"><?php echo $entities_idError;?></span>
        <?php endif; ?> 							
      </td>
      <td width="100" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Client/Site:<span class="Style21"></span></div>
	  </div></td>
      <td width="300">	 
      <dd>	  
		  <input name="customers_id" type="hidden"  placeholder="customers_id" readonly="true" value="<?php echo !empty($customers_id)?$customers_id:'';?>">
         <input name="customer_name" type="text"  placeholder="customer_name" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
	  </dd>
	  <?php if (!empty($customers_idError)): ?>
         <span class="help-inline"><?php echo $customers_idError;?></span>
        <?php endif; ?> 
      </td>    
    </tr>
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Num&eacute;ro de s&eacute;rie:<span class="Style21"></span></div>
      </div></td>
      <td width="300">
	  <dd>
	  	 <input name="serial" type="text"  placeholder="num&eacute;ro de s&eacute;rie" align="right" value="<?php echo !empty($serial)?$serial:'';?>"></span>					
      </dd>
		 </td>
      <td width="100" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center"> <span class="Style22">Nom &eacute;quipemement:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  <dd>
	  	 <input name="name"	 type="text"  placeholder="Nom equipement" value="<?php echo !empty($name)?$name:'';?>"></span> 											
      </dd>
	  </td> 
    </tr>
	<tr valign="baseline">
	<td width="80" height="42" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">Modele:<span class="Style21"></span></div>
	  <p> </p>
		<div align="center"><span class="Style22">Choix:<span class="Style21"></span></div>
	</div>
       <td width="80">
        <dd>
	  <input name="copiersmodels_id2" type="text" align="right" readonly="true" value="<?php echo $data['namemodel']; ?>">    
	   <input name="copiersmodels_id0" type="hidden" align="right" readonly="true" value="<?php echo $data['copiersmodels_id']; ?>">    
      </dd>

						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="copiersmodels_id" class="copiersmodels_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_copiersmodels WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
			            <input name="copiersmodels_id0" type="hidden" value="<?php echo $copiersmodels_id;?>">			
						</dd>						
    </div>
    </td>
     <td width="80" height="10" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">Type:<span class="Style21"></span></div>
	  <p> </p>
		<div align="center"><span class="Style22">Choix:<span class="Style21"></span></div>
	</div>
	 <td width="80">
	   <dd>
	  <input name="copierstypes_id2" type="text" align="right" readonly="true" value="<?php echo $data['nametype']; ?>">    
      <input name="copierstypes_id0" type="hidden" align="right" readonly="true" value="<?php echo $data['copierstypes_id']; ?>">    
      </dd>
		<dd>
		 <?php
		 $conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
		 mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
		 ?>
		 <select name="copierstypes_id" class="copierstypes_id">
		 <option  value="0">NULL</option>
		 <?php 
		 $sql=mysqli_query($conn, "select id, name from tictan_copierstypes WHERE is_deleted = 0 order by id ASC");
		 while($row=mysqli_fetch_array($sql))
		 {
		 echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
		 } 
		 ?>
		 </select>
		</dd>		
	   <input name="copierstypes_id0" type="hidden" value="<?php echo $copierstypes_id;?>">	
    </div>
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
   <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Adresse Ip: <span class="Style1"></span></div>
	  </div></td>     
	 <td width="400">
	  <dd>
	  <input name="adresseip" type="text" align="right"  value="<?php echo $data['adresseip']; ?>">    
      </dd> 
     </td>	  
    </tr>	
		
    <tr valign="baseline">

	 <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Lieu:<span class="Style21"></span></div>
	  </div></td>  
	   <td width="200">
	  <dd>
	  <input name="location" type="text"  placeholder="localisation" value="<?php echo $data['location']; ?>">  					
      </dd>
	  </td>
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" class="Style22"> Commentaire:</div>
	  </div></td>
    <td width="400">
	 <dd>
 	 <input name="comment" class="Style22"  type="textarea"  placeholder="Commentaire" value="<?php echo $data['comment']; ?>">  					
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
     <a class="btn" href="copier_list.php?entities_id=<?php echo $entities_id; ?> &type=copiers">Retour</a>
	  </td>  
 </tr> 
  </table>
  
 </form>            
 
 </div>
                 
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


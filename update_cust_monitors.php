<?php
session_start();
    $type='monitors';
    include 'recuperation_variables.php';
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id '])) {
        $id  = $_REQUEST['id'];
//	echo "1.  id=$id <br>";
		
    }
     $id  = $_REQUEST['id'];
//	 		echo "                       2.  id=$id <br>";
			
    if ( null==$id  ) {
            header("Location: monitor_list.php");
    }

	   if ( !empty($_POST)) {
 //     echo "dans POST <br> ";
    	require 'checkFields_cust_upd_monitors.php';
		
        // update data
        if ($valid) {		
//		echo "valid???????????????????? <br>";
        require 'init_fields_upd_monitors.php';
        require 'maj_fields_upd_valid_monitors.php';
} 
} 

else {
        require 'maj_fields_upd_else_post_monitors.php';
//	

}

   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
<title>Modification moniteur</title>
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
      <h3>Modification moniteur</h3>
    </div>
  <form class="form-actions" action="update_cust_monitors.php?id=<?php echo $id?>" method="post">

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
          <div align="center"> <span class="Style22">Nom  moniteur:<span class="Style21"></span></div>
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
	  <input name="monitormodels_id2" type="text" align="right" readonly="true" value="<?php echo $data['namemodel']; ?>">    
	   <input name="monitormodels_id0" type="hidden" align="right" readonly="true" value="<?php echo $data['monitormodels_id']; ?>">    
      </dd>

						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="monitormodels_id" class="monitormodels_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_monitormodels WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
			            <input name="monitormodels_id0" type="hidden" value="<?php echo $monitormodels_id;?>">			
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
	  <input name="monitortypes_id2" type="text" align="right" readonly="true" value="<?php echo $data['nametype']; ?>">    
      <input name="monitortypes_id0" type="hidden" align="right" readonly="true" value="<?php echo $data['monitortypes_id']; ?>">    
      </dd>
		<dd>
		 <?php
		 $conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
		 mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
		 ?>
		 <select name="monitortypes_id" class="monitortypes_id">
		 <option  value="0">NULL</option>
		 <?php 
		 $sql=mysqli_query($conn, "select id, name from tictan_monitortypes WHERE is_deleted = 0 order by id ASC");
		 while($row=mysqli_fetch_array($sql))
		 {
		 echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
		 } 
		 ?>
		 </select>
		</dd>		
	   <input name="monitortypes_id0" type="hidden" value="<?php echo $monitortypes_id;?>">	
    </div>
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
     <a class="btn" href="monitor_list.php?entities_id=<?php echo $entities_id; ?> &type=monitors">Retour</a>
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

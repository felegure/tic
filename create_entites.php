<?php
    session_start(); 
	$type='accessories';
    include 'recuperation_variables.php';
	
// recuperation des variables de ssion pour le passage de parametres d'une forme a une autre
	$customers_id = $_SESSION["customers_id"];
	$entities_id = $_SESSION["entities_id"];

	$companynament = $_SESSION["companynament"];											
	$customer_name = $_SESSION["customer_name"] ;


    require 'database.php';
    $pdo = Database::connect();

    $profil = $_SESSION['profilAccess'];
    if ($profil != 'A' && $profil != 'S') 
	  header("Location: index_cust_software.php");	
    if ( !empty($_POST)) {
        // keep track validation errors
			require_once ('checkFields_cust_accessories.php');				 
         // insert data
	
         if ($valid) {
		 
		 echo "valid <br";
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tictan_customers_accessories(customers_id, entities_id, serial, name, 
			accessorymodels_id, accessorytypes_id,  
			 location, comment,author, date_mod, is_deleted ) 
			values( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";	
			
			echo "sql = $sql <br>";
            $q = $pdo->prepare($sql);
            $q->execute(array($customers_id, $entities_id, $serial, $name, $accessorymodels_id, $accessorytypes_id,
			 $location, $comment, $author, $date_mod,$is_deleted ));		
            Database::disconnect();
			
     header("Location: accessories_list.php?entities_id=$entities_id&type=accessories");		
        }
else echo " Not valid <br>";
    }
	// a voir
	/// <form action="" method="post" name="SuppressionL" target="_parent"><table width="963" border="1" cellpadding="2" cellspacing="2">
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<title>Ajout accessoire</title>
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
                        <h3>Ajouter un accessoire/Site</h3>
                    </div>    

<form class="form-actions" method="post" name="create_cust_accessories" action="create_cust_accessories.php" method="post" > 

  <table  width="900" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
    <tr valign="baseline">
      <td width="200" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
		Nom entit&eacute;:<span class="Style21"></span></div>
      </td>
      <td width="400">
	  <dd>
	  	 <input name="entities_id" type="hidden"  placeholder="entities_id" readonly="true" value="<?php echo !empty($entities_id)?$entities_id:'';?>">
         <input name="entities_name" type="text"  placeholder="entities_name" readonly="true" value="<?php echo !empty($companynament)?$companynament:'';?>">
	  </dd>	 							
      </td>
      <td width="200" height="42" align="right" nowrap>
          <div align="center" <span class="Style22">
		  Client/Site:<span class="Style21"></span></div>
	   </div></td>
      <td width="400">	
		<dd>	  
		  <input name="customers_id" type="hidden"  placeholder="customers_id" readonly="true" value="<?php echo !empty($customers_id)?$customers_id:'';?>">
         <input name="customer_name" type="text"  placeholder="customer_name" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
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
      <td width="200">
	  <dd>
	  	 <input name="serial" type="text"  placeholder="num&eacute;ro de s&eacute;rie">						
	  </dd>
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Nom &eacute;quipemement:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  <dd>
	  	 <input name="name"	 type="text"  placeholder="Nom equipement">						
      </dd>
	  </td> 
    </tr>
	<tr valign="baseline">
	<td width="100" height="42" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">
	 <dd>
	 Modele:<span class="Style21"></span></div>
	 </dd>
	</div>
       <td width="100">
      
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="accessorymodels_id" class="accessorymodels_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_accessoriesmodels WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						</dd>						
    </div>
    </td>
     <td width="100" height="10" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">
	 <dd>
	 Type:<span class="Style21"></span></div>
	 </dd>
	</div>
	 <td width="100">
      
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="accessorytypes_id" class="accessorytypes_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_accessoriestypes WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						</dd>						
    </div>
    </td>
 </tr>
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
	  	 <input name="location" type="text"  placeholder="localisation">						
	   </dd>
      </td>
	  
    <td width="30" height="42" align="right" nowrap>
          <div align="center" class="Style22"> 
		  <dd>
		  Commentaire:
		  </dd>
	  </div></td>
    <td width="400">
	<dd>
	  	 <input name="comment" class="Style22"  type="textarea"  placeholder="Commentaire">						
	</dd>
      </td > 
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
    <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Ajout" >					  
 <a class="btn" href="accessories_list.php?entities_id=<?php echo $entities_id; ?> &type=accessories">Retour</a>
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


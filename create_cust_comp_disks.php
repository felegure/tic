<?php
    session_start(); 
	$type='disks';
	include 'recuperation_variables.php';

    require 'database.php';
    $pdo = Database::connect();
	$profil = $_SESSION['profilAccess'];
    if ($profil != 'A' && $profil != 'S') 
	  header("Location: index_cust_comp_disks.php");
    if ( !empty($_POST)) {
        // keep track validation errors
			require_once ('checkFields_cust_disks.php');	
//			echo "!empty <br>";
	
    if ($valid) {
	        $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tictan_cust_comp_disk(customers_id, entities_id, computers_id,serial, diskname, 
			supplier, diskmodels_id, disktypes_id, partitioname1, partitioname2, partitioname3, 
			comment,author, date_mod, is_deleted ) 
			values( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			
		$serial = $_POST['serial'];
        $diskname = $_POST['diskname'];
		$supplier = $_POST['supplier'];       
		$partitioname1 = $_POST['partitioname1'];
		$partitioname2 = $_POST['partitioname2'];	
		$partitioname3 = $_POST['partitioname3'];		
        $comment = $_POST['comment'];
		$date_mod=$_POST['date_mod'];
		$author=$_POST['author'];
        $is_deleted = 0;
//		echo "sql=$sql <br>";
//		echo "customer_id=$customer_id <br>";
		$q = $pdo->prepare($sql);
        $q->execute(array($customers_id, $entities_id, $computers_id, $serial, $diskname,$supplier, $diskmodels_id, 
		$disktypes_id, $partitioname1, $partitioname2, $partitioname3, $comment, $author, $date_mod,$is_deleted ));
		
        Database::disconnect();
//		echo "customers_id AVANT =$customers_id <br>";	

     	header("Location: index_cust_comp_disks.php?entities_id=$entities_id&companyname=$companyname&customers_id=$customers_id&pcname=$pcname&type=disks");
        }

  }
 // else 	echo "Empty <br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./css/mbcsmbmcp.css" type="text/css" />

	
<title>Customer_list </title>
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
                        <h3>Ajouter un disque/ordinateur</h3>
                    </div>  
 <div align="left"> <span class="Style1"> 
 <?php echo "<h6> Ordinateur:  $pcname </h6>";?>	</span>				
<form class="form-actions" method="post" name="create_cust_comp_disks" action="create_cust_comp_disks.php?pcname=<?php echo $pcname; ?>" method="post" > 

  <table  width="900" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
    <tr valign="baseline">
      <td width="100" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Nom entit&eacute;:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="entities_id" type="hidden"  placeholder="entities_id" readonly="true" value="<?php echo !empty($entities_id)?$entities_id:'';?>">
         <input name="entities_name" type="text"  placeholder="entities_name" readonly="true" value="<?php echo !empty($companyname)?$companyname:'';?>">
		 <?php if (!empty($entities_idError)): ?>
         <span class="help-inline"><?php echo $entities_idError;?></span>
        <?php endif; ?> 							
      </td>
      <td width="100" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center"> <span class="Style22">Client/Site:<span class="Style21"></span></div>
	  </div></td>
      <td width="400">	  
		  <input name="customers_id" type="hidden"  placeholder="customers_id" readonly="true" value="<?php echo !empty($customers_id)?$customers_id:'';?>">
          <input name="computers_id" type="hidden"  placeholder="computers_id" readonly="true" value="<?php echo !empty($computers_id)?$customers_id:'';?>">
		  <input name="customer_name" type="text"  placeholder="customer_name" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
		 <?php if (!empty($customer_idError)): ?>
         <span class="help-inline"><?php echo $customers_idError;?></span>
        <?php endif; ?> 
      </td>    
    </tr>
 
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Nom du disque:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="diskname"	 type="text"  placeholder="Nom du disque">						
      </td>   
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Numero de serie:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="serial" type="text"  placeholder="Numero de serie">						
      </td> 	  
    </tr>
	
	<tr valign="baseline">
	<td width="80" height="42" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">Modele:<span class="Style21"></span></div>
	</div>
       <td width="80">
      
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="diskmodels_id" class="diskmodels_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_diskmodels WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						</dd>						
    </div>
    </td>
     <td width="80" height="10" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">Type:<span class="Style21"></span></div>
	</div>
	<td width="80">
      
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="disktypes_id" class="disktypes_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_disktypes WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						</dd>						
    </div>
    </td>
 </tr>
  <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Fournisseur:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="supplier" type="text"  placeholder="Fournisseur">						
      </td>
  </tr>   
 <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Partition 1:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="partitioname1" type="text"  placeholder="Partition 1">						
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Partition 2: <span class="Style1"></span></div>
	  </div></td>
     <td width="200">
	  	 <input name="partitioname2" type="text"  placeholder="Partition 2">						
     </td>
    </tr>		
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Partition 3:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="partitioname3" type="text"  placeholder="Partition 3">						
      </td>
	
   </tr>  

<tr valign="baseline">
    <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" class="Style22"> Commentaire:</div>
	  </div></td>
    <td width="400">
	  	 <input name="comment" class="Style22"  type="textarea"  placeholder="Commentaire">						
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
 <a class="btn" href="index_cust_comp_disks.php?entities_id=<?php echo $entities_id; ?> &type=disks">Retour</a>
	  </td>  
 </tr> 
 
<p>&nbsp;</p> 
</table>
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



<?php
    session_start(); 
// recuperation des variables de select session pour le passage de parametres d'une forme a une autre
	$customers_id = $_SESSION["customers_id"];
	$entities_id = $_SESSION["entities_id"];
	$companyname = $_SESSION["companyname"];
	$customers_id = $_SESSION["customers_id"];												
	$customer_name = $_SESSION["customer_name"] ;
	$username=$_SESSION["username"] ;
	$computers_id=$_SESSION["computers_id"];
	$pcname = $_SESSION["pcname"] ;
//	echo "create_cust_comp_softwares , entities_id = $entities_id , companynament = $companynament <br>";
//	echo "create_cust_comp_softwares customers_id = $customers_id , customer_name = $customer_name <br>";
//	echo "create_cust_comp_softwares computers_id = $computers_id , pcname = $pcname <br>";
    require 'database.php';
    $pdo = Database::connect();
	$profil = $_SESSION['profilAccess'];
    if ($profil != 'A' && $profil != 'S') 
	  header("Location: index_cust_comp_softs.php");
    if ( !empty($_POST)) {
        // keep track validation errors
			require_once ('checkFields_cust_comp_softs.php');	
		//	echo "!empty <br>";
	
    if ($valid) {
	$pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
    $sql = "INSERT INTO tictan_cust_comp_soft(customers_id, entities_id, computers_id, name, licence,
	editor, supplier, softmodels_id, softypes_id, start_date, end_date, comment, author, date_mod, is_deleted			) 
	values( ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			
	$supplier = $_POST['supplier'];
    $name = $_POST['name'];
	$licence = $_POST['licence'];
    $editor = $_POST['editor'];

	$start_date=$_POST['start_date'];
	$end_date=$_POST['end_date'];
//		$supplier=$_POST['supplier'];		
    $comment = $_POST['comment'];
	$date_mod=$_POST['date_mod'];
	$author=$_POST['author'];
    $is_deleted = 0;
//		echo "sql=$sql <br>";
//		echo "customers_id=$customers_id <br>";

		$q = $pdo->prepare($sql);
    $q->execute(array($customers_id, $entities_id, $computers_id, $name, $licence,$editor, 
	$supplier,$softmodels_id, $softypes_id, $start_date, $end_date, $comment, $author, $date_mod, $is_deleted));
		
    Database::disconnect();
			
    //    header("Location: index_cust_softs.php");
//		  header("Location: index_cust_comp_softs.php?entities_id=$entities_id&type=softwares");
        	header("Location: index_cust_comp_softs.php?entities_id=$entities_id&companyname=$companyname&customers_id=$customers_id&pcname=$pcname&type=softs"); 
  }

  }
 // else 	echo "Insertion impossible :  $v <br>";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<title>Ajout un logiciel</title>
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
                        <h3>Ajouter un logiciel/ordinateur</h3>
                    </div>   
<form class="form-actions" method="post" name="create_cust_comp_softs" action="create_cust_comp_softs.php" method="post" > 

  <table  width="1200" height="300" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
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
          <div align="center" <span class="Style22">Client/Site:<span class="Style21"></span></div>
	  </div></td>
      <td width="400">	  
		  <input name="customers_id" type="hidden"  placeholder="customer_id" readonly="true" value="<?php echo !empty($customers_id)?$customers_id:'';?>">
		  <input name="computers_id" type="hidden"  placeholder="computers_id" readonly="true" value="<?php echo !empty($computers_id)?$computers_id:'';?>">
         <input name="customer_name" type="text"  placeholder="customer_name" readonly="true" value="<?php echo !empty($customer_name)?$customer_name:'';?>">
		 <?php if (!empty($customer_idError)): ?>
         <span class="help-inline"><?php echo $customer_idError;?></span>
        <?php endif; ?> 
      </td>    
    </tr>
  <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Nom du logiciel:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="name" type="text"  placeholder="Nom du logiciel">						
      </td>

   </tr>  
	<tr valign="baseline">
	<td width="80" height="42" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">Libelle logiciel:<span class="Style21"></span></div>
	</div>
       <td width="80">
    
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="softmodels_id" class="softmodels_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_softmodels WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						</dd>						
    </div>
    </td>
     <td width="80" height="10" align="right" nowrap ><div align="center" class="Style23">
	 <div align="center"><span class="Style22">famille:<span class="Style21"></span></div>
	</div>
	 <td width="80">
      
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="softypes_id" class="softypes_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_softypes WHERE is_deleted = 0 order by id ASC");
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
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Licence:<span class="Style21"></span></div>
      </div></td>
      <td width="400">
	  	 <input name="licence" type="text"  placeholder="Licence">						
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Editeur: <span class="Style1"></span></div>
	  </div></td>
     <td width="200">
	  	 <input name="editor" type="text"  placeholder="Editeur">						
     </td>
    </tr>		
   <tr valign="baseline">
      <td width="30" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="center"><span class="Style22">Fournisseur:<span class="Style21"></span></div>
      </div></td>
      <td width="200">
	  	 <input name="supplier" type="text"  placeholder="Fournisseur">						
      </td>

   </tr>  
 
   <tr valign="baseline">
   <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Date debut:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="start_date" type="text"  placeholder="Date debut">						
      </td>
      <td width="30" height="42" align="right" nowrap><div align="center" class="Style23">
          <div align="center" <span class="Style22">Date fin:<span class="Style21"></span></div>
	  </div></td>
      <td width="200">
	  	 <input name="end_date" type="text"  placeholder="Date fin">						
      </td>
     
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
 <a class="btn" href="index_cust_comp_softs.php?entities_id=<?php echo $entities_id; ?> &type=softwares">Retour</a>
	  </td>  
 </tr> 
 
<p>&nbsp;</p> 
</table>
 
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



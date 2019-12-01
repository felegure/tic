<?php
//***************************************
// This is downloaded from www.plus2net.com //
/// You can distribute this code with the link to www.plus2net.com ///
//  Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
//The author is not responsible for any type of loss or problem or damage on using this script.//
/// You can use it at your own risk. /////
//*****************************************

require 'config.php';
//////// End of connecting to database ////////

?>

<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
<title>Sélectionner une entité</title>
<SCRIPT language=JavaScript>
<!--
function reload(form)
{
var val=form.entities_id.options[form.entities_id.options.selectedIndex].value;
self.location='choose_entities.php?entities_id=' + val ;
}
//-->

</script>
</head>

<body onload=disableselect();>

<?php

@$entities_id=$_GET['entities_id']; // Use this line or below line if register_global is off
if(strlen($entities_id) > 0 and !is_numeric($entities_id)){ // to check if $cat is numeric data or not. 
echo "Data Error";
exit;
}

///////// Getting the data from Mysql table for first list box//////////
$quer2="SELECT DISTINCT companyname, id FROM tictan_entities order by companyname"; 
///////////// End of query for first list box////////////
echo "quer2=$quer2 <br>";

echo "<form class='form-horizontal' action='index_customers_list.php?entities_id=$entities_id' method='post'>" ;

/// Add your form processing page address to action in above line. Example  action=dd-check.php////
//////////        Starting of first drop downlist /////////
echo "<select name='entities_id'><option value=''>Select one</option>";
foreach ($dbo->query($quer2) as $data2) {
$noter=$data2['id'] ;
//echo "data2(id) = $noter <br>";
// while($data2 = mysql_fetch_array($quer2)) { 
if($data2['id']==@$entities_id){echo "<option selected value='$data2[id]'>$data2[companyname]</option>"."<br>";
$entities_id = $data2[id];
echo "XXXXXXXXXXXXXXentities_id=$entities_id <br>";
}
else{echo  "<option value='$data2[id]'>$data2[companyname]</option>";}
}
echo "</select>";
//////////////////  This will end the first drop down list ///////////
echo "<input type=submit value=Submit>";

<div class="control-group <?php echo !empty($entities_idError)?'error':'';?>">
					     <label class="control-label">Entité</label>
						 <div class="controls">
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="entities_id" class="entities_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, companyname from tictan_entities WHERE is_deleted = 0 
						order by companyname ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['companyname'].'</option>';
						} ?>
						</select>
						</dd>						
                    </div>
				    </div>	

echo "</form>";
?>

</body>

</html>

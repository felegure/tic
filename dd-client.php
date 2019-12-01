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
<title>Multiple drop down list box from plus2net</title>
<SCRIPT language=JavaScript>
<!--
function reload(form)
{
var val=form.entities_id.options[form.entities_id.options.selectedIndex].value;
self.location='dd-client.php?entities_id=' + val ;
}
//-->

</script>
</head>

<body onload=disableselect();>

<?Php

@$entities_id=$_GET['entities_id']; // Use this line or below line if register_global is off
if(strlen($entities_id) > 0 and !is_numeric($entities_id)){ // to check if $cat is numeric data or not. 
echo "Data Error";
exit;
}


///////// Getting the data from Mysql table for first list box//////////
$quer2="SELECT DISTINCT companyname, id FROM tictan_entities order by companyname"; 
///////////// End of query for first list box////////////
//echo "quer2=$quer2 <br>";
/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($entities_id) and strlen($entities_id) > 0){
$quer="SELECT DISTINCT customer_name FROM tictan_customers where entities_id=$entities_id order by customer_name"; 
}else{$quer="SELECT distinct customer_name FROM tictan_customers order by customer_name"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////
//echo "quer=$quer  length(entities_id) = strlen($entities_id) <br>";
echo "<form method=post name=f1 action='dd-checkclient.php'>";
/// Add your form processing page address to action in above line. Example  action=dd-check.php////
//////////        Starting of first drop downlist /////////
echo "<select name='entities_id' onchange=\"reload(this.form)\"><option value=''>Select one</option>";
foreach ($dbo->query($quer2) as $data2) {
$noter=$data2['id'] ;
//echo "data2(id) = $noter <br>";
// while($data2 = mysql_fetch_array($quer2)) { 
if($data2['id']==@$entities_id){echo "<option selected value='$data2[id]'>$data2[companyname]</option>"."<BR>";
}
else{echo  "<option value='$data2[id]'>$data2[companyname]</option>";}
}
echo "</select>";
//////////////////  This will end the first drop down list ///////////


//////////        Starting of second drop downlist /////////
echo "<select name='client'><option value=''>Select one</option>";
//while($data = mysql_fetch_array($quer)) { 
foreach ($dbo->query($quer) as $data) {
echo  "<option value='$data[customer_name]'>$data[customer_name]</option>";
}
echo "</select>";
//////////////////  This will end the second drop down list ///////////
//// Add your other form fields as needed here/////
echo "<input type=submit value=Submit>";
echo "</form>";
?>

</body>

</html>

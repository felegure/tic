 <?php   

    include 'recuperation_variables.php';
	
 	$pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "UPDATE tictan_customer_network set name=?, serial=?,adresseip=?, mask=?, bridge=?, adressrange=?,
	typeadressage =?, connexionvia=?,fax=?,login=?,password=?,location=?,comment=?,author=?, date_mod=?,is_deleted=? ";
		
	$sw=1;
    
	 $networkmodels_id0 = $_POST['networkmodels_id0'];
	    $networkmodels_id = $_POST['networkmodels_id'];
//		echo "networkmodels_id0= $networkmodels_id0<br>";
//		echo "networkmodels_id= $networkmodels_id   sw=$sw<br>";		
		
	if ($networkmodels_id != '0') 
  	if ($networkmodels_id != $networkmodels_id0) {
    $varnetworkmodels_id = $networkmodels_id;
    if ($sw==0) {
	    $sql = $sql." networkmodels_id = $varnetworkmodels_id ";
		echo "varnetworkmodels_id=$varnetworkmodels_id <br>";
	}
	else {
	   $sql = $sql.",networkmodels_id = $varnetworkmodels_id ";
	}
	 $sw=1;
	}

  echo "varnetworkmodels_id=$varnetworkmodels_id<br>";

    $networktypes_id0 = $_POST['networktypes_id0'];
	$networktypes_id = $_POST['networktypes_id'];
		echo "networktypes_id0= $networktypes_id0<br>";
		echo "networktypes_id= $networktypes_id<br>";		
		
	if ($networktypes_id != '0') 
  	if ($networktypes_id != $networktypes_id0) {
    $varnetworktypes_id = $networktypes_id;
    if ($sw==0) {
		$sql= $sql." networktypes_id = $varnetworktypes_id ";
	echo "varnetworktypes_id=$varnetworktypesid <br>";
	}
	else {
	   $sql = $sql.",networktypes_id = $varnetworktypes_id ";
	}
	 $sw=1;
	 }
	 
	 echo " avant varnetworktypes sw = $sw <br>";
 echo "varnetworktypes_id=$varnetworktypes_id<br>";

	$sql = $sql."where id = ".$id;


		echo "sql=$sql <br>";		
        $q = $pdo->prepare($sql);
// echo "comment=$comment , mod_date=$mod_date  , author=$author <br>";
		
	    $q->execute(array( $name, $serial,$adresseip,$mask,$bridge,$adressrange,$typeadressage,$connexionvia,$fax,
		$login, $password,$location,$comment, $author, $date_mod, $is_deleted));	
  //echo "serial=$serial <br> ";
        Database::disconnect();	
        header("Location: network_list.php");
?>
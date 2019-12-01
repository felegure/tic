<?php
// echo "checkFields_cust_upd_softs.php <br>";
        $customers_idError = null;
        $entities_idError = null;	
        $date_modError = null;		
		$nameError = null;
        $customers_idError = null;
        $is_deletedError = null;
	    $supplierError	 = null;		
	    $licenceError = null;	
        $editorError = null;	
        $start_dateError = null;
        $end_dateError = null;		
        $commentError = null;
        $authorError = null;
		$softmodels_id = null;
		$softypes_id = null;
        // keep track post values
//		$serial = $_POST['serial'];

        $licence = $_POST['licence'];
        $editor = $_POST['editor'];   
//		$name = $_POST['name'];   

		
		$supplier = $_POST['supplier'];
		$softmodels_id = $_POST['softmodels_id'];
	    $softypes_id = $_POST['softypes_id'];
		$customers_id = $_POST['customers_id'];
		$entities_id =     $licence = $_POST['licence'];
        $editor = $_POST['editor'];   
//		$name = $_POST['name'];   
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];		   
//		$name = $_POST['name'];   
//		$softmodels_id2 = $_POST['softmodels_id2'];
//	    $softypes_id2 = $_POST['softypes_id2'];		
//		$softmodels_id0 = $_POST['softmodels_id0'];
//	    $softypes_id0 = $_POST['softypes_id0'];				
		
        $comment = $_POST['comment'];
        $author = $_POST['author'];
		$date_mod = $_POST['date_mod'];
		$is_deleted = 0;
		
		//$_POST['is_deleted'];
		$v=0;
	    $valid = true;  
/* 
 if (empty($entities_id)) {
            $entities_idError = 'Entrez le nom du Client/Entite';
            $valid = false;
			$v=1;
        }	   

/*		
		if (empty($name)) {
            $nameError = "Entrez le nom de l'equipement ";
            $valid = false;
			$v=111;
        }

		  if (empty($serial)) {
            $serialError = 'Entrez le numero de serie';
            $valid = false;
			$v=1111;
        }		
*/
// Trouvez le moyen de réimprimer les message d'erreur   
//         echo "YYYY softmodels_id=$softmodels_id <br>";
//		 echo "YYYY softypes_id=$softypes_id <br>";
//         echo "YYYY softmodels_id2=$softmodels_id2 <br>";
//		 echo "YYYY softypes_id2=$softypes_id2 <br>";	
//         echo "YYYY softmodels_id0=$softmodels_id0 <br>";
//		 echo "YYYY softypes_id0=$softypes_id0 <br>";	 
          if (empty($softmodels_id)) {
            $softmodels_idError = "Choisissez le modele de logiciel";
            $valid = false;
			$v=1111111;
						$v= "modele de logiciel est obligatoire";
        }
  //		echo "softmodels_id=$softypes_id<br>)";		
    	if (empty($softypes_id)) {
            $softypes_idError = "Choisissez le type" ;
            $valid = false;
			$v=10;
			$v= "Type de logiciel est obligatoire";
        }
  
 	$pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM vtictan_cust_comp_soft where id=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);		
	$entities_id = $data['entities_id'];
	$customers_id = $data['customers_id'];
	$computers_id = $data['computers_id'];
	
	$_SESSION["pcname"] = $data['pcname'];	
	$_SESSION["entities_id"] = $data['entities_id'];
	$_SESSION["customers_id"] = $data['customers_id'];	
	$_SESSION["computers_id"] = $data['computers_id'];	
	$name = $data['name'];
	$pcname = $data['pcname'];	
	$namemodel = $data['namemodel'];
	$nametype = $data['nametype'];			
//	echo "name=$name <br>";
//    echo "namemodel=$namemodel <br>";
//    echo "nametype=$nametype <br>";
	$editor = $data['editor'];
    $supplier = $data['supplier'];
    $licence = $data['licence'];		
	$customer_name = $data['customer_name'];
	$companyname = $data['companyname'];
	$_SESSION["companyname"] = $data['companyname'];
	$_SESSION["customer_name"] = $data['customer_name'];		
	$softmodels_id = $data['softmodels_id'];
	$softypes_id = $data['softypes_id'];
	$start_date=$data['start_date'];
	$end_date=$data['end_date'];	
	$comment=$data['comment'];
    $author=$data['author'];
	$date_mod=$data['date_mod'];
	$is_deleted=$data['is_deleted'];
   
 //   echo "valid = $v <br> ";
        
?>
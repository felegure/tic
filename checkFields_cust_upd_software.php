<?php
echo "check_fields_cust_upd_software .php <br> ";

        $licencesoftError = null;	
        $suppliersoftError = null;	
		$editorsoftError = null;	
        $start_dateError = null;
 	    $end_dateError = null;		
        $mod_dateError = null;		
		$nameError = null;
        $customers_idError = null;
        $is_deletedError = null;	
	    $users_idError = null;
	    $is_dynamicError = null;	
        $groups_idError = null;
        $ticket_tcoError = null;	
        $uuidError = null;
        $commentError = null;
        $authorError = null;

		$softmodel_idError = null;
		$softype_idError = null;
		$suppliersoftError = null;
		$licencesoftError = null;
		$editorsoftError = null;
		
        // keep track post values
		$name = $_POST['name'];	
        $softmodel_id = $_POST['softmodel_id'];
		$softype_id = $_POST['softype_id'];
        $is_deleted = $_POST['is_deleted'];
        $users_id = $_POST['users_id'];
        $groups_id = $_POST['groups_id'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
		$mod_date = $_POST['mod_date'];
		$start_date = $_POST['start_date'];
 	    $end_date = $_POST['end_date'];
		$suppliersoft = $_POST['supplier'];
		$licencesoft = $_POST['licence'];
		$editorsoft = $_POST['editor'];	
		
		
		//$_POST['is_deleted'];
		$v=0;
	    $valid = true;  
		if (empty($name)) {
            $nameError = 'Entrez le Nom du logiciel';
            $valid = false;
			$v=111;
        }
 
  echo "valid = $v <br> ";   
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers_software where id_soft=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
// echo "customers_id=$customers_id <br> ";
		$name = $data['namesoft'];
		$customer_name = $data['customer_name'];
		$companynament = $data['companynament'];		
		$customer_name = $data['customer_name'];
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
		$namemodel = $data['namemodel'];
		$nametype = $data['nametype'];
		$softmodel_id = $data['softmodel_id'];
		$softype_id = $data['softype_id'];
		$namemodel = $data['namemodel'];
		$nametype = $data['nametype'];
		$licencesoft = $data['licencesoft'];
		$suppliersoft = $data['suppliersoft'];
		$editorsoft = $data['editorsoft'];		
		$comment=$data['comment'];
		$users_id=$data['users_id'];
		$groups_id=$data['groups_id'];
		$author=$data['author'];
		$mod_date=$data['date_mod'];
		$start_date = $data['start_date'];
		$end_date = $data['end_date'];
		$is_deleted=$data['is_deleted'];

        $softmodels_id0 = $_POST['softmodels_id0'];
	    $softmodels_id = $_POST['softmodel_id'];

?>
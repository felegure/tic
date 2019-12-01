<?php
session_start();

require 'database.php';

$user_name = $_POST['login'];
$password = $_POST['password']; 
$pAccess = "";
$pUser=@$_POST['login'];
$pPasswd=@$_POST['password'];
echo "Validatetest.php <br>";
echo "pUser=$pUser pPasswd=$pPasswd<br>";
        $pdo = Database::connect();
//        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql='select * from tictan_users where username="';
        $sql=$sql.$pUser.'"'. ' and password="'. $pPasswd. '"'. ' and profil =0';
/*
		$q = $pdo->prepare($sql);
        $q->execute(array(4));
		
		
		$data = $q->fetch(PDO::FETCH_ASSOC);
	    $username=$data['username'];
	    $password=$data['password'];
		
		  include 'database.php';
                       $pdo = Database::connect();					   

				   $sql = 'select idcontact, companynament, customer_name, firstName_contacts, name_contacts, phone_contacts, mobile_contacts, 
				   email_contacts, town_contacts from vtictan_customers_contacts where is_deleted_contacts=0 order by name_contacts DESC';	
	*/	
                $cpt = 0;	
				foreach ($pdo->query($sql) as $row) {
                    $username=$row['username'];
					$pUser=  $row['password'];
					$profil=    $row['profil'];
				   if ( $username== $pUser and $password==$pPasswd) $cpt=$cpt+1;
				}
				echo "cpr=$cpt <br>";
				if ($cpt <> 1) {
					echo "utilisateur non trouve  <br>";
		            require_once("index_php");		
				}	
				else {
					echo "utilisateur trouve  <br>";
				    $_SESSION['username'] = $pUser; 
                    $_SESSION['Access'] = $pAccess;
					Database::disconnect();	
		            require("index_cust_computers.php");
                    exit;			
				}	 
       
?>
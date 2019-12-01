<?php
session_start();
//include_once 'identification.php';
    $type='networks';
    include 'recuperation_variables.php';
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id '])) {
        $id  = $_REQUEST['id'];
    }
     $id  = $_REQUEST['id'];		
    if ( null==$id  ) {
        header("Location: network_list.php");
    }    
   if ( !empty($_POST)) {
    	require 'checkFields_cust_upd_networks.php';
        if ($valid) {		
        require 'init_fields_upd_networks.php';
        require 'maj_fields_upd_valid_networks.php';
	    } 
    } 
    else {
        require 'maj_fields_upd_else_post_networks.php';
    } 
?>

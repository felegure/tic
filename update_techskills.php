<?php
    require 'database.php';
     echo "ICICIIIIIIIIIIIIIIII <br>";
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index_techskills.php");
    }
	
	  if ( !empty($_POST)) {
      echo "dans POST <br> ";
    	require 'checkFields_skills.php';
		
        // update data
        if ($valid) {		
		echo "valid???????????????????? <br>";
        require 'init_fields_upd_skills.php';
        require 'maj_fields_upd_valid_skills.php';
} 
} 

else {
        require 'maj_fields_upd_else_post_skills.php';
//	

}
	
	    if ( !empty($_POST)) {

		require 'checkFields_skills.php';
//        echo "dans post <br>";
      
	  
	  
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// pas de mise a jour de entities_id et customers_id
            $sql = "UPDATE tictan_tecskills set  staff_id = ?, skill_id = ?, 
			comment = ?, author = ?, date_mod = ?, is_deleted = ? WHERE id = ?";
			
            $q = $pdo->prepare($sql);
            $q->execute(array( $staff_id, $skill_id,  $comment, $author, $date_mod, $is_deleted, $id));
            Database::disconnect();
            header("Location: index_techskills.php");
        }
       
        } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_tecskills where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
 
		$staff_id = $data['staff_id'];
		$name_tech = $data['name_tech'];
		$name = $data['name'];		
		
		$skill_id = $data['skill_id'];
		$comment = $data['comment'];
		$author = $data['author'];
		$date_mod = $data['date_mod'];
		$is_deleted = $data['is_deleted'];  
        Database::disconnect();
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./css/mbcsmbmcp.css" type="text/css" />

	
<title>Update_techskills </title>
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
                    <div class="row">
                        <h3>Modifier une  compétence</h3>
                    </div>          
                    <form class="form-horizontal" action="update_skills.php?id=<?php echo $id?>" method="post">
					<div class="control-group <?php echo !empty($staff_idError)?'error':'';?>">
					      <label class="control-label">Nom Employé</label> 					 
						 <div class="controls">
						    <input name="staff_id2" type="text" readonly="true" size="20" value="<?php echo !empty($name_tech)?$name_tech:'';?>">	 
                            <?php if (!empty($staff_idError)): ?>
                                <span class="help-inline"><?php echo $staff_idError;?></span>
                            <?php endif; ?> 
							<input name="staff_id" type = "hidden" value="<?php echo $staff_id;?>"> 
                         </div>
					    </div> 					   
					   <div class="control-group <?php echo !empty($skill_idError)?'error':'';?>">						   
                       <label class="control-label">Compétence</label>
						 <div class="controls">	 
						 <input name="skill_id_id2" type="text" readonly="true" size="20" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="skill_id" class="skill_id">
						<option value="0">NULL </option>
						<?php 
						$sql=mysqli_query($conn, "SELECT * FROM tictan_skills where is_deleted = 0");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						<input name="skill_id0" type="hidden" value="<?php echo $skill_id;?>">					
                         </div>
					   </div> 	

					  <div class="control-group <?php echo !empty($commentError)?'error':'';?>">
                        <label class="control-label">Zone remarque</label>
                        <div class="controls">
                            <input name="comment" type="text"  placeholder="Remarque" value="<?php echo !empty($comment)?$comment:'';?>">
                            <?php if (!empty($commentError)): ?>
                                <span class="help-inline"><?php echo $commentError;?></span>
                            <?php endif;?>
                        </div>
                      </div>				                        
                      <div class="control-group <?php echo !empty($authorError)?'error':'';?>">
                        <label class="control-label">Modifie par</label>
                        <div class="controls">
                            <input name="author" type="text"  placeholder="Modifié par" value="<?php echo !empty($author)?$author:'';?>">
                            <?php if (!empty($authorError)): ?>
                                <span class="help-inline"><?php echo $authorError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($mod_dateError)?'error':'';?>">
                        <label class="control-label">Modifie le</label>
                        <div class="controls">
                            <input name="mod_date" type="text"  placeholder="Modifié le" value="<?php echo !empty($mod_date)?$mod_date:'';?>">
                            <?php if (!empty($mod_dateError)): ?>
                                <span class="help-inline"><?php echo $mode_dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
					  <div class="control-group <?php echo !empty($is_deletedError)?'error':'';?>">
                        <label class="control-label">Code suppression</label>
                        <div class="controls">
                            <input name="is_deleted" type="text"  placeholder="is_deleted" value="<?php echo !empty($is_deleted)?$is_deleted:'';?>">
                            <?php if (!empty($is_deletedError)): ?>
                                <span class="help-inline"><?php echo $is_deletedError;?></span>
                            <?php endif;?>
                        </div>
                      </div> 
   <div class="form-actions">
				          <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Mise a jour" >					  
                          <a class="btn" href="index_techskills.php">Retour</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
		<SCRIPT language="javascript">	
	function ValidateON()
{
 var m="mon texte"; 
 var confirmation=confirm("Confirmez-vous la modification?"); 
 // alert ("validateOn");
	
 if (confirmation){ 
  //action à faire pour la valeur true 
 alert ("Enregistrement Modifié");

	}
	   
}
</script>
  </body>
</html>			
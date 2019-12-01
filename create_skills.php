<?php
    session_start(); 
// recuperation des variables de ssion pour le passage de parametres d'une forme a une autre
//	$customer_id = $_SESSION["customer_id"];
//	$entities_id = $_SESSION["entities_id"];

//	$companynament = $_SESSION["companynament"];
//  $customer_id = $_SESSION["customer_id"];												
//	$customer_name = $_SESSION["customer_name"] ;


    require 'database.php';
    $pdo = Database::connect();

    if ( !empty($_POST)) {
        // keep track validation errors
			require_once ('checkFields_skills.php');				 
         // insert data
	
         if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tictan_tecskills(staff_id, skill_id, comment,author, mod_date, is_deleted ) 
			values( ?,?, ?, ?, ?, ?)";
			
            $q = $pdo->prepare($sql);
            $q->execute(array( $staff_id, $skill_id, $comment,$author, $mod_date,$is_deleted ));	
            Database::disconnect();			
           header("Location: index_skills.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">    
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Ajouter Compétence/Utilisateur ATT</h3>
                    </div>            
                    <form class="form-horizontal" action="create_skills.php" method="post">  
						<div class="control-group <?php echo !empty($staff_idError)?'error':'';?>">
					     <label class="control-label">Nom </label>
						 <div class="controls">
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="staff_id" class="staff_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, name from tictan_tecstaff WHERE is_deleted = 0 order by id ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						} ?>
						</select>
						</dd>						
                    </div>
				    </div>	
					
					<div class="control-group <?php echo !empty($skill_idError)?'error':'';?>">
					     <label class="control-label">Compétence</label>
						 <div class="controls">
						 <dd>
						 <?php
						$conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
						mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
						?>
						<select name="skill_id" class="skill_id">
						<option  value="0">NULL</option>
						<?php 
						$sql=mysqli_query($conn, "select id, description from tictan_skills WHERE is_deleted = 0 order by description ASC");
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['description'].'</option>';
						} ?>
						</select>
						</dd>						
                    </div>
				    </div>		
						  
					  <div class="control-group <?php echo !empty($commentError)?'error':'';?>">
                        <label class="control-label">Zone remarque</label>
                        <div class="controls">
                            <input name="comment" type="text"  placeholder="Zone commentaire" value="<?php echo !empty($comment)?$comment:'';?>">
                            <?php if (!empty($commentError)): ?>
                                <span class="help-inline"><?php echo $commentError;?></span>
                            <?php endif;?>
                        </div>
                      </div>				                        
                      <div class="control-group <?php echo !empty($authorError)?'error':'';?>">
                        <label class="control-label">Modifie par</label>
                        <div class="controls">
                            <input name="author" type="text"  placeholder="Modifie par" value="<?php echo !empty($author)?$author:'';?>">
                            <?php if (!empty($authorError)): ?>
                                <span class="help-inline"><?php echo $authorError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($date_modError)?'error':'';?>">
                        <label class="control-label">Modifie le</label>
                        <div class="controls">
                            <input name="mod_date" type="text"  placeholder="Modifie le" value="<?php echo !empty($mod_date)?$mod_date:'';?>">
                            <?php if (!empty($mod_dateError)): ?>
                                <span class="help-inline"><?php echo $mod_dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>	
					
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Ajouter</button>
                          <a class="btn" href="index_skills.php">Retour</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->  </body>
</html>

<?php
echo "maj_fields_upd_else_post_skills.php <br>";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_tecskills where id=".$id;
		echo "sql=$sql <br>";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$name_tech = $data['name_tech'];
		$name = $data['name'];
		$skill_id = $data['skill_id'];
		$comment=$data['comment'];
		$author=$data['author'];
		$date_mod=$data['date_mod'];
		$is_deleted=$data['is_deleted'];		
echo "name=$name, name_tech=$name_tech <br> ";
?>
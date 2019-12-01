<?php

    require_once("./menu.php");

    $menu = affiche_menu();

?>

<html>

<head>

    <link href="design.css" type="text/css" rel="stylesheet" />

</head>

<body>

<?php

    echo $menu;

?>

</body>

</html>
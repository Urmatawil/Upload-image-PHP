<?php
include_once "conex.php";
$consulta = "select cst_key, line from imgupload";
$items = $conn->prepare($consulta, [
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);

$items->execute();
?>

<!--Aqui va el código para mostrar-->

<h1>Datos de BD</h1>
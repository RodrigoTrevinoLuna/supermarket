<?php 
    include_once "bd.php";
    $idProducto = $_POST["id"];


    $sentencia = $base_de_datos->prepare("DELETE FROM productos WHERE id = ?;");
$resultado = $sentencia->execute([$idProducto]);
if($resultado === TRUE){
	header("Location: ../producto.php");
	exit;
}
else echo "Algo salió mal";

?>
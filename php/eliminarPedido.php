<?php 
    include_once "bd.php";
    $id = $_POST["id"];


    $sentencia = $base_de_datos->prepare("DELETE FROM pedidos WHERE id_pedido = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE){
	header("Location: ../pedidos.php");
	exit;
}
else echo "Algo salió mal";

?>
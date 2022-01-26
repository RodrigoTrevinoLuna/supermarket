<?php 
    include_once "bd.php";
    $id = $_POST["id"];
    $pedir = $_POST["pedir"];
    $id_producto = $_POST["id_producto"];
    

    $sentencia = $base_de_datos->prepare("UPDATE pedidos SET  pedir= ?, id_productos= ? WHERE id = ?;");
    $resultado = $sentencia->execute([$pedir,$id_producto, $id]);

if($resultado === TRUE){
	header("Location: ../pedidos.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";

?>
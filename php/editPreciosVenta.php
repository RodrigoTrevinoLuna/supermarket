<?php 
    include_once "bd.php";
    $id = $_POST["id"];
    $precioVenta = $_POST["precioVenta"];

    $sentencia = $base_de_datos->prepare("UPDATE productos SET  precioVenta= ? WHERE id = ?;");
    $resultado = $sentencia->execute([$precioVenta, $id]);

if($resultado === TRUE){
	header("Location: ../puntoVenta.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";

?>
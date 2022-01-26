<?php 
    include_once "bd.php";
    $id_proveedor = $_POST["id"];


    $sentencia = $base_de_datos->prepare("DELETE FROM proveedores WHERE id_proveedor = ?;");
$resultado = $sentencia->execute([$id_proveedor]);
if($resultado === TRUE){
	header("Location: ../proveedores.php");
	exit;
}
else echo "Algo salió mal";

?>
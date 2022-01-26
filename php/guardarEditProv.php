<?php 
    include_once "bd.php";
    $id_provedoor = $_POST["id"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $tel = $_POST["tel"];
    $rfc = $_POST["rfc"];
    $direccion = $_POST["direccion"];





    $sentencia = $base_de_datos->prepare("UPDATE proveedores SET  nombre= ?, direccion = ?, rfc = ?, correo = ?, telefono = ? WHERE id_proveedor = ?;");
    $resultado = $sentencia->execute([$nombre, $direccion, $rfc, $correo, $tel, $id_provedoor]);

if($resultado === TRUE){
	header("Location: ../proveedores.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>
<?php 
    include_once "bd.php";
    $id = $_POST["id"];
    $clave = $_POST["clave"];
    $item = $_POST["item"];
    $proveedor = $_POST["proveedor"];

    $sentencia = $base_de_datos->prepare("UPDATE productos SET  codigo= ?,item= ?,id_proveedor= ? WHERE id = ?;");
    $resultado = $sentencia->execute([$clave,$item,$proveedor ,$id]);

if($resultado === TRUE){
	header("Location: ../producto.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";

?>
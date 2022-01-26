<?php 
    include_once "bd.php";
    $clave = $_POST["clave"];
    $item = $_POST["item"];
    $proveedor = $_POST["proveedor"];

    
    $sentencia = $base_de_datos->prepare("INSERT INTO productos(codigo, item, id_proveedor) VALUES (?,?,?)");
    $resultado = $sentencia->execute([$clave, $item, $proveedor]);

    if($resultado === TRUE){
        header("Location: ../producto.php");
        exit;
    }
    else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";

?>
<?php 
include_once "bd.php";
$idpedido = $_POST["idpedido"];
$idProducto = $_POST["idProducto"];
$importe = $_POST["importe"];
$unidadesPedidas = $_POST["unidadesPedidas"];

//Borrar el pedido de la base de datos 
// update el precioCompra y sumar el pedido + stock 

    $sentencia = $base_de_datos->prepare("UPDATE productos SET  precioCompra= precioCompra + ?, stock= stock + ? WHERE id = ?;");
    $resultado = $sentencia->execute([$importe,$unidadesPedidas,$idProducto]);

    if($resultado === TRUE){

        
        $sentenciaD = $base_de_datos->prepare("DELETE FROM pedidos WHERE id_pedido = ?;");
        $resultadoD = $sentenciaD->execute([$idpedido]);
        if($resultadoD === TRUE){
            header("Location: ../inventario.php");
            exit;
        }
        
    }
    else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
    
?>
<?php 
    include_once "bd.php";
    $id = $_POST["id"];
    $pedir = $_POST["pedir"];
    date_default_timezone_set("America/Monterrey");
    $hoy = date("Y-m-d H:i:s");

    $sentencia = $base_de_datos->prepare("INSERT INTO pedidos(pedir, id_productos, fecha) VALUES (?,?,?)");
    $resultado = $sentencia->execute([$pedir, $id, $hoy]);

    if($resultado === TRUE){
        header("Location: ../pedidos.php");
        exit;
    }
    else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";

?>
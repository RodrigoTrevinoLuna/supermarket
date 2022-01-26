<?php 
include_once "bd.php";

    $usuario = $_POST["usuario"];
    $nivelacceso = $_POST["nivelacceso"];

    $sentencia = $base_de_datos->prepare("INSERT INTO permisos(id_usuario, nivel_acceso) VALUES (?,?)");
    $resultado = $sentencia->execute([$usuario, $nivelacceso]);

    if($resultado === TRUE){
        header("Location: ../administracion.php");
        exit;
    }
    else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>



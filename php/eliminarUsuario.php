<?php 
    include_once "bd.php";
    $id_usuario = $_POST["id_usuario"];


    $sentencia = $base_de_datos->prepare("DELETE FROM usuarios WHERE id_usuario = ?;");
$resultado = $sentencia->execute([$id_usuario]);
if($resultado === TRUE){
	header("Location: ../usuarios.php");
	exit;
}
else echo "Algo salió mal";

?>
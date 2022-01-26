<?php 
    include_once "bd.php";
    $id_usuario = $_POST["id_usuario"];
    $nombre = $_POST["nombre"];
    $apelidoP = $_POST["apellidoP"];
    $apelidoM = $_POST["apellidoM"];
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $correo = $_POST["correo"];
    $tel = $_POST["tel"];
    $direccion = $_POST["direccion"];
    $nivelacceso = $_POST["nivelacceso"];





    $sentencia = $base_de_datos->prepare("UPDATE usuarios SET  nombre= ?, apellidoP = ?, apellidoM = ?, usuario = ?, password = ?, correo = ?, telefono = ?, direccion = ?, Permiso = ? WHERE id_usuario = ?;");
    $resultado = $sentencia->execute([$nombre, $apelidoP, $apelidoM, $usuario, $password, $correo, $tel, $direccion, $nivelacceso, $id_usuario]);

if($resultado === TRUE){
	header("Location: ../usuarios.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>
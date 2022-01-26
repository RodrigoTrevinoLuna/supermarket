<?php 
include_once "bd.php";

    $nombre = $_POST["nombre"];
    $rfc = $_POST["rfc"];
    $correo = $_POST["correo"];
    $tel = $_POST["tel"];
    $direccion = $_POST["direccion"];

    $con=mysqli_connect("localhost","root","","tienda-proyecto");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
      }
      $sql = "SELECT count(*) as contar FROM proveedores WHERE nombre= '$nombre' ";
      $result = mysqli_query($con,$sql);
      $fila = mysqli_fetch_array($result);
      
      if($fila['contar']>0){
        header("location: ../proveedores.php?status=9");
      }else{
        $sentencia = $base_de_datos->prepare("INSERT INTO proveedores(nombre, direccion, rfc, correo, telefono) VALUES (?,?,?,?,?)");
        $resultado = $sentencia->execute([$nombre, $direccion, $rfc, $correo, $tel]);
    
        if($resultado === TRUE){
            header("Location: ../proveedores.php?status=8");
            exit;
        }
        else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
      }


    
    
?>



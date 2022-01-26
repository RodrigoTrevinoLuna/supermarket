<?php
          $user = "root";
           $password = "";
           $server = "localhost";
           $BD = "tienda-proyecto";


    session_start();
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
       
           
    $conexion = mysqli_connect  ($server,$user,"") or die ("Error con el servidor de la Base de datos");        
    $db = mysqli_select_db($conexion, $BD) or die ("Error conexion al conectarse a la Base de datos");



    $q = "SELECT COUNT(*) as contar FROM usuarios WHERE usuario = '$usuario' and password = '$password'";
    $consulta = mysqli_query($conexion,$q);
    $array = mysqli_fetch_array($consulta);


    if($array['contar']>0){
        $c = "SELECT * FROM usuarios WHERE usuario = '$usuario' and password = '$password'";
        $con = mysqli_query($conexion,$c);
        $fila = mysqli_fetch_array($con);

        $_SESSION["permiso"]= $fila["Permiso"];
        
        
        header("location: ../cajero.php");
        
     }else{ 
        header("Location: ../index.php?status=2");
                
    }
        

    
    
  
?>

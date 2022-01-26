<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- css Personalizados-->
    <link rel="stylesheet" href="css/Tipografias.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- tipo de letra-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>Login</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  </head>
  <body>
    <br>
    <div class="container">
      
        <div class="row ">
          
            <div class="col-7"><img class="col"
              src="imagenes/logo-tienda.png" class=" border border-dark " alt="Logo tienda" ></div>
            
            <div class="col p-4"  style="background: #002973">
                <br>
                
                <br>
                <?php
                                        if(isset($_GET["status"])){
                                            if($_GET["status"] === "1"){
                                                ?>
                                                    <div class="alerta-container">
                                                        <div class="alert-danger">
                                                        <strong>Alerta</strong> Primero Inicia Sesión
                                                        </div>
                                                    </div>
                                           <?php } if($_GET["status"] === "2"){
                                              ?>
                                                    <div class="alerta-container">
                                                        <div class="alert-danger">
                                                        <strong>Alerta</strong> Datos Incorrectos
                                                        </div>
                                                    </div>
                                           <?php } }?>
                    <h1 class="text-light text-center" id="a">Inicio Sesión</h1>
                    
                    <hr style="background-color: white;">
                    <hr style="background-color: white;">
                    
                    
                <form action="php/login.php" method="POST" class="p-2" >
                    <label class="p-1 text-light col"><h4>Usuario</h4><input type="text" class="col" name="usuario" id="txtUsuario" required></label>
                    <br><br>
                    <label class="p-1 text-light col"><h4>Password</h4><input type="password" class="col bn-3" name="password" id="txtPassword" required></label>
                    <small class="form-text text-light text-justify p-1" id="TXT">La contraseña debe tener entre 8 y 20 caracteres, contener letras y números, y no debe contener espacios, caracteres especiales ni emojis.</small>
                    <br>
                   
                    <hr style="background-color: white;">
                    <hr style="background-color: white;">
                    <button type="submit" class="col btn btn-danger p-2"> Aceptar</button>
                   
                </form>
             
            </div>
          </div>
        
    </div> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!--
<div class="login-box">
     <img src="" class="avatar" alt="Avatar Image">
      <h1>Inicio Sesion</h1>
      <form action="cajero.html">
        USERNAME INPUT 
        <label for="username">Usuario</label>
        <input type="text" placeholder="Intrudcir su nombre de usuario">
        PASSWORD INPUT 
        <label for="password">Password</label>
        <input type="password" placeholder="Intrudcir su password">
        <input type="submit" value="Iniciar sesion">
        <a href="#">Lost your Password?</a><br>
        <a href="#">Don't have An account?</a>
-->
   
      </form>
    </div>
  </body>
</html>
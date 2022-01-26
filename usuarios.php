<?php 
    session_start();
 if(!isset($_SESSION["permiso"])){
    header("Location: index.php?status=1");
 }else if($_SESSION["permiso"] != "Administrador"){
    header("Location: cajero.php?status=10");
 }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <!-- Importar estilos de la plantilla-->
    <link rel="stylesheet" href="css/contenido.css">


    <!-- Crear Estilos Ventana nueva con el nombre del archivo html (nameArchivoHtml.css)
        ejemplo-->
         
    
        <link rel="stylesheet" href="css/Usuarios.css">
        <link rel="stylesheet" href="css/modal.css">
        <link rel="stylesheet" href="css/status.css">
       
        
</head>
<body>
    <div class="container">
         <!-- INICIO MENUBAR-->
                        <div class="menuBar">
                                        
                            <ul class="principal" >
                                <!--Ventas-->
                                <a href="cajero.php"><img src="imagenes/iconos/caja-registradora.png"><P>Caja</P></a>
                                <a href="puntoVenta.php"><img src="imagenes/iconos/Punto-de-Venta.png"><P>Punto de Venta</P></a>
                                <hr>
                                <!--Stock-->
                                <a href="inventario.php"><img src="imagenes/iconos/inventario.png"><P>Inventario</P></a>
                                <a href="producto.php"><img src="imagenes/iconos/producto.png"><P>Producto</P></a>
                                <a href="pedidos.php"><img src="imagenes/iconos/pedidos.png"><P>Pedidos</P></a>
                                
                                <a href="salida.php"><img src="imagenes/iconos/salida.png"><P>Salidas</P></a>
                                <hr>
                                <!---->
                                <a href="usuarios.php"><img src="imagenes/iconos/usuarios.png"><P>Usuarios</P></a>
                                <a href="proveedores.php"><img src="imagenes/iconos/Proveedor.png"><P>Proveedores</P></a>
                                <hr>
                                <!---->
                               
                            </ul>
                            <ul class="secundario">
                            <a href="php/cerrarSesion.php"><img src="imagenes/iconos/salida.png"><P>Cerrar sesión</P></a>
                            </ul>
                    
                </div>
                <!-- FIN MENUBAR -->
<!--************************************************************************************************************************************************************-->
                <!-- INICIO DE LOS ELEMENTOS A LA DERECHA DEL MENUBAR-->
                <div class="contenedor-secundario">
                    
                    <!--Nota 1 => aquí se agregaran los elementos de la pantalla-->
                    <!--Nota 2 => Si quieres agregar mas elementos a la derecha del menuBar solo pon div
                        Ejemplo: En este caso hay dos elementos alado del menuBars    
                        <div class="columna-1"> {Aqui escribe el codigo} </div>
                        <div class="columna-2"> {Aqui escribe el codigo} </div>
                    -->

                    <div class="columna-1" >
                        <!--Etiqueta para agregar el titulo No mover-->
                        <div class="div-titulo">
                            <h2 class="titulo">Usuarios</h2>
                        </div>
                       
                            <form method="post" action="php/registroUsuario.php">
                                <div class="form-registro">
                                    <h2>Registro de Usuarios</h2>
                                </div>
                                <?php 
                                        if(isset($_GET["status"])){
                                            if($_GET["status"]=== "9"){ ?>
                                                <div class="alerta-container">
                                                        <div class="alert-warning">
                                                        <strong>¡Alerta!</strong> Ya existe este Usuario
                                                        </div>
                                                    </div>    
                                            <?php } else if($_GET["status"]==="8"){ ?>
                                                         <div class="alerta-container">
                                                         <div class="alert-success">
                                                         <strong>¡Genial!</strong> Se Guardaron Correctamente los datos
                                                         </div>
                                                     </div>  
                                            <?php }} ?>
                                <div class="form">
                                        <div class="seccion1">
                                            
                                            <div><label>Nombre<input required  type="text" placeholder="Ingrese su Nombre" name="nombre"></label></div>
                                            <div><label>Usuario<input required  type="text" placeholder="Ingrese su Correo" name="usuario"></label></div>
                                                <div><label>Correo<input required  type="text" placeholder="Ingrese su Nombre" name="correo"></label></div>
                                        </div>
                                        <div class="seccion2" >
                                                
                                            <div><label>Apellido Paterno<input required type="text" placeholder="Ingrese su Apellido" name="apellidoP"></label></div>
                                            <div><label>Contraseña<input required type="password" placeholder="Ingrese contraseña" name="password"></label></div>
                                                <div><label>Telefono<input required type="text" placeholder="Ingrese Telefono" name="tel"></label></div>
                                            
                                        </div>
                                        <div class="seccion3" >
                                            <label>Apellido Materno<input required type="text" placeholder="Ingrese su Apellido" name="apellidoM"></label>
                                            <label>Direccion<input required type="text" placeholder="Ingrese su Direccion" name="direccion"></label>
                                            <label>Nivel de Acceso<select name="nivelacceso" required>
                                                <option selected="true" disabled="disabled">Seleccione uno</option>
                                                <option value="Empleado">Empleado</option>
                                                <option value="Administrador">Administrador</option>
                                            </select></label>
                                        </div>
                            </div>
                                <button type="submit">Registrar</button>
                            </form>
                        
                        
                            <div class="datos">
                            <!--Apartir de aqui abajo ya puedes escribir codigo -->
                            <?php
                                include_once "php/bd.php";
                                $sentencia = $base_de_datos->query("SELECT * FROM usuarios;");
                                $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
                            ?>

                            <table>
                                <thead>
                                    <tr>
                                        <th class="cla">Clave</th>
                                        <th class="dat">Nombre</th>
                                        <th class="dat">Apellido Paterno</th>
                                        <th class="dat">Apellido Materno</th>
                                        <th class="dat">Usuario</th>
                                        <th class="dat">Contraseña</th>
                                        <th class="nameP">Correo Electronico</th>
                                        <th class="nameP">Telefono</th>
                                        <th class="nameP">Direccion</th>
                                        <th class="nameP">Permisos</th>
                                        <th class="dat">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($usuarios as $usuario){ ?>
                                        
                                    <tr>
                                        <td><?php echo $usuario->id_usuario ?></td>
                                        <td><?php echo $usuario->nombre ?></td>
                                        <td><?php echo $usuario->apellidoP ?></td>
                                        <td><?php echo $usuario->apellidoM ?></td>
                                        <td><?php echo $usuario->usuario ?></td>
                                        <td><?php echo $usuario->password ?></td>
                                        <td><?php echo $usuario->correo ?></td>
                                        <td><?php echo $usuario->telefono ?></td>
                                        <td ><?php echo $usuario->direccion ?></td>
                                        <td ><?php echo $usuario->Permiso ?></td>
                                        <td class="accion" ><a href="#" style="text-decoration:none" type="button" data-open="modal1<?php echo $usuario->id_usuario ?>">Editar</a><a href="#" style="text-decoration:none" type="button" data-open="modaleliminar<?php echo $usuario->id_usuario ?>">Eliminar</a></td>
                                    </tr>

                                    <!--Modal Editar usuario-->
                                    <div class="modal" id="modal1<?php echo $usuario->id_usuario ?>" data-animation="slideInOutLeft">
                                            <div class="modal-dialog">
                                                
                                                <header class="modal-header">
                                                    <h3 style="text-align: center; width: 100%;">Editar Datos de Usuario</h3>
                                                
                                                <button class="close-modal btn-modal" aria-label="close modal" data-close>
                                                            <p>X</p> 
                                                </button>
                                                </header>
                                                <form class="modal-form" method="POST" action="php/editarGuardar.php">
                                                <section class="modal-content">
                                                    
                                                    <!--INICIO DEL Formulario-->
                                                            <div><label>Clave</label><input  type="text" value="<?php echo $usuario->id_usuario ?>" name="id_usuario" readonly></div>
                                                            <div><label>Nombre</label><input  type="text" value="<?php echo $usuario->nombre ?>" name="nombre"></div>
                                                            <div><label>Usuario</label><input  type="text" value="<?php echo $usuario->usuario ?>" name="usuario"></div>
                                                            <div><label>Correo</label><input  type="text" value="<?php echo $usuario->correo ?>" name="correo"></div>
                                                            <div><label>Apellido Paterno</label><input type="text" value="<?php echo $usuario->apellidoP ?>" name="apellidoP"></div>
                                                            <div><label>Contraseña</label><input type="text" value="<?php echo $usuario->password ?>" name="password"></div>
                                                            <div><label>Telefono</label><input type="text" value="<?php echo $usuario->telefono ?>" name="tel"></div>
                                                            <div><label>Apellido Materno</label><input type="text"  value="<?php echo $usuario->apellidoM ?>" name="apellidoM"></div>
                                                            <div><label>Nivel de Acceso</label><select name="nivelacceso">
                                                                    <option selected="true"><?php echo $usuario->Permiso ?></option>
                                                                    <option value="Empleado">Empleado</option>
                                                                    <option value="Administrador">Administrador</option>
                                                                    </select></div>
                                                            <div><label>Direccion</label><textarea type="text"  name="direccion"><?php echo $usuario->direccion ?></textarea></div>
                                                    <!--Fin del Formulario-->
                                                </section>
                                                <footer class="modal-footer">
                                                <button >Guardar</button>
                                                </footer>
                                                </form>
                                            </div>
                                            </div><!-- FIN DELModal Editar usuario-->

                                            <!--Modal ELIMINAR usuario-->
                                    <div class="modal" id="modaleliminar<?php echo $usuario->id_usuario ?>" data-animation="slideInOutLeft">
                                            <div class="modal-dialog">
                                                
                                                <header class="modal-header">
                                                    <h3 style="text-align: center; width: 100%;">ELIMINAR Datos de Usuario</h3>
                                                
                                                <button class="close-modal btn-modal" aria-label="close modal" data-close>
                                                    <p>X</p>  
                                                </button>
                                                </header>
                                                <form class="modal-form"method="POST" action="php/eliminarUsuario.php">
                                                <section class="modal-content">
                                                    <p>¿Estas seguro que deseas Eliminar a este usuario?</p>
                                                    <!--INICIO DEL Formulario-->
                                                            <div><label>Clave</label><input  type="text" value="<?php echo $usuario->id_usuario ?>" name="id_usuario" readonly></div>
                                                            <div><label>Nombre</label><input  type="text" value="<?php echo $usuario->nombre ?>" name="nombre" readonly></div>
                                                            <div><label>Usuario</label><input  type="text" value="<?php echo $usuario->usuario ?>" name="usuario" readonly></div>
                                                            <div><label>Correo</label><input  type="text" value="<?php echo $usuario->correo ?>" name="correo" readonly></div>
                                                            <div><label>Apellido Paterno</label><input type="text" value="<?php echo $usuario->apellidoP ?>" name="apellidoP" readonly></div>
                                                            <div><label>Contraseña</label><input type="text" value="<?php echo $usuario->password ?>" name="password" readonly></div>
                                                            <div><label>Telefono</label><input type="text" value="<?php echo $usuario->telefono ?>" name="tel" readonly></div>
                                                            <div><label>Apellido Materno</label><input type="text"  value="<?php echo $usuario->apellidoM ?>" name="apellidoM" readonly></div>
                                                            <div><label>Nivel Acceso</label><input type="text"  value="<?php echo $usuario->Permiso ?>" name="apellidoM" readonly></div>
                                                            <div><label>Direccion</label><textarea type="text"  name="direccion" readonly><?php echo $usuario->direccion ?></textarea></div>
                                                    <!--Fin del Formulario-->
                                                </section>
                                                <footer class="modal-footer" style="text-align: right;">
                                                <button style="width: max-content;">Eliminar</button>
                                                </footer>
                                                </form>
                                            </div>
                                            </div><!-- FIN DELModal ELIMINAR usuario-->    

                                    <?php } ?>

                                    <!--NO BORRAR-->
                                    <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                </tbody>
                                
                            </table>
                        </div><!--Cierre de div datos-->
                        
                
                    <!--Aqui agregar si queires mas columnaas-->
                </div>
    </div> <!--final DIV container-->





   





 





<script src="JS/modal.js"></script>
</body>
</html>
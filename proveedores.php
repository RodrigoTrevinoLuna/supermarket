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
    <title>Proveedores</title>
    <!-- Importar estilos de la plantilla-->
    <link rel="stylesheet" href="css/contenido.css">


    <!-- Crear Estilos Ventana nueva con el nombre del archivo html (nameArchivoHtml.css)
        ejemplo-->
        <link rel="stylesheet" href="css/Proveedor.css">
        <link rel="stylesheet" href="css/modal.css">
        <link rel="stylesheet" href="css/status.css">
</head>
<body>
    <div class="container">
         <!-- INICIO MENUBAR-->
                        <div class="menuBar" >
                                        
                            <ul class="principal">
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

                    <div class="columna-1" >
                        <!--Etiqueta para agregar  el titulo No mover-->
                        <div class="div-titulo">
                            <h2 class="titulo">Proveedores</h2>
                        </div>

                        <form method="POST" action="php/guardarProveedor.php">
                            <div class="form-registro">
                                <h2>Registro de Proveedores</h2>
                            </div>
                            <?php 
                                        if(isset($_GET["status"])){
                                            if($_GET["status"]=== "9"){ ?>
                                                <div class="alerta-container">
                                                        <div class="alert-warning">
                                                        <strong>¡Alerta!</strong> Ya existe este Proveedor
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
                                        <div><label>Nombre de Proveedor:<input class="textbox" type="text" placeholder="Ingrese Nombre" name="nombre" required></label></div>
                                        <div><label>Correo Electronico <input class="textbox" type="email" placeholder="Ingrese Correo" name="correo" required></label></div>
                                    </div>

                                    <div class="seccion2" >  
                                        <div><label>Dirección<input class="textbox" type="text" placeholder="Ingrese Direccion" name="direccion" required></label></div>
                                        <div><label>Telefono<input class="textbox" type="tel" placeholder="Ingrese Telefono" name="tel" required></label></div>
                                    </div>

                                    <div class="seccion3" >
                                         <div> <label>RFC<input class="textbox" type="text" placeholder="Ingrese RFC" name="rfc" required></label></div>
                                    </div>
                                   
                            </div>
                            <div class="boton">
                                 <button type="submit">Registrar</button>
                            </div>
                        </form>
                        
                        <div class="datos">
                            <!--Apartir de aqui abajo ya puedes escribir codigo -->
                            <?php
                                include_once "php/bd.php";
                                $sentencia = $base_de_datos->query("SELECT * FROM proveedores;");
                                $proveedores = $sentencia->fetchAll(PDO::FETCH_OBJ);
                            ?>
                                <table>
                                    <thead>
                                        <tr class="Item">
                                            <th class="cla">Clave</th>
                                            <th class="nameP">Nombre del Proveedor</th>
                                            <th class="nameP">Direccion</th>
                                            <th class="dat">RFC</th>
                                            <th class="dat">Correo Electronico</th>
                                            
                                            <th class="dat">Telefono</th>
                                            <th class="dat">Opcion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($proveedores as $proveedor){ ?>
                                        <tr>
                                            <td class="P"><?php echo $proveedor->id_proveedor?></td>
                                            <td><?php echo $proveedor->nombre?></td>
                                            <td><?php echo $proveedor->direccion?></td>
                                            <td><?php echo $proveedor->rfc?></td>
                                            <td><?php echo $proveedor->correo?></td>
                                            <td><?php echo $proveedor->telefono?></td>
                                            <td class="accion" ><a href="#" style="text-decoration:none" type="button" data-open="modal1<?php echo $proveedor->id_proveedor ?>">Editar</a><a href="#" style="text-decoration:none" type="button" data-open="modaleliminar<?php echo $proveedor->id_proveedor ?>">Eliminar</a></td>                                           
                                        </tr>

                                         <!--Modal Editar usuario-->
                                    <div class="modal" id="modal1<?php echo $proveedor->id_proveedor ?>" data-animation="slideInOutLeft">
                                            <div class="modal-dialog">
                                                
                                                <header class="modal-header">
                                                    <h3 style="text-align: center; width: 100%;">Editar Datos del Proveedor</h3>
                                                
                                                <button class="close-modal btn-modal" aria-label="close modal" data-close>
                                                            <p>X</p> 
                                                </button>
                                                </header>
                                                <form class="modal-form" method="POST" action="php/guardarEditProv.php">
                                                <section class="modal-content">
                                                    
                                                    <!--INICIO DEL Formulario-->
                                                            <div><label>Clave</label><input  type="text" value="<?php echo $proveedor->id_proveedor?>" name="id" readonly></div>
                                                            <div><label>Nombre</label><input  type="text" value="<?php echo $proveedor->nombre?>" name="nombre" ></div>
                                                            <div><label>Direccion</label><textarea type="text"  name="direccion" ><?php echo $proveedor->direccion ?></textarea></div>
                                                            <div><label>RFC</label><input  type="text" value="<?php echo $proveedor->rfc ?>" name="rfc" ></div>
                                                            <div><label>Correo</label><input type="text" value="<?php echo $proveedor->correo ?>" name="correo" ></div>
                                                            <div><label>Telefono</label><input type="text" value="<?php echo $proveedor->telefono ?>" name="tel" ></div>
                                                    <!--Fin del Formulario-->
                                                </section>
                                                <footer class="modal-footer">
                                                <button >Guardar</button>
                                                </footer>
                                                </form>
                                            </div>
                                            </div><!-- FIN DELModal Editar usuario-->

                                            <!--Modal ELIMINAR usuario-->
                                    <div class="modal" id="modaleliminar<?php echo $proveedor->id_proveedor ?>" data-animation="slideInOutLeft">
                                            <div class="modal-dialog">
                                                
                                                <header class="modal-header">
                                                    <h3 style="text-align: center; width: 100%;">ELIMINAR Datos del Proveedor</h3>
                                                
                                                <button class="close-modal btn-modal" aria-label="close modal" data-close>
                                                    <p>X</p>  
                                                </button>
                                                </header>
                                                <form class="modal-form"method="POST" action="php/eliminarProveedor.php">
                                                <section class="modal-content">
                                                    <p>¿Estas seguro que deseas Eliminar a este Proveedor?</p>
                                                    <!--INICIO DEL Formulario-->
                                                            <div><label>Clave</label><input  type="text" value="<?php echo $proveedor->id_proveedor ?>" name="id" readonly></div>
                                                            <div><label>Nombre</label><input  type="text" value="<?php echo $proveedor->nombre ?>" name="nombre" readonly></div>
                                                            <div><label>Direccion</label><textarea type="text"  name="direccion" readonly><?php echo $proveedor->direccion ?></textarea></div>
                                                            <div><label>RFC</label><input  type="text" value="<?php echo $proveedor->rfc ?>" name="rfc" readonly></div>
                                                            <div><label>Correo</label><input type="text" value="<?php echo $proveedor->correo ?>" name="correo" readonly></div>
                                                            <div><label>Telefono</label><input type="text" value="<?php echo $proveedor->telefono ?>" name="telefono" readonly></div>
                                                            
                                                            
                                                    <!--Fin del Formulario-->
                                                </section>
                                                <footer class="modal-footer" style="text-align: right;">
                                                <button style="width: max-content;">Eliminar</button>
                                                </footer>
                                                </form>
                                            </div>
                                            </div><!-- FIN DELModal ELIMINAR usuario-->    

                                        <?php } ?>
                                       
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div><!--Cierre de div datos-->
                        
                    
                    <!--Aqui agregar si queires mas columnaas-->
    </div> <!--final DIV container-->
    <script src="JS/modal.js"></script>
</body>
</html>
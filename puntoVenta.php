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
    <title>Punto de Venta</title>
    <!-- Importar estilos de la plantilla-->
    <link rel="stylesheet" href="css/contenido.css">


    <!-- Crear Estilos Ventana nueva con el nombre del archivo html (nameArchivoHtml.css)
        ejemplo-->
        <link rel="stylesheet" href="css/puntoVenta.css">
        <link rel="stylesheet" href="css/modal.css">
    
</head>
<body>
    <div class="container">
         <!-- INICIO MENUBAR-->
                        <div class="menuBar">
                                        
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
                    
                    <!--Nota 1 => aquí se agregaran los elementos de la pantalla-->
                    <!--Nota 2 => Si quieres agregar mas elementos a la derecha del menuBar solo pon div
                        Ejemplo: En este caso hay dos elementos alado del menuBars    
                        <div class="columna-1"> {Aqui escribe el codigo} </div>
                        <div class="columna-2"> {Aqui escribe el codigo} </div>
                    -->

                    <div class="columna-1" >
                        <!--Etiqueta para agregar el titulo No mover-->
                        <div class="div-titulo">
                            <h2 class="titulo"> Punto de Venta</h2>
                        </div>
                        <div class="datos">
                            <!--Apartir de aqui abajo ya puedes escribir codigo -->
                            <h1 class="titulo-pedidos">Producto en Venta</h1>
                            <br>
                            <div class="buscar">
                                <div><label class="text-light">Buscar:</label><input type="text" name="search" id="search"></div>
                            </div>
                            <div class="tabla my-custom-scrollbar table-wrapper-scroll-y">
                            <?php
                                include_once "php/bd.php";
                                $sentencia = $base_de_datos->query("SELECT * FROM productos where not precioVenta=0");
                                $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
                            ?>
                                <table id="mytable" >
                                    <thead>
                                    
                                        <tr>
                                            <td class="nameP">CLAVE</td>
                                            <td class="unidadI">ITEM</td>
                                            <td class="unidadN">PRECIO VENTA</td>
                                            
                                            <td class="unidadN">ACCIÓN</td>
                                            
                                            
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    <?php foreach($productos as $producto){ ?>
                                        <tr class="fila" id="buscarTR">
                                            <td ><?php echo $producto->codigo ?></td>
                                            <td class="P"><?php echo $producto->item ?></td>
                                            <td ><?php echo $producto->precioVenta ?></td>
                                            
                                            <td class="accion"><a href="#" style="text-decoration:none" type="button" data-open="modal1<?php echo $producto->id ?>">Editar</a></td>
                                        </tr>
                                        <!--Modal Editar usuario-->
                                    <div class="modal" id="modal1<?php echo $producto->id ?>" data-animation="slideInOutLeft">
                                            <div class="modal-dialog">
                                                
                                                <header class="modal-header">
                                                    <h3 style="text-align: center; width: 100%;">Editar Precios</h3>
                                                
                                                <button class="close-modal btn-modal" aria-label="close modal" data-close>
                                                            <p>X</p> 
                                                </button>
                                                </header>
                                                <form class="modal-form" method="POST" action="php/editPreciosVenta.php">
                                                <section class="modal-content">
                                                    
                                                    <!--INICIO DEL Formulario-->
                                                            <input  type="text" value="<?php echo $producto->id ?>" name="id" style="visibility:hidden" >
                                                            <div><label>Clave</label><input  type="text" value="<?php echo $producto->codigo?>" name="nombre" readonly></div>
                                                            <div><label>Item</label><input  type="text" value="<?php echo $producto->item ?>"  readonly></div>
                                                            <div><label>Precio Venta</label><input  type="number" min="1" value="<?php echo $producto->precioVenta ?>" name="precioVenta"></div>
                                                            
                                                            
                                                    <!--Fin del Formulario-->
                                                </section>
                                                <footer class="modal-footer">
                                                <button >Guardar</button>
                                                </footer>
                                                </form>
                                            </div>
                                            </div><!-- FIN DELModal Editar usuario-->

                                            
                                        <?php } ?>
                                        <!--No borrar-->
                                        <tr><td></td><td></td><td></td></td><td class="accion"></td></tr>
                                    </tbody>
                                </table>
                        </div>
                            </div><!--Cierre de div datos-->
                    </div>
                    <div class="columna-2">
                        <section class="titulo-form">
                            <h1 class="titulo-pedidos">Registrar Precios</h1>
                            <img  src="imagenes/precios.png">
                        </section>
                        <form action="php/newPrecios.php" method="POST">
                            
                            <div>
                                <label>Item</label><section>:</section>
                                <select name="id">
                                    <optgroup label="Sin Precio Venta">
                                    <option selected="true" disabled="disabled">Seleccione uno</option>
                                    <?php 
                                     $sentenciaA = $base_de_datos->query("SELECT * FROM productos WHERE  precioVenta=0 AND stock>0");
                                     $productosA = $sentenciaA->fetchAll(PDO::FETCH_OBJ);
                                    foreach($productosA as $productoA){ 
                                        ?>
                                        <option value="<?php echo $productoA->id ?>"><?php echo $productoA->item ?></option>
                                        <?php } ?>
                                    </optgroup>
                                    
                                </select>
                            </div>
                            <div class="division-txt">
                                <hr>
                                <p class="txt-infor">Información del Producto</p>
                                <hr>
                            </div>
                        
                            <div>
                                <label>PrecioVenta</label><section>:</section>
                                <input type="number" name="venta" min="1">
                            </div>
                            
                            <hr>
                            <div>
                                <div class="btn">
                            
                                <button>Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!--Aqui agregar si queires mas columnaas-->
                </div>

    </div> <!--final DIV container-->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="JS/modal.js"></script>
    
    <script>
         // Write on keyup event of keyword input element
        $(document).ready(function(){
        $("#search").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#mytable tbody #buscarTR"), function() {
        if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
        $(this).hide();
        
        else
        $(this).show();
        
        });
        });
        });
    </script>
</body>
</html>









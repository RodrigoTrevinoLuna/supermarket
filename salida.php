<?php 
    session_start();
 if(!isset($_SESSION["permiso"])){
    header("Location: index.php?status=1");
 }
?>
<?php
include_once "php/bd.php";
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, GROUP_CONCAT(	productos.codigo, '..',  productos.item, '..', productos_vendidos.cantidad SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id INNER JOIN productos ON productos.id = productos_vendidos.id_producto GROUP BY ventas.id ;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salidas</title>
    <!-- Importar estilos de la plantilla-->
    <link rel="stylesheet" href="css/contenido.css">


    <!-- Crear Estilos Ventana nueva con el nombre del archivo html (nameArchivoHtml.css)
        ejemplo-->
        <link rel="stylesheet" href="css/salida.css">
    
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
                            <h2 class="titulo"> Salidas</h2>
                        </div>
                        <div class="datos">
                            <!--Apartir de aqui abajo ya puedes escribir codigo -->
                            <h1 class="titulo-pedidos">Salidas de Mercancias</h1>
                            <br>
                            <div class="filtro" style="position:relative; right:200px" >
                                
                            <div><label class="text-light">Buscar:</label><input type="text" name="search" id="search"></div>
                            </div>
                            
                                <table style="width:100%" id="mytable">
                                    <thead>
                                        <tr>
                                            <td class="nameP">ID VENTA</td>
                                            <td class="unidadI">FECHA</td>
                                            <td class="unidadI">PRODUCTOS VENDIDOS</td>
                                            <td class="unidadN">TOTAL</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($ventas as $venta){ ?>
                                        <tr class="fila" id="buscarTR">
                                            <td><?php echo $venta->id ?></td>
					                        <td><?php echo $venta->fecha ?></td>
                                            <td>
                                                <table style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>CLAVE</th>
                                                            <th style="width: 100%;">ITEM</th>
                                                            <th>CANTIDAD</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
                                                            $producto = explode("..", $productosConcatenados)
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $producto[0] ?></td>
                                                            <td><?php echo $producto[1] ?></td>
                                                            <td><?php echo $producto[2] ?></td>
                                                        </tr>
                                                            <?php } ?>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td><?php echo $venta->total ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            
                        </div><!--Cierre de div datos-->
                    </div>
                    
                    <!--Aqui agregar si queires mas columnaas-->
                </div>

    </div> <!--final DIV container-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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


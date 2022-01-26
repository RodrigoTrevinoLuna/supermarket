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
    <title>Inventario</title>
    <!-- Importar estilos de la plantilla-->
    <link rel="stylesheet" href="css/contenido.css">


    <!-- Crear Estilos Ventana nueva con el nombre del archivo html (nameArchivoHtml.css)
        ejemplo-->
        <link rel="stylesheet" href="css/entrada.css">
    
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
                            <h2 class="titulo"> Inventario</h2>
                        </div>
                        <div class="datos">
                            <!--Apartir de aqui abajo ya puedes escribir codigo -->
                               <h1 class="titulo-pedidos">Inventario</h1>
                               <br>
                               <div class="filtro">
                               
                                   <div><label class="text-light">Buscar:</label><input type="text" name="search" id="search"></div>
                                   <div><a href="php/Imprimir/ImprimirInventario.php" style="text-decoration:none" target="_blank"><button class="btn-imprimir">Imprimir</button></a></div>
                                  
                               </div>

                               <div class="tabla my-custom-scrollbar table-wrapper-scroll-y">
                                
                                <table id="mytable">
                                    <thead>
                                        <tr>
                                            <td class="nameP">CLAVE</td>
                                            <td class="unidadI">ITEM</td>
                                            <td class="unidadI">PROVEEDOR</td>
                                            <td class="unidadN">PRECIO COMPRA</td>
                                            <td class="unidadN">UNIDADES Stock</td>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include_once "php/bd.php";
                                        $sentenciaB = $base_de_datos->query("SELECT * FROM productos,proveedores WHERE (proveedores.id_proveedor = productos.id_proveedor) ;");
                                        $productosB = $sentenciaB->fetchAll(PDO::FETCH_OBJ);
                                    ?>
                                    <?php foreach($productosB as $producto){ ?>
                                        <tr class="fila" id="buscarTR">
                                            <td><?php echo $producto->codigo?></td>
                                            <td class="P"><?php echo $producto->item?></td>
                                            <td class="P"><?php echo $producto->nombre?></td>
                                            <td><?php echo $producto->precioCompra?></td>
                                            <td><?php echo $producto->stock?></td>
                                            
                                        </tr>
                                      <?php } ?>
                                     
                                       
                                        <!--No borrar-->
                                        
                                        <tr><td></td><td></td><td></td><td></td><td class="accion"></td></tr>
                                        
                                    </tbody>
                                </table>
                        </div>
                        </div><!--Cierre de div datos-->
                        
                    </div>
                    <div class="columna-2">
                        <section class="titulo-form">
                            <h1 class="titulo-pedidos">Nueva Entrada</h1>
                            <img  src="imagenes/nuevo-producto.png">
                        </section>
                        <form action="php/guardarEntradas.php" method="POST">
                        <?php
                                include_once "php/bd.php";
                                $sentencia = $base_de_datos->query("SELECT * FROM productos,pedidos WHERE (pedidos.id_productos = productos.id) ;");
                                $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
                            ?>
                            <div>
                                <label>Item Pedidos</label><section>:</section>
                                <select name="idProducto">
                                <option selected="true" disabled="disabled">Seleccione uno</option>
                                    <?php foreach($productos as $producto){ ?>
                                        <option value="<?php echo $producto->id?>"><?php echo $producto->item?></option>
                                    
                                        <?php } ?>
                                    
                                </select>
                            </div>
                            <div class="division-txt">
                                <hr>
                                <p class="txt-infor">Información del Producto</p>
                                <hr>
                            </div>
                           
                            <div>
                                <input style="display: none;" type="text" name="idpedido" value="<?php echo $producto->id_pedido?>">
                                <input style="display: none;" type="text" name="unidadesPedidas" value="<?php echo $producto->pedir?>">
                                <label>Importe Total</label><section>:</section>
                                <input type="number" min="1" name="importe" >
                            </div>
                            
                            
                            <hr>
                            <div>
                                <div class="btn">
                            
                                <button>Guardar Registro</button>
                                </div>
                            </div>
                        </form>

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
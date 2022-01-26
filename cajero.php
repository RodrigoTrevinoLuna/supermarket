<?php session_start();
if(!isset($_SESSION["permiso"])){
    
    header("Location: index.php?status=1");
}
    if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
    $granTotal = 0;
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caja</title>
    <link rel="stylesheet" href="css/contenido.css">
    <link rel="stylesheet" href="css/cajero.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/status.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
                           <a href="php/cerrarSesion.php"> <img src="imagenes/iconos/salida.png"><P>Cerrar sesión</P></a>
                           </ul>
                   
               </div>
               <!-- FIN MENUBAR -->
               
                <div class="container-secundario">
                    <div class="listado-venta">
                            <div class="div-titulo">
                                <h2 class="titulo"> Registro de Ventas</h2>
                            </div>
                            <div class="contenedor-clave"><form method="POST" action="php/agregarAlCarrito.php"><label class="clave">Clave: <input autocomplete="off" autofocus class="producto" type="text" name="codigo"></label></form></div>

                            <!--Alertas php-->
                            <?php
                                        if(isset($_GET["status"])){
                                            if($_GET["status"] === "1"){
                                                ?>
                                                    <div class="alerta-container">
                                                        <div class="alert-success">
                                                        <strong>¡Genial!</strong> Venta Realizada Correctamente
                                                        </div>
                                                    </div>
                                                <?php
                                            }else if($_GET["status"] === "2"){
                                                ?>
                                                <div class=" alert-info">
                                                        <strong>Venta Cancelada</strong>
                                                    </div>
                                                <?php
                                            }else if($_GET["status"] === "3"){
                                                ?>
                                                <div class="alerta-container">
                                                        <div class=" alert-info">
                                                         Producto eliminado de la lista
                                                         </div>
                                                    </div>
                                                <?php
                                            }else if($_GET["status"] === "4"){
                                                ?>
                                                <div class=" alert-warning">
                                                        <strong>Error:</strong> El producto NO existe
                                                    </div>
                                                <?php
                                            }else if($_GET["status"] === "5"){
                                                ?>
                                                <div class=" alert-info">
                                                        <strong>Error: </strong>El producto está agotado
                                                    </div>
                                                <?php
                                            }else if($_GET["status"] === "10"){
                                                ?>
                                                <div class=" alert-warning">
                                                        <strong>Acceso no autorizado:</strong> Solo Administrador
                                                    </div>
                                                <?php
                                            }
                                        }
                                    ?>
                            <div class="tabla my-custom-scrollbar table-wrapper-scroll-y">
                                
                                <table >
                                    <thead>
                                        <tr>
                                            <td >CLAVE</td>    
                                            <td class="nameP">PRODUCTO</td>
                                            <td class="unidadN">PRECIO UNIT</td>
                                            
                                            <td class="unidadN">CANT</td>
                                            <td class="unidadT">IMPORTE</td>
                                            <td id="contenido">ACCIÓN</td>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--PHP-->
                                    <?php foreach($_SESSION["carrito"] as $indice => $producto){ 
	                                            $granTotal = $producto  -> total + $granTotal;
                                        ?><!-- FIN PHP-->

                                        <tr class="fila">
                                            
                                            <td><?php echo $producto->codigo?></td>
                                            <td class="P"><?php echo $producto->item?></td>
                                            <td><?php echo $producto->precioVenta?></td>
                                            
                                            <td><?php echo $producto->cantidad?></td>
                                            <td><?php echo $producto->total?></td>
                                            <td id="contenido"><a href="<?php echo "php/quitarDelCarrito.php?indice=" . $indice?>" >Quitar</a></td>
                                            
                                        </tr>
                                            <?php } ?>
                                        <!--No borrar-->
                                        <tr><td></td><td></td><td></td><td></td><td style="border-right: 1px solid black;"></td></tr>
                                    </tbody>
                                </table>
                        </div>
                        <div class="resultados">
                            <section><label>Subtotal</label><input type="text" value="<?php echo "$" . $granTotal; ?>" readonly></section>
                            <section><label>Iva 16%</label><input type="text" value="<?php echo "$" . $granTotal*.16; ?>" readonly></section>
                        </div>
                    </div>
                    <div class="interaccion-venta">
                        <h1 class="txtTitulo">TOTAL</h1>
                        <?php $neto = ($granTotal*.16) + $granTotal ?>
    <input class="textboxTotal" type="text" value="<?php echo "$" . $neto; ?>">
    
    
    
    
    <div class="opciones">
        
        
        

        <button class="btn-opcion" type="button" data-open="modalBuscar" accesskey="3">
            <img src="imagenes/buscar.png">
            <p>[3] Buscar</p>
        </button>

        <button type="submit" class="btn-opcion"  type="button" data-open="modalCobrar" accesskey="3">
            <img src="imagenes/cobrar.png">
            <p>[1] Cobrar</p>
        </button>

        <button accesskey="6" class="btn-opcion" role="link" onclick="window.location='php/cancelarVenta.php'" >
            <img src="imagenes/cancelar-venta.png">
             [6] Cancelar Venta
            
        </button>
        
        
       <img  class="logo" src="imagenes/logo-tienda.png">
     
    </div>            
                    </div>
                    
                                
                                

            </div><!--Fin Container-secundario-->
        


                
                
                </div><!--Fin del div Container-->  


 <!--Modal Buscar item-->
 <div class="modal" id="modalBuscar" data-animation="slideInOutLeft">
                                            <div class="modal-dialog">
                                                
                                                <header class="modal-header">
                                                    <h3 style="text-align: center; width: 100%;">Listado de Productos</h3>
                                                
                                                <button class="close-modal btn-modal" aria-label="close modal" data-close>
                                                    <p>X</p>  
                                                </button>
                                                </header>
                                                
                                                <section class="modal-content">
                                                    
                                                <div class="tabla-modal my-custom-scrollbar-modal table-wrapper-scroll-y-modal">
                                
                                <table class="tabla-modal">
                                    <thead>
                                        <tr class="item">
                                            <th class="unidadN">CLAVE</th>
                                            <th class="name">ITEM</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include_once "php/bd.php";
                                        $sentencia = $base_de_datos->query("SELECT * FROM productos;");
                                        $ITEMS = $sentencia->fetchAll(PDO::FETCH_OBJ);
                                    ?>
                                    <?php foreach($ITEMS as $ITEM){ ?>
                                        <tr class="fila">
                                            <td><?php echo $ITEM->codigo?></td>
                                            <td><?php echo $ITEM->item ?></td>
                                           
                                        </tr>
                                        <?php } ?>
                                        
                                   
                                        <!--No borrar-->
                                        <tr><td></td><td></td></tr>
                                    </tbody>
                                </table>
                        </div>


                                                </section>
                                                <footer class="modal-footer" style="text-align: right;">
                                                
                                                </footer>
                                                
                                            </div>
                                            </div><!-- FIN DELModal ELIMINAR usuario-->    

 <!--Modal Terminar venta-->
 <div class="modal" id="modalCobrar" data-animation="slideInOutLeft">
                                            <div class="modal-dialog">
                                                
                                                <header class="modal-header">
                                                    <h3 style="text-align: center; width: 100%;">Terminar Venta</h3>
                                                
                                                <button class="close-modal btn-modal" aria-label="close modal" data-close>
                                                            <p>X</p> 
                                                </button>
                                                </header>
                                                <form class="modal-form" method="POST" action="php/terminarVenta.php">
                                                <section class="modal-content">
                                                    
                                                    <!--INICIO DEL Formulario-->
                                                    
                                                        <div><label>Cobrar</label><p>$</p><input  type="text" value="<?php echo $neto ?>" name="total"  id="cobrar" style="text-align: center;" readonly oninput="cal()"></div>    
                                                        <div><label>Pago</label><p>$</p><input autocomplete="off" autofocus type="text" id="pago"  style="text-align: center;" oninput="cal()"></div>
                                                        <div><label>Cambio</label><input id="cambio"></div>
                                                        
                                                           
                                                    <!--Fin del Formulario-->
                                                </section>
                                                <footer class="modal-footer">
                                                    <!--<button>Imprimir Ticket</button>-->
                                                    <button>Terminar Venta</button>
                                                </footer>
                                                </form>
                                            </div>
                                            </div><!-- FIN DELModal Editar usuario-->

                                            <script src="JS/modal.js"></script>
                                            <script>
                                               function cal() {
  try {
    var a = (document.getElementById("cobrar").value) || 0,
      b = (document.getElementById("pago").value) || 0;

      parseFloat(document.getElementById("cambio").value = b - a).toFixed(2) ;
  } catch (e) {}
}

                                            </script>
            </body>
</html>



			

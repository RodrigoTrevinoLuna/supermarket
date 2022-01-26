<?php 
    session_start();
 if(!isset($_SESSION["permiso"])){
    header("Location: index.php?status=1");
 }else if($_SESSION["permiso"] != "Administrador"){
    header("Location: cajero.php?status=10");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="css/contenido.css">
    <link rel="stylesheet" href="css/producto.css">
    <link rel="stylesheet" href="css/modal.css">

</head>
<body>
    <div class="container">

        <!--***********************************************************************************-->
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
<!--************************************* **********************************************-->
            <!-- INICIO LISTADO-CARRITO -->
            <div class="container-producto">
                
                
                    <!--PANEL PRINCIPAL-->
                    <div class="contenedor">
                        <h2 class="titulo"> Productos</h2>
                        <div class="a">
                            <div style="display:flex;">
                                <div style="padding-right:30px"><label class="text-light">Buscar:</label><input type="text" name="search" id="search"></div>
                                <div><a href="php/Imprimir/ImprimirProductos.php" style="text-decoration:none" target="_blank"><button class="btn-imprimir">Imprimir</button></a></div>
                            </div>
                        </div>
                            <!--PANEL IZQUIERDO-->
                            <div class="tabla my-custom-scrollbar table-wrapper-scroll-y">
                            <?php
                                        include_once "php/bd.php";
                                        $sentencia2 = $base_de_datos->query("SELECT * FROM proveedores,productos WHERE proveedores.id_proveedor = productos.id_proveedor;");
                                        $productos = $sentencia2->fetchAll(PDO::FETCH_OBJ);
                                    ?>
                                   
                                <table id="mytable">
                                    <thead>
                                        <tr class="item">
                                            <th class="unidadN">CLAVE</th>
                                            <th class="name">ITEM</th>
                                            <th class="name">PROVEEDOR</th>
                                            <th class="unidadN">ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($productos as $producto){ ?>
                                        <tr class="fila" id="buscarTR">
                                            <td><?php echo $producto->codigo ?></td>
                                            <td><?php echo $producto->item ?></td>
                                            <td><?php echo $producto->nombre ?></td>
                                            <td class="accion" ><a href="#" type="button" style="text-decoration:none" data-open="modal1<?php echo $producto->id ?>">Editar</a><a href="#" style="text-decoration:none" type="button" data-open="modalEliminar<?php echo $producto->id ?>">Eliminar</a></td>
                                        </tr>
                                         <!--Modal Editar producto-->
                                    <div class="modal" id="modal1<?php echo $producto->id ?>" data-animation="slideInOutLeft">
                                            <div class="modal-dialog">
                                                
                                                <header class="modal-header">
                                                    <h3 style="text-align: center; width: 100%;">Editar Datos del Producto</h3>
                                                
                                                <button class="close-modal btn-modal" aria-label="close modal" data-close>
                                                            <p>X</p> 
                                                </button>
                                                </header>
                                                <form class="modal-form" method="POST" action="php/editarProducto.php">
                                                <section class="modal-content">
                                                    
                                                    <!--INICIO DEL Formulario-->
                                                        <div style="display: none;"><input  type="text" value="<?php echo $producto->id ?>" name="id"  readonly></div>
                                                            <div><label>Clave</label><input  type="text" value="<?php echo $producto->codigo ?>" name="clave"></div>
                                                            <div><label>Item</label><input  type="text" value="<?php echo $producto->item ?>" name="item"></div>
                                                            <?php
                                                            $sentenci = $base_de_datos->query("SELECT * FROM proveedores WHERE not(nombre='$producto->nombre');");
                                                            $editProveedores = $sentenci->fetchAll(PDO::FETCH_OBJ); 
                                                            ?>
                                                             
                                                            <div><label>Proveedor</label><select name="proveedor">
                                                                    
                                                                    
                                                                    <?php foreach($editProveedores as $prov){ ?>
                                                                    <option value="<?php echo $prov->id_proveedor ?>"><?php echo $prov->nombre ?></option>
                                                                    <?php }?>
                                                                    </select></div>
                                                            
                                                            
                                                    <!--Fin del Formulario-->
                                                </section>
                                                <footer class="modal-footer">
                                                <button >Guardar</button>
                                                </footer>
                                                </form>
                                            </div>
                                            </div><!-- FIN DELModal Editar usuario-->


                                             <!--Modal Eliminar producto-->
                                    <div class="modal" id="modalEliminar<?php echo $producto->id ?>" data-animation="slideInOutLeft">
                                            <div class="modal-dialog">
                                                
                                                <header class="modal-header">
                                                    <h3 style="text-align: center; width: 100%;">Eliminar Producto</h3>
                                                
                                                <button class="close-modal btn-modal" aria-label="close modal" data-close>
                                                            <p>X</p> 
                                                </button>
                                                </header>
                                                <form class="modal-form" method="POST" action="php/eliminarProducto.php">
                                                <section class="modal-content">
                                                    
                                                    <!--INICIO DEL Formulario-->
                                                            <div style="display: none;"><input  type="text" value="<?php echo $producto->id ?>" name="id"  readonly></div>
                                                            <div><label>Clave</label><input  type="text" value="<?php echo $producto->codigo ?>"  readonly></div>
                                                            <div><label>Item</label><input  type="text" value="<?php echo $producto->item ?>" readonly></div>
                                                            <div><label>Proveedor</label><input  type="text" value="<?php echo $producto->nombre ?>" readonly></div>
                                                           
                                                             
                                                            
                                                            
                                                    <!--Fin del Formulario-->
                                                </section>
                                                <footer class="modal-footer">
                                                <button >Eliminar</button>
                                                </footer>
                                                </form>
                                            </div>
                                            </div><!-- FIN DELModal Eliminar producto-->
                                   <?php } ?>
                                        <!--No borrar-->
                                        <tr><td></td><td></td><td></td><td></td></tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                      <!--Panel derecho -->
                      <div class="form">
                          <section class="titulo-form">
                            <h2>Nuevo Producto</h2>
                          <img  src="imagenes/nuevo-producto.png">
                        </section>
                        
                        <form action="php/newproducto.php" method="POST">
                            <section>
                                <label>Clave</label>
                                <input type="text" name="clave">
                            </section>
                            <section>
                                <label>Nombre del ITEM</label>
                                <input type="text" name="item">
                            </section>
                            <section>
                                <label>Proveedor</label>
                                <select name="proveedor">
                                <option selected="true" disabled="disabled">Seleccione uno</option>
                                    <?php
                                        include_once "php/bd.php";
                                        $sentencia = $base_de_datos->query("SELECT * FROM proveedores;");
                                        $proveedores = $sentencia->fetchAll(PDO::FETCH_OBJ);
                                    ?>
                                    <?php foreach($proveedores as $proveedor){ ?>
                                    <option value="<?php echo $proveedor ->id_proveedor?>"><?php echo $proveedor ->nombre?></option>
                                    <?php } ?>
                                </select>
                                
                            </section>
                            <section class="btn-newP">
                                <div>
                                    <button class="btn-guardar" type="submit">Guardar</button>
                                </div>
                            </section>
                        </form>
                    </div>
                            
            </div>
        


    </div>
    <script src="JS/modal.js"></script>
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
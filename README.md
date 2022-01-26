# SuperMarket

Pequeño sistema en donde realiza un proceso de stock ( entradas y salidas), ventas y fecha de la venta.

# Utiliza:
* HTML5
* CSS
* JS
* PHP
* PHPmySql

# PARA PODER INGRESAR AL SISTEMA:
* USUARIO: admin
* password: admin

* Tiene control de permisos





Interfaces del sistema
Producto
Listado de carrito
Objetivo: Ver la lista de los productos a pedir y tener opción de imprimir la elección final de los productos que se pedirán a los proveedores.
Atributos: Clave, Producto, Unidades por Pedir
Cancelar Producto
A pedir	Clave	Producto	Unidades por Pedir
X	123fd	Frijol 1kg Verde Valle	30

Inventario
Tabla, botón imprimir, combo-box (filtro por unidades en existencia), Ventana del resultado del filtro y botón para generar al listado de carrito.
Objetivo: Ver la lista de todos los productos en el inventario y tener opción de imprimir todo el inventario. También tener un filtro de las unidades que estarán por agotarse para poder generar al listado de carrito
Atributos: Para la tabla (Clave, item, Unidades, Proveedor). Para la ventana (Clave, item, unidades en existencia)
Proveedor
	Objetivo: Creación de nuevos Proveedores
	Atributos: Nombre-Proveedor, correo electrónico, Teléfono, Dirección RFC.
Entrada
Objetivo: Tener un historial de los productos nuevos que se dieron de alta junto un filtro de rango de fechas o fecha única. También tener un botón llamado (“Agregar”) en donde al darle clic se abrirá una ventana nueva pidiendo solamente la clave y cantidad de unidades compradas. 
Atributos: tabla historial (Clave, producto, unidad, importe X unidad, Precio Neto). Filtro(fechas). Ventana Agregar (Clave y Cantidad de unidades compradas).
Salida
	Objetivo: Tener un historial de los productos que fueron vendidos. 
	Atributos: Clave, producto, unidades vendidas, Precio X artículo, Precio Neto


Administración
Objetivo: Tener el listado de los datos generales del usuario (clave, nombre, RFC) y poder darle de alta en nivel de acceso que pueda tener dentro del sistema. 
Usuarios
Objetivo: Registro de nuevos usuarios. Y listado de los usuarios en alta.
Ventas
Objetivo: Gráficos de los datos de salida
Gastos
Objetivo: Gráficos de los datos de entrada


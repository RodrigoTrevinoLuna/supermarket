-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2022 a las 21:05:09
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda-proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` bigint(20) NOT NULL,
  `pedir` bigint(20) NOT NULL,
  `id_productos` bigint(225) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nivel_acceso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `id_usuario`, `nivel_acceso`) VALUES
(2, 2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `item` varchar(100) NOT NULL,
  `precioVenta` int(11) NOT NULL,
  `precioCompra` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `item`, `precioVenta`, `precioCompra`, `stock`, `id_proveedor`) VALUES
(7, '1', 'Galletas', 40, 20, 96, 1),
(9, '2', 'Tacos', 30, 10, 92, 4),
(12, '3', 'Jabones', 0, 20, 10, 3),
(15, '4', 'Jabon', 0, 200, 100, 4),
(16, '5', 'Pera', 0, 46, 200, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_vendidos`
--

CREATE TABLE `productos_vendidos` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `id_producto` bigint(255) UNSIGNED NOT NULL,
  `cantidad` bigint(255) NOT NULL,
  `id_venta` bigint(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_vendidos`
--

INSERT INTO `productos_vendidos` (`id`, `id_producto`, `cantidad`, `id_venta`) VALUES
(12, 7, 3, 18),
(13, 9, 1, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `rfc` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre`, `direccion`, `rfc`, `correo`, `telefono`) VALUES
(1, 'Gamesa-124', 'ciudad de mexico', '454544', 'gamesa@gmail.com', '457844845'),
(3, 'Smart-1', 'mexco', '42343', 'samart@gmail.com.mx', '23542343'),
(4, 'Tienda', 'Casa', '134432', 'hhh@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoP` varchar(50) NOT NULL,
  `apellidoM` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `Permiso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidoP`, `apellidoM`, `usuario`, `password`, `correo`, `telefono`, `direccion`, `Permiso`) VALUES
(2, 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'Empleado'),
(9, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `total`) VALUES
(18, '2021-11-21 05:17:54', '174.00'),
(19, '2021-11-21 06:28:48', '0.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_productos` (`id_productos`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `id_usuario[FK]` (`id_usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD CONSTRAINT `productos_vendidos_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_vendidos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

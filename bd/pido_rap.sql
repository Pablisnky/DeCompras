-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2020 a las 00:01:03
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pido_rap`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_com`
--

CREATE TABLE `afiliado_com` (
  `ID_AfiliadoCom` int(11) NOT NULL,
  `nombre_AfiCom` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_AfiCom` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cedula_AfiCom` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_AfiCom` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `correo_AfiCom` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_AfiCom` date NOT NULL,
  `hora_AfiCom` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `afiliado_com`
--

INSERT INTO `afiliado_com` (`ID_AfiliadoCom`, `nombre_AfiCom`, `apellido_AfiCom`, `cedula_AfiCom`, `telefono_AfiCom`, `correo_AfiCom`, `fecha_AfiCom`, `hora_AfiCom`) VALUES
(9, 'Pablo', 'Cabeza', '12728036', '02541231573', 'pcabeza7@gmail.com', '2020-08-05', '18:42:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_comingreso`
--

CREATE TABLE `afiliado_comingreso` (
  `ID_AfiliadoComIngreso` int(11) NOT NULL,
  `ID_Afiliado` int(11) NOT NULL,
  `claveCifrada` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `afiliado_comingreso`
--

INSERT INTO `afiliado_comingreso` (`ID_AfiliadoComIngreso`, `ID_Afiliado`, `claveCifrada`) VALUES
(5, 9, '$2y$10$8gsusRAgIJ42Y9YfEnRNEe7TLFvqHrh78Uka1mTbb3Z7DL7y2BxNO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID_Categoria` int(11) NOT NULL,
  `categoria` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID_Categoria`, `categoria`) VALUES
(1, 'Supermercado'),
(2, 'Bodega'),
(3, 'Alimento'),
(4, 'Farmacia'),
(5, 'Ferreteria'),
(6, 'Comida Rapida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `ID_Opcion` int(11) NOT NULL,
  `opcion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`ID_Opcion`, `opcion`, `precio`) VALUES
(1, 'Carne molida', '1500'),
(2, 'Carne mechada', '1500'),
(3, 'Jamón', '1300'),
(4, 'Queso blanco', '1000'),
(5, 'Jamón y queso', '1200'),
(6, 'Queso amarillo', '1200'),
(7, 'Pabellon', '1800'),
(8, 'Piña', '1000'),
(9, 'Mora', '1000'),
(10, 'Guayaba', '1000'),
(11, 'Parchita', '1000'),
(12, 'Coca cola 1L', '3500'),
(13, 'Coca cola 600 ml', '700'),
(14, 'Naranja Hit 1L', '3000'),
(15, 'Harina Pan, 1 Kg', '2400'),
(16, 'Azucar, 0,5 Kg', '1300');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ID_Pedidos` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `producto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `total` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `aleatorio` int(11) NOT NULL DEFAULT '2',
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_Producto` int(11) NOT NULL,
  `producto` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_Producto`, `producto`) VALUES
(1, 'Empanadas'),
(2, 'Jugos '),
(3, 'Refrescos'),
(4, 'Bebidas sin alcohol'),
(5, 'Papa rellena'),
(6, 'Viveres'),
(7, 'Frutas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_opciones`
--

CREATE TABLE `productos_opciones` (
  `ID_PO` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `ID_Opcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos_opciones`
--

INSERT INTO `productos_opciones` (`ID_PO`, `ID_Producto`, `ID_Opcion`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 1, 3),
(4, 1, 5),
(5, 1, 7),
(6, 1, 6),
(7, 1, 4),
(8, 2, 10),
(9, 2, 9),
(10, 2, 11),
(11, 2, 8),
(12, 3, 12),
(13, 3, 13),
(14, 3, 14),
(15, 5, 1),
(16, 5, 2),
(17, 6, 16),
(18, 6, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `ID_Tienda` int(11) NOT NULL,
  `nombre_Tien` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_Tien` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_Tien` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `horario_Tien` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `categoria_Tien` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_afiliacion` date NOT NULL,
  `hora_afiliacion` time NOT NULL,
  `ID_AfiliadoCom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`ID_Tienda`, `nombre_Tien`, `direccion_Tien`, `telefono_Tien`, `horario_Tien`, `categoria_Tien`, `fecha_afiliacion`, `hora_afiliacion`, `ID_AfiliadoCom`) VALUES
(1, 'Empanadas la 13', 'Av. Veroes con calle 13', '0254-231.57', 'lunes a vi', '', '0000-00-00', '00:00:00', 0),
(2, 'Edgar Burguer', 'Av. La Patria frente a la Escuela de Arte', '0254-342.54', 'martes - d', '', '0000-00-00', '00:00:00', 0),
(3, 'Cachapas Coa', 'Av. Carabobo con Av. La Paz', '0254-354.56', 'jueves - d', '', '0000-00-00', '00:00:00', 0),
(4, 'El Torero', 'Av. Caracas con Av. 10', '0254 - 432.', 'Lunes - Do', '', '0000-00-00', '00:00:00', 0),
(5, 'Abasto Los Blanco', 'Av. 11 entre calles  15 y 16', '0254-234.54', 'lunes- sab', '', '0000-00-00', '00:00:00', 0),
(6, 'Supermercado El Nacional', 'Av. La Patria con Av. Veroes', '0254-453.45', 'Lunes- Dom', '', '0000-00-00', '00:00:00', 0),
(7, 'Central Madeirense', 'Av. Carabobo C:C La Galería', '0254-324.54', 'Lunes - Do', '', '0000-00-00', '00:00:00', 0),
(12, 'Thermos-Control', '04143541194', 'Calle 15 entre Avs. ', 'lunes a viernes', 'Ferreteria', '2020-08-05', '18:42:00', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas_categorias`
--

CREATE TABLE `tiendas_categorias` (
  `ID_TC` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `ID_Categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tiendas_categorias`
--

INSERT INTO `tiendas_categorias` (`ID_TC`, `ID_Tienda`, `ID_Categoria`) VALUES
(1, 5, 1),
(2, 1, 6),
(3, 2, 6),
(4, 3, 6),
(5, 4, 6),
(6, 6, 1),
(7, 7, 1),
(8, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas_productos`
--

CREATE TABLE `tiendas_productos` (
  `ID_TP` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tiendas_productos`
--

INSERT INTO `tiendas_productos` (`ID_TP`, `ID_Tienda`, `ID_Producto`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 5, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `nombre_usu` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_usu` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cedula_usu` int(8) NOT NULL,
  `telefono_usu` int(11) NOT NULL,
  `direccion_usu` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliado_com`
--
ALTER TABLE `afiliado_com`
  ADD PRIMARY KEY (`ID_AfiliadoCom`);

--
-- Indices de la tabla `afiliado_comingreso`
--
ALTER TABLE `afiliado_comingreso`
  ADD PRIMARY KEY (`ID_AfiliadoComIngreso`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID_Categoria`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`ID_Opcion`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID_Pedidos`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_Producto`);

--
-- Indices de la tabla `productos_opciones`
--
ALTER TABLE `productos_opciones`
  ADD PRIMARY KEY (`ID_PO`),
  ADD KEY `PRO_OB` (`ID_Producto`),
  ADD KEY `OPC_pRO` (`ID_Opcion`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`ID_Tienda`);

--
-- Indices de la tabla `tiendas_categorias`
--
ALTER TABLE `tiendas_categorias`
  ADD PRIMARY KEY (`ID_TC`),
  ADD KEY `CAT_TIN` (`ID_Categoria`),
  ADD KEY `TIN_CAT` (`ID_Tienda`);

--
-- Indices de la tabla `tiendas_productos`
--
ALTER TABLE `tiendas_productos`
  ADD PRIMARY KEY (`ID_TP`),
  ADD KEY `TIN_PRO` (`ID_Tienda`),
  ADD KEY `PRO_TIN` (`ID_Producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afiliado_com`
--
ALTER TABLE `afiliado_com`
  MODIFY `ID_AfiliadoCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `afiliado_comingreso`
--
ALTER TABLE `afiliado_comingreso`
  MODIFY `ID_AfiliadoComIngreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `ID_Opcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID_Pedidos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos_opciones`
--
ALTER TABLE `productos_opciones`
  MODIFY `ID_PO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `ID_Tienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tiendas_categorias`
--
ALTER TABLE `tiendas_categorias`
  MODIFY `ID_TC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tiendas_productos`
--
ALTER TABLE `tiendas_productos`
  MODIFY `ID_TP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos_opciones`
--
ALTER TABLE `productos_opciones`
  ADD CONSTRAINT `OPC_pRO` FOREIGN KEY (`ID_Opcion`) REFERENCES `opciones` (`ID_Opcion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `PRO_OB` FOREIGN KEY (`ID_Producto`) REFERENCES `productos` (`ID_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tiendas_categorias`
--
ALTER TABLE `tiendas_categorias`
  ADD CONSTRAINT `CAT_TIN` FOREIGN KEY (`ID_Categoria`) REFERENCES `categorias` (`ID_Categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TIN_CAT` FOREIGN KEY (`ID_Tienda`) REFERENCES `tiendas` (`ID_Tienda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tiendas_productos`
--
ALTER TABLE `tiendas_productos`
  ADD CONSTRAINT `PRO_TIN` FOREIGN KEY (`ID_Producto`) REFERENCES `productos` (`ID_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TIN_PRO` FOREIGN KEY (`ID_Tienda`) REFERENCES `tiendas` (`ID_Tienda`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

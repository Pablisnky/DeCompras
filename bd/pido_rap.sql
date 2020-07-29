-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2020 a las 17:15:31
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
  `opcion` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`ID_Opcion`, `opcion`) VALUES
(1, 'Carne molida'),
(2, 'Carne mechada'),
(3, 'Jamón'),
(4, 'Queso blanco'),
(5, 'Jamón y queso'),
(6, 'Queso amarillo'),
(7, 'Pabellon'),
(8, 'Piña'),
(9, 'Mora'),
(10, 'Guayaba'),
(11, 'Parchita'),
(12, 'Coca cola 1 L'),
(13, 'Coca cola 600 ml'),
(14, 'Naranja Hit');

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
(5, 'Papa rellena');

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
(16, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `ID_Tienda` int(11) NOT NULL,
  `nombre_Tien` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_Tien` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_Tien` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `horario_Tien` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`ID_Tienda`, `nombre_Tien`, `direccion_Tien`, `telefono_Tien`, `horario_Tien`) VALUES
(1, 'Empanadas la 13', 'Av. Veroes con calle', '0254-231.57', 'lunes a vi'),
(2, 'Edgar Burguer', 'Av. La Patria frente', '0254-342.54', 'martes - d'),
(3, 'Cachapas Coa', 'Av. Carabobo con Av.', '0254-354.56', 'jueves - d'),
(4, 'El Torero', 'Av. Caracas con Av. ', '0254 - 432.', 'Lunes - Do'),
(5, 'Abasto Los Blanco', 'Av. 11 entre calles ', '0254-234.54', 'lunes- sab'),
(6, 'Supermercado El Naci', 'Av. La Patria con Av', '0254-453.45', 'Lunes- Dom'),
(7, 'Central Madeirense', 'Av. Carabobo C:C La ', '0254-324.54', 'Lunes - Do');

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
(7, 7, 1);

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
(5, 1, 5);

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `ID_Opcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos_opciones`
--
ALTER TABLE `productos_opciones`
  MODIFY `ID_PO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `ID_Tienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tiendas_categorias`
--
ALTER TABLE `tiendas_categorias`
  MODIFY `ID_TC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tiendas_productos`
--
ALTER TABLE `tiendas_productos`
  MODIFY `ID_TP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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

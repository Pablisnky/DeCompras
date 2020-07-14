-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2020 a las 02:17:15
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
-- Base de datos: `pid_rap`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `ID_alimento` int(11) NOT NULL,
  `nombreAlimento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `unidadVenta` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alimentos`
--

INSERT INTO `alimentos` (`ID_alimento`, `nombreAlimento`, `precio`, `unidadVenta`) VALUES
(1, 'Lechuga', '2,00', 'Kg'),
(2, 'Limon', '3,00', 'Docena'),
(3, 'Cebolla', '5;59', 'Kg'),
(4, 'Pimenton', '3,42', ''),
(5, 'Cebollin', '1,34', ''),
(6, 'Cilantro', '5,24', 'Ramo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bar_resto`
--

CREATE TABLE `bar_resto` (
  `ID_BR` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `unidadVenta` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bar_resto`
--

INSERT INTO `bar_resto` (`ID_BR`, `nombre`, `precio`, `unidadVenta`) VALUES
(1, 'Pinta', '120', 'Litro'),
(2, 'Hamburguesas Veggie', '350', 'Unida'),
(3, 'Nachos', '120', 'Cono'),
(4, 'Papas fritas', '90', ''),
(5, 'Milanesa de ternera', '160', ''),
(6, 'Supremas de pollo', '170', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delivery`
--

CREATE TABLE `delivery` (
  `ID:Delivery` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `unidadVenta` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `delivery`
--

INSERT INTO `delivery` (`ID:Delivery`, `nombre`, `precio`, `unidadVenta`) VALUES
(1, 'Pizza chica', '600', ''),
(2, 'Empanadas', '43', ''),
(3, 'Pizza Grande', '300', ''),
(4, 'Salsas', '55', ''),
(5, 'Sushi', '370', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `ID_Departamento` int(11) NOT NULL,
  `nombre_Departamento` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`ID_Departamento`, `nombre_Departamento`) VALUES
(1, 'Ropa'),
(2, 'Licores'),
(3, 'Calzado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricantes`
--

CREATE TABLE `fabricantes` (
  `nombre_Fabricante` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fabricantes`
--

INSERT INTO `fabricantes` (`nombre_Fabricante`) VALUES
('Adidas'),
('Nike'),
('Puma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_Producto` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `unidadVenta` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_Producto`, `nombre`, `precio`, `unidadVenta`) VALUES
(1, 'IPhone 11 Pro Max', '100674', ''),
(2, 'IPhone XR', '51345', ''),
(3, 'Motorola One', '22113', ''),
(4, 'Samsung Galaxy Note', '61263', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remeras`
--

CREATE TABLE `remeras` (
  `ID_Remera` int(11) NOT NULL,
  `ID_Frabicante` int(11) NOT NULL,
  `ID_Departamento` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL,
  `talla` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ropa`
--

CREATE TABLE `ropa` (
  `ID_Ropa` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `unidadVenta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `talla` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ropa`
--

INSERT INTO `ropa` (`ID_Ropa`, `nombre`, `precio`, `unidadVenta`, `modelo`, `talla`) VALUES
(1, 'Remera gris', '500', '', '', ''),
(2, 'Remera blanca', '500', '', '', ''),
(3, 'Remera negra', '500', '', '', ''),
(4, 'Botines de futbol', '1800', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `ID_Seccion` int(11) NOT NULL,
  `nombre_Seccion` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`ID_Seccion`, `nombre_Seccion`) VALUES
(1, 'Damas'),
(2, 'Caballeros');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`ID_alimento`);

--
-- Indices de la tabla `bar_resto`
--
ALTER TABLE `bar_resto`
  ADD PRIMARY KEY (`ID_BR`);

--
-- Indices de la tabla `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`ID:Delivery`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`ID_Departamento`);

--
-- Indices de la tabla `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD PRIMARY KEY (`nombre_Fabricante`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_Producto`);

--
-- Indices de la tabla `remeras`
--
ALTER TABLE `remeras`
  ADD PRIMARY KEY (`ID_Remera`);

--
-- Indices de la tabla `ropa`
--
ALTER TABLE `ropa`
  ADD PRIMARY KEY (`ID_Ropa`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`ID_Seccion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `ID_alimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `bar_resto`
--
ALTER TABLE `bar_resto`
  MODIFY `ID_BR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `delivery`
--
ALTER TABLE `delivery`
  MODIFY `ID:Delivery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `ID_Departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `remeras`
--
ALTER TABLE `remeras`
  MODIFY `ID_Remera` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ropa`
--
ALTER TABLE `ropa`
  MODIFY `ID_Ropa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `ID_Seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

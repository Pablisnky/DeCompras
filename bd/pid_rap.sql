-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2020 a las 04:45:17
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
  `ID_Delivery` int(11) NOT NULL,
  `seccion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `unidadVenta` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `delivery`
--

INSERT INTO `delivery` (`ID_Delivery`, `seccion`, `unidadVenta`, `ID_Departamento`) VALUES
(1, 'Pizza chica', '', 2),
(2, 'Empanadas', '', 2),
(3, 'Pizza Grande', '', 2),
(4, 'Salsas', '', 2),
(5, 'Sushi', '', 2);

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
(2, 'Delivery'),
(3, 'Bar'),
(4, 'Alimentos'),
(5, 'Productos'),
(6, 'Maquinas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_ropa`
--

CREATE TABLE `detalles_ropa` (
  `ID_DR` int(11) NOT NULL,
  `ID_Departamento` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL,
  `talla` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `ID_Maquina` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `unidadVenta` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `ID_Opcion` int(11) NOT NULL,
  `ID_Departamento` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL,
  `opciones` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`ID_Opcion`, `ID_Departamento`, `ID_Seccion`, `opciones`, `precio`) VALUES
(1, 2, 5, 'Carne', '43'),
(2, 2, 5, 'Carne picante', '43'),
(3, 2, 5, 'Pollo', '43'),
(4, 2, 5, 'Jamón y queso', '43'),
(5, 2, 5, 'Queso y cebolla', '43'),
(6, 2, 5, 'Roquefort', '50'),
(7, 2, 5, 'Humita', '50'),
(8, 2, 5, 'Verdura', '45'),
(9, 1, 1, 'X', '500'),
(10, 1, 1, 'L', '500'),
(11, 1, 1, 'M', '500'),
(12, 1, 1, 'XL', '500'),
(13, 1, 2, '40', '1800'),
(14, 2, 10, 'Muzzarella', '300'),
(15, 2, 10, 'Muzza con huevo', '330'),
(16, 2, 10, 'Muzza con Morrones', '345'),
(17, 2, 10, 'Fugazza', '300'),
(18, 2, 10, 'Fugazzeta', '340'),
(19, 2, 10, 'fugazzeta con jamón', '380'),
(20, 2, 10, 'Jamón', '350'),
(21, 2, 10, 'Jamón y Huevo', '370'),
(22, 2, 10, 'Jamón y Morrones', '390'),
(23, 2, 10, 'Jamón  y Morrones co', '400'),
(25, 2, 6, 'Pollo', '130'),
(26, 2, 6, 'Jamón y Queso', '110'),
(27, 2, 6, 'Espinaca', '110'),
(28, 2, 6, 'Salami y Mozzarella', '120'),
(29, 2, 7, 'Hot Philadelphia 16 ', '370'),
(30, 2, 7, 'Uramaki Philly 24 pi', '370'),
(31, 2, 7, 'L Combo Salmón 32 pi', '450'),
(32, 2, 7, 'XL Combo Salmón 42 p', '700'),
(33, 2, 7, 'Jumbo Salmón 60 piez', '900'),
(34, 2, 8, 'Coca Cola 500 cc', '85'),
(35, 2, 8, 'Coca Cola 1 litro', '110'),
(36, 2, 8, 'Agua Mineral 500 cc', '130'),
(37, 2, 8, 'Agua Mineral 1 litro', '90'),
(38, 2, 11, 'Stella Artois 1 litr', '140'),
(39, 2, 11, 'Heineken 1 litro', '160'),
(40, 1, 2, '41', '1800'),
(41, 1, 2, '42', '1800'),
(42, 1, 2, '43', '1800'),
(43, 1, 2, '44', '1800'),
(44, 1, 2, '45', '1800'),
(45, 1, 2, '46', '1800'),
(46, 1, 12, 'Realizado en lienzo ', '1350'),
(47, 1, 13, 'Exterior de lienzo 1', '480');

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
-- Estructura de tabla para la tabla `ropa`
--

CREATE TABLE `ropa` (
  `ID_Ropa` int(11) NOT NULL,
  `seccion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ropa`
--

INSERT INTO `ropa` (`ID_Ropa`, `seccion`, `ID_Departamento`) VALUES
(1, 'Remeras', 1),
(4, 'Zapatos', 1),
(5, 'Short', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `ID_Departamento` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL,
  `seccion` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`ID_Departamento`, `ID_Seccion`, `seccion`) VALUES
(1, 1, 'Remeras'),
(1, 2, 'zapatos'),
(1, 3, 'Short'),
(2, 4, 'Pizza chica'),
(2, 5, 'Empanadas'),
(2, 6, 'Calzones'),
(2, 7, 'Sushi'),
(2, 8, 'Bebidas sin alcohol'),
(2, 9, 'Salsas'),
(2, 10, 'Pizza Grande'),
(2, 11, 'Bebidas con alcohol'),
(1, 12, 'Kit Baby'),
(1, 13, 'Cambiador');

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
  ADD PRIMARY KEY (`ID_Delivery`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`ID_Departamento`);

--
-- Indices de la tabla `detalles_ropa`
--
ALTER TABLE `detalles_ropa`
  ADD PRIMARY KEY (`ID_DR`);

--
-- Indices de la tabla `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD PRIMARY KEY (`nombre_Fabricante`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`ID_Maquina`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`ID_Opcion`),
  ADD KEY `Dep_Opc` (`ID_Departamento`),
  ADD KEY `Sec_Opc` (`ID_Seccion`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_Producto`);

--
-- Indices de la tabla `ropa`
--
ALTER TABLE `ropa`
  ADD PRIMARY KEY (`ID_Ropa`),
  ADD KEY `Dep_Rop` (`ID_Departamento`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`ID_Seccion`),
  ADD KEY `Dep_Sec` (`ID_Departamento`);

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
  MODIFY `ID_Delivery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `ID_Departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalles_ropa`
--
ALTER TABLE `detalles_ropa`
  MODIFY `ID_DR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `ID_Maquina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `ID_Opcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ropa`
--
ALTER TABLE `ropa`
  MODIFY `ID_Ropa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `ID_Seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `Dep_Opc` FOREIGN KEY (`ID_Departamento`) REFERENCES `departamentos` (`ID_Departamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Sec_Opc` FOREIGN KEY (`ID_Seccion`) REFERENCES `secciones` (`ID_Seccion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ropa`
--
ALTER TABLE `ropa`
  ADD CONSTRAINT `Dep_Rop` FOREIGN KEY (`ID_Departamento`) REFERENCES `departamentos` (`ID_Departamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD CONSTRAINT `Dep_Sec` FOREIGN KEY (`ID_Departamento`) REFERENCES `departamentos` (`ID_Departamento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

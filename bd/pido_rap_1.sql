-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2020 a las 17:45:49
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
  `cedula_AfiCom` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_AfiCom` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `correo_AfiCom` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `fotografia_AfiCom` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Perfil.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `afiliado_com`
--

INSERT INTO `afiliado_com` (`ID_AfiliadoCom`, `nombre_AfiCom`, `apellido_AfiCom`, `cedula_AfiCom`, `telefono_AfiCom`, `correo_AfiCom`, `fotografia_AfiCom`) VALUES
(13, 'Pablo', 'Cabeza', '12.728.036', '02542315732', 'pcabeza7@gmail.com', 'Capitan_America.jpg'),
(14, 'Silvia Noriega', '', '', '', 'veronica@gmail.com', 'Perfil.jpg'),
(28, 'Claudia', 'Camacho', '12123123', '12342343242', 'claudia@gmail.com', 'Perfil.jpg'),
(35, 'Vivas', '', '', '', 'vivas@gmail.com', 'Perfil.jpg'),
(48, 'Sebastian', '', '', '', 'sebastian@gmail.com', 'Perfil.jpg'),
(49, 'Lisbella', 'Paez', '4124007', '23422342323', 'lisbella@gmail.com', 'Perfil.jpg'),
(50, 'Jean Carlos', 'qwewq', '12123212', '23323233232', 'jean@gmail.com', 'Perfil.jpg');

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
(24, 13, '$2y$10$jlTedFjS/fSeSPenz7LE6.h8ZXhrQKV2s5uubZo.O0bsww5sS4FOi'),
(25, 14, '$2y$10$0bnCWBDiipfbpx1/b5uU9.LkJcA18x8O152knjvF3Zjf8IF7kPDre'),
(42, 28, '$2y$10$ukPu5CEs.gQa/YE/fA9qTeKmC8/CMX49uByNs3mWfCqmw9XgQd0by'),
(58, 48, '$2y$10$Tcon2JaVOKFL.34IdsBSv.Tsa8MOStKWJDKrDtflAAMdiErBR5wvS'),
(59, 49, '$2y$10$E28WWNN5DTUZfIKDa7B3PurJWvZq1i3dAzlDToYjGDKAkpNg5jjy2'),
(60, 50, '$2y$10$T8F0BtOFMdE83CuSgW5OROgz.aGpt4WBrkc4.I/Cl2OAqDPXV3SWm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_des`
--

CREATE TABLE `afiliado_des` (
  `ID_AfiliadoDes` int(11) NOT NULL,
  `nombre_AfiDes` varchar(50) NOT NULL,
  `apellido_AfiDes` varchar(50) NOT NULL,
  `cedula_AfiDes` int(11) NOT NULL,
  `telefono_AfiDes` varchar(14) NOT NULL,
  `correo_AfiDes` varchar(70) NOT NULL,
  `fotografia_AfiDes` varchar(250) NOT NULL,
  `fecha_AfiDes` date NOT NULL,
  `hora_AfiDes` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `afiliado_des`
--

INSERT INTO `afiliado_des` (`ID_AfiliadoDes`, `nombre_AfiDes`, `apellido_AfiDes`, `cedula_AfiDes`, `telefono_AfiDes`, `correo_AfiDes`, `fotografia_AfiDes`, `fecha_AfiDes`, `hora_AfiDes`) VALUES
(3, 'Antonio', 'Freitez', 12234323, '4323-234.32.3', 'antonio@gmail.com', '', '2020-10-19', '17:05:41'),
(4, 'sdfsd', 'erfd', 23432234, '123232', 'vdfdf@wewe.wer', '', '2020-11-23', '04:21:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_desingreso`
--

CREATE TABLE `afiliado_desingreso` (
  `ID_AfiliadoDesIngreso` int(11) NOT NULL,
  `ID_AfiliadoDes` int(11) NOT NULL,
  `claveCifradaDes` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `afiliado_desingreso`
--

INSERT INTO `afiliado_desingreso` (`ID_AfiliadoDesIngreso`, `ID_AfiliadoDes`, `claveCifradaDes`) VALUES
(3, 3, '$2y$10$aX/BvLHKCjU0BPexFj98NOKR2zbD2yepkdfRYSgil2267Usi5BQVm'),
(4, 4, '$2y$10$rJND01LWujo6Q6dfIfiKDOSJuLjVQgo0oyoaBr3e3Lgx3QiUf6tGm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `ID_Banco` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `bancoNombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `bancoCuenta` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `bancoTitular` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `bancoRif` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`ID_Banco`, `ID_Tienda`, `bancoNombre`, `bancoCuenta`, `bancoTitular`, `bancoRif`, `fecha`, `hora`) VALUES
(1, 225, 'qqqq', 'wwww', '22222', '33333', '2020-10-22', '11:10:21'),
(2, 225, 'qqqq', '22222', 'wwww', '33333', '2020-10-22', '11:36:21'),
(11, 48, '', '', '', '', '2020-10-23', '17:39:13'),
(22, 243, 'Mercantil', '123123123123123', 'Otaku Claud Gat C.A', 'j-123456', '2020-12-04', '08:29:04'),
(33, 263, 'Venezuela', '33333333', 'YaraCultura C.A', 'J-343444444444', '2020-12-05', '12:31:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicaproducto`
--

CREATE TABLE `caracteristicaproducto` (
  `ID_Caracteristica` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `caracteristica` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caracteristicaproducto`
--

INSERT INTO `caracteristicaproducto` (`ID_Caracteristica`, `ID_Tienda`, `ID_Producto`, `caracteristica`) VALUES
(180, 225, 114, 'Presentación de 1 Litro'),
(199, 225, 88, 'Presentación de 600 ml'),
(200, 225, 88, 'Presentación de 1 L'),
(201, 225, 88, 'Paquete de 12 unidades'),
(221, 225, 225, 'Caracteristica_a'),
(222, 225, 226, 'Caracteristica_A'),
(223, 225, 226, 'Caracteristica_B'),
(242, 225, 207, 'Presentación de 600 ml'),
(243, 225, 207, 'Grnizado'),
(257, 263, 297, ''),
(275, 263, 294, 'cvcvcvcv'),
(282, 263, 278, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID_Categoria` int(11) NOT NULL,
  `categoria` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID_Categoria`, `categoria`) VALUES
(1, 'Comida Rapida'),
(2, 'Material médico quirúrgico'),
(3, 'Minimarket'),
(4, 'Bodega'),
(5, 'Panadería'),
(6, 'Ferretería'),
(7, 'Arte'),
(8, 'Zapatería'),
(9, 'Joyas y relojería'),
(10, 'Mascotas'),
(11, 'Repuesto automotriz'),
(12, 'Farmacia'),
(13, 'Licorería'),
(14, 'Deportes'),
(15, 'Floristería'),
(16, 'Construcción'),
(17, 'Telefonos'),
(18, 'Papelería'),
(19, 'Mercería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `ID_Destino` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `link_acceso` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`ID_Destino`, `ID_Tienda`, `link_acceso`, `url`, `fecha`, `hora`) VALUES
(22, 243, 'http://localhost/proyectos/PidoRapido/Otaku Claud Gat', 'http://localhost/proyectos/PidoRapido/Vitrina_C/index/243,Otaku%20Claud%20Gat,NoNecesario_1,NoNecesario_2#no-back-button', '2020-12-03', '17:06:48'),
(25, 225, 'http://localhost/proyectos/PidoRapido/Las Empanadas de Pablo', 'http://localhost/proyectos/PidoRapido/Vitrina_C/index/225,Las%20Empanadas%20de%20Pablo,NoNecesario_1,NoNecesario_2#no-back-button', '2020-12-03', '17:30:30'),
(26, 263, 'http://localhost/proyectos/PidoRapido/YaraCultura', 'http://localhost/proyectos/PidoRapido/Vitrina_C/index/263,YaraCultura,NoNecesario_1,NoNecesario_2#no-back-button', '2020-12-04', '02:24:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dtc`
--

CREATE TABLE `dtc` (
  `ID_DTC` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `ID_Opcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dtc`
--

INSERT INTO `dtc` (`ID_DTC`, `ID_Tienda`, `ID_Producto`, `ID_Opcion`) VALUES
(3, 225, 34, 0),
(4, 225, 35, 0),
(5, 225, 36, 0),
(6, 225, 37, 37),
(7, 225, 38, 38),
(8, 225, 39, 0),
(9, 225, 40, 0),
(10, 225, 41, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `ID_estado` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`ID_estado`, `estado`) VALUES
(1, 'Amazonas'),
(2, 'Anzoátegui'),
(3, 'Apure'),
(4, 'Aragua'),
(5, 'Barinas'),
(6, 'Bolivar'),
(7, 'Carabobo'),
(8, 'Cojedes'),
(9, 'Delta Amacuro'),
(10, 'Distrito Capital'),
(11, 'Falcon'),
(12, 'Guárico'),
(13, 'Lara'),
(14, 'Mérida'),
(15, 'Miranda'),
(16, 'Monagas'),
(17, 'Nueva Esparta'),
(18, 'Portuguesa'),
(19, 'Sucre'),
(20, 'Táchira'),
(21, 'Trujillo'),
(22, 'Vargas'),
(23, 'Yaracuy'),
(24, 'Zulia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `ID_Imagen` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `nombre_img` varchar(100) NOT NULL,
  `tipoArchivo` varchar(10) NOT NULL,
  `tamanoArchivo` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`ID_Imagen`, `ID_Producto`, `nombre_img`, `tipoArchivo`, `tamanoArchivo`, `fecha`, `hora`) VALUES
(26, 111, '11796212_1619285628314543_5814297787728730671_n.jpg', 'image/jpeg', '63549', '2020-10-13', '00:00:00'),
(27, 111, '11824985_410852359039379_1378992906735878809_n.jpg', 'image/jpeg', '76474', '2020-10-13', '00:00:00'),
(28, 111, '11855782_410861349038480_4745090943963089935_n.jpg', 'image/jpeg', '76907', '2020-10-13', '00:00:00'),
(29, 111, '11866261_410861292371819_2639446233299905737_n.jpg', 'image/jpeg', '85397', '2020-10-13', '00:00:00'),
(30, 111, '11796212_1619285628314543_5814297787728730671_n.jpg', 'image/jpeg', '63549', '2020-10-13', '00:00:00'),
(31, 111, '11824985_410852359039379_1378992906735878809_n.jpg', 'image/jpeg', '76474', '2020-10-13', '00:00:00'),
(32, 111, '11855782_410861349038480_4745090943963089935_n.jpg', 'image/jpeg', '76907', '2020-10-13', '00:00:00'),
(33, 111, '11866261_410861292371819_2639446233299905737_n.jpg', 'image/jpeg', '85397', '2020-10-13', '00:00:00'),
(34, 111, '11796212_1619285628314543_5814297787728730671_n.jpg', 'image/jpeg', '63549', '2020-10-13', '00:00:00'),
(35, 111, '11824985_410852359039379_1378992906735878809_n.jpg', 'image/jpeg', '76474', '2020-10-13', '00:00:00'),
(36, 111, '11855782_410861349038480_4745090943963089935_n.jpg', 'image/jpeg', '76907', '2020-10-13', '00:00:00'),
(37, 111, '11866261_410861292371819_2639446233299905737_n.jpg', 'image/jpeg', '85397', '2020-10-13', '00:00:00'),
(38, 111, '11796212_1619285628314543_5814297787728730671_n.jpg', 'image/jpeg', '63549', '2020-10-13', '00:00:00'),
(39, 111, '11824985_410852359039379_1378992906735878809_n.jpg', 'image/jpeg', '76474', '2020-10-13', '00:00:00'),
(40, 111, '11855782_410861349038480_4745090943963089935_n.jpg', 'image/jpeg', '76907', '2020-10-13', '00:00:00'),
(41, 111, '11866261_410861292371819_2639446233299905737_n.jpg', 'image/jpeg', '85397', '2020-10-13', '00:00:00'),
(42, 111, '11796212_1619285628314543_5814297787728730671_n.jpg', 'image/jpeg', '63549', '2020-10-13', '00:00:00'),
(43, 111, '11824985_410852359039379_1378992906735878809_n.jpg', 'image/jpeg', '76474', '2020-10-13', '00:00:00'),
(44, 111, '11855782_410861349038480_4745090943963089935_n.jpg', 'image/jpeg', '76907', '2020-10-13', '00:00:00'),
(45, 111, '11866261_410861292371819_2639446233299905737_n.jpg', 'image/jpeg', '85397', '2020-10-13', '00:00:00'),
(46, 111, '11796212_1619285628314543_5814297787728730671_n.jpg', 'image/jpeg', '63549', '2020-10-13', '00:00:00'),
(47, 111, '11824985_410852359039379_1378992906735878809_n.jpg', 'image/jpeg', '76474', '2020-10-13', '00:00:00'),
(48, 111, '11855782_410861349038480_4745090943963089935_n.jpg', 'image/jpeg', '76907', '2020-10-13', '00:00:00'),
(49, 111, '11866261_410861292371819_2639446233299905737_n.jpg', 'image/jpeg', '85397', '2020-10-13', '00:00:00'),
(50, 111, '11796212_1619285628314543_5814297787728730671_n.jpg', 'image/jpeg', '63549', '2020-10-13', '00:00:00'),
(51, 111, '11824985_410852359039379_1378992906735878809_n.jpg', 'image/jpeg', '76474', '2020-10-13', '00:00:00'),
(52, 111, '11855782_410861349038480_4745090943963089935_n.jpg', 'image/jpeg', '76907', '2020-10-13', '00:00:00'),
(53, 111, '11866261_410861292371819_2639446233299905737_n.jpg', 'image/jpeg', '85397', '2020-10-13', '00:00:00'),
(54, 111, '11796212_1619285628314543_5814297787728730671_n.jpg', 'image/jpeg', '63549', '2020-10-13', '00:00:00'),
(55, 111, '11824985_410852359039379_1378992906735878809_n.jpg', 'image/jpeg', '76474', '2020-10-13', '00:00:00'),
(56, 111, '11855782_410861349038480_4745090943963089935_n.jpg', 'image/jpeg', '76907', '2020-10-13', '00:00:00'),
(57, 111, '11866261_410861292371819_2639446233299905737_n.jpg', 'image/jpeg', '85397', '2020-10-13', '00:00:00'),
(58, 111, '11796212_1619285628314543_5814297787728730671_n.jpg', 'image/jpeg', '63549', '2020-10-13', '00:00:00'),
(59, 111, '11824985_410852359039379_1378992906735878809_n.jpg', 'image/jpeg', '76474', '2020-10-13', '00:00:00'),
(60, 111, '11855782_410861349038480_4745090943963089935_n.jpg', 'image/jpeg', '76907', '2020-10-13', '00:00:00'),
(61, 111, '11866261_410861292371819_2639446233299905737_n.jpg', 'image/jpeg', '85397', '2020-10-13', '00:00:00'),
(66, 206, '10606444_869341043089811_9186129342283433217_n.jpg', 'image/jpeg', '117124', '2020-10-13', '00:00:00'),
(67, 206, '10690281_10204707629466919_1479289193141800364_n.jpg', 'image/jpeg', '22551', '2020-10-13', '00:00:00'),
(68, 206, '11659520_402645213193427_3402334283124489552_n.jpg', 'image/jpeg', '75366', '2020-10-13', '00:00:00'),
(69, 206, '11796212_1619285628314543_5814297787728730671_n.jpg', 'image/jpeg', '63549', '2020-10-13', '00:00:00'),
(70, 207, 'jugo de remolacha_2.jpg', 'image/jpeg', '9865', '2020-10-13', '00:00:00'),
(71, 207, 'jugo de remolacha_4.jpg', 'image/jpeg', '9873', '2020-10-13', '00:00:00'),
(72, 207, 'jugo de remolacha_5.jpg', 'image/jpeg', '4929', '2020-10-13', '00:00:00'),
(73, 207, 'jugo de remolacha_6.jpg', 'image/jpeg', '137663', '2020-10-13', '00:00:00'),
(82, 114, 'avion_1.jpg', 'image/jpeg', '3560', '2020-10-15', '00:00:00'),
(83, 114, 'avion_2.jpg', 'image/jpeg', '4160', '2020-10-15', '00:00:00'),
(112, 88, 'avion_1.jpg', 'image/jpeg', '3560', '2020-10-16', '00:00:00'),
(113, 88, 'avion_2.jpg', 'image/jpeg', '4160', '2020-10-16', '00:00:00'),
(143, 226, 'avion_7.jpg', 'image/jpeg', '4456', '2020-10-16', '00:00:00'),
(144, 226, 'avion_8.jpg', 'image/jpeg', '60957', '2020-10-16', '00:00:00'),
(145, 226, 'barco_1.jpg', 'image/jpeg', '13099', '2020-10-16', '00:00:00'),
(146, 226, 'barco_2.jpg', 'image/jpeg', '11411', '2020-10-16', '00:00:00'),
(153, 244, 'barco_5.jpg', 'image/jpeg', '2445', '2020-10-16', '17:13:43'),
(155, 246, 'avion_7.jpg', 'image/jpeg', '4456', '2020-10-16', '17:22:42'),
(156, 246, 'avion_8.jpg', 'image/jpeg', '60957', '2020-10-16', '17:22:42'),
(157, 246, 'barco_1.jpg', 'image/jpeg', '13099', '2020-10-16', '17:22:42'),
(159, 246, 'barco_2.jpg', 'image/jpeg', '11411', '2020-10-16', '17:51:08'),
(161, 246, 'avion_7.jpg', 'image/jpeg', '4456', '2020-10-16', '18:09:17'),
(170, 234, '119718974_10158850154247500_5436574184371895021_o.jpg', 'image/jpeg', '320585', '2020-10-28', '15:15:48'),
(171, 234, '119893672_781659322671013_4170915733607408990_n.jpg', 'image/jpeg', '65118', '2020-10-28', '15:15:48'),
(172, 234, '121786061_10158915974227500_9116927780154669440_o.jpg', 'image/jpeg', '120396', '2020-10-28', '15:15:48'),
(173, 234, 'Claudia.jpg', 'image/jpeg', '89578', '2020-10-28', '15:15:48'),
(174, 234, 'Claudia_2.jpg', 'image/jpeg', '125958', '2020-10-28', '15:15:48'),
(175, 235, 'Claudia_11.jpeg', 'image/jpeg', '47712', '2020-10-29', '00:40:38'),
(176, 235, 'Claudia_12.jpeg', 'image/jpeg', '119773', '2020-10-29', '00:40:38'),
(177, 235, 'Claudia_13.jpeg', 'image/jpeg', '54243', '2020-10-29', '00:40:38'),
(178, 235, 'Claudia_14.jpeg', 'image/jpeg', '55070', '2020-10-29', '00:40:38'),
(179, 235, 'Claudia_15.jpeg', 'image/jpeg', '145499', '2020-10-29', '00:40:38'),
(180, 236, 'Claudia_3 (1).jpeg', 'image/jpeg', '211820', '2020-10-29', '00:49:42'),
(181, 236, 'Claudia_3 (2).jpeg', 'image/jpeg', '52647', '2020-10-29', '00:49:42'),
(182, 236, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '00:49:42'),
(183, 236, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '00:49:42'),
(184, 236, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '00:49:42'),
(185, 237, 'Claudia_3 (1).jpeg', 'image/jpeg', '211820', '2020-10-29', '00:55:56'),
(186, 237, 'Claudia_3 (2).jpeg', 'image/jpeg', '52647', '2020-10-29', '00:55:56'),
(187, 237, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '00:55:56'),
(188, 237, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '00:55:56'),
(189, 237, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '00:55:56'),
(190, 238, 'Claudia_3 (1).jpeg', 'image/jpeg', '211820', '2020-10-29', '00:56:21'),
(191, 238, 'Claudia_3 (2).jpeg', 'image/jpeg', '52647', '2020-10-29', '00:56:21'),
(192, 238, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '00:56:21'),
(193, 238, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '00:56:21'),
(194, 238, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '00:56:21'),
(195, 239, 'Claudia_3 (1).jpeg', 'image/jpeg', '211820', '2020-10-29', '00:58:43'),
(196, 239, 'Claudia_3 (2).jpeg', 'image/jpeg', '52647', '2020-10-29', '00:58:43'),
(197, 239, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '00:58:43'),
(198, 239, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '00:58:43'),
(199, 239, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '00:58:43'),
(200, 240, 'Claudia_3 (1).jpeg', 'image/jpeg', '211820', '2020-10-29', '01:00:15'),
(201, 240, 'Claudia_3 (2).jpeg', 'image/jpeg', '52647', '2020-10-29', '01:00:15'),
(202, 240, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '01:00:15'),
(203, 240, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '01:00:15'),
(204, 240, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '01:00:15'),
(205, 241, 'Claudia_3 (1).jpeg', 'image/jpeg', '211820', '2020-10-29', '01:00:37'),
(206, 241, 'Claudia_3 (2).jpeg', 'image/jpeg', '52647', '2020-10-29', '01:00:37'),
(207, 241, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '01:00:37'),
(208, 241, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '01:00:37'),
(209, 241, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '01:00:37'),
(210, 242, 'Claudia_3 (1).jpeg', 'image/jpeg', '211820', '2020-10-29', '01:01:13'),
(211, 242, 'Claudia_3 (2).jpeg', 'image/jpeg', '52647', '2020-10-29', '01:01:13'),
(212, 242, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '01:01:13'),
(213, 242, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '01:01:13'),
(214, 242, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '01:01:13'),
(215, 243, 'Claudia_3 (1).jpeg', 'image/jpeg', '211820', '2020-10-29', '01:01:52'),
(216, 243, 'Claudia_3 (2).jpeg', 'image/jpeg', '52647', '2020-10-29', '01:01:52'),
(217, 243, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '01:01:52'),
(218, 243, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '01:01:52'),
(219, 243, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '01:01:52'),
(220, 244, 'Claudia_3 (1).jpeg', 'image/jpeg', '211820', '2020-10-29', '01:02:22'),
(221, 244, 'Claudia_3 (2).jpeg', 'image/jpeg', '52647', '2020-10-29', '01:02:22'),
(222, 244, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '01:02:22'),
(223, 244, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '01:02:22'),
(224, 244, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '01:02:22'),
(225, 245, 'Claudia_3 (1).jpeg', 'image/jpeg', '211820', '2020-10-29', '01:02:45'),
(226, 245, 'Claudia_3 (2).jpeg', 'image/jpeg', '52647', '2020-10-29', '01:02:45'),
(227, 245, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '01:02:45'),
(228, 245, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '01:02:45'),
(229, 245, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '01:02:45'),
(230, 246, 'Claudia_3 (1).jpeg', 'image/jpeg', '211820', '2020-10-29', '01:03:39'),
(231, 246, 'Claudia_3 (2).jpeg', 'image/jpeg', '52647', '2020-10-29', '01:03:39'),
(232, 246, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '01:03:39'),
(233, 246, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '01:03:39'),
(234, 246, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '01:03:39'),
(236, 248, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '01:45:33'),
(237, 248, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '01:45:33'),
(238, 248, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '01:45:33'),
(239, 248, 'Claudia_6 (2).jpeg', 'image/jpeg', '197285', '2020-10-29', '01:45:33'),
(240, 248, 'claudia_7.jpg', 'image/jpeg', '1687847', '2020-10-29', '01:45:33'),
(241, 249, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '01:47:52'),
(242, 249, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '01:47:52'),
(243, 249, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '01:47:52'),
(244, 249, 'Claudia_6 (2).jpeg', 'image/jpeg', '197285', '2020-10-29', '01:47:52'),
(245, 249, 'claudia_7.jpg', 'image/jpeg', '1687847', '2020-10-29', '01:47:52'),
(246, 250, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '01:48:16'),
(247, 250, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '01:48:16'),
(248, 250, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '01:48:16'),
(249, 250, 'Claudia_6 (2).jpeg', 'image/jpeg', '197285', '2020-10-29', '01:48:16'),
(250, 250, 'claudia_7.jpg', 'image/jpeg', '1687847', '2020-10-29', '01:48:16'),
(251, 251, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '01:49:21'),
(252, 251, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '01:49:21'),
(253, 251, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '01:49:21'),
(254, 251, 'Claudia_6 (2).jpeg', 'image/jpeg', '197285', '2020-10-29', '01:49:21'),
(255, 251, 'claudia_7.jpg', 'image/jpeg', '1687847', '2020-10-29', '01:49:21'),
(256, 252, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '01:50:19'),
(257, 252, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '01:50:19'),
(258, 252, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '01:50:19'),
(259, 252, 'Claudia_6 (2).jpeg', 'image/jpeg', '197285', '2020-10-29', '01:50:19'),
(260, 252, 'claudia_7.jpg', 'image/jpeg', '1687847', '2020-10-29', '01:50:19'),
(261, 253, 'Claudia_4.jpg', 'image/jpeg', '161254', '2020-10-29', '01:52:50'),
(262, 253, 'Claudia_5.jpg', 'image/jpeg', '31910', '2020-10-29', '01:52:50'),
(263, 253, 'Claudia_6 (1).jpeg', 'image/jpeg', '126094', '2020-10-29', '01:52:50'),
(264, 253, 'Claudia_6 (2).jpeg', 'image/jpeg', '197285', '2020-10-29', '01:52:50'),
(265, 253, 'claudia_7.jpg', 'image/jpeg', '1687847', '2020-10-29', '01:52:50'),
(271, 259, 'IMG-20191110-WA0018.jpg', 'image/jpeg', '254691', '2020-10-29', '02:21:53'),
(272, 259, 'IMG-20191110-WA0021.jpg', 'image/jpeg', '286739', '2020-10-29', '02:21:53'),
(288, 273, 'Jellyfish.jpg', 'image/jpeg', '775702', '2020-11-13', '17:47:13'),
(290, 275, 'Chrysanthemum.jpg', 'image/jpeg', '879394', '2020-11-15', '10:47:56'),
(302, 295, 'Chrysanthemum.jpg', 'image/jpeg', '879394', '2020-11-27', '19:49:55'),
(303, 295, 'Desert.jpg', 'image/jpeg', '845941', '2020-11-27', '19:49:55'),
(304, 297, 'Chrysanthemum.jpg', 'image/jpeg', '879394', '2020-11-27', '19:56:26'),
(305, 297, 'Desert.jpg', 'image/jpeg', '845941', '2020-11-27', '19:56:26'),
(312, 297, 'Lighthouse.jpg', 'image/jpeg', '561276', '2020-11-27', '20:32:59'),
(313, 297, 'Hydrangeas.jpg', 'image/jpeg', '595284', '2020-11-27', '20:32:59'),
(317, 294, 'Chrysanthemum.jpg', 'image/jpeg', '879394', '2020-11-28', '05:19:45'),
(320, 294, 'Chrysanthemum.jpg', 'image/jpeg', '879394', '2020-11-28', '05:28:09'),
(331, 294, 'Chrysanthemum.jpg', 'image/jpeg', '879394', '2020-11-28', '17:00:32'),
(333, 294, 'Jellyfish.jpg', 'image/jpeg', '775702', '2020-11-28', '17:01:37'),
(334, 279, 'Lighthouse.jpg', 'image/jpeg', '561276', '2020-12-01', '16:34:36'),
(335, 279, 'Hydrangeas.jpg', 'image/jpeg', '595284', '2020-12-01', '16:34:36'),
(336, 279, 'Koala.jpg', 'image/jpeg', '780831', '2020-12-01', '16:34:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `ID_Municipio` int(11) NOT NULL,
  `ID_Estado` int(11) NOT NULL,
  `municipio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`ID_Municipio`, `ID_Estado`, `municipio`) VALUES
(1, 1, 'Alto Orinoco'),
(2, 1, 'Atabapo'),
(3, 1, 'Atures'),
(4, 1, 'Autana'),
(5, 1, 'Manapiare'),
(6, 1, 'Maroa'),
(7, 1, 'Rio Negro'),
(8, 2, 'Anaco'),
(9, 2, 'Aragua'),
(10, 2, 'Bolívar'),
(11, 2, 'Bruzual'),
(12, 2, 'Carvajal'),
(13, 2, 'Cajigal'),
(14, 2, 'Diego Bautista Urbaneja'),
(15, 2, 'Freites'),
(16, 2, 'Guanta'),
(17, 2, 'Guanipa'),
(18, 2, 'Independencia'),
(19, 2, 'Libertad'),
(20, 2, 'Miranda'),
(21, 2, 'Monagas'),
(22, 2, 'Peñalver'),
(23, 2, 'Piritu'),
(24, 2, 'San Juan de Capistrano'),
(25, 2, 'Santa Ana'),
(26, 2, 'Simón Rodríguez'),
(27, 2, 'Sir Arthur McGregor'),
(28, 2, 'Sotillo'),
(29, 3, 'Achaguas'),
(30, 3, 'Biruaca'),
(31, 3, 'Muñoz'),
(32, 3, 'Paéz'),
(33, 3, 'Pedro Camejo'),
(34, 3, 'Rómulo Gallegos'),
(35, 3, 'San Fernando'),
(36, 4, 'Bolívar'),
(37, 4, 'Camatagua'),
(38, 4, 'Francisco Linares Alcántara'),
(39, 4, 'Girardot'),
(40, 4, 'José Ángel Lamas'),
(41, 4, 'José Félix Rívas'),
(42, 4, 'José Rafael Revenga'),
(43, 4, 'Libertador'),
(44, 4, 'Mario Briceño Iragorry'),
(45, 4, 'Ocumare'),
(46, 4, 'San Casimiro'),
(47, 4, 'San Sebastián'),
(48, 4, 'Santiago Mariño'),
(49, 4, 'Santos Michelena'),
(50, 4, 'Sucre'),
(51, 4, 'Tovar'),
(52, 4, 'Urdaneta'),
(53, 4, 'Zamora'),
(54, 5, 'Alberto Arvelo Torrealba'),
(55, 5, 'Andrés Eloy Blanco'),
(56, 5, 'Antonio Jose de Sucre'),
(57, 5, 'Arismendi'),
(58, 5, 'Barinas'),
(59, 5, 'Bolívar'),
(60, 5, 'Cruz Paredes'),
(61, 5, 'Ezequiel Zamora'),
(62, 5, 'Obispos'),
(63, 5, 'Pedraza'),
(64, 5, 'Rojas'),
(65, 5, 'Sosa'),
(66, 6, 'Angostura'),
(67, 6, 'Caroní'),
(68, 6, 'Cedeño'),
(69, 6, 'El Callao'),
(70, 6, 'Gran Sabana'),
(71, 6, 'Heres'),
(72, 6, 'Padre Pedro Chien'),
(73, 6, 'Piar'),
(74, 6, 'Roscio'),
(75, 6, 'Sifones'),
(76, 6, 'Sucre'),
(77, 7, 'Bejuma'),
(78, 7, 'Carlos Arvelo'),
(79, 7, 'Diego Ibarra'),
(80, 7, 'Guacara'),
(81, 7, 'Juan Jose Mora'),
(82, 7, 'Libertador'),
(83, 7, 'Los Guayos'),
(84, 7, 'Miranda'),
(85, 7, 'Montalban'),
(86, 7, 'Naguanagua'),
(87, 7, 'Puerto Cabello'),
(88, 7, 'San Diego'),
(89, 7, 'San Joaquín'),
(90, 7, 'Valencia'),
(91, 8, 'Anzoátegui'),
(92, 8, 'Ezequiel Zamora'),
(93, 8, 'Girardot'),
(94, 8, 'Lima Blanco'),
(95, 8, 'Pao de San Juan Bautista'),
(96, 8, 'Ricaurte'),
(97, 8, 'Rómulo Gallegos'),
(98, 8, 'Tinaco'),
(99, 8, 'Tinaquillo'),
(100, 9, 'Antonio Diaz'),
(101, 9, 'Casacoima'),
(102, 9, 'Pedernales'),
(103, 9, 'Tucupita'),
(104, 10, 'Libertador'),
(105, 11, 'Acosta'),
(106, 11, 'Bolívar'),
(107, 11, 'Buchivacoa'),
(108, 11, 'Cacique Manaure'),
(109, 11, 'Carirubana'),
(110, 11, 'Colina'),
(111, 11, 'Dabajuro'),
(112, 11, 'Democracia'),
(113, 11, 'Falcón'),
(114, 11, 'Federación'),
(115, 11, 'Jacura'),
(116, 11, 'Los Taques'),
(117, 11, 'Miranda'),
(118, 11, 'Mauroa'),
(119, 11, 'Monseñor Iturriza'),
(120, 11, 'Palma Sola'),
(121, 11, 'Petit'),
(122, 11, 'Píritu'),
(123, 11, 'San Francisco'),
(124, 11, 'Silva'),
(125, 11, 'Sucre'),
(126, 11, 'Tocópero'),
(127, 11, 'Unión'),
(128, 11, 'Urumaco'),
(129, 11, 'Zamora'),
(130, 12, 'Camaguán'),
(131, 12, 'Chaguaramas'),
(132, 12, 'El Socorro'),
(133, 12, 'Infante'),
(134, 12, 'Juan Germán Roscio'),
(135, 12, 'Las Mercedes'),
(136, 12, 'Mellado'),
(137, 12, 'Miranda'),
(138, 12, 'Monagas'),
(139, 12, 'Ortiz'),
(140, 12, 'Ribas'),
(141, 12, 'San Geronimo de Guayabal'),
(142, 12, 'San José de Guaribe'),
(143, 12, 'Santa María de Ipire'),
(144, 12, 'Zaraza'),
(145, 13, 'Andrés Eloy Blanco'),
(146, 13, 'Crespo'),
(147, 13, 'Iribarren'),
(148, 13, 'Jiménez'),
(149, 13, 'Morán'),
(150, 13, 'Palavecino'),
(151, 13, 'Simón Planas'),
(152, 13, 'Torres'),
(153, 13, 'Uradneta'),
(154, 14, 'Alberto Adriani'),
(155, 14, 'Andrés Bello'),
(156, 14, 'Antonio Pinto Salinas'),
(157, 14, 'Aricagua'),
(158, 14, 'Arzobispo Chacón'),
(159, 14, 'Campo Elías'),
(160, 14, 'Caracciolo Parra Olmedo'),
(161, 14, 'Cardenal Quintero'),
(162, 14, 'Guaraque'),
(163, 14, 'Julio César Salas'),
(164, 14, 'Justo Briceño'),
(165, 14, 'Libertador'),
(166, 14, 'Miranda'),
(167, 14, 'Obispo Ramos de Lora'),
(168, 14, 'Padre Noguera'),
(169, 14, 'Pueblo Llano'),
(170, 14, 'Rangel'),
(171, 14, 'Rivas Dávila'),
(172, 14, 'Santos Marquina'),
(173, 14, 'Sucre'),
(174, 14, 'Tovar'),
(175, 14, 'Tulio Febres Cordero'),
(176, 14, 'Zea'),
(177, 15, 'Acevedo'),
(178, 15, 'Andrés Bello'),
(179, 15, 'Baruta'),
(180, 15, 'Brión'),
(181, 15, 'Buroz'),
(182, 15, 'Carrizal'),
(183, 15, 'Chacao'),
(184, 15, 'Cristóbal Rojas'),
(185, 15, 'El Hatillo'),
(186, 15, 'Guaicaipuro'),
(187, 15, 'Independencia'),
(188, 15, 'Los Salias'),
(189, 15, 'Páez'),
(190, 15, 'Paz Castillo'),
(191, 15, 'Pedro Gual'),
(192, 15, 'Plaza'),
(193, 15, 'Simón Bolívar'),
(194, 15, 'Sucre'),
(195, 15, 'Tomás Lander'),
(196, 15, 'Urdaneta'),
(197, 15, 'Zamora'),
(198, 16, 'Acosta'),
(199, 16, 'Aguasay'),
(200, 16, 'Bolivar'),
(201, 16, 'Caripe'),
(202, 16, 'Cedeño'),
(203, 16, 'Ezequiel Zamora'),
(204, 16, 'Libertador'),
(205, 16, 'Maturín'),
(206, 16, 'Piar'),
(207, 16, 'Punceres'),
(208, 16, 'Santa Bárbara'),
(209, 16, 'Sotillo'),
(210, 16, 'Uracoa'),
(211, 17, 'Antolín del Campo'),
(212, 17, 'Arismendi'),
(213, 17, 'Díaz'),
(214, 17, 'García'),
(215, 17, 'Gómez'),
(216, 17, 'Maneiro'),
(217, 17, 'Marcano'),
(218, 17, 'Mariño'),
(219, 17, 'Península de Macanao'),
(220, 17, 'Tubores'),
(221, 17, 'Villalbal'),
(222, 18, 'Agua Blanca'),
(223, 18, 'Araure'),
(224, 18, 'Esteller'),
(225, 18, 'Guanare'),
(226, 18, 'Guanarito'),
(227, 18, 'Monseñor Jose Vicente de Unda'),
(228, 18, 'Ospino'),
(229, 18, 'Páez'),
(230, 18, 'Papelón'),
(231, 18, 'San Genaro de Boconoito'),
(232, 18, 'San Rafael de Onoto'),
(233, 18, 'Santa Rosalía'),
(234, 18, 'Sucre'),
(235, 18, 'Turén'),
(236, 19, 'Andrés Eloy Blanco'),
(237, 19, 'Andrés Mata'),
(238, 19, 'Arismendi'),
(239, 19, 'Benítez'),
(240, 19, 'Bermúdez'),
(241, 19, 'Bolívar'),
(242, 19, 'Cajigal'),
(243, 19, 'Cruz Salmerón Acosta'),
(244, 19, 'Libertador'),
(245, 19, 'Mariño'),
(246, 19, 'Mejía'),
(247, 19, 'Montes'),
(248, 19, 'Ribero'),
(249, 19, 'Sucre'),
(250, 19, 'Valdez'),
(251, 20, 'Andrés Bello'),
(252, 20, 'Antonio Rómulo Costa'),
(253, 20, 'Ayacucho'),
(254, 20, 'Bolívar'),
(255, 20, 'Cárdenas'),
(256, 20, 'Córdoba'),
(257, 20, 'Fernández Feo'),
(258, 20, 'Francisco de Miranda'),
(259, 20, 'García de Hevia'),
(260, 20, 'Guásimos'),
(261, 20, 'Independencia'),
(262, 20, 'Jáuregui'),
(263, 20, 'José María Vargas'),
(264, 20, 'Junín'),
(265, 20, 'Libertad'),
(266, 20, 'Libertador'),
(267, 20, 'Labatera'),
(268, 20, 'Michelena'),
(269, 20, 'Panamericano'),
(270, 20, 'Pedro María de Uerña'),
(271, 20, 'Rafael Urdaneta'),
(272, 20, 'Samuel Darío Maldonado'),
(273, 20, 'San Cristobal'),
(274, 20, 'San Judas Tadeo'),
(275, 20, 'Seboruco'),
(276, 20, 'Simón Rodríguez'),
(277, 20, 'Sucre'),
(278, 20, 'Torbes'),
(279, 20, 'Uribante'),
(280, 21, 'Andrés Bello'),
(281, 21, 'Boconó'),
(282, 21, 'Bolívar'),
(283, 21, 'Candelaria'),
(284, 21, 'Carache'),
(285, 21, 'Escuque'),
(286, 21, 'J. Felipe Marquez Cañizales'),
(287, 21, 'Juan Vicente Campo Elías'),
(288, 21, 'La Ceiba'),
(289, 21, 'Miranda'),
(290, 21, 'Monte Carmelo'),
(291, 21, 'Motatán'),
(292, 21, 'Pampán'),
(293, 21, 'Pampanito'),
(294, 21, 'Rafael Rangel'),
(295, 21, 'San Rafael de Carvajal'),
(296, 21, 'Sucre'),
(297, 21, 'Trujillo'),
(298, 21, 'Urdaneta'),
(299, 21, 'Valera'),
(300, 22, 'Vargas'),
(301, 23, 'Aristides Bastidas'),
(302, 23, 'Bolivar'),
(303, 23, 'Bruzual'),
(304, 23, 'Cocorote'),
(305, 23, 'Independencia'),
(306, 23, 'Jose Antonio Paez'),
(307, 23, 'La Trinidad'),
(308, 23, 'Manuel Monge'),
(309, 23, 'Nirgua'),
(310, 23, 'Peña'),
(311, 23, 'San Felipe'),
(312, 23, 'Sucre'),
(313, 23, 'Urachiche'),
(314, 23, 'Veroes'),
(315, 24, 'Almirante Padilla'),
(316, 24, 'Baralt'),
(317, 24, 'Cabimas'),
(318, 24, 'Catatumbo'),
(319, 24, 'Colón'),
(320, 24, 'Francisco Javier Pulgar'),
(321, 24, 'Guajira'),
(322, 24, 'Jesús María Semprún'),
(323, 24, 'La Cañada de Urdaneta'),
(324, 24, 'Lagunillas'),
(325, 24, 'Lossada'),
(326, 24, 'Machiques de Perijá'),
(327, 24, 'Mara'),
(328, 24, 'Maracaibo'),
(329, 24, 'Miranda'),
(330, 24, 'Rosario de Perijá'),
(331, 24, 'San Francisco'),
(332, 24, 'Santa Rita'),
(333, 24, 'Simón Bolívar'),
(334, 24, 'Sucre'),
(335, 24, 'Valmore Rodríguez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `ID_Opcion` int(11) NOT NULL,
  `opcion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `especificacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No_Aplica',
  `precio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fotografia` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'imagenProd.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`ID_Opcion`, `opcion`, `especificacion`, `precio`, `fotografia`) VALUES
(59, 'Limon', 'No_Aplica', '1500', 'jugolimon.jpg'),
(61, '600 ml', 'No_Aplica', '1000', 'imagenProd.png'),
(66, 'Carne molida', 'No_Aplica', '2000', 'papa rellena_1.jpg'),
(67, 'Queso y carne', 'No_Aplica', '2100', 'papa rellena_3.jpg'),
(68, 'Mora', 'No_Aplica', '1300', 'jugoMora.jpg'),
(69, 'Piña', 'No_Aplica', '1600', 'jugo de piña.jpg'),
(70, 'Fresa', 'No_Aplica', '2000', 'jugo de fresa.jpg'),
(71, 'Guayaba', 'No_Aplica', '1300', 'jugoGuayaba.jpg'),
(73, 'Parchita', 'No_Aplica', '1500', 'jugo de parchita.jpg'),
(74, 'Zanahoria', 'No_Aplica', '1700', 'jugo Zanahoria.jpg'),
(80, 'Mango', 'No_Aplica', '1500', 'jugoMango.jpg'),
(86, 'Mandarina', 'No_Aplica', '4300', 'gatorade mandarina.jpg'),
(87, 'Carne molida', 'No_Aplica', '1300', 'empanada_4.jpg'),
(88, 'Azul mora', 'zzzzzzz xxxxxxxxxxxxxxxx yyyyyyyyyyyyyyyy', '4300', 'gatorade Azul.jpg'),
(90, 'Frutas tropicales', 'qqqqqqqqqqq wwwwwwwwwwww eeeeeeeeeeeeeeeee', '4500', 'gatorade frutasTro.jpg'),
(92, '1 Litro', 'No_Aplica', '1300', 'imagenProd.png'),
(94, 'Naranja hit', 'No_Aplica', '4500', 'imagenProd.png'),
(98, 'Jamón, queso y huevo', 'No_Aplica', '2100', 'papa rellena_2.jpg'),
(100, 'Naranja, piña y zana', 'No_Aplica', '2000', 'imagenProd.png'),
(102, 'Carne mechada', 'No_Aplica', '1800', 'empanada_5.jpg'),
(103, 'Queso', 'No_Aplica', '1500', 'empanada_1.jpg'),
(104, 'Color azul', 'No_Aplica', '20000', 'imagenProd.png'),
(105, 'Carne molida', 'No_Aplica', '2000', 'imagenProd.png'),
(106, 'Carne molida', 'No_Aplica', '1500', 'imagenProd.png'),
(113, 'Fierce manzana verde', '', '1212', 'Gatorade_Fierce_Manzana_Verde.jpg'),
(114, '1 año de vida', 'No_Aplica', '30000', 'siames_1.jpg'),
(115, 'Siames', 'No_Aplica', '25000', 'siames_1.jpg'),
(116, 'Siames', 'No_Aplica', '25000', 'siames_2.jpg'),
(117, 'Cachorro siames', 'No_Aplica', '15000', 'siames_3.jpg'),
(118, 'Criollo', 'No_Aplica', '5000', 'criollo_2.jpg'),
(119, 'Criollo', 'No_Aplica', '7000', 'criollo_3.jpg'),
(120, '1 año de vida', 'No_Aplica', '23000', 'angora_3.jpg'),
(121, 'Dos meses de vida', 'No_Aplica', '40000', 'angora_2.jpg'),
(122, '5 años de vida', 'No_Aplica', '10000', 'angora.jpg'),
(123, 'En adopcion', 'No_Aplica', '0', 'criollo_1.jpg'),
(124, 'Color marron', 'No_Aplica', '15000', 'angora_4.jpg'),
(125, 'Caraota con queso', 'No_Aplica', '1000', 'empanada_3.jpg'),
(126, 'Caraota', 'No_Aplica', '1000', 'empanada_2.jpg'),
(127, 'Macho', 'No_Aplica', '50000', 'siames_1.jpg'),
(128, 'Hembra, 2 años ', 'No_Aplica', '30000', 'siames_3.jpg'),
(129, '4 años de edad', 'No_Aplica', '15000', 'siames_2.jpg'),
(130, 'Cariñoso y amigable', 'No_Aplica', '0', 'criollo_2.jpg'),
(131, 'Hembra, dos partos', 'No_Aplica', '100', 'criollo_3.jpg'),
(132, 'Familia ade cuatro', 'No_Aplica', '10000', 'criollo_4.jpg'),
(141, 'Batido con leche', 'No_Aplica', '3000', 'jugo de remolacha_1.jpg'),
(205, 'b', 'No_Aplica', '2', '11866261_410861292371819_2639446233299905737_n.jpg'),
(206, 'Petalos de 5 plg ', 'No_Aplica', '20000', 'Chrysanthemum.jpg'),
(207, 'wwwww', 'No_Aplica', '1243', 'Lighthouse.jpg'),
(208, 'wwwww', 'No_Aplica', '1243', 'Penguins.jpg'),
(209, 'wwwww', 'No_Aplica', '1243', 'Tulips.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagomovil`
--

CREATE TABLE `pagomovil` (
  `ID_Pagomovil` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `cedula_pagomovil` int(11) NOT NULL,
  `banco_pagomovil` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono_pagomovil` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagomovil`
--

INSERT INTO `pagomovil` (`ID_Pagomovil`, `ID_Tienda`, `cedula_pagomovil`, `banco_pagomovil`, `telefono_pagomovil`, `fecha`, `hora`) VALUES
(26, 264, 0, 'asdasdasdasd', '23432343434', '2020-11-01', '12:47:35'),
(146, 263, 12728036, 'Mercantil', '04143541194', '2020-12-05', '12:31:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquias`
--

CREATE TABLE `parroquias` (
  `ID_Parroquia` int(11) NOT NULL,
  `parroquia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ID_Pedidos` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `seccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `producto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `opcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `total` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `aleatorio` int(11) NOT NULL,
  `codigoPago` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ID_Pedidos`, `ID_Tienda`, `seccion`, `producto`, `cantidad`, `opcion`, `precio`, `total`, `aleatorio`, `codigoPago`, `fecha`, `hora`) VALUES
(86, 225, 'Jugos', 'Jugo', 1, 'Fresa', '2.000', '2.000', 116236136, 'sdfsdx', '2020-11-05', '12:03:00'),
(87, 225, 'Jugos', 'Jugo', 1, 'Mango', '1.500', '1.500', 116236136, 'sdfsdx', '2020-11-05', '12:03:00'),
(88, 243, 'Criollo', 'Gato criollo', 1, 'En adopcion', '0', '0', 890264399, 'sdfsdx', '2020-11-05', '12:05:00'),
(89, 243, 'Angora', 'Gato Angora', 1, '1 año de vida', '23.000', '23.000', 653389663, 'sdfsdx', '2020-11-05', '12:07:00'),
(90, 243, 'Angora', 'Gato Angora', 1, '1 año de vida', '23.000', '23.000', 835012143, 'sdfsdx', '2020-11-05', '12:07:00'),
(91, 243, 'Angora', 'Gato Angora', 1, '1 año de vida', '23.000', '23.000', 179805429, 'sdfsdx', '2020-11-05', '12:28:00'),
(92, 243, 'Criollo', 'Gato criollo', 1, 'En adopcion', '0', '0', 616838751, 'sdfsdx', '2020-11-05', '12:29:00'),
(93, 243, 'Criollo', 'Gato criollo', 1, 'En adopcion', '0', '0', 261286498, 'sdfsdx', '2020-11-05', '12:29:00'),
(94, 243, 'Criollo', 'Gato criollo', 1, 'En adopcion', '0', '0', 721445456, 'sdfsdx', '2020-11-05', '12:29:00'),
(95, 225, 'Jugos', 'Jugo', 2, 'Fresa', '2.000', '4.000', 247931119, 'sdfsdx', '2020-11-08', '05:47:00'),
(96, 225, 'Jugos', 'Jugo', 1, 'Mora', '1.300', '1.300', 247931119, 'sdfsdx', '2020-11-08', '05:47:00'),
(97, 225, 'Jugos', 'Jugo', 3, 'Piña', '1.600', '4.800', 247931119, 'sdfsdx', '2020-11-08', '05:47:00'),
(98, 225, 'Empanadas', 'Empanada', 2, 'Caraota', '1.000', '2.000', 247931119, 'sdfsdx', '2020-11-08', '05:47:00'),
(99, 225, 'Empanadas', 'Empanada', 3, 'Carne molida', '1.300', '3.900', 247931119, 'sdfsdx', '2020-11-08', '05:47:00'),
(100, 225, 'Empanadas', 'Empanada', 1, 'Queso', '1.500', '1.500', 247931119, 'sdfsdx', '2020-11-08', '05:47:00'),
(101, 225, 'Jugos', 'Jugo de remolacha', 1, 'Batido con leche', '3.000', '3.000', 247931119, 'sdfsdx', '2020-11-08', '05:47:00'),
(102, 225, 'Empanadas', 'Empanada', 3, 'Caraota', '1.000', '3.000', 472249681, 'werwrewerwe', '2020-11-08', '19:58:00'),
(103, 225, 'Empanadas', 'Empanada', 2, 'Queso', '1.500', '3.000', 472249681, 'werwrewerwe', '2020-11-08', '19:58:00'),
(104, 225, 'Empanadas', 'Empanada', 1, 'Carne molida', '1.300', '1.300', 472249681, 'werwrewerwe', '2020-11-08', '19:58:00'),
(105, 225, 'Jugos', 'Jugo de remolacha', 2, 'Batido con leche', '3.000', '6.000', 472249681, 'werwrewerwe', '2020-11-08', '19:58:00'),
(106, 225, 'Jugos', 'Jugo', 1, 'Limon', '1.500', '1.500', 472249681, 'werwrewerwe', '2020-11-08', '19:58:00'),
(107, 225, 'Pasteles', 'Pastel', 1, 'Carne molida', '2.000', '2.000', 598943471, '', '2020-11-13', '12:26:00'),
(108, 243, 'Angora', 'Gatote', 1, '5 años de vida', '10.000', '10.000', 779124836, '', '2020-11-13', '14:49:00'),
(109, 243, 'Siamés', 'Gato', 1, '4 años de edad', '15.000', '15.000', 375030265, '', '2020-11-13', '15:09:00'),
(110, 243, 'Siamés', 'Gato siamés', 1, 'Hembra, 2 años ', '30.000', '30.000', 905529297, '', '2020-11-13', '15:09:00'),
(111, 249, 'Empanadas', 'Empanada', 1, 'Carne molida', '1.500', '1.500', 287802973, '', '2020-11-13', '15:10:00'),
(112, 249, 'Empanadas', 'Empanada', 1, 'Carne molida', '1.500', '1.500', 773777007, '', '2020-11-13', '15:21:00'),
(113, 249, 'Empanadas', 'Empanada', 1, 'Carne molida', '1.500', '1.500', 81832015, '', '2020-11-13', '15:23:00'),
(114, 249, 'Empanadas', 'Empanada', 1, 'Carne molida', '1.500', '1.500', 937022305, '', '2020-11-13', '15:25:00'),
(115, 249, 'Empanadas', 'Empanada', 1, 'Carne molida', '1.500', '1.500', 971844115, '', '2020-11-13', '15:26:00'),
(116, 249, 'Empanadas', 'Empanada', 1, 'Carne molida', '1.500', '1.500', 274395473, '', '2020-11-13', '15:26:00'),
(117, 249, 'Empanadas', 'Empanada', 1, 'Carne molida', '1.500', '1.500', 102382966, '', '2020-11-13', '15:26:00'),
(118, 249, 'Empanadas', 'Empanada', 1, 'Carne molida', '1.500', '1.500', 349740422, '', '2020-11-13', '15:27:00'),
(119, 225, 'Empanadas', 'Empanada', 1, 'Caraota con queso', '1.000', '1.000', 838573429, 'zzz', '2020-11-13', '15:28:00'),
(120, 225, 'Empanadas', 'Empanada', 1, 'Caraota con queso', '1.000', '1.000', 58584469, 'zzz', '2020-11-13', '15:30:00'),
(121, 225, 'Empanadas', 'Empanada', 1, 'Caraota con queso', '1.000', '1.000', 347302622, 'zzz', '2020-11-13', '15:30:00'),
(122, 225, 'Empanadas', 'Empanada', 1, 'Caraota con queso', '1.000', '1.000', 800218390, 'zzz', '2020-11-13', '15:31:00'),
(123, 225, 'Empanadas', 'Empanada', 1, 'Caraota con queso', '1.000', '1.000', 72207549, 'zzz', '2020-11-13', '15:33:00'),
(124, 225, 'Empanadas', 'Empanada', 1, 'Caraota con queso', '1.000', '1.000', 574918916, 'zzz', '2020-11-13', '15:33:00'),
(125, 225, 'Empanadas', 'Empanada', 1, 'Caraota con queso', '1.000', '1.000', 701556246, 'zzz', '2020-11-13', '15:34:00'),
(126, 225, 'Empanadas', 'Empanada', 1, 'Caraota con queso', '1.000', '1.000', 427381457, 'zzz', '2020-11-13', '15:35:00'),
(127, 225, 'Empanadas', 'Empanada', 1, 'Caraota con queso', '1.000', '1.000', 145116099, 'zzz', '2020-11-13', '15:36:00'),
(128, 225, 'Empanadas', 'Empanada', 1, 'Caraota con queso', '1.000', '1.000', 289913011, 'zzz', '2020-11-13', '15:37:00'),
(129, 225, 'Empanadas', 'Empanada', 1, 'Caraota con queso', '1.000', '1.000', 295937984, 'zzz', '2020-11-13', '15:37:00');

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
(59, 'Jugo'),
(61, 'Coca Cola'),
(66, 'Papa rellena'),
(67, 'Papa rellena'),
(68, 'Jugo'),
(69, 'Jugo'),
(70, 'Jugo'),
(71, 'Jugo'),
(73, 'Jugo'),
(74, 'Jugo'),
(80, 'Jugo'),
(86, 'Gatorade'),
(87, 'Empanada'),
(88, 'Gatorade'),
(90, 'Gatorade'),
(92, 'Frescolita'),
(94, 'Refresco'),
(98, 'Papa rellena'),
(100, 'Jugo'),
(101, 'Empanadas'),
(103, 'Empanada'),
(104, 'Empanada'),
(105, 'Reloj deportivo'),
(106, 'Pastel'),
(107, 'Empanada'),
(114, 'Gatorade'),
(115, 'Gato siamés'),
(116, 'Gato'),
(117, 'Gato'),
(118, 'Gato'),
(119, 'Gato'),
(120, 'Gato'),
(121, 'Gato Angora'),
(122, 'Gatico'),
(123, 'Gatote'),
(124, 'Gato criollo'),
(125, 'Gato Angora'),
(126, 'Empanada'),
(127, 'Empanada'),
(128, 'Gato Siamés'),
(129, 'Gato siamés'),
(130, 'Gato'),
(131, 'Gato criollo'),
(132, 'Gato criollo'),
(133, 'Gatos criollos'),
(207, 'Jugo de remolacha'),
(229, ''),
(230, ''),
(231, ''),
(232, 'asdfsd'),
(233, 'qwweqeq'),
(234, 'werwer'),
(236, 'fffff'),
(247, 'dasdas'),
(249, 'asdd'),
(259, 'qwqw'),
(260, 'qqqqqqqqq'),
(261, 'wwww'),
(262, 'eee'),
(263, 'tttt'),
(264, 'qqqq'),
(265, 'eee'),
(266, 'eee'),
(267, 'eee'),
(268, 'aaa'),
(269, 'bbb'),
(271, 'b'),
(274, 'wwwww'),
(275, 'wwwww'),
(276, 'wwwww'),
(277, 'wwwww'),
(278, 'Pingúinos'),
(279, 'wwwww');

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
(42, 59, 59),
(44, 61, 61),
(49, 66, 66),
(50, 67, 67),
(51, 68, 68),
(52, 69, 69),
(53, 70, 70),
(54, 71, 71),
(56, 73, 73),
(57, 74, 74),
(63, 80, 80),
(69, 86, 86),
(70, 87, 87),
(71, 88, 88),
(73, 90, 90),
(75, 92, 92),
(77, 94, 94),
(81, 98, 98),
(83, 100, 100),
(85, 103, 102),
(86, 104, 103),
(87, 105, 104),
(88, 106, 105),
(89, 107, 106),
(94, 114, 113),
(95, 115, 114),
(96, 116, 115),
(97, 117, 116),
(98, 118, 117),
(99, 119, 118),
(100, 120, 119),
(101, 121, 120),
(102, 122, 121),
(103, 123, 122),
(104, 124, 123),
(105, 125, 124),
(106, 126, 125),
(107, 127, 126),
(108, 128, 127),
(109, 129, 128),
(110, 130, 129),
(111, 131, 130),
(112, 132, 131),
(113, 133, 132),
(122, 207, 141),
(186, 271, 205),
(187, 277, 207),
(188, 278, 208),
(189, 279, 209);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `ID_Seccion` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `seccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`ID_Seccion`, `ID_Tienda`, `seccion`) VALUES
(228, 264, 'abc'),
(183, 243, 'Angora'),
(63, 225, 'Bebidas sin alcohol'),
(184, 243, 'Criollo'),
(400, 263, 'd'),
(20, 225, 'Empanadas'),
(142, 249, 'Empanadas'),
(136, 249, 'Hamburguesas'),
(19, 225, 'Jugos'),
(148, 249, 'Marquesas'),
(22, 225, 'Papas rellenas'),
(129, 225, 'Pasteles'),
(147, 249, 'Pasteles'),
(138, 249, 'Pepitos'),
(137, 249, 'Perros calientes'),
(187, 243, 'Persa'),
(21, 225, 'Refrescos'),
(131, 226, 'Reloj para caballeros'),
(130, 226, 'Reloj para damas'),
(185, 243, 'Siamés'),
(207, 243, 'vv_5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones_opciones`
--

CREATE TABLE `secciones_opciones` (
  `ID_SO` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL,
  `ID_Opcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secciones_opciones`
--

INSERT INTO `secciones_opciones` (`ID_SO`, `ID_Seccion`, `ID_Opcion`) VALUES
(33, 19, 59),
(35, 21, 61),
(40, 22, 66),
(41, 22, 67),
(42, 19, 68),
(43, 19, 69),
(44, 19, 70),
(45, 19, 71),
(47, 19, 73),
(48, 19, 74),
(54, 19, 80),
(60, 63, 86),
(61, 20, 87),
(62, 63, 88),
(64, 63, 90),
(66, 21, 92),
(68, 21, 94),
(72, 22, 98),
(74, 19, 100),
(76, 21, 102),
(77, 20, 103),
(78, 130, 104),
(79, 129, 105),
(80, 142, 106),
(81, 63, 113),
(88, 183, 120),
(89, 183, 121),
(90, 183, 122),
(91, 184, 123),
(92, 183, 124),
(93, 20, 125),
(94, 20, 126),
(95, 185, 127),
(96, 185, 128),
(97, 185, 129),
(98, 184, 130),
(99, 184, 131),
(100, 184, 132),
(104, 19, 141),
(105, 400, 207),
(106, 400, 208),
(107, 400, 209);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones_productos`
--

CREATE TABLE `secciones_productos` (
  `ID_SP` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secciones_productos`
--

INSERT INTO `secciones_productos` (`ID_SP`, `ID_Seccion`, `ID_Producto`) VALUES
(29, 19, 59),
(31, 21, 61),
(36, 22, 66),
(37, 22, 67),
(38, 19, 68),
(39, 19, 69),
(40, 19, 70),
(41, 19, 71),
(43, 19, 73),
(44, 19, 74),
(50, 19, 80),
(56, 63, 86),
(57, 20, 87),
(58, 63, 88),
(60, 63, 90),
(62, 21, 92),
(64, 21, 94),
(68, 22, 98),
(70, 19, 100),
(72, 20, 103),
(73, 20, 104),
(74, 130, 105),
(75, 129, 106),
(76, 142, 107),
(77, 63, 114),
(84, 183, 121),
(85, 183, 122),
(86, 183, 123),
(87, 184, 124),
(88, 183, 125),
(89, 20, 126),
(90, 20, 127),
(91, 185, 128),
(92, 185, 129),
(93, 185, 130),
(94, 184, 131),
(95, 184, 132),
(96, 184, 133),
(100, 19, 207),
(101, 400, 277),
(102, 400, 278),
(103, 400, 279);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `ID_Tienda` int(11) NOT NULL,
  `ID_AfiliadoCom` int(11) NOT NULL,
  `nombre_Tien` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_Tien` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_Tien` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `slogan_Tien` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fotografia_Tien` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'tienda.png',
  `fecha_afiliacion` date NOT NULL,
  `hora_afiliacion` time NOT NULL,
  `publicar` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`ID_Tienda`, `ID_AfiliadoCom`, `nombre_Tien`, `direccion_Tien`, `telefono_Tien`, `slogan_Tien`, `fotografia_Tien`, `fecha_afiliacion`, `hora_afiliacion`, `publicar`) VALUES
(225, 13, 'Las Empanadas de Pablo', 'Calle 13 con Av .Veroes diagonal a las arepas', '04243541194', 'Tradición sanfelipeña que gusta mucho', '807bb66d7fdd4c7ad751fd919a4099f1.jpg', '2020-08-23', '17:02:00', 1),
(226, 14, 'Cánori', '', '', '', 'tienda.png', '2020-09-07', '12:42:00', 1),
(243, 28, 'Otaku Claud Gat', 'Prolongación Carrera 4ta, a 100m de la Universidad', '12321232121', 'Los reyes de la casa estan aqui', '243index.jpg', '2020-09-28', '13:24:00', 1),
(249, 35, 'El antojito perfecto', 'Calle 9 entre Avs. 10 y 11. Centro clinico San Andres', '04243543245', '', 'index.jpg', '2020-09-29', '15:48:00', 1),
(262, 48, 'Servicios y Autorepuesto Sebastian', '', '', '', 'tienda.png', '2020-10-23', '16:31:00', 1),
(263, 49, 'YaraCultura', 'Avenida 6 entre calles 6 y 7. Zumuco', '12312.23233', '', 'tienda.png', '2020-10-28', '11:54:00', 1),
(264, 50, 'Chicha Sabrosa', 'asdasdadas', '12321232323', '', 'tienda.png', '2020-10-29', '19:43:00', 1);

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
(110, 226, 9),
(398, 249, 1),
(450, 225, 1),
(481, 264, 1),
(587, 243, 10),
(606, 263, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas_secciones`
--

CREATE TABLE `tiendas_secciones` (
  `ID_TS` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiendas_secciones`
--

INSERT INTO `tiendas_secciones` (`ID_TS`, `ID_Tienda`, `ID_Seccion`) VALUES
(5, 225, 19),
(6, 225, 20),
(7, 225, 21),
(8, 225, 22),
(11, 225, 63),
(35, 225, 129),
(37, 226, 130),
(36, 226, 131),
(66, 243, 183),
(191, 243, 184),
(193, 243, 185),
(192, 243, 187),
(195, 243, 207),
(42, 249, 136),
(44, 249, 137),
(43, 249, 138),
(45, 249, 142),
(52, 249, 147),
(51, 249, 148),
(481, 263, 400),
(216, 264, 228);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `nombre_usu` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_usu` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cedula_usu` int(9) NOT NULL,
  `telefono_usu` int(11) NOT NULL,
  `direccion_usu` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `nombre_usu`, `apellido_usu`, `cedula_usu`, `telefono_usu`, `direccion_usu`, `ID_Pedido`) VALUES
(66, 'asds', 'Cabeza', 12123123, 1234, 'qweqweqweq', 116236136),
(67, 'aaa', 'Cabeza', 12123123, 1234, 'qweqweqweq', 890264399),
(68, 'asdas', 'Cabeza', 12123123, 1234, 'qweqweqweq', 653389663),
(69, 'asdas', 'Cabeza', 12123123, 1234, 'qweqweqweq', 835012143),
(70, 'asdas', 'Cabeza', 12123123, 1234, 'qweqweqweq', 179805429),
(71, 'qqq', 'Cabeza', 12123123, 1234, 'qweqweqweq', 616838751),
(72, 'qqq', 'Cabeza', 12123123, 1234, 'qweqweqweq', 261286498),
(73, 'qqq', 'Cabeza', 12123123, 1234, 'qweqweqweq', 721445456),
(74, 'pppppp', 'Cabeza', 12123123, 1234, 'qweqweqweq', 247931119),
(75, 'sdfsdf', 'Cabeza', 12123123, 1234, 'qweqweqweqsfsdfsfdsd', 472249681),
(76, 'asdas', 'zxcxzcx', 12123232, 2343, 'asasas', 598943471),
(77, 'sdsd', 'zxcxzcx', 12123232, 2343, 'asasas', 779124836),
(78, 'asa', 'zxcxzcx', 12123232, 2343, 'asasas', 375030265),
(79, 'zxzx', 'zxcxzcx', 12123232, 2343, 'asasas', 905529297),
(80, 'asa', 'zxcxzcx', 12123232, 2343, 'asasas', 287802973),
(81, 'asdasda', 'zxcxzcx', 12123232, 2343, 'asasas', 773777007),
(82, 'asdasda', 'zxcxzcx', 12123232, 2343, 'asasas', 81832015),
(83, 'asdasda', 'zxcxzcx', 12123232, 2343, 'asasas', 937022305),
(84, 'asdasda', 'zxcxzcx', 12123232, 2343, 'asasas', 971844115),
(85, 'asdasda', 'zxcxzcx', 12123232, 2343, 'asasas', 274395473),
(86, 'asdasda', 'zxcxzcx', 12123232, 2343, 'asasas', 102382966),
(87, 'asdasda', 'zxcxzcx', 12123232, 2343, 'asasas', 349740422),
(88, 'zzzz', 'zxcxzcx', 12123232, 2343, 'asasas', 838573429),
(89, 'zzzz', 'zxcxzcx', 12123232, 2343, 'asasas', 58584469),
(90, 'zzzz', 'zxcxzcx', 12123232, 2343, 'asasas', 347302622),
(91, 'zzzz', 'zxcxzcx', 12123232, 2343, 'asasas', 800218390),
(92, 'zzzz', 'zxcxzcx', 12123232, 2343, 'asasas', 72207549),
(93, 'zzzz', 'zxcxzcx', 12123232, 2343, 'asasas', 574918916),
(94, 'zzzz', 'zxcxzcx', 12123232, 2343, 'asasas', 701556246),
(95, 'zzzz', 'zxcxzcx', 12123232, 2343, 'asasas', 427381457),
(96, 'zzzz', 'zxcxzcx', 12123232, 2343, 'asasas', 145116099),
(97, 'zzzz', 'zxcxzcx', 12123232, 2343, 'asasas', 289913011),
(98, 'zzzz', 'zxcxzcx', 12123232, 2343, 'asasas', 295937984);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliado_com`
--
ALTER TABLE `afiliado_com`
  ADD PRIMARY KEY (`ID_AfiliadoCom`),
  ADD UNIQUE KEY `CorreoUnico` (`correo_AfiCom`);

--
-- Indices de la tabla `afiliado_comingreso`
--
ALTER TABLE `afiliado_comingreso`
  ADD PRIMARY KEY (`ID_AfiliadoComIngreso`);

--
-- Indices de la tabla `afiliado_des`
--
ALTER TABLE `afiliado_des`
  ADD PRIMARY KEY (`ID_AfiliadoDes`),
  ADD UNIQUE KEY `correo_AfiDes` (`correo_AfiDes`);

--
-- Indices de la tabla `afiliado_desingreso`
--
ALTER TABLE `afiliado_desingreso`
  ADD PRIMARY KEY (`ID_AfiliadoDesIngreso`);

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`ID_Banco`);

--
-- Indices de la tabla `caracteristicaproducto`
--
ALTER TABLE `caracteristicaproducto`
  ADD PRIMARY KEY (`ID_Caracteristica`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID_Categoria`);

--
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`ID_Destino`);

--
-- Indices de la tabla `dtc`
--
ALTER TABLE `dtc`
  ADD PRIMARY KEY (`ID_DTC`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`ID_estado`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`ID_Imagen`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`ID_Municipio`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`ID_Opcion`);

--
-- Indices de la tabla `pagomovil`
--
ALTER TABLE `pagomovil`
  ADD PRIMARY KEY (`ID_Pagomovil`);

--
-- Indices de la tabla `parroquias`
--
ALTER TABLE `parroquias`
  ADD PRIMARY KEY (`ID_Parroquia`);

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
  ADD KEY `OPC_PRO` (`ID_Opcion`),
  ADD KEY `PRO_OPC` (`ID_Producto`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`ID_Seccion`),
  ADD UNIQUE KEY `ID_Tienda_Seccion` (`seccion`,`ID_Tienda`) USING BTREE;

--
-- Indices de la tabla `secciones_opciones`
--
ALTER TABLE `secciones_opciones`
  ADD PRIMARY KEY (`ID_SO`),
  ADD KEY `OPC_SES` (`ID_Opcion`),
  ADD KEY `SES_OPC` (`ID_Seccion`);

--
-- Indices de la tabla `secciones_productos`
--
ALTER TABLE `secciones_productos`
  ADD PRIMARY KEY (`ID_SP`);

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
-- Indices de la tabla `tiendas_secciones`
--
ALTER TABLE `tiendas_secciones`
  ADD PRIMARY KEY (`ID_TS`),
  ADD UNIQUE KEY `ID_Tienda_ID_Seccion` (`ID_Tienda`,`ID_Seccion`),
  ADD KEY `SEC_TIE` (`ID_Seccion`);

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
  MODIFY `ID_AfiliadoCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `afiliado_comingreso`
--
ALTER TABLE `afiliado_comingreso`
  MODIFY `ID_AfiliadoComIngreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `afiliado_des`
--
ALTER TABLE `afiliado_des`
  MODIFY `ID_AfiliadoDes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `afiliado_desingreso`
--
ALTER TABLE `afiliado_desingreso`
  MODIFY `ID_AfiliadoDesIngreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `ID_Banco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `caracteristicaproducto`
--
ALTER TABLE `caracteristicaproducto`
  MODIFY `ID_Caracteristica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `ID_Destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `dtc`
--
ALTER TABLE `dtc`
  MODIFY `ID_DTC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `ID_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `ID_Imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `ID_Municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `ID_Opcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT de la tabla `pagomovil`
--
ALTER TABLE `pagomovil`
  MODIFY `ID_Pagomovil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de la tabla `parroquias`
--
ALTER TABLE `parroquias`
  MODIFY `ID_Parroquia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID_Pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT de la tabla `productos_opciones`
--
ALTER TABLE `productos_opciones`
  MODIFY `ID_PO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `ID_Seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;

--
-- AUTO_INCREMENT de la tabla `secciones_opciones`
--
ALTER TABLE `secciones_opciones`
  MODIFY `ID_SO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `secciones_productos`
--
ALTER TABLE `secciones_productos`
  MODIFY `ID_SP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `ID_Tienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT de la tabla `tiendas_categorias`
--
ALTER TABLE `tiendas_categorias`
  MODIFY `ID_TC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=607;

--
-- AUTO_INCREMENT de la tabla `tiendas_secciones`
--
ALTER TABLE `tiendas_secciones`
  MODIFY `ID_TS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=483;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos_opciones`
--
ALTER TABLE `productos_opciones`
  ADD CONSTRAINT `OPC_PRO` FOREIGN KEY (`ID_Opcion`) REFERENCES `opciones` (`ID_Opcion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `PRO_OPC` FOREIGN KEY (`ID_Producto`) REFERENCES `productos` (`ID_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `secciones_opciones`
--
ALTER TABLE `secciones_opciones`
  ADD CONSTRAINT `OPC_SES` FOREIGN KEY (`ID_Opcion`) REFERENCES `opciones` (`ID_Opcion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `SES_OPC` FOREIGN KEY (`ID_Seccion`) REFERENCES `secciones` (`ID_Seccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tiendas_categorias`
--
ALTER TABLE `tiendas_categorias`
  ADD CONSTRAINT `CAT_TIN` FOREIGN KEY (`ID_Categoria`) REFERENCES `categorias` (`ID_Categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TIN_CAT` FOREIGN KEY (`ID_Tienda`) REFERENCES `tiendas` (`ID_Tienda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tiendas_secciones`
--
ALTER TABLE `tiendas_secciones`
  ADD CONSTRAINT `SEC_TIE` FOREIGN KEY (`ID_Seccion`) REFERENCES `secciones` (`ID_Seccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TIE_SEC` FOREIGN KEY (`ID_Tienda`) REFERENCES `tiendas` (`ID_Tienda`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

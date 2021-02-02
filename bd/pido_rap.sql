-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2021 a las 17:45:17
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
  `telefono_AfiCom` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `correo_AfiCom` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `fotografia_AfiCom` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Perfil.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_comingreso`
--

CREATE TABLE `afiliado_comingreso` (
  `ID_AfiliadoComIngreso` int(11) NOT NULL,
  `ID_Afiliado` int(11) NOT NULL,
  `claveCifrada` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_desingreso`
--

CREATE TABLE `afiliado_desingreso` (
  `ID_AfiliadoDesIngreso` int(11) NOT NULL,
  `ID_AfiliadoDes` int(11) NOT NULL,
  `claveCifradaDes` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `ID_Banco` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `bancoNombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `bancoCuenta` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `bancoTitular` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `bancoRif` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID_Categoria` int(11) NOT NULL,
  `categoria` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo_recuperacion`
--

CREATE TABLE `codigo_recuperacion` (
  `ID_Codigorecuperacion` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `codigoAleatorio` varchar(6) NOT NULL,
  `fechaSolicitud` datetime NOT NULL,
  `codigoVerificado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `ID_estado` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horariodomingo`
--

CREATE TABLE `horariodomingo` (
  `ID_HorarioDomingo` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `inicia_m_Dom` time NOT NULL,
  `culmina_m_Dom` time NOT NULL,
  `domingo_m` varchar(7) NOT NULL,
  `inicia_t_Dom` time NOT NULL,
  `culmina_t_Dom` time NOT NULL,
  `domingo_t` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarioespecial`
--

CREATE TABLE `horarioespecial` (
  `ID_HorarioEspecial` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `inicia_m_Esp` time NOT NULL,
  `culmina_m_Esp` time NOT NULL,
  `especial_m` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `inicia_t_Esp` time NOT NULL,
  `culmina_t_Esp` time NOT NULL,
  `especial_t` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `ID_Horario` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `inicio_m` time NOT NULL,
  `culmina_m` time NOT NULL,
  `lunes_m` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `martes_m` varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `miercoles_m` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `jueves_m` varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `viernes_m` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `inicia_t` time NOT NULL,
  `culmina_t` time NOT NULL,
  `lunes_t` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `martes_t` varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `miercoles_t` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `jueves_t` varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `viernes_t` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horariosabado`
--

CREATE TABLE `horariosabado` (
  `ID_HorarioSabado` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `inicia_m_Sab` time NOT NULL,
  `culmina_m_Sab` time NOT NULL,
  `sabado_m` varchar(6) NOT NULL,
  `inicia_t_Sab` time NOT NULL,
  `culmina_t_Sab` time NOT NULL,
  `sabado_t` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `ID_Imagen` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `nombre_img` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipoArchivo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tamanoArchivo` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fotoPrincipal` tinyint(1) NOT NULL,
  `fotoSeccion` tinyint(1) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `ID_Municipio` int(11) NOT NULL,
  `ID_Estado` int(11) NOT NULL,
  `municipio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noconformidades`
--

CREATE TABLE `noconformidades` (
  `ID_Noconformidad` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `ID_Pedido` int(11) NOT NULL,
  `noConformidad_1` tinyint(1) NOT NULL,
  `noConformidad_2` tinyint(1) NOT NULL,
  `noConformidad_3` tinyint(1) NOT NULL,
  `noConformidad_4` tinyint(1) NOT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'N/A',
  `estadodisputa` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `ID_Opcion` int(11) NOT NULL,
  `opcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `especificacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No_Aplica',
  `precioBolivar` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `precioDolar` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otrospagos`
--

CREATE TABLE `otrospagos` (
  `ID_OtroPago` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `efectivoBolivar` tinyint(1) NOT NULL,
  `efectivoDolar` tinyint(1) NOT NULL,
  `acordado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagomovil`
--

CREATE TABLE `pagomovil` (
  `ID_Pagomovil` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `cedula_pagomovil` varchar(10) NOT NULL,
  `banco_pagomovil` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono_pagomovil` varchar(14) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_Producto` int(11) NOT NULL,
  `producto` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_opciones`
--

CREATE TABLE `productos_opciones` (
  `ID_PO` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `ID_Opcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `ID_Seccion` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `seccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones_imagenes`
--

CREATE TABLE `secciones_imagenes` (
  `ID_SI` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL,
  `ID_Imagen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones_opciones`
--

CREATE TABLE `secciones_opciones` (
  `ID_SO` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL,
  `ID_Opcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones_productos`
--

CREATE TABLE `secciones_productos` (
  `ID_SP` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `ID_Tienda` int(11) NOT NULL,
  `ID_AfiliadoCom` int(11) NOT NULL,
  `nombre_Tien` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado_Tien` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `municipio_Tien` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `parroquia_Tien` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_Tien` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_Tien` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `slogan_Tien` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fotografia_Tien` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'tienda.png',
  `fecha_afiliacion` date NOT NULL,
  `hora_afiliacion` time NOT NULL,
  `publicar` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas_categorias`
--

CREATE TABLE `tiendas_categorias` (
  `ID_TC` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `ID_Categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas_secciones`
--

CREATE TABLE `tiendas_secciones` (
  `ID_TS` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `ID_Pedido` int(11) NOT NULL,
  `nombre_usu` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_usu` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cedula_usu` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_usu` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `correo_usu` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_usu` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `montoDelivery` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `montoTienda` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `montoTotal` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `despacho` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `formaPago` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoPago` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `capture` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No aplica'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
-- Indices de la tabla `codigo_recuperacion`
--
ALTER TABLE `codigo_recuperacion`
  ADD PRIMARY KEY (`ID_Codigorecuperacion`);

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
-- Indices de la tabla `horariodomingo`
--
ALTER TABLE `horariodomingo`
  ADD PRIMARY KEY (`ID_HorarioDomingo`);

--
-- Indices de la tabla `horarioespecial`
--
ALTER TABLE `horarioespecial`
  ADD PRIMARY KEY (`ID_HorarioEspecial`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`ID_Horario`);

--
-- Indices de la tabla `horariosabado`
--
ALTER TABLE `horariosabado`
  ADD PRIMARY KEY (`ID_HorarioSabado`);

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
-- Indices de la tabla `noconformidades`
--
ALTER TABLE `noconformidades`
  ADD PRIMARY KEY (`ID_Noconformidad`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`ID_Opcion`);

--
-- Indices de la tabla `otrospagos`
--
ALTER TABLE `otrospagos`
  ADD PRIMARY KEY (`ID_OtroPago`);

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
-- Indices de la tabla `secciones_imagenes`
--
ALTER TABLE `secciones_imagenes`
  ADD PRIMARY KEY (`ID_SI`),
  ADD KEY `IMG_SEC` (`ID_Imagen`),
  ADD KEY `SEC_IMG` (`ID_Seccion`);

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
  MODIFY `ID_AfiliadoCom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `afiliado_comingreso`
--
ALTER TABLE `afiliado_comingreso`
  MODIFY `ID_AfiliadoComIngreso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `afiliado_des`
--
ALTER TABLE `afiliado_des`
  MODIFY `ID_AfiliadoDes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `afiliado_desingreso`
--
ALTER TABLE `afiliado_desingreso`
  MODIFY `ID_AfiliadoDesIngreso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `ID_Banco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `caracteristicaproducto`
--
ALTER TABLE `caracteristicaproducto`
  MODIFY `ID_Caracteristica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `codigo_recuperacion`
--
ALTER TABLE `codigo_recuperacion`
  MODIFY `ID_Codigorecuperacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `ID_Destino` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dtc`
--
ALTER TABLE `dtc`
  MODIFY `ID_DTC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `ID_estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horariodomingo`
--
ALTER TABLE `horariodomingo`
  MODIFY `ID_HorarioDomingo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarioespecial`
--
ALTER TABLE `horarioespecial`
  MODIFY `ID_HorarioEspecial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `ID_Horario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horariosabado`
--
ALTER TABLE `horariosabado`
  MODIFY `ID_HorarioSabado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `ID_Imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `ID_Municipio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `noconformidades`
--
ALTER TABLE `noconformidades`
  MODIFY `ID_Noconformidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `ID_Opcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `otrospagos`
--
ALTER TABLE `otrospagos`
  MODIFY `ID_OtroPago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagomovil`
--
ALTER TABLE `pagomovil`
  MODIFY `ID_Pagomovil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parroquias`
--
ALTER TABLE `parroquias`
  MODIFY `ID_Parroquia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID_Pedidos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos_opciones`
--
ALTER TABLE `productos_opciones`
  MODIFY `ID_PO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `ID_Seccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `secciones_imagenes`
--
ALTER TABLE `secciones_imagenes`
  MODIFY `ID_SI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `secciones_opciones`
--
ALTER TABLE `secciones_opciones`
  MODIFY `ID_SO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `secciones_productos`
--
ALTER TABLE `secciones_productos`
  MODIFY `ID_SP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `ID_Tienda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiendas_categorias`
--
ALTER TABLE `tiendas_categorias`
  MODIFY `ID_TC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiendas_secciones`
--
ALTER TABLE `tiendas_secciones`
  MODIFY `ID_TS` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `OPC_PRO` FOREIGN KEY (`ID_Opcion`) REFERENCES `opciones` (`ID_Opcion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `PRO_OPC` FOREIGN KEY (`ID_Producto`) REFERENCES `productos` (`ID_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `secciones_imagenes`
--
ALTER TABLE `secciones_imagenes`
  ADD CONSTRAINT `IMG_SEC` FOREIGN KEY (`ID_Imagen`) REFERENCES `imagenes` (`ID_Imagen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `SEC_IMG` FOREIGN KEY (`ID_Seccion`) REFERENCES `secciones` (`ID_Seccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
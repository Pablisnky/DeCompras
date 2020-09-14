CREATE TABLE `afiliado_com` (
  `ID_AfiliadoCom` int(11) NOT NULL,
  `nombre_AfiCom` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_AfiCom` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cedula_AfiCom` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_AfiCom` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `correo_AfiCom` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `fotografia_AfiCom` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_AfiCom` date NOT NULL,
  `hora_AfiCom` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `afiliado_com` (`ID_AfiliadoCom`, `nombre_AfiCom`, `apellido_AfiCom`, `cedula_AfiCom`, `telefono_AfiCom`, `correo_AfiCom`, `fotografia_AfiCom`, `fecha_AfiCom`, `hora_AfiCom`) VALUES
(13, 'Pablo', '', '', '', 'pcabeza7@gmail.com', 'Capitan_America.jpg', '2020-08-23', '17:02:00'),
(14, 'Silvia Noriega', '', '', '', 'veronica@gmail.com', '', '2020-09-07', '12:42:00'),
(15, '', '', '', '', '', '', '2020-09-08', '17:17:00');

CREATE TABLE `afiliado_comingreso` (
  `ID_AfiliadoComIngreso` int(11) NOT NULL,
  `ID_Afiliado` int(11) NOT NULL,
  `claveCifrada` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `afiliado_comingreso` (`ID_AfiliadoComIngreso`, `ID_Afiliado`, `claveCifrada`) VALUES
(24, 13, '$2y$10$jlTedFjS/fSeSPenz7LE6.h8ZXhrQKV2s5uubZo.O0bsww5sS4FOi'),
(25, 14, '$2y$10$0bnCWBDiipfbpx1/b5uU9.LkJcA18x8O152knjvF3Zjf8IF7kPDre'),
(26, 15, '$2y$10$KXcWlLv3MsywIDA.jx.lTuTOg7c3qYaiP1jMRgtwHMA1kxu6Sby9a');

CREATE TABLE `bancos` (
  `ID_Banco` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `bancoNombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `bancoCuenta` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `bancoTitular` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `bancoRif` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `categorias` (
  `ID_Categoria` int(11) NOT NULL,
  `categoria` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `categorias` (`ID_Categoria`, `categoria`) VALUES
(1, 'Comida Rapida'),
(2, 'Material médico quirúrgico'),
(3, 'Supermecado'),
(4, 'Bodega'),
(5, 'Panadería'),
(6, 'Ferretería');

CREATE TABLE `dtc` (
  `ID_DTC` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `ID_Opcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `dtc` (`ID_DTC`, `ID_Tienda`, `ID_Producto`, `ID_Opcion`) VALUES
(3, 225, 34, 0),
(4, 225, 35, 0),
(5, 225, 36, 0),
(6, 225, 37, 37),
(7, 225, 38, 38),
(8, 225, 39, 0),
(9, 225, 40, 0),
(10, 225, 41, 0);

CREATE TABLE `opciones` (
  `ID_Opcion` int(11) NOT NULL,
  `opcion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fotografia` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'imagenProd.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `opciones` (`ID_Opcion`, `opcion`, `precio`, `fotografia`) VALUES
(51, 'Naranja', '1000', 'jugoNaranja.jpg'),
(59, 'Limon', '1200', 'jugolimon.jpg'),
(61, '600 ml', '1000', 'imagenProd.png'),
(66, 'Carne molida', '2000', 'imagenProd.png'),
(67, 'Queso y carne', '2000', 'imagenProd.png'),
(68, 'Mora', '1300', 'jugoMora.jpg'),
(69, 'Piña', '1600', 'jugo de piña.jpg'),
(70, 'Fresa', '2000', 'jugo de fresa.jpg'),
(71, 'Guayaba', '1200', 'jugoGuayaba.jpg'),
(73, 'Parchita', '1400', 'jugo de parchita.jpg'),
(74, 'Zanahoria', '1800', 'jugo Zanahoria.jpg'),
(80, 'Mango', '1400', 'jugoMango.jpg'),
(85, 'Carne molida', '2000', 'pastel de carne.jpg');

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

CREATE TABLE `productos` (
  `ID_Producto` int(11) NOT NULL,
  `producto` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `productos` (`ID_Producto`, `producto`) VALUES
(51, 'Jugo'),
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
(85, 'Pastel');

CREATE TABLE `productos_opciones` (
  `ID_PO` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `ID_Opcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `productos_opciones` (`ID_PO`, `ID_Producto`, `ID_Opcion`) VALUES
(34, 51, 51),
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
(68, 85, 85);

CREATE TABLE `secciones` (
  `ID_Seccion` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `seccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `secciones` (`ID_Seccion`, `ID_Tienda`, `seccion`) VALUES
(63, 225, 'Bebidas sin alcohol'),
(20, 225, 'Empanadas'),
(19, 225, 'Jugos'),
(22, 225, 'Papas rellenas'),
(129, 225, 'Pasteles'),
(21, 225, 'Refrescos');

CREATE TABLE `secciones_opciones` (
  `ID_SO` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL,
  `ID_Opcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `secciones_opciones` (`ID_SO`, `ID_Seccion`, `ID_Opcion`) VALUES
(25, 19, 51),
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
(59, 129, 85);

CREATE TABLE `secciones_productos` (
  `ID_SP` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `secciones_productos` (`ID_SP`, `ID_Seccion`, `ID_Producto`) VALUES
(21, 19, 51),
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
(55, 129, 85);

CREATE TABLE `tiendas` (
  `ID_Tienda` int(11) NOT NULL,
  `nombre_Tien` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_Tien` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_Tien` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `rif_Tien` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fotografia_Tien` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'tienda.png',
  `fecha_afiliacion` date NOT NULL,
  `hora_afiliacion` time NOT NULL,
  `ID_AfiliadoCom` int(11) NOT NULL,
  `notificacion` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tiendas` (`ID_Tienda`, `nombre_Tien`, `direccion_Tien`, `telefono_Tien`, `rif_Tien`, `fotografia_Tien`, `fecha_afiliacion`, `hora_afiliacion`, `ID_AfiliadoCom`, `notificacion`) VALUES
(225, 'Empanadas La 13', '', '', '', '807bb66d7fdd4c7ad751fd919a4099f1.jpg', '2020-08-23', '17:02:00', 13, 0),
(226, 'Cánori', '', '', '', 'tienda.png', '2020-09-07', '12:42:00', 14, 0),
(227, '', '', '', '', 'tienda.png', '2020-09-08', '17:17:00', 15, 0);

CREATE TABLE `tiendas_categorias` (
  `ID_TC` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `ID_Categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tiendas_categorias` (`ID_TC`, `ID_Tienda`, `ID_Categoria`) VALUES
(96, 225, 1);

CREATE TABLE `tiendas_secciones` (
  `ID_TS` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tiendas_secciones` (`ID_TS`, `ID_Tienda`, `ID_Seccion`) VALUES
(5, 225, 19),
(6, 225, 20),
(7, 225, 21),
(8, 225, 22),
(11, 225, 63),
(35, 225, 129);

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `nombre_usu` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_usu` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cedula_usu` int(8) NOT NULL,
  `telefono_usu` int(11) NOT NULL,
  `direccion_usu` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




--****************************************************************************************************
--Asignacion de claves primarias y de indices unicos
--****************************************************************************************************




ALTER TABLE `afiliado_com`
  ADD PRIMARY KEY (`ID_AfiliadoCom`),
  ADD KEY `CorreoUnico` (`correo_AfiCom`);

ALTER TABLE `afiliado_comingreso`
  ADD PRIMARY KEY (`ID_AfiliadoComIngreso`);

ALTER TABLE `bancos`
  ADD PRIMARY KEY (`ID_Banco`);

ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID_Categoria`);

ALTER TABLE `dtc`
  ADD PRIMARY KEY (`ID_DTC`);

ALTER TABLE `opciones`
  ADD PRIMARY KEY (`ID_Opcion`);

ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID_Pedidos`);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_Producto`);

ALTER TABLE `secciones`
  ADD PRIMARY KEY (`ID_Seccion`),
  ADD UNIQUE KEY `ID_Tienda_Seccion` (`ID_Tienda`,`seccion`);

ALTER TABLE `secciones_productos`
  ADD PRIMARY KEY (`ID_SP`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`);

ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`ID_Tienda`);

ALTER TABLE `productos_opciones`
  ADD PRIMARY KEY (`ID_PO`),
  -- ADD KEY `OPC_PRO` (`ID_Opcion`),    (Esta clave foranea se coloca cuando se hace el Constraint)
  -- ADD KEY `PRO_OPC` (`ID_Producto`);    (Esta clave foranea se coloca cuando se hace el Constraint)

ALTER TABLE `tiendas_categorias`
  ADD PRIMARY KEY (`ID_TC`),
  -- ADD KEY `CAT_TIN` (`ID_Categoria`),    (Esta clave foranea se coloca cuando se hace el Constraint)
  -- ADD KEY `TIN_CAT` (`ID_Tienda`);    (Esta clave foranea se coloca cuando se hace el Constraint)

ALTER TABLE `tiendas_secciones`
  ADD PRIMARY KEY (`ID_TS`),
  ADD UNIQUE KEY `ID_Tienda_ID_Seccion` (`ID_Tienda`,`ID_Seccion`),
  -- ADD KEY `SEC_TIE` (`ID_Seccion`);    (Esta clave foranea se coloca cuando se hace el Constraint)

ALTER TABLE `secciones_opciones`
  ADD PRIMARY KEY (`ID_SO`);
  -- ADD KEY `OPC_SES` (`ID_Opcion`),    (Esta clave foranea se coloca cuando se hace el Constraint)
  -- ADD KEY `SES_OPC` (`ID_Seccion`);    (Esta clave foranea se coloca cuando se hace el Constraint)




--****************************************************************************************************
--Asignacion de AutoIncremento a claves primarias
--****************************************************************************************************




ALTER TABLE `afiliado_com`
  MODIFY `ID_AfiliadoCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `afiliado_comingreso`
  MODIFY `ID_AfiliadoComIngreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

ALTER TABLE `bancos`
  MODIFY `ID_Banco` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `categorias`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `dtc`
  MODIFY `ID_DTC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `opciones`
  MODIFY `ID_Opcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

ALTER TABLE `pedidos`
  MODIFY `ID_Pedidos` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `productos`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

ALTER TABLE `productos_opciones`
  MODIFY `ID_PO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

ALTER TABLE `secciones`
  MODIFY `ID_Seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

ALTER TABLE `secciones_opciones`
  MODIFY `ID_SO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

ALTER TABLE `secciones_productos`
  MODIFY `ID_SP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

ALTER TABLE `tiendas`
  MODIFY `ID_Tienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

ALTER TABLE `tiendas_categorias`
  MODIFY `ID_TC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

ALTER TABLE `tiendas_secciones`
  MODIFY `ID_TS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT;




--****************************************************************************************************
--Asignacion de claves foraneas
--****************************************************************************************************




ALTER TABLE `productos_opciones`
  ADD CONSTRAINT `OPC_PRO` FOREIGN KEY (`ID_Opcion`) REFERENCES `opciones` (`ID_Opcion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `PRO_OPC` FOREIGN KEY (`ID_Producto`) REFERENCES `productos` (`ID_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `secciones_opciones`
  ADD CONSTRAINT `OPC_SES` FOREIGN KEY (`ID_Opcion`) REFERENCES `opciones` (`ID_Opcion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `SES_OPC` FOREIGN KEY (`ID_Seccion`) REFERENCES `secciones` (`ID_Seccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `tiendas_categorias`
  ADD CONSTRAINT `CAT_TIN` FOREIGN KEY (`ID_Categoria`) REFERENCES `categorias` (`ID_Categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TIN_CAT` FOREIGN KEY (`ID_Tienda`) REFERENCES `tiendas` (`ID_Tienda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `tiendas_secciones`
  ADD CONSTRAINT `SEC_TIE` FOREIGN KEY (`ID_Seccion`) REFERENCES `secciones` (`ID_Seccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TIE_SEC` FOREIGN KEY (`ID_Tienda`) REFERENCES `tiendas` (`ID_Tienda`) ON DELETE NO ACTION ON UPDATE NO ACTION;
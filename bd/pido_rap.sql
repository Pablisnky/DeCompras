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

INSERT INTO `afiliado_com` (`ID_AfiliadoCom`, `nombre_AfiCom`, `apellido_AfiCom`, `cedula_AfiCom`, `telefono_AfiCom`, `correo_AfiCom`, `fecha_AfiCom`, `hora_AfiCom`) VALUES
(1, 'Pablo', 'Cabeza', '12728036', '04143541194', 'pcabeza7@gmail.com', '2020-08-16', '08:46:00');

CREATE TABLE `afiliado_comingreso` (
  `ID_AfiliadoComIngreso` int(11) NOT NULL,
  `ID_Afiliado` int(11) NOT NULL,
  `claveCifrada` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `afiliado_comingreso` (`ID_AfiliadoComIngreso`, `ID_Afiliado`, `claveCifrada`) VALUES
(1, 1, '$2y$10$0sWSQGbsxeKOH///EQ4HCerUKxL2H5gvYmUPj7hvOby293DHklb7G');

CREATE TABLE `bancos` (
  `ID_Banco` int(11) NOT NULL,
  `bancoNombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `bancoCuenta` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `bancoTitular` int(100) NOT NULL,
  `bancoRif` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `bancos` (`ID_Banco`, `bancoNombre`, `bancoCuenta`, `bancoTitular`, `bancoRif`, `ID_Usuario`) VALUES
(1, 'Mercantil', '86739204859305874738', 0, 'J-34598654', 1),
(2, 'Banesco', '86749234858290126573', 0, 'J-34598654', 1);

CREATE TABLE `categorias` (
  `ID_Categoria` int(11) NOT NULL,
  `categoria` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `categorias` (`ID_Categoria`, `categoria`) VALUES
(1, 'Comida Rapida'),
(2, 'Material médico quirúrgico');

CREATE TABLE `opciones` (
  `ID_Opcion` int(11) NOT NULL,
  `opcion` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

CREATE TABLE `productos_opciones` (
  `ID_PO` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `ID_Opcion` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

INSERT INTO `tiendas` (`ID_Tienda`, `nombre_Tien`, `direccion_Tien`, `telefono_Tien`, `horario_Tien`, `categoria_Tien`, `fecha_afiliacion`, `hora_afiliacion`, `ID_AfiliadoCom`) VALUES
(1, 'Empanadas La 13 ', '98562345434', 'Calle 13 con Av. Ver', 'Lunes a Domingo', 'Comida Rapida', '2020-08-16', '08:46:00', 1);

CREATE TABLE `tiendas_categorias` (
  `ID_TC` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `ID_Categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `tiendas_productos` (
  `ID_TP` int(11) NOT NULL,
  `ID_Tienda` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

ALTER TABLE `afiliado_com`
  ADD PRIMARY KEY (`ID_AfiliadoCom`);

ALTER TABLE `afiliado_comingreso`
  ADD PRIMARY KEY (`ID_AfiliadoComIngreso`);

ALTER TABLE `bancos`
  ADD PRIMARY KEY (`ID_Banco`);

ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID_Categoria`);

ALTER TABLE `opciones`
  ADD PRIMARY KEY (`ID_Opcion`);

ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID_Pedidos`);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_Producto`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`);

ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`ID_Tienda`);

ALTER TABLE `productos_opciones`
  ADD PRIMARY KEY (`ID_PO`);
  -- ADD KEY `OPC_PRO` (`ID_Opcion`),    (Este indice se coloca cuando se hace el Constraint)
  -- ADD KEY `PRO_OPC` (`ID_Producto`),    (Este indice se coloca cuando se hace el Constraint)
  -- ADD KEY `PRO_TIE` (`ID_Tienda`);    (Este indice se coloca cuando se hace el Constraint)

ALTER TABLE `tiendas_categorias`
  ADD PRIMARY KEY (`ID_TC`);
  -- ADD KEY `CAT_TIN` (`ID_Categoria`),    (Este indice se coloca cuando se hace el Constraint)
  -- ADD KEY `TIN_CAT` (`ID_Tienda`);    (Este indice se coloca cuando se hace el Constraint)

ALTER TABLE `tiendas_productos`
  ADD PRIMARY KEY (`ID_TP`);
  -- ADD KEY `PRO_TIN` (`ID_Producto`),    (Este indice se coloca cuando se hace el Constraint)
  -- ADD KEY `TIN_PRO` (`ID_Tienda`);    (Este indice se coloca cuando se hace el Constraint)

--****************************************************************************************************

ALTER TABLE `afiliado_com`
  MODIFY `ID_AfiliadoCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `afiliado_comingreso`
  MODIFY `ID_AfiliadoComIngreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `bancos`
  MODIFY `ID_Banco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `categorias`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `opciones`
  MODIFY `ID_Opcion` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pedidos`
  MODIFY `ID_Pedidos` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `productos`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `productos_opciones`
  MODIFY `ID_PO` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tiendas`
  MODIFY `ID_Tienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `tiendas_categorias`
  MODIFY `ID_TC` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tiendas_productos`
  MODIFY `ID_TP` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT;

--****************************************************************************************************

ALTER TABLE `productos_opciones`
  ADD CONSTRAINT `OPC_PRO` FOREIGN KEY (`ID_Opcion`) REFERENCES `opciones` (`ID_Opcion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `PRO_OPC` FOREIGN KEY (`ID_Producto`) REFERENCES `productos` (`ID_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `PRO_TIE` FOREIGN KEY (`ID_Tienda`) REFERENCES `tiendas` (`ID_Tienda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `tiendas_categorias`
  ADD CONSTRAINT `CAT_TIN` FOREIGN KEY (`ID_Categoria`) REFERENCES `categorias` (`ID_Categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TIN_CAT` FOREIGN KEY (`ID_Tienda`) REFERENCES `tiendas` (`ID_Tienda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `tiendas_productos`
  ADD CONSTRAINT `PRO_TIN` FOREIGN KEY (`ID_Producto`) REFERENCES `productos` (`ID_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TIN_PRO` FOREIGN KEY (`ID_Tienda`) REFERENCES `tiendas` (`ID_Tienda`) ON DELETE NO ACTION ON UPDATE NO ACTION;
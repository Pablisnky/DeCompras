<?php
// MUESTRA TODAS LAS IMAGENES QUE TIENE UNA TIENDA
("SELECT * FROM imagenes INNER JOIN productos ON imagenes.ID_Producto=productos.ID_Producto INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion INNER JOIN secciones_opciones ON opciones.ID_Opcion=secciones_opciones.ID_Opcion INNER JOIN secciones ON secciones_opciones.ID_Seccion=secciones.ID_Seccion INNER JOIN tiendas_secciones ON secciones.ID_Seccion=tiendas_secciones.ID_Seccion INNER JOIN tiendas ON tiendas_secciones.ID_Tienda=tiendas.ID_Tienda WHERE tiendas.ID_Tienda = 255");

// MUESTRA TODOS LOS PRODUCTO QUE TIENE UNA TIENDA
("SELECT * FROM productos INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion INNER JOIN secciones_opciones ON opciones.ID_Opcion=secciones_opciones.ID_Opcion INNER JOIN secciones ON secciones_opciones.ID_Seccion=secciones.ID_Seccion INNER JOIN tiendas_secciones ON secciones.ID_Seccion=tiendas_secciones.ID_Seccion INNER JOIN tiendas ON tiendas_secciones.ID_Tienda=tiendas.ID_Tienda WHERE tiendas.ID_Tienda = 255");

// MUESTRA TODOS LOS PRODUCTO QUE TIENE UNA SECCION DE UNA TIENDA
("SELECT secciones.ID_Seccion, productos.ID_Producto, producto, opcion FROM productos INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion INNER JOIN secciones_opciones ON opciones.ID_Opcion=secciones_opciones.ID_Opcion INNER JOIN secciones ON secciones_opciones.ID_Seccion=secciones.ID_Seccion INNER JOIN tiendas_secciones ON secciones.ID_Seccion=tiendas_secciones.ID_Seccion INNER JOIN tiendas ON tiendas_secciones.ID_Tienda=tiendas.ID_Tienda WHERE tiendas.ID_Tienda = 225 AND secciones.ID_Seccion = 20");

// MUESTRA LAS IMAGENES POR SECCIONES
("SELECT secciones.ID_Seccion, ID_Imagen FROM secciones INNER JOIN secciones_productos ON secciones.ID_Seccion=secciones_productos.ID_Seccion INNER JOIN imagenes ON secciones_productos.ID_Producto=imagenes.ID_Producto");

// INSERTA EL ID_SECCION Y ID_IMAGEN EN LA TABLA SECCIONES_IMAGENES
("INSERT INTO secciones_imagenes(ID_Seccion, ID_Imagen) VALUES (:ID_SECCION,:ID_IMAGEN)");
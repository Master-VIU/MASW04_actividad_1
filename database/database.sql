CREATE SCHEMA IF NOT EXISTS superpc;

CREATE DOMAIN superpc.rol_valor AS character varying(100) 
CHECK (VALUE IN ('tecnico', 'asesor'));

CREATE DOMAIN superpc.tipo_valor AS character varying(50) 
CHECK (VALUE IN ('credito', 'debito'));

CREATE TABLE superpc.PERSONA(
id_persona serial NOT NULL,
dni character varying(12),
nombre character varying(50) NOT NULL,
apellido character varying(50) NOT NULL,
correo character varying(100) NOT NULL, 
telefono character varying(50) NOT NULL,
CONSTRAINT cp_persona PRIMARY KEY(id_persona)
);

CREATE TABLE superpc.USUARIO(
nombre_usuario character varying(50),
contrasenya character varying(50) NOT NULL,
CONSTRAINT cp_usuario PRIMARY KEY (nombre_usuario)
);


CREATE TABLE superpc.CARRITO (
id_carrito serial NOT NULL, 
costo_total DECIMAL(10,2) NOT NULL, 
CONSTRAINT cp_carrito PRIMARY KEY (id_carrito)
);


CREATE TABLE superpc.USUARIO_TRABAJADOR(
id_usuario serial NOT NULL,
rol superpc.rol_valor NOT NULL,
CONSTRAINT cp_usuario_trabajador PRIMARY KEY(id_usuario)
);

CREATE TABLE superpc.USUARIO_CLIENTE(
id_usuario serial NOT NULL,
id_carrito serial NOT NULL, 
CONSTRAINT cp_usuario_cliente PRIMARY KEY(id_usuario),
CONSTRAINT caj_carrito_cli FOREIGN KEY (id_carrito)
REFERENCES superpc.CARRITO (id_carrito)
ON DELETE RESTRICT ON UPDATE CASCADE 
); 

CREATE TABLE superpc.CATEGORIA(
id_categoria serial NOT NULL,
nombre_categoria character varying(250) NOT NULL,
id_categoria_padre serial NOT NULL,
PRIMARY KEY (id_categoria),
UNIQUE (id_categoria_padre),
CONSTRAINT cp_categoria PRIMARY KEY (id_categoria),
CONSTRAINT caj_categoria_p FOREIGN KEY (id_categoria_padre)
REFERENCES superpc.CATEGORIA (id_categoria_padre)
ON DELETE SET NULL ON UPDATE CASCADE
);


CREATE TABLE superpc.PRODUCTO (
id_producto serial NOT NULL, 
id_categoria serial NOT NULL,
nombre character varying(100) NOT NULL, 
descripcion character varying(250) NOT NULL,
precio DECIMAL(10,2) NOT NULL CHECK(precio > 0.0), 
caracteristicas character varying(250) NOT NULL,
disponibilidad character varying(50) NOT NULL,
imagenes bytea NULL,
CONSTRAINT cp_producto PRIMARY KEY (id_producto),
CONSTRAINT caj_categoria_pro FOREIGN KEY (id_categoria)
REFERENCES superpc.CATEGORIA (id_categoria)
ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE superpc.REPARACION (
id_reparacion serial NOT NULL, 
descripcion character varying(100) NOT NULL,
fecha_solicitud date NOT NULL,
fecha_reparacion date NOT NULL,
precio DECIMAL(10,2) NOT NULL,
id_trabajador serial NOT NULL,
id_cliente serial NOT NULL,
CONSTRAINT cp_reparacion PRIMARY KEY (id_reparacion),
CONSTRAINT caj_usuario_trabajdor FOREIGN KEY (id_trabajador)
REFERENCES USUARIO_TRABAJADOR (id_usuario)
ON DELETE RESTRICT ON UPDATE CASCADE,
CONSTRAINT caj_usu_cliente_rep FOREIGN KEY (id_cliente)
REFERENCES superpc.USUARIO_CLIENTE (id_usuario)
ON DELETE RESTRICT ON UPDATE CASCADE 
);

CREATE TABLE superpc.DIRECCION (
id_direccion serial NOT NULL, 
calle character varying(100) NOT NULL,
numero character varying(100) NOT NULL,
ciudad character varying(100) NOT NULL,
codigo_postal character varying(100) NOT NULL,
CONSTRAINT cp_direccion PRIMARY KEY (id_direccion),
);

CREATE TABLE superpc.TARJETA (
titular character varying(100) NOT NULL, 
tipo superpc.tipo_valor NOT NULL,
numero BIGINT NOT NULL,
cvv integer NOT NULL,
fecha_caducidad character varying(10) NOT NULL,
id_cliente serial NOT NULL,
CONSTRAINT cp_tarjeta PRIMARY KEY (numero),
CONSTRAINT caj_usu_cliente_t FOREIGN KEY (id_cliente)
REFERENCES superpc.USUARIO_CLIENTE (id_usuario)
ON DELETE CASCADE ON UPDATE CASCADE 
);

CREATE TABLE superpc.RESENYA (
id_resenya serial NOT NULL,
puntuacion character varying(50) NOT NULL, 
opinion character varying(250) NOT NULL,
fecha date NOT NULL,
id_cliente serial NOT NULL,
id_producto serial NOT NULL,
CONSTRAINT cp_resenya PRIMARY KEY (id_resenya),
CONSTRAINT caj_usu_cliente_r FOREIGN KEY (id_cliente)
REFERENCES superpc.USUARIO_CLIENTE (id_usuario)
ON DELETE RESTRICT ON UPDATE CASCADE, 
CONSTRAINT caj_producto_r FOREIGN KEY (id_producto)
REFERENCES superpc.PRODUCTO (id_producto)
ON DELETE RESTRICT ON UPDATE RESTRICT 
);

CREATE TABLE superpc.CARRITO_PRODUCTO (
id_carrito serial NOT NULL,
id_producto serial NOT NULL,
cantidad integer NOT NULL,
CONSTRAINT cp_carrito_producto PRIMARY KEY (id_carrito, id_producto),
CONSTRAINT caj_carrito_pro FOREIGN KEY (id_carrito)
REFERENCES superpc.CARRITO (id_carrito)
ON DELETE CASCADE ON UPDATE CASCADE, 
CONSTRAINT caj_producto FOREIGN KEY (id_producto)
REFERENCES superpc.PRODUCTO (id_producto)
ON DELETE CASCADE ON UPDATE CASCADE 
);

CREATE TABLE superpc.CLIENTE_DIRECCION (
id_cliente serial NOT NULL,
id_direccion serial NOT NULL,
CONSTRAINT cp_cliente_direccion PRIMARY KEY (id_cliente, id_direccion),
CONSTRAINT caj_usu_cliente_dir FOREIGN KEY (id_cliente)
REFERENCES superpc.USUARIO_CLIENTE (id_usuario)
ON DELETE CASCADE ON UPDATE CASCADE, 
CONSTRAINT caj_direccion_dir FOREIGN KEY (id_direccion)
REFERENCES superpc.DIRECCION (id_direccion)
ON DELETE SET DEFAULT ON UPDATE CASCADE 
);


CREATE TABLE superpc.PEDIDO (
id_pedido serial NOT NULL, 
precio DECIMAL(10,2) NOT NULL CHECK(precio > 0.0),
fecha_pedido date NOT NULL, 
fecha_entrega date,
ubicacion character varying(250) NOT NULL,
id_tarjeta BIGINT NOT NULL,
id_direccion serial NOT NULL,
id_cliente serial NOT NULL,
id_carrito serial NOT NULL,
CONSTRAINT cp_pedido PRIMARY KEY (id_pedido),
CONSTRAINT caj_tarjeta FOREIGN KEY (id_tarjeta)
REFERENCES superpc.TARJETA (numero)
ON DELETE RESTRICT ON UPDATE RESTRICT, 
CONSTRAINT caj_direccion FOREIGN KEY (id_direccion)
REFERENCES superpc.DIRECCION (id_direccion)
ON DELETE RESTRICT ON UPDATE RESTRICT,
CONSTRAINT caj_usuario_cliente FOREIGN KEY (id_cliente)
REFERENCES superpc.USUARIO_CLIENTE (id_usuario)
ON DELETE RESTRICT ON UPDATE RESTRICT,
CONSTRAINT caj_carrito FOREIGN KEY (id_carrito)
REFERENCES superpc.CARRITO (id_carrito)
ON DELETE RESTRICT ON UPDATE RESTRICT
);
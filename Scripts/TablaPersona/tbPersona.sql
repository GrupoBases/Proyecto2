CREATE TABLE tbPersona
(id_Usuario number (10),
  CONSTRAINT fk_id_usuarioPersona
  FOREIGN KEY (id_Usuario)
  REFERENCES tbUsuario(id_Usuario),
id_Direccion number (10),
  CONSTRAINT fk_id_direccionPersona
  FOREIGN KEY (id_Direccion)
  REFERENCES tbDireccion(id_Direccion),
id_Estado number (10),
  CONSTRAINT fk_id_estadoPersona
  FOREIGN KEY (id_Estado)
  REFERENCES tbEstadoPersona(id_EstadoPersona),
nombrePersona varchar2 (100)
  CONSTRAINT nombrePersona_nn Not Null,
primerApellido varchar2 (100)
  CONSTRAINT primerApellido_nn Not Null,
segundoApellido varchar2 (100)
  CONSTRAINT segundoApellido_nn Not Null,
telefono varchar2 (100)
  CONSTRAINT telefono_nn Not Null,
  CONSTRAINT telefono_uk Unique (telefono),
correo varchar2 (100)
  CONSTRAINT correo_nn Not Null,
  CONSTRAINT correo_uk Unique (correo),
dinero varchar2 (100),
fechaNacimiento Date 
  CONSTRAINT fechaNacimiento_nn Not Null,
calificacion number (10),
notas varchar2 (1000))

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );


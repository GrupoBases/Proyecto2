CREATE TABLE tbAsociacion
(id_Asociacion NUMBER(10),
 Constraint pk_id_asociacion
 Primary Key (id_Asociacion),
nombre VARCHAR2(100)
  CONSTRAINT nombre_nn NOT NULL,
id_direccionAsociacion number (10),
  CONSTRAINT fk_id_direccionAsociacion
  FOREIGN KEY (id_direccionAsociacion)
  REFERENCES tbDireccion(id_direccion),
telefonoAsociacion varchar2 (100)
  CONSTRAINT telefonoAsociacion_nn NOT NULL,
  CONSTRAINT telefonoAsociacion_uk Unique(telefonoAsociacion),
dineroAsociacion number (10))

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

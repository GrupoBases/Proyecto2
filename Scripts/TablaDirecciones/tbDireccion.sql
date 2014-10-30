CREATE TABLE tbDireccion
(id_Direccion NUMBER(10),
 Constraint pk_id_direccion Primary Key (id_Direccion),
descripcion VARCHAR2(1000),
id_Pais number (10),
  CONSTRAINT fk_id_pais
  FOREIGN KEY (id_Pais)
  REFERENCES tbPais(id_Pais),
id_Provincia number (10),
  CONSTRAINT fk_id_provincia
  FOREIGN KEY (id_Provincia)
  REFERENCES tbProvincia(id_Provincia),
id_Canton number (10),
  CONSTRAINT fk_id_canton
  FOREIGN KEY (id_Canton)
  REFERENCES tbCanton(id_Canton),
id_Distrito number (10),
  CONSTRAINT fk_id_distrito
  FOREIGN KEY (id_Distrito)
  REFERENCES tbDistrito(id_Distrito))

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

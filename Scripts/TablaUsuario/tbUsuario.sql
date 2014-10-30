CREATE TABLE tbUsuario( 
id_usuario NUMBER (10),
  constraint pk_idUsuario primary key(id_usuario),
nombreUsuario VARCHAR(100)
 constraint nombreUsuario_nn not Null,
contraseña varchar(100)
 constraint contraseña_nn not Null,
id_tipoUsuario Number(10),
  CONSTRAINT fk_id_tipoUsuario
  FOREIGN KEY (id_tipoUsuario)
  REFERENCES tbTipoUsuario(id_tipoUsuario)) 


TABLESPACE datos_proyecto2
 STORAGE (INITIAL 6144
         NEXT 6144 
         MINEXTENTS 1 
         MAXEXTENTS 5 );

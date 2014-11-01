CREATE TABLE tbDonacion
(id_donacion number (10),
  CONSTRAINT Pk_id_donacion primary key (id_donacion),
id_UsuarioD number (10),
  CONSTRAINT fk_id_usuarioD
  FOREIGN KEY (id_usuarioD)
  REFERENCES tbUsuario(id_Usuario),
id_Asociacion number (10),
  CONSTRAINT fk_id_Asociacion
  FOREIGN KEY (id_asociacion)
  REFERENCES tbAsociacion(id_Asociacion),
monto number(10),
fecha Date 
  CONSTRAINT fecha_nn Not Null)
TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );


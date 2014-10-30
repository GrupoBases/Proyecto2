CREATE TABLE tbCasaCuna
(id_CasaCuna NUMBER(10),
 Constraint pk_id_CasaCuna Primary Key (id_CasaCuna),
id_Usuario number (10),
  CONSTRAINT fk_id_UsuarioC
  FOREIGN KEY (id_Usuario)
  REFERENCES tbUsuario(id_Usuario),
  
id_TipoMascota number (10),
  CONSTRAINT fk_id_TipoMascotaC
  FOREIGN KEY (id_TipoMascota)
  REFERENCES tbTipoMascota(id_TipoMascota),
  
id_TamañoMascota number (10),
  CONSTRAINT fk_id_TamañoMascotaC
  FOREIGN KEY (id_TamañoMascota)
  REFERENCES tbTamañoMascota(id_TamañoMascota),

donacion Number(10))

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

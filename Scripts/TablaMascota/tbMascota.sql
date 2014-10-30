CREATE TABLE tbMascota
(id_Mascota NUMBER(10),
 Constraint pk_id_Mascota Primary Key (id_Mascota),

id_Usuario number (10),
  CONSTRAINT fk_id_UsuarioM
  FOREIGN KEY (id_Usuario)
  REFERENCES tbUsuario(id_Usuario),

id_TipoMascota number (10),
  CONSTRAINT fk_id_TipoMascota
  FOREIGN KEY (id_TipoMascota)
  REFERENCES tbTipoMascota(id_TipoMascota),
  
id_Raza number (10),
  CONSTRAINT fk_id_Raza
  FOREIGN KEY (id_Raza)
  REFERENCES tbRaza(id_Raza),
  
id_TamañoMascota number (10),
  CONSTRAINT fk_id_TamañoMascota
  FOREIGN KEY (id_TamañoMascota)
  REFERENCES tbTamañoMascota(id_TamañoMascota),
  
id_Direccion number (10),
  CONSTRAINT fk_id_Direccion
  FOREIGN KEY (id_Direccion)
  REFERENCES tbDireccion(id_Direccion),
  
id_EstadoMascota number (10),
  CONSTRAINT fk_id_EstadoMascota
  FOREIGN KEY (id_EstadoMascota)
  REFERENCES tbEstadoMascota(id_EstadoMascota),

nombre VARCHAR2(100),
chipIdentificacion VARCHAR2(100),
color VARCHAR2(100),
fechaEvento DATE,
montoRecompenza Varchar2(100),
notas Varchar2(1000))

 
TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

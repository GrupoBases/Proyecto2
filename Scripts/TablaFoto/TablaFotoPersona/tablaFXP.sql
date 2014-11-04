CREATE TABLE tbFotoXPersona
(id_fotoP number (10),
  CONSTRAINT fk_id_fotoP
  FOREIGN KEY (id_fotoP)
  REFERENCES tbFoto(id_foto),
  id_PersonaF number (10),
  CONSTRAINT fk_id_PersonaF
  FOREIGN KEY (id_PersonaF)
  REFERENCES tbUsuario(id_Usuario))

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

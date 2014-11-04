CREATE TABLE tbFotoXCasaCuna
(id_fotoCC number (10),
  CONSTRAINT fk_id_fotoCC
  FOREIGN KEY (id_fotoCC)
  REFERENCES tbFoto(id_foto),
  id_CasaCunaF number (10),
  CONSTRAINT fk_id_CasaCunaF
  FOREIGN KEY (id_CasaCunaF)
  REFERENCES tbCasaCuna(id_casacuna))

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

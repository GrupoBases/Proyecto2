CREATE TABLE tbMatch
(id_MEncontrada NUMBER(10),
CONSTRAINT fk_id_MEncontrada
  FOREIGN KEY (id_MEncontrada)
  REFERENCES tbMAscota(id_mascota),
  id_MPerdida number (10),
  CONSTRAINT fk_id_MPerdida
  FOREIGN KEY (id_MPerdida)
  REFERENCES tbMAscota(id_mascota))

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

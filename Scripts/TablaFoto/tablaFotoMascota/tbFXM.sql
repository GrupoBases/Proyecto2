CREATE TABLE tbFotoXMascota
(id_fotoM number (10),
  CONSTRAINT fk_id_fotoM
  FOREIGN KEY (id_fotoM)
  REFERENCES tbFoto(id_foto),
  id_MascotaF number (10),
  CONSTRAINT fk_id_MascotaF
  FOREIGN KEY (id_MascotaF)
  REFERENCES tbMascota(id_mascota))

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

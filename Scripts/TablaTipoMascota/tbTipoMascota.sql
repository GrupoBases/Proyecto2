CREATE TABLE tbTipoMascota
(id_TipoMascota NUMBER(10),
 Constraint pk_id_TipoMascota Primary Key (id_TipoMascota),
nombreTipoMascota VARCHAR2(100)
 CONSTRAINT nombreTipoMascota_nn NOT NULL)

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

CREATE TABLE tbEstadoMascota
(id_EstadoMAscota NUMBER(10),
 Constraint pk_id_EstadoMAscota Primary Key (id_EstadoMascota),
EstadoMascota VARCHAR2(100)
 CONSTRAINT estadoMascota_nn NOT NULL)

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

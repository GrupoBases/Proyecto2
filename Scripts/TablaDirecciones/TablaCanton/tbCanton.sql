CREATE TABLE tbCanton
(id_Canton NUMBER(10),
 Constraint pk_id_canton Primary Key (id_Canton),
nombre_canton VARCHAR2(100)
 CONSTRAINT nombre_canton_nn NOT NULL)

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

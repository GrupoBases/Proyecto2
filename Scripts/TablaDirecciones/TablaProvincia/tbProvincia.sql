CREATE TABLE tbProvincia
(id_Provincia NUMBER(10),
 Constraint pk_id_provincia Primary Key (id_Provincia),
nombre_provincia VARCHAR2(100)
 CONSTRAINT nombre_provincia_nn NOT NULL)

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

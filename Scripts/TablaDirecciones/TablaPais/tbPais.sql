CREATE TABLE tbPais
(id_Pais NUMBER(10),
 Constraint pk_id_pais Primary Key (id_Pais),
nombre_pais VARCHAR2(100)
 CONSTRAINT nombre_pais_nn NOT NULL)

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

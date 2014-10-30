CREATE TABLE tbDistrito
(id_Distrito NUMBER(10),
 Constraint pk_id_distrito Primary Key (id_Distrito),
nombre_distrito VARCHAR2(100)
 CONSTRAINT nombre_distrito_nn NOT NULL)

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

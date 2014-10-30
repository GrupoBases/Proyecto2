CREATE TABLE tbRaza
(id_Raza NUMBER(10),
 Constraint pk_id_Raza Primary Key (id_Raza),
nombreRaza VARCHAR2(100)
 CONSTRAINT nombreRaza_nn NOT NULL)

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

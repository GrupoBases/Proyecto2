CREATE TABLE tbTamañoMascota
(id_TamañoMascota NUMBER(10),
 Constraint pk_id_TamañoMascota Primary Key (id_TamañoMascota),
nombreTamaño VARCHAR2(100)
 CONSTRAINT nombreTamaño_nn NOT NULL)

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

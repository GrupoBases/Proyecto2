CREATE TABLE tbTama�oMascota
(id_Tama�oMascota NUMBER(10),
 Constraint pk_id_Tama�oMascota Primary Key (id_Tama�oMascota),
nombreTama�o VARCHAR2(100)
 CONSTRAINT nombreTama�o_nn NOT NULL)

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

CREATE TABLE tbEstadoPersona
(id_estadoPersona NUMBER(10),
constraint pk_estadoPersona primary key(id_estadoPersona),
estadoPersona VARCHAR2(100)
 CONSTRAINT estadoPersona_nn NOT NULL)

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

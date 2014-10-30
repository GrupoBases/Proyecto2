CREATE TABLE tbTipoUsuario
(id_tipoUsuario NUMBER(10),
nombreTipoUsuario VARCHAR2(100),
primary Key(id_tipoUsuario))

TABLESPACE datos_proyecto2
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

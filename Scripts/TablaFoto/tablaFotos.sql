CREATE TABLE tbFoto
(id_Foto     number(10)   not null,
    CONSTRAINT pk_id_Foto PRIMARY KEY (id_Foto),
 nombre_Foto VARCHAR2(100) not null,
 BIN            BLOB              null,
 FX_ALTA        DATE              null
 )

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

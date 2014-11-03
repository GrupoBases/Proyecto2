CREATE TABLE Foto
(id_Foto     VARCHAR2(6)   not null,
    CONSTRAINT pk_id_Foto PRIMARY KEY (id_Foto),
 NOMBRE_Foto VARCHAR2(100) not null,
 BIN            BLOB              null,
 FX_ALTA        DATE              null
 ); 
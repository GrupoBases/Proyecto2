CREATE TABLE BINARY_DATA( 
  id    NUMBER(10)   not null,
  description VARCHAR2(100),
  bin_data            BLOB ,
  filename VARCHAR2(100),
  filesize NUMBER(10),
  filetype VARCHAR2(50),
 CONSTRAINT PK_ID PRIMARY KEY (id)
 )
 
 TABLESPACE datos_proyecto2
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 )
 ; 
 

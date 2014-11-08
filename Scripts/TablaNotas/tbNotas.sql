CREATE TABLE tbNotas( 
id_Notas NUMBER (10),
  constraint pk_idNotas primary key(id_Notas),
id_Usuario Number(10),
  CONSTRAINT fk_id_UsuarioN
  FOREIGN KEY (id_Usuario)
  REFERENCES tbUsuario(id_Usuario),
notas varchar2(1000)) 


TABLESPACE datos_proyecto2
 STORAGE (INITIAL 6144
         NEXT 6144 
         MINEXTENTS 1 
         MAXEXTENTS 5 );

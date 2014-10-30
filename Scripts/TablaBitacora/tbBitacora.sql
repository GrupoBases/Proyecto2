CREATE TABLE tbBitacora
(id_Bitacora NUMBER(10),
 Constraint pk_id_Bitacora Primary Key (id_Bitacora),

id_Usuario number (10),
  CONSTRAINT fk_id_UsuarioB
  FOREIGN KEY (id_Usuario)
  REFERENCES tbUsuario(id_Usuario),

id_TipoCampo number (10),
  CONSTRAINT fk_id_TipoCampoB
  FOREIGN KEY (id_TipoCampo)
  REFERENCES tbTipoCampo(id_TipoCampo),
  
antes Varchar2(100),
despues varchar2(100),
fechaModificacion Date)

 
TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

CREATE TABLE tbTipoCampo
(id_TipoCampo NUMBER(10),
 Constraint pk_id_TipoCampo Primary Key (id_TipoCampo),
TipoCampo VARCHAR2(100)
 CONSTRAINT TipoCampo_nn NOT NULL)

TABLESPACE datos_Proyecto2 
storage(initial 6144 
        next 6144 
        MINEXTENTS 1 
        MAXEXTENTS 5 );

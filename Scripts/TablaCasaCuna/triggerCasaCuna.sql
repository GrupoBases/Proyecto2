create or replace trigger beforeInsert_CasaCuna
  before insert
    on Proyecto2.tbCasaCuna for each row

  begin
    :new.modificadoPor := user;
    :new.fechaModifiacion := sysdate;
end;

create or replace trigger beforeUpdate_CasaCuna
  before update
    on Proyecto2.tbCasaCuna for each row

  begin
    :new.modificadoPor := user;
    :new.fechaModificacion := sysdate;
end;

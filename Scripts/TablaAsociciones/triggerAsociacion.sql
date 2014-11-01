create or replace trigger beforeInsert_Asociacion
  before insert
    on Proyecto2.tbAsociacion for each row

  begin
    :new.modificadoPor := user;
    :new.fechaModifiacion := sysdate;
end;

create or replace trigger beforeUpdate_Asociacion
  before update
    on Proyecto2.tbAsociacion for each row

  begin
    :new.modificadoPor := user;
    :new.fechaModificacion := sysdate;
end;

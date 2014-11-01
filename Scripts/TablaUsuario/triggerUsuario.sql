create or replace trigger beforeInsert_Usuario
  before insert
    on Proyecto2.tbUsuario for each row

  begin
    :new.modificadoPor := user;
    :new.fechaModifiacion := sysdate;
end;

create or replace trigger beforeUpdate_Usuario
  before update
    on Proyecto2.tbUsuario for each row

  begin
    :new.modificadoPor := user;
    :new.fechaModificacion := sysdate;
end;

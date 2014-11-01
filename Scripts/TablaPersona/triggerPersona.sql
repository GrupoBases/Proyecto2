create or replace trigger beforeInsert_Persona
  before insert
    on Proyecto2.tbPersona for each row

  begin
    :new.modificadoPor := user;
    :new.fechaModifiacion := sysdate;
end;

create or replace trigger beforeUpdate_Persona
  before update
    on Proyecto2.tbPersona for each row

  begin
    :new.modificadoPor := user;
    :new.fechaModificacion := sysdate;
end;

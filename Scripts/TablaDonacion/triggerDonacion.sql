create or replace trigger beforeInsert_Donacion
  before insert
    on Proyecto2.tbDonacion for each row

  begin
    :new.modificadoPor := user;
    :new.fechaModifiacion := sysdate;
end;

create or replace trigger beforeUpdate_Donacion
  before update
    on Proyecto2.tbDonacion for each row

  begin
    :new.modificadoPor := user;
    :new.fechaModificacion := sysdate;
end;

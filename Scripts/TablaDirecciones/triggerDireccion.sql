create or replace trigger beforeInsert_Direccion
  before insert
    on Proyecto2.tbDireccion for each row

  begin
    :new.modificadoPor := user;
    :new.fechaModifiacion := sysdate;
end;

create or replace trigger beforeUpdate_Direccion
  before update
    on Proyecto2.tbDireccion for each row

  begin
    :new.modificadoPor := user;
    :new.fechaModificacion := sysdate;
end;

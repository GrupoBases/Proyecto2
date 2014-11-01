create or replace trigger beforeInsert_Mascota
  before insert
    on Proyecto2.tbMascota for each row

  begin
    :new.modificadoPor := user;
    :new.fechaModifiacion := sysdate;
end;

create or replace trigger beforeUpdate_Mascota
  before update
    on Proyecto2.tbMascota for each row

  begin
    :new.modificadoPor := user;
    :new.fechaModificacion := sysdate;
end;

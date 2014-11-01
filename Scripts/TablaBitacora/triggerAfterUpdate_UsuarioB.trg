create or replace trigger afterUpdate_UsuarioB
  after update of contraseņa
    on Proyecto2.tbUsuario for each row

  begin
    INSERT INTO tbBitacora(Id_Bitacora,Id_Tipocampo,antes, despues, Fechamodificacion,Esquema)
    VALUES (secuencia_id_bitacora.nextval,'ContraseņaUsuario',:OLD.contraseņa, :NEW.contraseņa,Sysdate,user);
end;
/

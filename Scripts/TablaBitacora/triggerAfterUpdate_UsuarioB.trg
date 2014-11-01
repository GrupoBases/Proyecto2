create or replace trigger afterUpdate_UsuarioB
  after update of contraseña
    on Proyecto2.tbUsuario for each row

  begin
    INSERT INTO tbBitacora(Id_Bitacora,Id_Tipocampo,antes, despues, Fechamodificacion,Esquema)
    VALUES (secuencia_id_bitacora.nextval,'ContraseñaUsuario',:OLD.contraseña, :NEW.contraseña,Sysdate,user);
end;
/

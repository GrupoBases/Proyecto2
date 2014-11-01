create or replace trigger beforeUpdate_UsuarioB
  after update of contraseña 
    on Proyecto2.tbUsuario for each row

  begin
    INSERT INTO tbBitacora(Id_Bitacora,Id_Usuario,Id_Tipocampo,antes, despues, Fechamodificacion)
    VALUES (secuencia_id_bitacora.nextval,tbUsuario.id_Usuario,'ContraseñaUsuario',:OLD.contraseña, :NEW.contraseña,Sysdate);
end;

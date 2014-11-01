create or replace trigger beforeUpdate_UsuarioB
  after update of contrase�a 
    on Proyecto2.tbUsuario for each row

  begin
    INSERT INTO tbBitacora(Id_Bitacora,Id_Usuario,Id_Tipocampo,antes, despues, Fechamodificacion)
    VALUES (secuencia_id_bitacora.nextval,tbUsuario.id_Usuario,'Contrase�aUsuario',:OLD.contrase�a, :NEW.contrase�a,Sysdate);
end;

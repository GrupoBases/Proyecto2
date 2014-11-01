create or replace trigger afterUpdate_UsuarioB
  after update of contrase�a
    on Proyecto2.tbUsuario for each row

  begin
    INSERT INTO tbBitacora(Id_Bitacora,Id_Tipocampo,antes, despues, Fechamodificacion,Esquema)
    VALUES (secuencia_id_bitacora.nextval,'Contrase�aUsuario',:OLD.contrase�a, :NEW.contrase�a,Sysdate,user);
end;
/

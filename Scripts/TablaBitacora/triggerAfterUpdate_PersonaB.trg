create or replace trigger afterUpdate_PersonaB
  after update of dinero 
    on Proyecto2.tbPersona for each row

  begin
    INSERT INTO tbBitacora(Id_Bitacora,Id_Tipocampo,antes, despues, Fechamodificacion,Esquema)
    VALUES (secuencia_id_bitacora.nextval,'DineroPersona',to_char(:OLD.dinero) ,to_char(:NEW.dinero),Sysdate,user);
end;

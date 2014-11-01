create or replace trigger afterUpdate_DonacionB
  after update of monto 
    on Proyecto2.tbDonacion for each row

  begin
    INSERT INTO tbBitacora(Id_Bitacora,Id_Tipocampo,antes, despues, Fechamodificacion,Esquema)
    VALUES (secuencia_id_bitacora.nextval,'MontoDonacion',:OLD.monto, :NEW.monto,Sysdate,user);
end;

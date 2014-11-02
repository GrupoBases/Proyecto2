create or replace function insertarAsociacion(pidDireccion number,pNombre varchar2,pTelefono varchar2,pDinero number)
return number
as
retornoId NUMBER(10);


begin    
  
  select Tbasociacion.Id_Asociacion into retornoId
  from tbAsociacion
  where Tbasociacion.Nombre = UPPER(pNombre);
  return retornoId;
  

  EXCEPTION
  WHEN no_data_found THEN
  retornoId := secuencia_id_asociaciones.nextVal;
    INSERT INTO tbAsociacion(Id_Asociacion,Nombre,Id_Direccionasociacion,Telefonoasociacion,Dineroasociacion)
    VALUES (retornoId,upper(pNombre),pidDireccion,pTelefono,pDinero);   
    commit;
    return retornoId; 

    
end;

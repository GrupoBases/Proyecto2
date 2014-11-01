create or replace function insertarProvincia(pNombreProvincia Varchar2)

return number
as

varId NUMBER(10);


begin    
  
  select tbProvincia.Id_Provincia into varId
  from tbProvincia
  where tbProvincia.Nombre_Provincia = UPPER(pNombreProvincia);
  return varId;
  

  EXCEPTION
  WHEN no_data_found THEN
  varId := secuencia_id_provincia.nextval;
    INSERT INTO tbProvincia(Id_Provincia,Nombre_Provincia)
    VALUES (varId,upper(pNombreProvincia));
    commit;   
    return varId; 
    
end;
    

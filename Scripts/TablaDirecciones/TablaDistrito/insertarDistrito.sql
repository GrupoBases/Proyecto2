create or replace function insertarDistrito(pNombreDistrito Varchar2)
return number
as
retornoId NUMBER(10);


begin    
  
  select tbDistrito.Id_Distrito into retornoId
  from tbDistrito
  where tbDistrito.Nombre_Distrito = UPPER(pNombreDistrito);
  return retornoId;
  

  EXCEPTION
  WHEN no_data_found THEN
  retornoId := secuencia_id_Distrito.nextval;
    INSERT INTO tbDistrito(id_Distrito,nombre_Distrito)
    VALUES (retornoId,upper(pNombreDistrito));   
    commit;
    return retornoId; 

    
end;

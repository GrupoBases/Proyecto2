create or replace function insertarRaza(pTipoRaza Varchar2)
return number
as
retornoId NUMBER(10);


begin    
  
  select tbRaza.Id_Raza into retornoId
  from tbRaza
  where tbRaza.Nombreraza = UPPER(pTipoRaza);
  return retornoId;
  

  EXCEPTION
  WHEN no_data_found THEN
  retornoId := secuencia_id_raza.nextval;
    INSERT INTO tbRaza(id_Raza,Nombreraza)
    VALUES (retornoId,upper(pTipoRaza));   
    commit;
    return retornoId; 

    
end;

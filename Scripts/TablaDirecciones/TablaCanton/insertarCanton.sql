create or replace function insertarCanton(pNombreCanton Varchar2)
return number
as
retornoId NUMBER(10);


begin    
  
  select tbcanton.Id_canton into retornoId
  from tbCanton
  where tbCanton.Nombre_Canton = UPPER(pNombreCanton);
  return retornoId;
  

  EXCEPTION
  WHEN no_data_found THEN
  retornoId := secuencia_id_canton.nextval;
    INSERT INTO tbCanton(id_canton,nombre_Canton)
    VALUES (retornoId,upper(pNombreCanton));   
    commit;
    return retornoId; 

    
end;

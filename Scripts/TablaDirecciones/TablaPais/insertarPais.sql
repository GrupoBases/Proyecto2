create or replace function insertarPais(pNombrePais Varchar2)
return number
as
retornoId NUMBER(10);


begin    
  
  select tbPais.Id_Pais into retornoId
  from tbPais
  where tbPais.Nombre_Pais = UPPER(pNombrePais);
  return retornoId;
  

  EXCEPTION
  WHEN no_data_found THEN
  retornoId := secuencia_id_pais.nextval;
    INSERT INTO tbPais(id_pais,nombre_Pais)
    VALUES (retornoId,upper(pNombrePais));   
    commit;
    return retornoId; 

    
end;
    

create or replace function insertarTipoMascota(pTipoM VARCHAR2)
return number
as
retornoId NUMBER(10);


begin    
  
  select Tbtipomascota.Id_Tipomascota into retornoId
  from TbtipoMascota
  where Tbtipomascota.Nombretipomascota = UPPER(pTipoM);
  return retornoId;
  

  EXCEPTION
  WHEN no_data_found THEN
  retornoId := secuencia_id_tipomascota.nextVal;
    INSERT INTO Tbtipomascota(id_tipoMascota,Nombretipomascota)
    VALUES (retornoId,upper(pTipoM));   
    commit;
    return retornoId; 

end;

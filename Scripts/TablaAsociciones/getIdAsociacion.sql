create or replace function getIdAsociacion(pNombreA varchar2)
return number
as
retornoId NUMBER(10);


begin    
  select tbAsociacion.Id_Asociacion into retornoId
  from tbAsociacion
  where Tbasociacion.Nombre = UPPER(pNombreA);
  return retornoId;
  
end;

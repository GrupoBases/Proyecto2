create or replace function insertarCasaCuna(pidUsuario number,pTipoM varchar2,pTama�o number,pRequiere Number)
return number
as
retornoId NUMBER(10);
idTipoM number(10);


begin    
  retornoId := secuencia_id_casacuna.nextVal;
  idTipoM := insertarTipoMAscota(pTipoM);
  INSERT INTO tbCasaCuna(Id_Casacuna,Id_Usuario,Id_Tipomascota,Id_Tama�omascota,Donacion)
         values (retornoId,pidUsuario,idTipoM,pTama�o,pRequiere);
  commit;
  return retornoId; 

end;

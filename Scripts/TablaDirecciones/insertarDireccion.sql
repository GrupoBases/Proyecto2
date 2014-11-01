create or replace Function insertarDireccion(pPais varchar2,pProvincia varchar2,pCanton varchar2,pDistrito varchar2,pDescripcion varchar2)
return number
as
        idPais Number(10);
        idProvincia NUmber(10);
        idCanton number(10);
        idDistrito number(10);
        secuenciaDireccion NUMBER(10);
        retornoId NUMBER(10);
        
begin
  idPais := insertarPais(pPais);
  idProvincia := insertarProvincia(pProvincia);
  idCanton := insertarCanton(pCanton);
  idDistrito := insertarDistrito(pDistrito);
  
  secuenciaDireccion := secuencia_id_direccion.nextVal;
  INSERT INTO tbDireccion(id_direccion,Id_Pais,Id_Provincia,Id_Canton,Id_Distrito,Descripcion)
         VALUES (secuenciaDireccion,idPais,idProvincia,idCanton,idDistrito,pDescripcion);
         commit;
         return retornoId;
end;

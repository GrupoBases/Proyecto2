create or replace Function insertarMascota(pIdUsuario number,pIdTipoM VARCHAR2,pIdRaza VARCHAR2,pIdTamaño number,
                                           pIdDireccion number,pIdEstadoM number,pNombre Varchar2,pChip Varchar2,
                                           pColor Varchar2,pFecha date,pRecompenza number,pNotas Varchar2)
return NUMBER as 
       secuenciaMascota NUMBER(10);
       idTipoMascota NUMBER(10);
       idRaza NUMBER(10);
begin
       secuenciaMascota:= secuencia_id_mascota.nextVal;
       idTipoMascota := insertarTipoMascota(pIdTipoM);
       idRaza := insertarRaza(pIdRaza);
       
        
       INSERT INTO tbMascota(id_Mascota,Id_Usuario,Id_Tipomascota,Id_Raza,Id_Tamañomascota,Id_Direccion,Id_Estadomascota,Nombre,Chipidentificacion,Color,Fechaevento,Montorecompenza,Notas)
               VALUES (secuenciaMascota,pIdUsuario,idTipoMascota,idRaza,pIdTamaño,
                       pIdDireccion,pIdEstadoM,pNombre,pChip,pColor,pFecha,pRecompenza,pNotas);
                       commit;
       return secuenciaMascota;
end;

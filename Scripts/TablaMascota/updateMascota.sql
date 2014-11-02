create or replace Function updateMascota(pIdMascota number,pIdUsuario number,pTipoM VARCHAR2,pRaza VARCHAR2,pIdTamaño number,
                                           pIdDireccion number,pIdEstadoM number,pNombre Varchar2,pChip Varchar2,
                                           pColor Varchar2,pFecha date,pRecompenza number,pNotas Varchar2)
return NUMBER as 
       retornar NUMBER(10);
       idTipoMascota NUMBER(10);
       idRaza NUMBER(10);
begin
  
  idTipoMascota := insertarTipoMascota(pTipoM);
  idRaza := insertarRaza(pRaza);
  update tbMascota
  set tbMascota.Id_Tipomascota = idTipoMascota,
      tbMascota.Id_Raza = idRaza,
      tbMascota.Id_Tamañomascota = pIdTamaño,
      tbMascota.Id_Direccion = pIdDireccion,
      tbMascota.Id_Estadomascota = pIdEstadoM,
      tbMascota.Nombre = pNombre,
      tbMascota.Chipidentificacion = pChip,
      tbMascota.Color = pColor,
      tbMascota.Fechaevento = pFecha,
      tbMascota.Montorecompenza = pRecompenza,
      tbMascota.Notas = pNotas
  where tbMascota.Id_Mascota = pIdMascota;
  commit;
  retornar := 0;
  return retornar; 
  
  exception
  when no_data_found then 
    retornar := -1;
    return retornar;
end;

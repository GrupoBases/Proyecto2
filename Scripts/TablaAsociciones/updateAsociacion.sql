create or replace procedure updateAsociacion(pidAsociacion number,pidDireccion number,pNombre varchar2,
                                             pDireccion varchar2,pTelefono varchar2)

as
begin
  update Tbasociacion
  set tbAsociacion.Nombre = pNombre,
      tbAsociacion.Id_Direccionasociacion = pDireccion,
      tbAsociacion.Telefonoasociacion = pTelefono
  where tbAsociacion.Id_Asociacion = pidAsociacion;
  commit;

end;

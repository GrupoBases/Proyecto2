create or replace procedure updatePersona (pIdUsuario number,pNombre varchar2,pApellido1 varchar2,pApellido2 varchar2,
                                           pTelefono Varchar2,pCorreo varchar2,pEstado varchar2,pDinero number,pFechaNacimiento Date,
                                           pCalificacion number,pNotas varchar2)
as

begin
  update Tbpersona
  set tbPersona.Nombrepersona = pNombre,
      tbPersona.Primerapellido = pApellido1,
      tbPersona.Segundoapellido = pApellido2,
      tbPersona.Telefono = pTelefono,
      tbPersona.Correo = pCorreo,
      tbPersona.Id_Estado = pEstado,
      Tbpersona.Dinero = pDinero,
      TbPersona.Fechanacimiento = pFechaNacimiento,
      tbPersona.Calificacion = pCalificacion,
      tbPersona.Notas = pNotas
  where tbPersona.Id_Usuario = pIdUsuario;
end;

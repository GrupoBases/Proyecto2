create or replace Procedure updateContraseñaU(pIdUsuario number,pContraseña varchar2)
as

begin
  update tbUsuario
  set tbUsuario.Contraseña = pContraseña
  where tbUsuario.Id_Usuario = pIdUsuario;

end;

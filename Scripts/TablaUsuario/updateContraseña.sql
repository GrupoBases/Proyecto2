create or replace Procedure updateContrase�aU(pIdUsuario number,pContrase�a varchar2)
as

begin
  update tbUsuario
  set tbUsuario.Contrase�a = pContrase�a
  where tbUsuario.Id_Usuario = pIdUsuario;

end;

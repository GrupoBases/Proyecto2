create or replace function verificarUsuario(pUser varchar2,pPassword varchar2)
return number

as

idUsuario number(10);

begin 
  select tbUsuario.Id_Usuario into idUsuario 
  from tbUsuario 
  where tbUsuario.Nombreusuario = pUser and tbUsuario.Contrasena = pPassword;
  return idUsuario;
  
  EXCEPTION
  WHEN no_data_found THEN
    idUsuario := -1;
    return idUsuario; 
                                                           
end;

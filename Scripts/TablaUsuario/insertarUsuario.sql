create or replace function insertarUsuario(pNombreUsuario varchar2,pContraseña varchar2,pTipoUsuario number,
                                           pIdDireccion number,pNombre varchar2,pApellido1 varchar2,pApellido2 varchar2,
                                           pTelefono Varchar2,pCorreo varchar2,pEstado varchar2,pDinero number,pFechaNacimiento Date,
                                           pCalificacion number,pNotas varchar2)
return number
as
retornoId NUMBER(10);

begin
  retornoId := secuencia_id_usuario.nextVal;
  insert into Tbusuario(id_usuario,Nombreusuario,Contraseña,Id_Tipousuario)
         values (retornoId,upper(pNombreUsuario),pContraseña,pTipoUsuario); 
         
  insert into tbPersona(Id_Usuario,Id_Direccion,Id_Estado,Nombrepersona,Primerapellido,Segundoapellido,Telefono,
                        Correo,Dinero,Fechanacimiento,Calificacion,Notas)
         values (retornoId,pIdDireccion,upper(pNombre),upper(pApellido1),upper(pApellido2),
                 upper(pTelefono),pCorreo,pEstado,pDinero,pFechaNacimiento,pCalificacion,pNotas);
                 commit;
  return retornoId; 

end;

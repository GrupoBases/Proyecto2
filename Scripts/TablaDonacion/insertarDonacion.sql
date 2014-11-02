create or replace function insertarDonacion(pidUsuario number,asociacion varchar2,pMonto number)
return number
as
dineroPersona number(10);
montoDonacion number(10);
dineroAsociacion number(10);
idAsociacion number(10);
retornoId number(10);


begin 
    idAsociacion := getIdAsociacion(asociacion);
       
    select tbPersona.Dinero into dineroPersona
    from tbPersona
    where tbPersona.Id_Usuario = pIdUsuario;
  
    select tbAsociacion.Dineroasociacion into dineroAsociacion
    from tbAsociacion
    where tbAsociacion.Id_Asociacion = idAsociacion; 
    
    if dineroPersona < pMonto then 
      retornoId := -1;
      return retornoId;
    end if;
    
    dineroPersona := dineroPersona - pMonto; 
    update tbPersona
    set tbPersona.Dinero = dineroPersona;
    
    dineroAsociacion := dineroAsociacion + pMonto;
    update Tbasociacion
    set Tbasociacion.Dineroasociacion = dineroAsociacion;

    retornoId := secuencia_id_donacion.nextVal;
    insert into tbDonacion(id_Donacion,Id_Usuariod,Id_Asociacion,Monto,Fecha)
    values (retornoId,pidUsuario,idAsociacion,pMonto,sysdate);
    commit;
end;

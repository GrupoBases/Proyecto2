create or replace PROCEDURE updateEstadoCC(pIdCasaCuna number)
as
begin   
  update TbCasaCuna
  set tbCasacuna.Estadocasacuna = 'FALSE'
  where tbCasaCuna.Id_Casacuna = pIdCasaCuna;
  commit;
end;

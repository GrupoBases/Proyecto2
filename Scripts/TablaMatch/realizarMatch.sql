create or replace procedure realizarMatch
as

begin
  DELETE FROM TBMATCH;
  insert into tbMatch(Id_Mencontrada,Id_Mperdida)
  
  SELECT p.id_mascota,c.id_mascota
  FROM tbMascota p
  INNER JOIN tbMascota c
  ON (p.id_estadomascota = 1 and c.id_estadomascota = 2 and p.id_mascota <> c.id_mascota) 
  and (p.nombre = c.nombre or p.id_tipomascota = c.id_tipomascota or p.chipidentificacion = c.chipidentificacion
       or p.fechaevento = c.fechaevento or p.color = c.color);
 
 -- donde 1 es encontrado y es p 
 -- donde 2 es perdido y es c
end;

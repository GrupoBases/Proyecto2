--Permisos para Esquemas

--Permisos basicos
GRANT CONNECT TO Proyecto2;
grant create session to Proyecto2;        --Permiso para conectarse a una BD
grant unlimited tablespace to Proyecto2;  --Permiso para usar cualquier tabla del Tablespace

--Permisos para crear 
grant create table to Proyecto2;
grant create view to Proyecto2;
grant create procedure to Proyecto2;
grant create synonym to Proyecto2;
grant create public synonym to Proyecto2;

--Permisos para manipuloar tablas
grant select any table to Proyecto2;
grant update any table to Proyecto2;
grant insert any table to Proyecto2;

--Permisis para alterar objetos
grant alter any table to Proyecto2;
--grant alter any view to Proyecto; este no 
grant alter any procedure to Proyecto2;
--grant alter any synonym to Proyecto; este no 


--Permisis para eliminar objetos

grant drop any table to Proyecto2;
grant drop any view to Proyecto2;
grant drop any procedure to Proyecto2;
grant drop any synonym to Proyecto2;

PL/SQL Developer Test script 3.0
13
-- Created on 03/11/2014 by FLORES 
declare 
  -- Local variables here
  i integer;
begin
  -- Test statements here
  DBMS_SCHEDULER.create_job ( 
  job_name => 'jobMatch', 
  job_type => 'PLSQL_BLOCK', 
  job_action => 'BEGIN proyecto2.realizarmatch; END;',
  start_date => SYSTIMESTAMP, repeat_interval   => 'FREQ=HOURLY; INTERVAL=4', 
  end_date => NULL, enabled => TRUE, comments => 'job para hacer match entre mascotas');
end;
0
0

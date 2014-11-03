DECLARE
  l_bfile  BFILE;
  l_blob   BLOB;
BEGIN
  INSERT INTO Foto  (id_Foto, nombre_foto, BIN, FX_ALTA)
  VALUES  ('000001','prueba1.jpg',EMPTY_BLOB(),SYSDATE)
  RETURN BIN INTO l_blob;


  
  l_bfile := BFILENAME('IMAGES', 'prueba1.jpg');     --Directorio, nombre archivo .extencion
  DBMS_LOB.fileopen(l_bfile, Dbms_Lob.File_Readonly);
  DBMS_LOB.loadfromfile(l_blob,l_bfile,DBMS_LOB.getlength(l_bfile));
  DBMS_LOB.fileclose(l_bfile);
  COMMIT;
 
EXCEPTION WHEN OTHERS THEN
   ROLLBACK;
   RAISE;
END;
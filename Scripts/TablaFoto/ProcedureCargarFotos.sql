create or replace procedure cargarFotos (pNombreF varchar2,pDireccion varchar2,pIdProveniente number,pTipo number)

as
  l_bfile  BFILE;
  l_blob   BLOB;
  secuenciaFoto number(10);

BEGIN
  secuenciaFoto := secuencia_id_Foto.nextVal;
  INSERT INTO tbFoto(id_Foto, nombre_foto, BIN)
  VALUES  (secuenciaFoto,pDireccion,EMPTY_BLOB())
  RETURN BIN INTO l_blob;


  
  l_bfile := BFILENAME('IMAGES', pDireccion);     --Directorio, nombre archivo .extencion
  DBMS_LOB.fileopen(l_bfile, Dbms_Lob.File_Readonly);
  DBMS_LOB.loadfromfile(l_blob,l_bfile,DBMS_LOB.getlength(l_bfile));
  DBMS_LOB.fileclose(l_bfile);
  COMMIT;
  
  if pTipo = 1 then
    --persona
     insert into tbFotoXPersona(id_FotoP,Id_Personaf)
            values (secuenciaFoto,pIdProveniente);
     
  end if;
  
  if pTipo = 2 then
    -- Mascota
    insert into tbFotoXMascota(id_FotoM,Id_Mascotaf)
           values (secuenciaFoto,pIdProveniente);
  end if;
  
  if pTipo = 3 then 
    -- casacuna
    insert into tbFotoXCasaCuna(id_FotoCC,Id_Casacunaf)
           values (secuenciaFoto,pIdProveniente);
  end if;
  
EXCEPTION WHEN OTHERS THEN
   ROLLBACK;
   RAISE;
END;

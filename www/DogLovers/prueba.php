<head>
<body>
    <form id="form1" name="form1" method="post" action="">
        <label>pais</label>
        <select name="pais" id="pais" onchange="SeleccionarPais(this)">
            <option>Seleccione el pais</option>
            <option>Costa Rica</option>
            <option>Nicaragua</option>
            <option>Panama</option>
        </select>

        <select name="provincia" id="provincia" onchange="">
            <option>-- --</option>
        </select>

        <input name="caja1" type="text" id="caja1" value="" />
    </form> 
</body>
</html>
      
<head>
<body> 
    <script type="text/JavaScript">
        function SeleccionarPais(selObj){
            if (selObj.selectedIndex == 0){
                document.form1.provincia.length=1;
                document.form1.provincia.selectedIndex=0;
                document.form1.provincia.options[0].text="-- --";
            }
            if (selObj.selectedIndex == 1){
                document.form1.provincia.length=7;
                document.form1.provincia.selectedIndex=0;
                document.form1.provincia.options[0].text="San José";
                document.form1.provincia.options[1].text="Alajuela";
                document.form1.provincia.options[2].text="Heredia";
                document.form1.provincia.options[3].text="Cartago";
                document.form1.provincia.options[4].text="Guanacaste";
                document.form1.provincia.options[5].text="Puntarenas";
                document.form1.provincia.options[6].text="Limón";
            }
            if (selObj.selectedIndex == 2){
                document.form1.provincia.length=3;
                document.form1.provincia.selectedIndex=0;
                document.form1.provincia.options[0].text="Nicaragua 1";
                document.form1.provincia.options[1].text="Nicaragua 2";
                document.form1.provincia.options[2].text="Nicaragua 3";
            }
            if (selObj.selectedIndex == 3){
                document.form1.provincia.length=3;
                document.form1.provincia.selectedIndex=0;
                document.form1.provincia.options[0].text="Panama 1";
                document.form1.provincia.options[1].text="Panama 2";
                document.form1.provincia.options[2].text="Panama 3"; }
                document.form1.caja1.value=selObj.length;
        }
    </script>
</body>
</html>
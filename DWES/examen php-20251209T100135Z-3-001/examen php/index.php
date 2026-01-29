<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p> check box</p>
    <form method="post">
    <input type="checkbox" name="colores[]" value="rojo"> <span>Rojo</span>
    <input type="checkbox" name="colores[]" value="verde"> <span>Verde</span>
    <input type="checkbox" name="colores[]" value="azul"> <span>Azul</span><br><br>
    <input type="submit" value="Enviar" name="enviar-colores">
    </form>
    <p>radio buton</p>
    <form method="post">
    <input type="radio" name="genero" value="hombre"> <span>Hombre</span><br>
    <input type="radio" name="genero" value="mujer"> <span>Mujer</span><br><br>
    <input type="submit" value="Enviar" name="enviar-radio">
    <form>
    <p>Caja texto</p>
    <input type="text" name="txt" value="Escriba aqui..."> <span>Nombre</span><br>
    <p> Select</p>
    <select name="paises"><span>Capitales</span>
    <option value="paris">paris</option>
    <option value="madrid">madrid</option>
    <option value="tokio">tokio</option>
    <option value="berlin">berlin</option>
   </select>
   <p>Formulario<p>
    <form method="post">
    <input type="text" name="txt1" value="Escribe algo..."><span>Nombre</span><br><br>
    <input type="submit" value="Enviar" name="mensaje-enviado"><br>
    </form>    
    <form method="post">
        <select name="paises">
         <?php
        $paises_y_capitales= [
            "España" => "Madrid",
            "Francia" => "Paris",
            "Italia" => "Roma" 
        ];
            foreach($paises_y_capitales as $pais => $capital){
                echo "<option value='$pais'>".$pais."</option>";
            }
         ?> 
         </select>
         <input type="submit" value="Enviar" name="enviar-capital">  
    </form>     
    <?php
    
    if(!isset($_REQUEST["mensaje-enviado"])){
        echo "<p>has escrito:</p>";
        } else {
            $escrito = $_POST['txt1'];
            echo "<p>has escrito :".$escrito."</p>";
        };
    
    
    
    if(isset($_REQUEST["enviar-colores"])){
        $colores_elegidos = $_POST['colores'];
        echo "<p>Has seleccionado :";
        for($i=0 ; $i<count($colores_elegidos) ; $i++){
            echo $colores_elegidos[$i]." ";
        }
        echo "</p>";
    };
    
    if(isset($_REQUEST["enviar-radio"])){
        $radioElegido = $_POST["genero"];
        echo "<p>Has seleccionado :".$radioElegido."</p>";
    };

    if(isset($_REQUEST["enviar-capital"])){
        $paisSeleccionado=$_POST["paises"];
        $capitalSeleccionada=$paises_y_capitales[$paisSeleccionado];
        echo "<p>has seleccionado :".$paisSeleccionado. " la capital es :".$capitalSeleccionada."</p>";
    }    
    ?>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $paises = ["España", "Francia", "Italia", "Alemania"];
    $capitales = ["Madrid", "París", "Roma", "Berlín"];
    if(!isset($_REQUEST['paises'])){
    ?>
    <h1>Paises y Capitales.</h1>  
    <form action="version2.php" method="post">
        <select name="paises">
            <?php
                foreach ( $paises as $i => $pais ) { 
                    echo "<option value='$i'>{$paises[$i]}</option>";
                };
            ?>
        </select>
        <button type="submit">Mostrar Capital</button>
    </form>
        
    <?php
        } else {
            $pais_seleccionado = $_POST['paises'];
            $capital_encontrada = "Capital no encontrada.";
            echo "<h1>Resultado:</h1>";
            echo "<p>La capital de $paises[$pais_seleccionado] es $capitales[$pais_seleccionado] .</p>";
            echo '<p><a href="version2.php">Volver</a></p>';
        } 
    ?>
</body>
</html>
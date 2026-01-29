<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $datosCapitales =[
        "España"   => "Madrid",
        "Francia"  => "Paris",
        "Italia"   => "Roma",
        "Alemania" => "Berlin"
    ];
    if(!isset($_REQUEST['paises'])){
    ?>
    <h1>Paises y Capitales.</h1>  
    <form action="version3.php" method="post">
        <select name="paises">
            <?php
                foreach ($datosCapitales as $pais => $capital){
                    echo "<option value='$pais'>$pais</option>";
                }
            ?>
        </select>
        <button type="submit">Mostrar Capital</button>
    </form>
        
    <?php
    } else {
        echo "<h1>Resultado:</h1>";
        $pais_seleccionado = $_REQUEST['paises'];
        $capital_seleccionada = $datosCapitales[$pais_seleccionado];
        echo "<p>La capital de $pais_seleccionado es $capital_seleccionada.</p>";
        echo '<p><a href="version3.php">Volver</a></p>';   
    } 
    ?>
</body>
</html>
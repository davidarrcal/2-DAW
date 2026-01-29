<?php

$paisesCapitales = [
    "España" => "Madrid",
    "Francia" => "París",
    "Alemania" => "Berlín",
    "Italia" => "Roma",
    "Portugal" => "Lisboa",
    "Reino Unido" => "Londres",
    "Japón" => "Tokio",
    "Canadá" => "Ottawa",
    "Brasil" => "Brasilia",
    "Australia" => "Camberra"
];


$capitales = array_values($paisesCapitales);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $paisAdivinar = $_POST['paisAdivinar'] ?? '';
    $capitalSeleccionada = $_POST['capitalSeleccionada'] ?? '';
    
   
    if (array_key_exists($paisAdivinar, $paisesCapitales)) {
        $capitalCorrecta = $paisesCapitales[$paisAdivinar];
        
        echo "<h2>Resultado</h2>";
        echo "<p>El país a adivinar era: **$paisAdivinar**</p>";
        echo "<p>Tu capital seleccionada fue: **$capitalSeleccionada**</p>";
        
        if ($capitalSeleccionada == $capitalCorrecta) {
            echo "<h3>🎉 ¡HAS ACERTADO! 🎉</h3>";
        } else {
            echo "<h3>❌ ¡HAS FALLADO! ❌</h3>";
            echo "<p>La capital correcta para $paisAdivinar era: **$capitalCorrecta**.</p>";
        }
        
        
        echo "<br><a href='adivina_capital.php'><button>Jugar de Nuevo</button></a>";
        
    } else {
        echo "<p>Error: País no reconocido.</p>";
        echo "<br><a href='adivina_capital.php'><button>Volver al Juego</button></a>";
    }
    
} else {

    $paises = array_keys($paisesCapitales);
    $numPaises = count($paises);
    

    $indiceAleatorio = rand(0, $numPaises - 1);
    

    $paisSeleccionado = $paises[$indiceAleatorio];

    echo "<h2>ADIVINA LA CAPITAL</h2>";
    echo "<p>¿Cuál es la capital de **{$paisSeleccionado}**?</p>";
?>
    
    <form method="POST" action="adivina_capital.php">
        <input type="hidden" name="paisAdivinar" value="<?php echo htmlspecialchars($paisSeleccionado); ?>">
        
        <label for="capitalSeleccionada">Selecciona la capital:</label>
        <select name="capitalSeleccionada" id="capitalSeleccionada" required>
            <option value="">-- Selecciona una opción --</option>
            <?php

            foreach ($capitales as $capital) {
                echo "<option value=\"{$capital}\">{$capital}</option>";
            }
            ?>
        </select>
        
        <br><br>
        <button type="submit">Comprobar Respuesta</button>
    </form>
    
<?php
}
?>
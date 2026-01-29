<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" type="image/png" href="imagenes/icono1.png">
    <link rel="stylesheet" href="estilos.css">
    <title>Precio luz hora</title>
</head>
<body>

<?php
// === LÓGICA PHP (CARGA DE DATOS) ===
require_once 'funcionalidad.php'; 

//Obtener la lista de fechas disponibles
$fechas = obtenerFechasDisponibles($conn);

//Determinar la fecha seleccionada: Si viene en GET o la última disponible
$fechaSeleccionada = $_GET['fecha'] ?? (end($fechas) ?: ''); 

// Obtener los precios para la fecha seleccionada (Gráfica 2)
$precios = obtenerPreciosPorFecha($conn, $fechaSeleccionada);


//  Cerrar la conexión
if ($conn !== null) {
    $conn->close();
}

// 6. Convertir los datos a JSON para inyectarlos en JS
$fechas_json = json_encode($fechas);
$precios_json = json_encode($precios);
?>

<nav>
    <img src="imagenes/logoTarifa.png" alt="logoTarifa">
    <ul>
        <li>Mercado Luz y Gas</li>
        <li>Compañias</li>
        <li>Tramites</li>
        <li>Distribuidoras</li>
        <li>Ahorro</li>
        <li>Herramientas</li>
    </ul>    
</nav> 

<main>
<section>
    <div class="h1-consultaPrecio">
        <h1>Consulta el precio de la luz hoy: Detalles y Evolución de la tarifa PVPC</h1>
    </div>
</section>

<section>
    <div class="h2-precioLuz">
        <h2>Precio de la luz por horas hoy</h2>
        <h3 id="fecha-actual"><?php echo $fechaSeleccionada ? date('d/m/Y', strtotime($fechaSeleccionada)) : 'Cargando...'; ?></h3>
    </div>
    <form method="GET" action="index.php">
        <div>
            <select id="selector-fecha" name="fecha" onchange="this.form.submit()">
                <?php if (empty($fechas)): ?>
                    <option value="">No hay fechas</option>
                <?php else: ?>
                    <?php foreach ($fechas as $f): ?>
                        <option value="<?php echo $f; ?>" 
                                <?php echo $f == $fechaSeleccionada ? 'selected' : ''; ?>>
                            <?php echo date('d/m/Y', strtotime($f)); ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div> 
    </form>
</section>

<section>
    <div>
        <canvas class="grafica1" id="grafica1"></canvas>
    </div>
</section>



<section class="section-estadisticas">
    <div class="div-estadisticas">
        <p><b>Precio medio del dia</b></p>
        <p id="fecha-media">--/--/--</p>
        <div>
            <h2 id="precio-medio">0.0000</h2>
            <p>€/kWh</p>
        </div>
    </div>
    <div class="div-estadisticas">
        <p><b>Precio más bajo del día</b></p>
        <p id="fecha-baja">--/--/--</p>
        <div>
            <h2 id="hora-baja">--:--</h2>
            <p class="precio_bajo" id="precio-bajo">0.00000 €/kWh</p>
        </div>
    </div> 
    <div class="div-estadisticas">
        <p><b>Precio más alto del día</b></p>
        <p id="fecha-alta">--/--/--</p>
        <div>
            <h2 id="hora-alta">--:--</h2>
            <p class="alto" id="precio-alto">0.00000 €/kWh</p>
        </div>
    </div>  
</section>

<section id="seccion-lista">
    <div>
        <p><b>Listado de horas</b></p>
    </div>
    
    <?php echo renderizarListaHoras($precios); ?>

</section>
<section>
    <div>
        Precio por hora del día
        <canvas class="grafica1" id="grafica2"></canvas>   
    </div>
</section>
<script>
    // Variables globales inyectadas por PHP
    const INITIAL_FECHAS = <?php echo $fechas_json; ?>;
    const INITIAL_PRECIOS = <?php echo $precios_json; ?>;
    const INITIAL_FECHA_SELECCIONADA = '<?php echo $fechaSeleccionada; ?>';
</script>

<script src="app.js"></script>
</body>
</html>
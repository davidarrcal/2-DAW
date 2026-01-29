<?php


// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "precios_luz";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {

    error_log('Conexión a BD fallida: ' . $conn->connect_error);
    $conn = null; 
}

//  FUNCIONES PARA OBTENER DATOS 

function obtenerFechasDisponibles($conn) {
    if ($conn === null) return [];
    
    $sql = "SELECT DISTINCT fecha FROM precios_horarios ORDER BY fecha";
    $result = $conn->query($sql);
    
    $fechas = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $fechas[] = $row['fecha'];
        }
    }
    return $fechas;
}

function obtenerPreciosPorFecha($conn, $fecha) {
    if ($conn === null || !$fecha) return [];
    
    $sql = "SELECT hora, precio FROM precios_horarios WHERE fecha = ? ORDER BY hora";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) return [];

    $stmt->bind_param("s", $fecha);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $precios = [];
    while ($row = $result->fetch_assoc()) {
        $precios[] = [
            'hora' => $row['hora'],
            'precio' => (float)$row['precio']
        ];
    }
    return $precios;
}
//Funcion para cargar los estilos de color segun el precio 
//Toma el array $precios y devuelve la cadena HTML completa, lista para ser impresa.
function renderizarListaHoras($precios) {
    ob_start(); // Inicia el buffer de salida para capturar el HTML

    ?>
    <div id="lista-horas">
        <?php if (!empty($precios)): ?>
            <?php foreach ($precios as $item): ?>
                <?php 
                $claseColor = '';
                
                if ($item['precio'] < 0.10) {
                    $claseColor = 'hora-verde';
                } elseif ($item['precio'] < 0.20) {
                    $claseColor = 'hora-amarilla';
                } else {
                    $claseColor = 'hora-roja';
                }
                ?>
                <div class="fila-hora <?php echo $claseColor; ?>">
                    <span class="hora-texto"><?php echo substr($item['hora'], 0, 5); ?>h</span>
                    <span class="precio-texto"><?php echo number_format($item['precio'], 5); ?> €/kWh</span>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay datos disponibles para esta fecha.</p>
        <?php endif; ?>
    </div>
    <?php

    return ob_get_clean(); 
}




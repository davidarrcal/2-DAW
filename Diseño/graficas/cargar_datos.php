<?php
// Datos estáticos desde PHP
$datos = [
    'temperaturas' => [18, 17, 15, 16, 19, 23, 25, 24, 22, 20, 18, 17],
    'lluvias' => [35, 30, 28, 22, 18, 8, 3, 6, 12, 20, 30, 40]
];


?>

<script>
    // Guardar datos PHP en sessionStorage
    const datosPHP = <?php echo json_encode($datos); ?>;
    sessionStorage.setItem('datosMeteorologicos', JSON.stringify(datosPHP));
    alert('Datos cargados desde PHP correctamente');
    window.location.href = 'index.html';
</script>
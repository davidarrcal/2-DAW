<?php
// Configuración de la base de datos (cambia según tus datos)
$servername = "localhost";
$username = "root";      // tu usuario de phpMyAdmin
$password = "";          // tu contraseña de phpMyAdmin
$dbname = "datos meteorológicos"; // el nombre de tu base de datos

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname)
or die("Error de conexión:");



$sql = "SELECT * FROM datos_climaticos";

$result=mysqli_query($conn,$sql);

$temperaturas = [];
$lluvias = [];
$cont=0;

while($res=mysqli_fetch_array($result)){
    $temperaturas[$cont]=$res["temperatura"];
    $lluvias[$cont]=$res["lluvia"];
    $cont++;
}

$datos = [
    'temperaturas' => $temperaturas,
    'lluvias' => $lluvias
];

mysqli_close($conn);
?>

<script>
    // Guardar los datos en sessionStorage
    const datosPHP = <?php echo json_encode($datos); ?>;
    sessionStorage.setItem('datosMeteorologicos', JSON.stringify(datosPHP));
    
    // Redirigir al index con mensaje de éxito
    window.location.href = 'index.html?mensaje=datos_cargados_bd';
</script>
<?php
$notas=["5","2","4"];
$notaMedia=0;
$notaMayor=0;
$notaMenor=10;
function calcularNotaMedia($notas, &$notaMayor,&$notaMenor ){
    $sumaNotas=0;
    for($i=0 ; $i<count($notas); $i++ ){
        if($notaMayor< $notas[$i]) $notaMayor= $notas[$i];
        if($notaMenor > $notas[$i]) $notaMenor= $notas[$i];
        $sumaNotas += $notas[$i];
    }
    return $sumaNotas /= count($notas);
}
$notaMedia= calcularNotaMedia($notas, $notaMayor, $notaMenor);
echo "<p>Nota media :".$notaMedia."</p>";
echo "<p>Nota mayor :".$notaMayor."</p>";
echo "<p>Nota menor :".$notaMenor."</p>";
?>
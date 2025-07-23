<?php
$peso = 70;
$altura = 1.75;

$imc = $peso / ($altura * $altura);
if ($imc < 18.5) {
    $clasificacion = "Bajo peso";
} elseif ($imc >= 18.5 && $imc < 25) {
    $clasificacion = "Peso normal";
} elseif ($imc >= 25 && $imc < 30) {
    $clasificacion = "Sobrepeso";
} else {
    $clasificacion = "Obesidad";
}

echo "Peso: " . $peso . " kg<br>";
echo "Altura: " . $altura . " m<br>";
echo "IMC: " . round($imc, 2) . "<br>";
echo "Clasificación: " . $clasificacion;
?>

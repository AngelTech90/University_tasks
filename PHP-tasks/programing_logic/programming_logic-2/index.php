<?php
// Process form submissions
$results = [];

// Ejercicio 1: IMC Calculator
if (isset($_POST['calcular_imc'])) {
    $peso = floatval($_POST['peso']);
    $altura = floatval($_POST['altura']);
    
    if ($peso > 0 && $altura > 0) {
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
        
        $results['imc'] = [
            'peso' => $peso,
            'altura' => $altura,
            'imc' => round($imc, 2),
            'clasificacion' => $clasificacion
        ];
    }
}

// Ejercicio 4: Triangle Area
if (isset($_POST['calcular_triangulo'])) {
    $base = floatval($_POST['base']);
    $altura_triangulo = floatval($_POST['altura_triangulo']);
    
    if ($base > 0 && $altura_triangulo > 0) {
        $area = ($base * $altura_triangulo) / 2;
        
        $results['triangulo'] = [
            'base' => $base,
            'altura' => $altura_triangulo,
            'area' => $area
        ];
    }
}

// Ejercicio 7: Mathematical Operations
if (isset($_POST['calcular_operaciones'])) {
    $num1 = floatval($_POST['num1']);
    $num2 = floatval($_POST['num2']);
    
    $suma = $num1 + $num2;
    $resta = $num1 - $num2;
    $multiplicacion = $num1 * $num2;
    $division = $num2 != 0 ? $num1 / $num2 : null;
    $residuo = $num2 != 0 ? $num1 % $num2 : null;
    
    $results['operaciones'] = [
        'num1' => $num1,
        'num2' => $num2,
        'suma' => $suma,
        'resta' => $resta,
        'multiplicacion' => $multiplicacion,
        'division' => $division,
        'residuo' => $residuo
    ];
}

// Ejercicio 15: Even or Odd
if (isset($_POST['verificar_par_impar'])) {
    $numero = intval($_POST['numero_par_impar']);
    
    if ($numero > 0) {
        $resultado = ($numero % 2 == 0) ? "par" : "impar";
        $residuo = $numero % 2;
        
        $results['par_impar'] = [
            'numero' => $numero,
            'residuo' => $residuo,
            'resultado' => $resultado
        ];
    }
}

// Ejercicio 18: Greater of two negative numbers
if (isset($_POST['encontrar_mayor_negativo'])) {
    $negativo1 = floatval($_POST['negativo1']);
    $negativo2 = floatval($_POST['negativo2']);
    
    if ($negativo1 < 0 && $negativo2 < 0) {
        $mayor = ($negativo1 > $negativo2) ? $negativo1 : $negativo2;
        $mensaje = ($negativo1 > $negativo2) ? "El número $negativo1 es el mayor" : "El número $negativo2 es el mayor";
        
        $results['mayor_negativo'] = [
            'num1' => $negativo1,
            'num2' => $negativo2,
            'mayor' => $mayor,
            'mensaje' => $mensaje,
            'comparacion' => $negativo1 > $negativo2
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios PHP Interactivos - Tarea 4</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .container {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
        }
        
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 40px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        
        .exercise {
            background: #f8f9fa;
            margin: 25px 0;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .exercise h3 {
            color: #495057;
            margin-top: 0;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        
        .form-group {
            margin: 15px 0;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        
        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }
        
        input[type="number"]:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(0,123,255,0.25);
        }
        
        button {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }
        
        button:hover {
            background: linear-gradient(135deg, #0056b3, #004085);
        }
        
        .result {
            margin-top: 20px;
            padding: 15px;
            background: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 8px;
        }
        
        .result h4 {
            margin-top: 0;
            color: #155724;
        }
        
        .result-item {
            margin: 8px 0;
            padding: 5px 0;
            border-bottom: 1px solid #c3e6cb;
        }
        
        .result-item:last-child {
            border-bottom: none;
        }
        
        .error {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 Ejercicios PHP Interactivos - Tarea 4</h1>
        
        <!-- Ejercicio 1: IMC Calculator -->
        <div class="exercise">
            <h3>📊 Ejercicio 1: Calculadora de IMC</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="peso">Peso (kg):</label>
                    <input type="number" name="peso" step="0.1" value="<?= isset($_POST['peso']) ? $_POST['peso'] : '70' ?>" required>
                </div>
                <div class="form-group">
                    <label for="altura">Altura (m):</label>
                    <input type="number" name="altura" step="0.01" value="<?= isset($_POST['altura']) ? $_POST['altura'] : '1.75' ?>" required>
                </div>
                <button type="submit" name="calcular_imc">Calcular IMC</button>
            </form>
            
            <?php if (isset($results['imc'])): ?>
                <div class="result">
                    <h4>Resultado del IMC:</h4>
                    <div class="result-item"><strong>Peso:</strong> <?= $results['imc']['peso'] ?> kg</div>
                    <div class="result-item"><strong>Altura:</strong> <?= $results['imc']['altura'] ?> m</div>
                    <div class="result-item"><strong>IMC:</strong> <?= $results['imc']['imc'] ?></div>
                    <div class="result-item"><strong>Clasificación:</strong> <?= $results['imc']['clasificacion'] ?></div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Ejercicio 4: Triangle Area -->
        <div class="exercise">
            <h3>📐 Ejercicio 4: Área del Triángulo</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="base">Base (unidades):</label>
                    <input type="number" name="base" step="0.1" value="<?= isset($_POST['base']) ? $_POST['base'] : '10' ?>" required>
                </div>
                <div class="form-group">
                    <label for="altura_triangulo">Altura (unidades):</label>
                    <input type="number" name="altura_triangulo" step="0.1" value="<?= isset($_POST['altura_triangulo']) ? $_POST['altura_triangulo'] : '8' ?>" required>
                </div>
                <button type="submit" name="calcular_triangulo">Calcular Área</button>
            </form>
            
            <?php if (isset($results['triangulo'])): ?>
                <div class="result">
                    <h4>Resultado del Área:</h4>
                    <div class="result-item"><strong>Base:</strong> <?= $results['triangulo']['base'] ?> unidades</div>
                    <div class="result-item"><strong>Altura:</strong> <?= $results['triangulo']['altura'] ?> unidades</div>
                    <div class="result-item"><strong>Fórmula:</strong> a = (b × h) / 2</div>
                    <div class="result-item"><strong>Área:</strong> <?= $results['triangulo']['area'] ?> unidades cuadradas</div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Ejercicio 7: Mathematical Operations -->
        <div class="exercise">
            <h3>🧮 Ejercicio 7: Operaciones Matemáticas</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="num1">Número 1:</label>
                    <input type="number" name="num1" value="<?= isset($_POST['num1']) ? $_POST['num1'] : '15' ?>" required>
                </div>
                <div class="form-group">
                    <label for="num2">Número 2:</label>
                    <input type="number" name="num2" value="<?= isset($_POST['num2']) ? $_POST['num2'] : '4' ?>" required>
                </div>
                <button type="submit" name="calcular_operaciones">Realizar Operaciones</button>
            </form>
            
            <?php if (isset($results['operaciones'])): ?>
                <div class="result">
                    <h4>Resultados de las Operaciones:</h4>
                    <div class="result-item"><strong>Números:</strong> <?= $results['operaciones']['num1'] ?> y <?= $results['operaciones']['num2'] ?></div>
                    <div class="result-item"><strong>Suma (+):</strong> <?= $results['operaciones']['suma'] ?></div>
                    <div class="result-item"><strong>Resta (-):</strong> <?= $results['operaciones']['resta'] ?></div>
                    <div class="result-item"><strong>Multiplicación (×):</strong> <?= $results['operaciones']['multiplicacion'] ?></div>
                    <div class="result-item"><strong>División (÷):</strong> <?= $results['operaciones']['division'] !== null ? round($results['operaciones']['division'], 2) : 'No se puede dividir por cero' ?></div>
                    <div class="result-item"><strong>Residuo (%):</strong> <?= $results['operaciones']['residuo'] !== null ? $results['operaciones']['residuo'] : 'No se puede obtener residuo' ?></div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Ejercicio 15: Even or Odd -->
        <div class="exercise">
            <h3>🔢 Ejercicio 15: Par o Impar</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="numero_par_impar">Número entero positivo:</label>
                    <input type="number" name="numero_par_impar" min="1" value="<?= isset($_POST['numero_par_impar']) ? $_POST['numero_par_impar'] : '17' ?>" required>
                </div>
                <button type="submit" name="verificar_par_impar">Verificar</button>
            </form>
            
            <?php if (isset($results['par_impar'])): ?>
                <div class="result">
                    <h4>Resultado:</h4>
                    <div class="result-item"><strong>Número:</strong> <?= $results['par_impar']['numero'] ?></div>
                    <div class="result-item"><strong>Residuo de <?= $results['par_impar']['numero'] ?> % 2:</strong> <?= $results['par_impar']['residuo'] ?></div>
                    <div class="result-item"><strong>El número <?= $results['par_impar']['numero'] ?> es:</strong> <?= $results['par_impar']['resultado'] ?></div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Ejercicio 18: Greater of two negative numbers -->
        <div class="exercise">
            <h3>➖ Ejercicio 18: Mayor de dos números negativos</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="negativo1">Número negativo 1:</label>
                    <input type="number" name="negativo1" max="-1" value="<?= isset($_POST['negativo1']) ? $_POST['negativo1'] : '-15' ?>" required>
                </div>
                <div class="form-group">
                    <label for="negativo2">Número negativo 2:</label>
                    <input type="number" name="negativo2" max="-1" value="<?= isset($_POST['negativo2']) ? $_POST['negativo2'] : '-7' ?>" required>
                </div>
                <button type="submit" name="encontrar_mayor_negativo">Encontrar Mayor</button>
            </form>
            
            <?php if (isset($results['mayor_negativo'])): ?>
                <div class="result">
                    <h4>Resultado:</h4>
                    <div class="result-item"><strong>Número 1:</strong> <?= $results['mayor_negativo']['num1'] ?></div>
                    <div class="result-item"><strong>Número 2:</strong> <?= $results['mayor_negativo']['num2'] ?></div>
                    <div class="result-item"><strong>Comparación:</strong> <?= $results['mayor_negativo']['num1'] ?> > <?= $results['mayor_negativo']['num2'] ?> = <?= $results['mayor_negativo']['comparacion'] ? 'true' : 'false' ?></div>
                    <div class="result-item"><strong>Resultado:</strong> <?= $results['mayor_negativo']['mensaje'] ?></div>
                    <div class="result-item"><strong>El mayor es:</strong> <?= $results['mayor_negativo']['mayor'] ?></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

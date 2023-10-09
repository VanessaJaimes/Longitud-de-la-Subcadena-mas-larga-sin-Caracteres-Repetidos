<?php
//Seleccion y longitud de subcadenas
function longitudSubcadenaUnica($cadena)
{
    $longitud = strlen($cadena);
    $maxLongitud = 0;
    $inicio = 0;
    $caracteres = array();

    for ($fin = 0; $fin < $longitud; $fin++) {
        $caracter = $cadena[$fin];

        if (array_key_exists($caracter, $caracteres)) {
            $inicio = max($inicio, $caracteres[$caracter] + 1);
        }

        $maxLongitud = max($maxLongitud, $fin - $inicio + 1);

        $caracteres[$caracter] = $fin;
    }

    return $maxLongitud;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Longitud de Subcadena Única</title>
    <!-- Estilos -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #c3c3c3;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .result {
            text-align: center;
            font-size: 24px;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Longitud de Subcadena Única</h1>
        <form method="post">
            <label for="cadena">Ingrese una cadena:</label>
            <input type="text" name="cadena" id="cadena" required>
            <button type="submit">Calcular</button>
        </form>
        <?php
        //Ingresar cadena
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cadena = $_POST["cadena"];
            $longitud = longitudSubcadenaUnica($cadena);
            echo "<div class='result'>Longitud de la subcadena única: $longitud</div>";
        }
        ?>
    </div>
</body>

</html>
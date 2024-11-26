
Mostrar un mensaje de bienvenida con el nombre introducido.
Validar que el campo de correo tenga el formato adecuado (por ejemplo, usando filter_var con FILTER_VALIDATE_EMAIL).
Enviar un mensaje de éxito si todos los campos son correctos o de error si hay algún fallo.
<form method="POST" action="">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <input type="submit" value="Enviar">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Bienvenido, $nombre. Su correo ($email) es válido.";
    } else {
        echo "Error: el correo no es válido.";
    }
}
?>


<?php

//--array frutas y a mayusculas
$frutas = ['manzana', 'plátano', 'naranja'];
echo $frutas[1]; // Imprime 'plátano'

$frutas[] = 'fresa';
print_r($frutas);

foreach ($frutas as $fruta) {
    echo strtoupper($fruta) . "<br>";
}


//------------mayor de edad
$edad = 20;

if ($edad >= 18) {
    echo "Es mayor de edad";
} else {
    echo "Es menor de edad";
}

// Con operador ternario
echo ($edad >= 18) ? "Es mayor de edad" : "Es menor de edad";


//--------------tabla del 7 FOR
echo "<table>";
for ($i = 1; $i <= 10; $i++) {
    echo "7 x $i = " . (7 * $i) ;
}



//-----array con productos y precios

$productos = [
    "manzana" => 1.2,
    "plátano" => 0.8,
    "naranja" => 1.5
];

echo $productos["plátano"]; // Precio del plátano

foreach ($productos as $producto => $precio) {
    echo "$producto: $precio €<br>";
}


//-----array Multi estudiantes con sus notas
$estudiantes = [
    ["nombre" => "Carlos", "notas" => [8, 9, 7]],
    ["nombre" => "Ana", "notas" => [9, 6, 8]],
    ["nombre" => "Luis", "notas" => [7, 5, 6]]
];

echo "Notas de Ana: " . implode(", ", $estudiantes[1]["notas"]);

foreach ($estudiantes as $estudiante) {
    echo "Notas de " . $estudiante["nombre"] . ": " . implode(", ", $estudiante["notas"]) . "<br>";
}


//-------dia de la semana switch
$dia = "Sábado";

switch ($dia) {
    case "Sábado":
    case "Domingo":
        echo "Es fin de semana";
        break;
    default:
        echo "Es un día de semana";
        break;
}



//-----contador While
$contador = 1;
while ($contador <= 10) {
    echo "$contador<br>";
    $contador++;
}
echo "Contador finalizado";


//----operacion con funcion
function sumar($a, $b) {
    return $a + $b;
}

echo "La suma de 5 y 7 es: " . sumar(5, 7);


//------superglobales con GET y POST
// HTML Formulario 
?><html>
<form method="POST" action="?mensaje=bienvenido">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <input type="submit" value="Enviar">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Nombre enviado por POST: " . $_POST['nombre'];
}

if (isset($_GET['mensaje'])) {
    echo "<br>Mensaje en GET: " . $_GET['mensaje'];
}


?>

Pregunta: Escribe un script en PHP que gestione la información de una lista de estudiantes en una clase. Desarrolla los siguientes puntos:

Declara una variable para cada estudiante que incluya su nombre, edad y curso. Define al menos 3 estudiantes con datos diferentes.
Agrupa todos los estudiantes en un array multidimensional, de manera que cada estudiante esté representado por un array asociativo con las claves "nombre", "edad" y "curso".
Crea una constante llamada NUMERO_ESTUDIANTES que almacene el total de estudiantes definidos. Imprime esta constante.
Usa un foreach para recorrer el array y mostrar el nombre y curso de cada estudiante en una lista HTML.
Utiliza una estructura de control if dentro del bucle para identificar y destacar (con un mensaje) a los estudiantes que tienen 18 años o más.
Finalmente, añade un switch para mostrar un mensaje específico dependiendo del curso de cada estudiante (por ejemplo, "Bienvenido a Primero", "Segundo Curso").

<?php
// 1. Declaración de variables para cada estudiante
$estudiante1 = ["nombre" => "Ana", "edad" => 19, "curso" => "Primero"];
$estudiante2 = ["nombre" => "Luis", "edad" => 17, "curso" => "Segundo"];
$estudiante3 = ["nombre" => "Marta", "edad" => 18, "curso" => "Primero"];

// 2. Array multidimensional de estudiantes
$estudiantes = [$estudiante1, $estudiante2, $estudiante3];

// 3. Constante para el número de estudiantes
const NUMERO_ESTUDIANTES = 3;
echo "Número de estudiantes: " . NUMERO_ESTUDIANTES . "<br>";

// 4. Recorrido del array y muestra de información
echo "<ul>";
foreach ($estudiantes as $estudiante) {
    echo "<li>Nombre: " . $estudiante["nombre"] . ", Curso: " . $estudiante["curso"] . "</li>";

    // 5. Destacar a los estudiantes mayores de 18 años
    if ($estudiante["edad"] >= 18) {
        echo "<strong>" . $estudiante["nombre"] . " es mayor de edad.</strong><br>";
    }

    // 6. Switch para mostrar un mensaje según el curso
    switch ($estudiante["curso"]) {
        case "Primero":
            echo "Bienvenido a Primero.<br>";
            break;
        case "Segundo":
            echo "Bienvenido a Segundo.<br>";
            break;
        default:
            echo "Curso desconocido.<br>";
    }
}
echo "</ul>";
?>



-----------------------FORMULARIO BASIK 7:
<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Contacto</title>
</head>
<body>
    <h1>Formulario de Contacto</h1>
    
    <?php
    // 3. Procesamiento del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $mensaje = htmlspecialchars($_POST["mensaje"]);

        // 4. Validación de campos
        if (!empty($nombre) && !empty($email) && !empty($mensaje)) {
            echo "<p>Gracias, $nombre. Hemos recibido tu mensaje:</p>";
            echo "<p>Mensaje: $mensaje</p>";
        } else {
            if (empty($nombre)) echo "<p>Error: Falta el campo Nombre.</p>";
            if (empty($email)) echo "<p>Error: Falta el campo Email.</p>";
            if (empty($mensaje)) echo "<p>Error: Falta el campo Mensaje.</p>";
        }
    }
    ?>

    <!-- 1. Formulario de contacto -->
    <form action="" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Mensaje:</label>
        <textarea name="mensaje" required></textarea><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

------Array multidimensional lista de productos...gestion tienda..DESCUENTO 10%
<?php
// 1. Array de productos
$productos = [
    ["nombre" => "Laptop", "precio" => 800, "stock" => 5],
    ["nombre" => "Auriculares", "precio" => 30, "stock" => 0],
    ["nombre" => "Tablet", "precio" => 150, "stock" => 3]
];

// 2. Mostrar productos
echo "<ul>";
foreach ($productos as $producto) {
    echo "<li>Producto: " . $producto["nombre"] . "<br>";
    echo "Precio: $" . $producto["precio"] . "<br>";
    
    // 3. Aplicar descuento
    if ($producto["precio"] > 50) {
        $precio_rebajado = $producto["precio"] * 0.9;
        echo "Precio rebajado: $" . $precio_rebajado . "<br>";
    }

    // 4. Operador ternario para stock
    echo ($producto["stock"] > 0) ? "En stock<br>" : "Agotado<br>";
    echo "</li>";
}
echo "</ul>";
?>


-----------calcular el área de un triángulo
<!DOCTYPE html>
<html>
<head>
    <title>Cálculo del Área de un Triángulo</title>
</head>
<body>
    <h1>Calcula el Área de un Triángulo</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $base = $_POST["base"];
        $altura = $_POST["altura"];

        if (is_numeric($base) && is_numeric($altura) && $base > 0 && $altura > 0) {
            $area = ($base * $altura) / 2;
            echo "<p>El área del triángulo es: $area</p>";
        } else {
            echo "<p>Error: La base y la altura deben ser números mayores a cero.</p>";
        }
    }
    ?>

    <!-- 1. Formulario para base y altura -->
    <form action="" method="POST">
        <label>Base:</label>
        <input type="number" name="base" required><br>
        <label>Altura:</label>
        <input type="number" name="altura" required><br>
        <button type="submit">Calcular Área</button>
    </form>
</body>
</html>


-------------agenda de contactos
<!DOCTYPE html>
<html>
<head>
    <title>Agenda de Contactos</title>
</head>
<body>
    <h1>Agenda de Contactos</h1>

    <?php
    // 1. Definir un array asociativo con al menos cinco contactos
    $contactos = [
        ["nombre" => "Juan Pérez", "telefono" => "123456789"],
        ["nombre" => "Ana López", "telefono" => "987654321"],
        ["nombre" => "Luis García", "telefono" => "555123456"],
        ["nombre" => "Marta Sánchez", "telefono" => "666789012"],
        ["nombre" => "Carlos Torres", "telefono" => "777456123"]
    ];

    // 3. Procesar el formulario y añadir el nuevo contacto
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nuevoNombre = $_POST["nombre"];
        $nuevoTelefono = $_POST["telefono"];

        // 5. Validar que el número de teléfono tenga 9 o 10 dígitos
        if (preg_match("/^\d{9,10}$/", $nuevoTelefono)) {
            // Agregar el nuevo contacto al array
            $nuevoContacto = ["nombre" => $nuevoNombre, "telefono" => $nuevoTelefono];
            $contactos[] = $nuevoContacto;
            echo "<p>Contacto añadido correctamente.</p>";
        } else {
            echo "<p>Error: El número de teléfono debe tener 9 o 10 dígitos.</p>";
        }
    }
    ?>

    <!-- 2. Formulario para agregar nuevos contactos -->
    <form action="" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label>Teléfono:</label>
        <input type="text" name="telefono" required><br>
        <button type="submit">Agregar Contacto</button>
    </form>

    <!-- 4. Mostrar todos los contactos en una lista HTML -->
    <h2>Lista de Contactos</h2>
    <ul>
        <?php foreach ($contactos as $contacto): ?>
            <li><?php echo "Nombre: " . htmlspecialchars($contacto["nombre"]) . ", Teléfono: " . htmlspecialchars($contacto["telefono"]); ?></li>
        <?php endforeach; ?>
    </ul>

</body>
</html>

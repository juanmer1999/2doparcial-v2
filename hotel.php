<?php
// Clase base para representar un hotel (abstrcta)
abstract class Hotel {
    public function imprimirFormulario() {
       
    }
}

// Clase para un Hostal
class Hostal extends Hotel {
    public function imprimirFormulario() {
        echo '<h2>Hostal</h2>';
        echo '<img src="https://media-cdn.tripadvisor.com/media/photo-s/13/c2/87/2c/el-hostal-bed-and-breakfast.jpg" alt="Hostal">';
        //fORMULARIO
        echo '<form action="procesar_reserva.php" method="post">';
        echo '<label for="numero_personas">Número de personas: </label>';
        echo '<input type="number" name="numero_personas" id="numero_personas" required><br>';
        echo '<label for="numero_dias">Número de días de estadía: </label>';
        echo '<input type="number" name="numero_dias" id="numero_dias" required><br>';
        echo '<input type="submit" value="Reservar">';
        echo '</form>';
    }
}

// Clase para  una Posada
class Posada extends Hotel {
    public function imprimirFormulario() {
        echo '<h2>Posada</h2>';
        echo '<img src="https://cdn.atrapalo.com/hoteles/picture/l/741/7/8/417027348.jpg" alt="Posada">';
        //fORMULARIO
        echo '<form action="procesar_reserva.php" method="post">';
        echo '<label for="numero_personas">Número de personas: </label>';
        echo '<input type="number" name="numero_personas" id="numero_personas" required><br>';
        echo '<label for="numero_dias">Número de días de estadía: </label>';
        echo '<input type="number" name="numero_dias" id="numero_dias" required><br>';
        echo '<label for="incluye_desayuno">¿Incluir desayuno? </label>';
        echo '<input type="checkbox" name="incluye_desayuno" id="incluye_desayuno" value="Sí">';
        echo '<br>';
        echo '<input type="submit" value="Reservar">';
        echo '</form>';
    }
}

// Clase para  un Resort
class Resort extends Hotel {
    public function imprimirFormulario() {
        Echo '<h2>Resort</h2>';
        echo '<img src="https://media-cdn.tripadvisor.com/media/photo-s/1b/b6/eb/8b/grand-palladium-costa.jpg" alt="Resort">';
     //fORMULARIO       
        echo '<form action="procesar_reserva.php" method="post">';
        echo '<label for="numero_personas">Número de personas: </label>';
        echo '<input type="number" name="numero_personas" id="numero_personas" required><br>';
        echo '<label for="numero_dias">Número de días de estadía: </label>';
        echo '<input type="number" name="numero_dias" id="numero_dias" required><br>';
        echo '<label for="todo_incluido">¿Plan todo incluido? </label>';
        echo '<input type="checkbox" name="todo_incluido" id="todo_incluido" value="Sí">';echo '<br>';
        echo '<br>';
        echo '<input type="submit" value="Reservar">';
        echo '</form>';
    }
}




// Función Factory Method para crear el objeto Hotel
function crearHotel($precio) {
    if ($precio >= 40000 && $precio <= 70000) {
        return new Hostal();
    } elseif ($precio > 70000 && $precio <= 150000) {
        return new Posada();
    } else {
        return new Resort();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cotización de Hospedaje en Hilton</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
<body>
    
    <h1>
    <img class="logo" src="https://i.postimg.cc/nrBtYG9k/image-removebg-preview-5.png" alt="Logo del Hlton" width="100">
        Cotización de Hospedaje en Hilton 
    </h1>
    <form method="post" action="">
        <label for="precio">Precio por noche: </label>
        <input type="number" name="precio" id="precio" required>
        <input type="submit" value="Buscar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["precio"])) {
        $precio = $_POST["precio"];
        $hotel = crearHotel($precio);
        $hotel->imprimirFormulario();
    }
    ?>

</body>


</html>







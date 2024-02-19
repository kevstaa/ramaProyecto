<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <a href="facturas.php">Facturas</a>
    <?php
    $api_url = "http://localhost/dws/UD5/ej14/public/api/productos";

    $json_data =  file_get_contents($api_url);

    echo "<ul>";
    foreach (json_decode($json_data) as $producto) {
        echo "<li><a href='verProducto.php?id=".$producto->id."' >Nombre: ".$producto->nombre."</a></li>";
    }
    echo "</ul>";
    ?>
    <form action="index.php" method="POST">
        Nombre del producto: <input type="text" name="nombre" /><br>
        Precio del producto: <input type="number" name="precio" /><br>
        <input type="submit" name="enviar" value="Crear" />
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = array('nombre' => $_POST['nombre'], 'precio' => $_POST['precio']);
        $opts = array('http' =>
            array(
                'method' => 'POST',
                'content' => http_build_query($data),
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
            )
        );
        $context = stream_context_create($opts);
        $result = file_get_contents($api_url, false, $context);
        header('Location: index.php');
    }
    ?>
    </body>
</html>
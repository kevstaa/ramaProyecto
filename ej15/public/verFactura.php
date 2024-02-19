<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$api_url = "http://localhost/dws/UD5/ej14/public/api/facturas/".$_GET['id'];

$json_data =  file_get_contents($api_url);
$factura = json_decode($json_data);

echo "<ul>";
    echo "<li>Id: ".$factura->id."</li>";
    echo "<li>Nombre: ".$factura->cliente."</li>";
    echo "<li>Monto: ".$factura->monto."</li>";
echo "</ul>";

if (isset($_POST['eliminar'])) {
    $opts = array('http' =>
        array(
            'method' => 'DELETE'
        )
    );
    $context = stream_context_create($opts);
    $result = file_get_contents($api_url, false, $context);
    header('Location: facturas.php');
}
?>
<a href="facturas.php"><button>Volver</button></a><br><br>
<form method="POST" action="">
    <input type="submit" name="eliminar" value="Eliminar" />
</form>
</body>
</html>
<?php
require("./conexion.php");
$data = json_decode(file_get_contents('php://input'),true);
$Nombre = $data['Nombre'];
$Cantidad = $data['Cantidad'];
$Precio = $data['Precio'];

$conexion = new Conexion();
$db = $conexion->getConexion();
$query = "INSERT INTO productos (Nombre,Cantidad,Precio) VALUES(:Nombre,:Cantidad,:Precio)";
$statement = $db->prepare($query);
//$statement->bindParam(":IDBanda", $IDBanda);
$statement->bindParam(":Nombre", $Nombre);
$statement->bindParam(":Cantidad", $Cantidad);
$statement->bindParam(":Precio", $Precio);

$result = $statement->execute();
if ($result) {
    return "successfully";
}
return "ERROR";
?>
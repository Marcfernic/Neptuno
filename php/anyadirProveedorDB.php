<?php
include 'conexionDB.php';

$vIdCliente = isset($_POST['idProveedor']) ? $_POST['idProveedor'] : '';
$vNombreCompany = isset($_POST['nombreCompany']) ? $_POST['nombreCompany'] : '';
$vNombreContacto = isset($_POST['nombreContacto']) ? $_POST['nombreContacto'] : '';
$vCargoContacto = isset($_POST['cargoContacto']) ? $_POST['cargoContacto'] : '';
$vPais = isset($_POST['pais']) ? $_POST['pais'] : '';
$vTelefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';


try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    /*** The SQL SELECT statement ***/
    $sql = "INSERT INTO `Neptuno`.`Proveedores` (`IdProveedor`, `NombreCompany`, `NombreContacto`, `CargoContacto`, `Pais`, `Telefono`)"
            . " VALUES ('$vIdProveedor', '$vNombreCompany', '$vNombreContacto', '$vCargoContacto', '$vPais', $vTelefono)"
            . " ON DUPLICATE KEY UPDATE `NombreCompany` = '$vNombreCompany', `NombreContacto` = '$vNombreContacto',"
            . " `CargoContacto` = '$vCargoContacto', `Pais` = '$vPais', `Telefono` = $vTelefono";

    $count = $dbh->exec($sql);

    if($count > 0 ) {
        echo "Fila Insertada";
    } else {
        echo "No hemos podido insertar la fila";
    }
    /*** close the database connection ***/
    $dbh = null;

}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>




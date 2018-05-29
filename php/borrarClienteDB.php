<?php
include 'conexionDB.php';

$vIdCliente = isset($_GET['idCliente']) ? $_GET['idCliente'] : 'NULL';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    /*** INSERT data ***/
    $count = $dbh->exec("DELETE FROM Clientes WHERE IdCliente = $vIdCliente");

    /*** echo the number of affected rows ***/
    if($count > 0) {
        $message = "Se ha eliminado el proveedor con IdCliente:" . $vIdCliente;
    } else {
        $message = "No se ha borrado ningún cliente";
    }

    /*** close the database connection ***/
    $dbh = null;

}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>

<h1><?php echo $message ?></h1>
<a href="clientes.php" title="Listado de clientes"><button name="clientes" value="Clientes">Volver a Clientes</button></a>


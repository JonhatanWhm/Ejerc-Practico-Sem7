<?php
require('data/database.php');

$sql = "SELECT A.id, A.nombre ,A.apellidos, razon_social,direccion,referencia,A.estado, 
                B.nombre AS tipo_cliente, C.nombre AS tipo_documento, A.numero_documento
        FROM cliente A INNER JOIN tipo_cliente B
        ON A.id_tipo_cliente = B.id INNER JOIN tipo_documento C
        ON A.id_tipo_documento = C.id 
        ORDER BY A.id ASC ;";
$listado = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
#print_r($listado);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Ejercicio Practico</title>
</head>
<body>
<div class="container" >
        <h1 align="center">Listado de Clientes</h1>
        <a href="nuevo_cliente.php" class="btn btn-primary">Nuevo</a> <br><br>

        <table class="table">
            <thead class="table-success">
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Razón Social</th>
                    <th>Dirección</th>
                    <th>Referencia</th>
                    <th>Estado</th>
                    <th>Tipo Cliente</th>
                    <th>Tipo Doc.</th>
                    <th>Nº Documento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($listado as $cliente):
                ?>
                        <tr>
                            <td><?php echo $cliente['nombre'] ?></td>
                            <td><?php echo $cliente['apellidos'] ?></td>
                            <td><?php echo $cliente['razon_social'] ?></td>
                            <td><?php echo $cliente['direccion'] ?></td>
                            <td><?php echo $cliente['referencia'] ?></td>
                            <td><?php echo $cliente['estado'] ?></td>
                            <td><?php echo $cliente['tipo_cliente'] ?></td>
                            <td><?php echo $cliente['tipo_documento'] ?></td>
                            <td><?php echo $cliente['numero_documento'] ?></td>
                            <td>
                                <a href="editar_cliente.php?id=<?php echo $cliente['id'] ?>" class="btn btn-success">Editar</a>
                            </td>
                        </tr>
                <?php
                    endforeach;
                ?>
            </tbody>
    </table>
    </div>


</body>
</html>
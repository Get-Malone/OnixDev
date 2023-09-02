<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Conferencistas</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
    <h1>Lista de Conferencistas</h1>
    <a href="/conferencistas/create">Agregar Conferencista</a>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($conferencistas as $conferencista): ?>
                <tr>
                    <td><?php echo $conferencista->nombre; ?></td>
                    <td><?php echo $conferencista->apellido; ?></td>
                    <td><?php echo $conferencista->email; ?></td>
                    <td>
                        <a href="/conferencistas/show?id=<?php echo $conferencista->id; ?>">Ver</a>
                        <a href="/conferencistas/edit?id=<?php echo $conferencista->id; ?>">Editar</a>
                        <a href="/conferencistas/delete?id=<?php echo $conferencista->id; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
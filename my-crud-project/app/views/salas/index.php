<?php
    // views/salas/index.php
    require_once(__DIR__ . '/../partials/header.php');
?>

<h1>Listado de Salas</h1>

<a href="/salas/create">Crear Sala</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Capacidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($salas as $sala): ?>
            <tr>
                <td><?= $sala->id ?></td>
                <td><?= $sala->nombre ?></td>
                <td><?= $sala->capacidad ?></td>
                <td>
                    <a href="/salas/show?id=<?= $sala->id ?>">Ver</a>
                    <a href="/salas/edit?id=<?= $sala->id ?>">Editar</a>
                    <form action="/salas/delete" method="POST">
                        <input type="hidden" name="id" value="<?= $sala->id ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once(__DIR__ . '/../partials/footer.php'); ?>
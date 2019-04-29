<div class="w3-container w3-teal">
    <h2>Задачи</h2>
</div>
<table class="w3-table-all w3-centered w3-section">
    <?php foreach ($this->tasks as $task) : ?>
        <tr>
            <td><?= $task['id'] ?></td>
            <td><?= $task['name'] ?></td>
            <td><form method="POST" name="update" action="/tasks/update"><input type="hidden" name="id" value="<?= $task['id'] ?>"><button><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></form></td>
            <td><form method="POST" name="delete" action="/tasks/delete"><input type="hidden" name="id" value="<?= $task['id'] ?>"><button><i class="fa fa-trash" aria-hidden="true"></i></button></form></td>
        </tr>
    <?php endforeach; ?>
</table>
<form method="POST" action="/tasks/create">
    <button class="w3-button w3-block w3-teal">Добавить</button>
</form>



<table class="w3-table-all w3-centered">
        <?php foreach ($this->tasks as $task) : ?>
            <tr>
                <td><?= $task['id'] ?></td>
                <td><?= $task['name'] ?></td>
                <td><form method="POST" name="update" action="/tasks/update"><input type="hidden" name="id" value="<?= $task['id'] ?>"><button><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></form></td>
                <td><form method="POST" name="delete" action="/tasks/delete"><input type="hidden" name="id" value="<?= $task['id'] ?>"><button><i class="fa fa-trash" aria-hidden="true"></i></button></form></td>
            </tr>
        <?php endforeach; ?>
</table>
<a href="/tasks/create" class="w3-button w3-large w3-circle w3-xlarge w3-ripple w3-teal">+</a>



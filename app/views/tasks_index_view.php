<ul>
    <?php foreach ($this->tasks as $task) : ?>
        <li><?= $task['name'] ?></li>
    <?php endforeach; ?>
</ul>
<a href="/tasks/create" class="w3-button w3-large w3-circle w3-xlarge w3-ripple w3-teal">+</a>



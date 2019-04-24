<div class="w3-container w3-teal w3-margin">
    <h2>Добавить задачу</h2>
</div>
<?php if (!empty($this->error)): ?>
    <div class="w3-panel w3-pale-red w3-display-container w3-border w3-margin"><?= $this->error ?></div>
<?php endif; ?>
<form class="w3-container" method="POST" action="/tasks/add">
    <input class="w3-input w3-border w3-light-grey" type="text" name="tasks">
    <button class="w3-btn w3-blue-grey w3-section">Сохранить</button>
</form>
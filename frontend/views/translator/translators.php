<?php

$this->title = 'Список переводчиков';
?>

<div class="test">
    <div class="main">
        Список переводчиков
    </div>
    <div class="list">
        <ul>
            <?php foreach ($translators as $translator): ?>
            <li><?= $translator->full_name ?> с типом <?= $translator->work_type ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php
    $class = 'nav-item nav-link col-12 col-sm-2';
?>
<nav class="nav nav-pills nav-fill text-center mb-4">
    <?= $this->Html->link(
        __('My Fighters'),
        ['action' => 'index'],
        ['class' => !empty($isIndex) ? $class.' active ml-auto' : $class.' ml-auto']
    ) ?>
    <?= $this->Html->link(
        __('New Fighter'),
        ['action' => 'add'],
        ['class' => !empty($isAdd) ? $class.' active mr-auto' : $class.' mr-auto']
    ) ?>
</nav>
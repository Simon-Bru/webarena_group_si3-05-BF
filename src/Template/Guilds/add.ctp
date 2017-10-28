<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="navbar list-unstyled justify-content-end">
        <li class="nav-item"><?= $this->Html->link(__('All guilds'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="guilds form large-9 medium-8 columns content">
    <?= $this->Form->create($guild) ?>
    <fieldset>
        <legend><h1><i class="icons8-shield-filled"></i> Create a Guild</h1></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

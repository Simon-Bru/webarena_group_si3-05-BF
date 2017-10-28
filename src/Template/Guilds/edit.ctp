<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="nav justify-content-end">
        <li class="nav-link"><?= $this->Html->link(__('All Guilds'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="guilds form large-9 medium-8 columns content">
    <?= $this->Form->create($guild) ?>
    <fieldset>
        <legend><h1><i class="icons8-shield-filled"></i> Edit Guild Name </h1></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

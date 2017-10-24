<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="nav nav-pills nav-fill mb-4">
    <?= $this->Html->link(
        __('My Fighters'),
        ['action' => 'index'],
        ['class' => 'nav-item nav-link col-12 col-sm-2']
    ) ?>
    <?= $this->Html->link(
        __('New Fighter'),
        ['action' => 'add'],
        ['class' => 'nav-item nav-link active col-12 col-sm-2']
    ) ?>
</nav>

<div class="jumbotron">
    <h3><?= __('New fighter') ?></h3>
    <p class="lead">Create a new fighter to get more power in the Arena.</p>
    <hr class="my-4">

    <?= $this->Form->create($fighter) ?>
    <fieldset>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

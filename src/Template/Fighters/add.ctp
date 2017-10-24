<?php
/**
 * @var \App\View\AppView $this
 */
?>
<section class="jumbotron pt-4">
    <nav class="nav nav-pills nav-fill text-center mb-4">
        <?= $this->Html->link(
            __('My Fighters'),
            ['action' => 'index'],
            ['class' => 'nav-item nav-link col-12 col-sm-2 ml-auto']
        ) ?>
        <?= $this->Html->link(
            __('New Fighter'),
            ['action' => 'add'],
            ['class' => 'nav-item nav-link active col-12 col-sm-2 mr-auto']
        ) ?>
    </nav>
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
</section>

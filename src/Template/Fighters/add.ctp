<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="jumbotron">
    <h1><?= __('New fighter') ?></h1>
    <p class="lead">Create a new fighter to get more power in the Arena.</p>
    <hr class="my-4">

    <?= $this->Form->create($fighter) ?>
    <fieldset>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('player_id', ['options' => $players]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

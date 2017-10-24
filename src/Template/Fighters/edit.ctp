<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="jumbotron">
    <?= $this->Form->create($fighter) ?>
    <fieldset>
        <legend><?= __('Edit Fighter') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

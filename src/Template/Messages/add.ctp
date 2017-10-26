<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="jumbotron">
    <?= $this->Form->create($message) ?>
    <fieldset>
        <legend><?= __('Add Message') ?></legend>
        <?php
//        TODO select fighter



        echo $this->Form->control('title');
        echo $this->Form->control('fighter_id', [
            'type' => 'select',
            'options' => $fighters
        ]);
        echo $this->Form->control('message');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


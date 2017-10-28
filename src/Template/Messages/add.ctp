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
//



        echo $this->Form->control('fighter_id_from', [
            'label' => 'From:',
            'type' => 'select',
            'options' => $fighters_from
        ]);
        echo $this->Form->control('title');

        echo $this->Form->control('fighter_id', [
            'label' => 'Send to:',
            'type' => 'select',
            'options' => $fighters
        ]);
        echo $this->Form->control('message');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


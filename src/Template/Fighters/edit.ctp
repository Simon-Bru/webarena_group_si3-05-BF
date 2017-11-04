<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="jumbotron pt-4">
    <?= $this->element('Nav/fighters'); ?>

    <div class="float-right">
        <?= $this->Form->postLink(
            $this->Html->tag('i', '', [
                'class' => 'icons8-delete-bin-filled text-danger'
            ]),
            ['action' => 'delete', $fighter->id],
            [
                'confirm' => __('Are you sure you want to delete {0}?', $fighter->name),
                'escape' => false
            ]
        )
        ?>
    </div>
    <?= $this->Form->create($fighter, [
            'class' => 'col-12 col-md-8 col-lg-6 m-auto text-center'
    ]) ?>
    <fieldset>
        <h3><?= __('Edit Fighter') ?></h3>
        <hr class="my-4">

        <?php
        echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>

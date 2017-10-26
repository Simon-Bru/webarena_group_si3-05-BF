<?php
/**
 * @var \App\View\AppView $this
 */
?>
<section class="jumbotron pt-4">

    <?= $this->element('Nav/fighters', ['isAdd' => true]); ?>

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

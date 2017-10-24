<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="jumbotron">
    <h1><?= __('Sign up') ?></h1>
    <?= $this->Form->create($player) ?>
    <fieldset>
        <legend><?= __('Enter your info to join the fight !') ?></legend>
        <hr class="my-3">
        <?php
        echo $this->Form->control('email');
        echo $this->Form->control('password');
        echo $this->Form->control('password_confirmation', ['type' => 'password']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

    <div>
        <small class="d-block">Already a member? </small>
        <?php echo $this->Html->link('Log In',
            '/login',
            ['class' => 'btn btn-primary']); ?>
    </div>
</div>

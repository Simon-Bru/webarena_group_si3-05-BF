<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="jumbotron">
    <h1><?= __('Sign up') ?></h1>
    <?= $this->Form->create($player, [
            'class' => 'col-12 col-md-8 col-lg-6 m-auto text-center'
    ]) ?>
    <fieldset>
        <legend><?= __('Enter your info to join the fight !') ?></legend>
        <hr class="my-3">
        <?php
        echo $this->Form->control('email');
        echo $this->Form->control('password');
        echo $this->Form->control('password_confirmation', ['type' => 'password']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Sign Up'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>

    <div class="col-12 text-center">
        <small class="d-block">Already a member? </small>
        <?php echo $this->Html->link('Log In',
            ['action' => 'login'],
            ['class' => 'btn btn-info btn-sm']); ?>
    </div>
</div>

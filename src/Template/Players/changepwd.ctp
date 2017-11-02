<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="jumbotron">
    <h1><?= __('Change password') ?></h1>
    <?= $this->Form->create('changepwd', [
        'url' => '/Players/changepwd',
            'class' => 'col-12 col-md-8 col-lg-6 m-auto text-center'
    ]) ?>
    <fieldset>
        <legend><?= __('Enter your new password') ?></legend>
        <hr class="my-3">
        <?php
        echo $this->Form->control('pwd',[
            'label' => 'New Password']);
        echo $this->Form->control('new_pwd', [
                'label' => 'Confirm New Password',
                'type' => 'password']);
        ?>
    </fieldset>
    <div class="col-12 text-center">
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

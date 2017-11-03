<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="jumbotron">
    <h1><?= __('Change password') ?></h1>
    <?= $this->Form->create('changePwd', [
        'url' => '/Players/changePwd',
            'class' => 'col-12 col-md-8 col-lg-6 m-auto text-center'
    ]) ?>
    <fieldset>
        <?php
        echo $this->Form->control('password',[
            'label' => 'Old Password',
            'type' => 'password'
        ]);

        echo $this->Form->control('pwd',[
            'label' => 'New Password',
            'type' => 'password'
        ]);
        echo $this->Form->control('new_pwd', [
                'label' => 'Confirm New Password',
                'type' => 'password'
            ]);
        ?>
    </fieldset>
    <div class="col-12 text-center">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

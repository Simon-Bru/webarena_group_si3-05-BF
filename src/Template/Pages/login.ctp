<div class="jumbotron">
    <h1>Log in</h1>
    <hr class="my-4">
    <?= $this->Form->create('Players', [
        'url' => 'Players/login',
        'class' => 'col-12 text-center']); ?>
    <fieldset>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>

    <?= $this->Form->button(__('Log In')); ?>
    <?= $this->Form->end() ?>

    <div class="col-12 text-center">
        <small class="d-block">Not a member yet? </small>
        <?php echo $this->Html->link('Sign Up',
            array('controller' => 'Players', 'action' => 'add'),
            ['class' => 'btn btn-primary']); ?>
        <a class="d-block" data-toggle="collapse" href="#forgottenPwdForm" aria-expanded="false" aria-controls="collapseExample">
            Forgot your password ?
        </a>
    </div>
    <div class="collapse col-12 text-center" id="forgottenPwdForm">
        <?= $this->Form->create('Mail', [
                'url' =>'Players/forgottenPwd'
        ]); ?>
        <fieldset>
            <?= $this->Form->control('email'); ?>
            <?= $this->Form->button(__('Reset password')); ?>
        </fieldset>
    </div>
</div>
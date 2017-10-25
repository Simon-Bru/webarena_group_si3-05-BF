<div class="jumbotron">
    <h1>Log in</h1>
    <hr class="my-4">

    <?= $this->Form->create('Players', array('url' => '/Players/login')); ?>
    <fieldset>
            <?= $this->Form->control('email') ?>
            <?= $this->Form->control('password') ?>
        </fieldset>

    <?= $this->Form->button(__('Log In')); ?>
    <?= $this->Form->end() ?>

    <div>
        <small class="d-block">Not a member yet? </small>
        <?php echo $this->Html->link('Sign Up',
            array('controller' => 'Players', 'action' => 'add'),
            ['class' => 'btn btn-primary']); ?>
    </div>
</div>
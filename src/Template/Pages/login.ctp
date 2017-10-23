<div class="jumbotron">
    <h1>Log in</h1>

    <?= $this->Form->create('Players', array('url' => 'Players/login')); ?>
        <fieldset>
            <legend>Please enter your credentials to log in</legend>
            <?= $this->Form->control('email') ?>
            <?= $this->Form->control('password') ?>
        </fieldset>

    <?= $this->Form->button(__('Log In')); ?>
    <?= $this->Form->end() ?>

    <?php echo $this->Html->link('Sign Up',
        array('controller' => 'Players', 'action' => 'add'),
        ['class' => '']); ?>
</div>
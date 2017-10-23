<?php $this->assign('title', 'Connection');?>


<div class="userform">
<h1>LOGIN</h1>
    <?= $this->Flash->render('auth')?>
    <?= $this->Form->create();?>
    <fieldset>
        <legend><?=('Please enter your:')?></legend>

    <?= $this->form->input('User name:') ?>
    <?= $this->form->input('Password:', array('type' =>'password'))?>
    </fieldset>
    <?=$this->form->button(('Login'));?>
    <?=$this->form->end()?>

</div>
<div class="useradd">
    <h1>Sign In</h1>
    <?= $this->Flash->render('auth')?>
    <?= $this->Form->create($user);?>
    <fieldset>
        <legend><?=('Create account:')?></legend>

        <?= $this->form->input('User name:') ?>
        <?= $this->form->input('Password:', array('type' =>'password'))?>
    </fieldset>
    <?=$this->form->button(('Register'));?>
    <?=$this->form->end()?>

</div>



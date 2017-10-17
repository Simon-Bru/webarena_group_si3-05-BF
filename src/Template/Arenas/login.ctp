<?php $this->assign('title', 'Connection');?>

<div class="panel">
<h2 class="text-center">LOGIN</h2>
<?php $this->form->create('POST');?>
    <?php
        echo $this->form->input('nom_utilisateur');   //id
        echo $this->form->input('mot_de_passe', array('type' =>'password'));   //password
        echo $this->form->submit('Login', array('class' => 'button'));
        
    ?>
<?php $this->form->end(); ?>

</div>



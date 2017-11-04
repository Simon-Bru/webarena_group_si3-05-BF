<?php
/**
 * @var \App\View\AppView $this
 */
?>
<section class="jumbotron">
    <h1><i class="icons8-shield-filled"></i> Create a Guild</h1>
    <hr>
    <?= $this->Form->create($guild, ['class' => 'col-12 col-md-8 col-lg-6 m-auto text-center']) ?>
    <fieldset>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-primary']) ?>
    <?= $this->Form->end() ?>
</section>

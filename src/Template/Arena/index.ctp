<h1>Welcome in WebArena</h1>

<div class="text-center w-25 m-auto">

    <?php
    echo $this->Form->create('MoveFighter', [
        'url' => '/Fighters/move'
    ]);
    echo $this->Form->control('direction', array('default','type' => 'hidden','action' => 'move','value'=>1));
    echo $this->Form->button($this->Html->tag('i', '', [
        'class' => 'icons8-up-squared-filled display-4'
    ]), ['escape' => false, 'class' => 'btn-link text-dark d-inline-block p-0' ]);
    echo $this->Form->end();

    echo $this->Form->create('MoveFighter', [
        'url' => '/Fighters/move',
        'class' => '']);
    echo $this->Form->control('direction', array('default' , 'type' => 'hidden','action' => 'move', 'value'=> 2));
    echo $this->Form->button($this->Html->tag('i', '', [
        'class' => 'icons8-prev-filled display-4'
    ]), ['escape' => false, 'class' => 'btn-link text-dark d-inline-block float-left p-0' ]);
    echo $this->Form->end();

    echo $this->Form->create('MoveFighter', [
        'url' => '/Fighters/move',
        'class' => '']);
    echo $this->Form->control('direction', array('default', 'type' => 'hidden','action' => 'move', 'value'=>3));
    echo $this->Form->button($this->Html->tag('i', '', [
        'class' => 'icons8-right-button-filled display-4'
    ]), ['escape' => false, 'class' => 'btn-link text-dark d-inline-block float-right p-0' ]);
    echo $this->Form->end();

    echo $this->Form->create('MoveFighter', [
        'url' => '/Fighters/move',
        'class' => '']);
    echo $this->Form->control('direction', array('default', 'type' => 'hidden','action' => 'move','value'=> 4));
    echo $this->Form->button($this->Html->tag('i', '', [
        'class' => 'icons8-drop-down-filled display-4'
    ]), ['escape' => false, 'class' => 'btn-link text-dark d-inline-block mt-3 p-0' ]);
    echo $this->Form->end();
    ?>
</div>


<p>

    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#screamForm" aria-expanded="false" aria-controls="screamForm">
        Scream
    </button>
</p>
<div class="collapse" id="screamForm">
    <div class="card card-body">
        <?= $this->Form->create('Scream', [
            'url' => '/events/scream',
            'class' => '']);?>
        <fieldset>
        <?= $this->Form->control('name', array('default','controller' => 'events','action' => 'scream', 'label' => 'Scream something'));?>
         </fieldset>
        <?= $this->Form->button(__('Submit'),['class' => 'btn-primary']);?>
        <?=$this->Form->end();?>

    </div>
</div>

<div class="grid mt-4">
    <?php for ($y=0; $y < ARENA_HEIGHT; $y++): ?>
        <div class="row d-flex justify-content-center">
            <?php for ($x=0; $x < ARENA_WIDTH; $x++): ?>
                <span class="cell">
                    <?php
                    if($y == $activeFighter->coordinate_y && $x == $activeFighter->coordinate_x) {
                        echo $this->element('Component/avatar', ['fighterId' => $activeFighter->id]);
                    }
                    ?>
                </span>
            <?php endfor ?>
        </div>
    <?php endfor ?>
</div>

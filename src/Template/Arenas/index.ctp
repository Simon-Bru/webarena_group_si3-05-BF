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
    ]), ['escape' => false, 'class' => 'btn-link text-dark d-inline-block p-0' ]);
    echo $this->Form->end();
    ?>
</div>


<div class="grid">
    <?php for ($h=0; $h < ARENA_HEIGHT; $h++): ?>
        <div class="row">
            <?php for ($w=0; $w < ARENA_WIDTH; $w++): ?>
                <span class="cell"></span>
            <?php endfor ?>
        </div>
    <?php endfor ?>
</div>

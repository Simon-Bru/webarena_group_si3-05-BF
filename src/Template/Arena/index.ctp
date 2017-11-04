<h1>Welcome in WebArena</h1>

<div class="text-center col-8 col-sm-5 col-md-4 col-lg-3 m-auto fixed-bottom">

    <?php
    echo $this->Form->create('MoveFighter', [
        'url' => '/Fighters/move'
    ]);
    echo $this->Form->control('direction', array('default','type' => 'hidden','action' => 'move','value'=>"up"));
    echo $this->Form->button($this->Html->tag('i', '', [
        'class' => 'icons8-up-squared-filled display-4'
    ]), ['escape' => false, 'class' => 'btn-link text-dark d-inline-block p-0' ]);
    echo $this->Form->end();

    echo $this->Form->create('MoveFighter', [
        'url' => '/Fighters/move',
        'class' => '']);
    echo $this->Form->control('direction', array('default' , 'type' => 'hidden','action' => 'move', 'value'=> "left"));
    echo $this->Form->button($this->Html->tag('i', '', [
        'class' => 'icons8-prev-filled display-4'
    ]), ['escape' => false, 'class' => 'btn-link text-dark d-inline-block float-left p-0' ]);
    echo $this->Form->end();

    echo $this->Form->create('MoveFighter', [
        'url' => '/Fighters/move',
        'class' => '']);
    echo $this->Form->control('direction', array('default', 'type' => 'hidden','action' => 'move', 'value'=>"right"));
    echo $this->Form->button($this->Html->tag('i', '', [
        'class' => 'icons8-right-button-filled display-4'
    ]), ['escape' => false, 'class' => 'btn-link text-dark d-inline-block float-right p-0' ]);
    echo $this->Form->end();

    echo $this->Form->create('MoveFighter', [
        'url' => '/Fighters/move',
        'class' => '']);
    echo $this->Form->control('direction', array('default', 'type' => 'hidden','action' => 'move','value'=> "down"));
    echo $this->Form->button($this->Html->tag('i', '', [
        'class' => 'icons8-drop-down-filled display-4'
    ]), ['escape' => false, 'class' => 'btn-link text-dark d-inline-block mt-3 p-0' ]);
    echo $this->Form->end();
    ?>
</div>

<button class="btn btn-light"
        data-toggle="popover"
        data-placement="bottom"
        data-title="Scream something so other fighters can hear your voice"
        data-content='<?= $this->Form->create("Scream", ["url" => "/events/scream","class" => "container text-center"]);?>
                        <fieldset>
                            <?= $this->Form->control("name", ["label" => "", "placeholder" => "Your scream"]);?>
                        </fieldset>
                        <?= $this->Form->button(__("Submit"),["class" => "btn btn-warning"]);?>
                    <?=$this->Form->end();?>'>
    <i class="icons8-edvard-munch display-4 d-block"></i>
    Scream
</button>

<?php
echo $this->Form->postLink('Generate Tools', ['controller' => 'Arena', 'action' => 'addTools'], [
    'class' => 'btn btn-warning float-right'
]) ?>

<div class="grid">
    <?php
    $i = 0;
    $j = 0;
    for ($y=0; $y < ARENA_HEIGHT; $y++):
        ?>
        <div class="row d-flex justify-content-center mb-1">
            <?php for ($x=0; $x < ARENA_WIDTH; $x++): ?>
                <div class="cell d-flex align-items-center justify-content-center ml-1">
                    &nbsp;
                    <?php
                    if($y == $activeFighter->coordinate_y && $x == $activeFighter->coordinate_x) {
                        echo $this->element('Component/avatar', ['fighterId' => $activeFighter->id]);
                    }
                    if(!empty($fighters[$i]) &&
                        $y == $fighters[$i]->coordinate_y &&
                        $x == $fighters[$i]->coordinate_x) {
                        if($activeFighter->hasInSight($fighters[$i])) {
                            ?>
                            <span data-toggle="tooltip"
                                  title='<?php
                                  echo $this->Html->tag('h4', $fighters[$i]->name);
                                  echo $this->element('Component/skillsLightList', [
                                      'fighter' => $fighters[$i],
                                  ]); ?>'>
                            <?php

                            if($activeFighter->isInContact($fighters[$i])
                                && $activeFighter->player_id != $fighters[$i]->player_id) {
                                echo $this->Form->postLink(
                                    $this->element('Component/avatar', ['fighterId' => $fighters[$i]->id]).
                                    $this->Html->tag('span', $fighters[$i]->level, [
                                        'class' => 'badge badge-success level-badge'
                                    ]),
                                    ['controller' => 'Fighters', 'action' => 'attack', $fighters[$i]->id],
                                    [
                                        'escape' => false,
                                        'class' => 'enemy'
                                    ]
                                );
                            }
                            else {
                                echo $this->element('Component/avatar', ['fighterId' => $fighters[$i]->id]);
                                echo $this->Html->tag('span', $fighters[$i]->level, [
                                    'class' => 'badge badge-success level-badge'
                                ]);
                            }
                            ?>
                        </span>
                            <?php
                        }
                        $i++;
                    }
                    elseif(!empty($tools[$j]) &&
                        $y == $tools[$j]->coordinate_y &&
                        $x == $tools[$j]->coordinate_x) {
                        if($activeFighter->hasInSight($tools[$j])) {

                            if($activeFighter->isInContact($tools[$j])) {
                                echo $this->Form->postLink(
                                    $this->Html->tag('i', '',
                                        ['class' => TOOLS_TABLE[$tools[$j]->type]['icon']]),
                                    ['controller' => 'Arena', 'action' => 'pickTool', $tools[$j]->id],
                                    ['escape' => false, 'class' => 'tool text-dark  ']);
                            }
                            else {
                                echo $this->Html->tag('i', '',
                                    ['class' => TOOLS_TABLE[$tools[$j]->type]['icon']]);
                            }
                        }

                        $j++;
                    }
                    ?>
                </div>
            <?php endfor ?>
        </div>
    <?php endfor ?>
</div>

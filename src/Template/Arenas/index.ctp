<h1>Welcome in WebArena</h1>
<?php
echo "<div class=move>";

echo "<div class=up>";
echo $this->Form->create('MoveFighter', [
    'url' => '/Fighters/move',
    'class' => 'col-6 text-center']);
echo $this->Form->control('direction', array('default','type' => 'hidden','action' => 'move','value'=>1));
echo $this->Form->button('UP',['class'=>'btn btn-success']);
echo $this->Form->end();
echo "</div>";

echo "<div class= left>";
echo $this->Form->create('MoveFighter', [
    'url' => '/Fighters/move',
    'class' => 'col-4 text-center']);
echo $this->Form->control('direction', array('default' , 'type' => 'hidden','action' => 'move', 'value'=> 2));
echo $this->Form->button('LEFT',['class'=>'btn btn-success']);
echo $this->Form->end();
echo "<div>";

echo "<div class=right>";
echo $this->Form->create('MoveFighter', [
    'url' => '/Fighters/move',
    'class' => 'col-8 text-center']);
echo $this->Form->control('direction', array('default', 'type' => 'hidden','action' => 'move', 'value'=>3));
echo $this->Form->button('RIGHT',['class'=>'btn btn-success']);
echo $this->Form->end();
echo "</div>";


echo "<div class=down>";
echo $this->Form->create('MoveFighter', [
    'url' => '/Fighters/move',
    'class' => 'col-6 text-center']);
echo $this->Form->control('direction', array('default', 'type' => 'hidden','action' => 'move','value'=> 4));
echo $this->Form->button('DOWN',['class'=>'btn btn-success']);
echo $this->Form->end();
echo "</div>";

echo "</div>";

?>


<div class="grid">
    <?php for ($h=0; $h < ARENA_HEIGHT; $h++): ?>
        <div class="row">
            <?php for ($w=0; $w < ARENA_WIDTH; $w++): ?>
                <span class="cell"></span>
            <?php endfor ?>
        </div>
    <?php endfor ?>
</div>

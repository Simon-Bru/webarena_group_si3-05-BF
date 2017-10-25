<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fighter $fighter
 */
?>
<section class="jumbotron pt-4">
    <nav class="nav nav-pills nav-fill mb-4 text-center">
        <?= $this->Html->link(
            __('My Fighters'),
            ['action' => 'add'],
            ['class' => 'nav-item nav-link col-12 col-sm-2 ml-auto']
        ) ?>
        <?= $this->Html->link(
            __('New Fighter'),
            ['action' => 'add'],
            ['class' => 'nav-item nav-link col-12 col-sm-2 mr-auto']
        ) ?>
    </nav>

    <h4 class="card-title"><h3><?= h($fighter->name) ?></h3></h4>
    <p class="card-text">
    <dl>
        <dt>Level <?= $this->Number->format($fighter->level) ?></dt>
        <dd>
            <div class="progress">
                <div class="progress-bar bg-success progress-bar-striped"
                     role="progressbar"
                     style="width:<?= ($fighter->xp/MAX_XP)*100 ?>%;"
                     aria-valuenow="<?= $fighter->xp ?>"
                     aria-valuemin="0"
                     aria-valuemax="<?= MAX_XP ?>">
                    <?= ($fighter->xp/MAX_XP)*100 ?>%
                </div>
            </div>
        </dd>
        <dt>Current health</dt>
        <dd><?php
            for($i=0; $i < $fighter->current_health; $i++) {
                echo("<i class='icons8-heart-filled text-danger'></i>");
            }
            ?></dd>
        <dt>Position</dt>
        <dd>
            <?= $this->Number->format($fighter->coordinate_x) ?> ;
            <?= $this->Number->format($fighter->coordinate_y) ?> (X;Y)
        </dd>
        <dt><?= $fighter->has('guild') ? "Guild" : "" ?></dt>
        <dd><?= $fighter->has('guild') ? $this->Html->link($fighter->guild->name, ['controller' => 'Guilds', 'action' => 'view', $fighter->guild->id]) : '' ?></dd>
    </dl>
    </p>

    <div>

        <?php
        $avatar_path = glob(WWW_ROOT.'img/avatars/fighter_'.$fighter->id.'.*');
        if (!$avatar_path)
        {
            echo $this->Html->image('avatars/default.jpg',array("width"=>"200", "height"=>"200"));
        }else
        {

            echo $this->Html->image(
                'avatars/fighter_'
                .$fighter->id.'.'
                .explode('.', $avatar_path[0])[1]. '?=',
                [
                    'class' => 'img-fluid',
                    'alt' => 'avatar'
                ]);

        }
        ?>


    </div>
    <div class="panel">
        <h2>Change Avatar</h2>


        <?= $this->Form->create('Fighters', [
            'url' => '/Fighters/changeAvatar',
            'enctype' => 'multipart/form-data'
        ]);?>
        <?= $this->Form->control('avatar',[
            'type'=>'file',
            ''
        ]);?>
        <?= $this->Form->button('Upload Avatar',['class'=>'btn btn-success']);?>
        <?= $this->Form->end();?>


    </div>

</section>

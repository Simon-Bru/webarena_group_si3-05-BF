<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fighter $fighter
 */
?>
<section class="jumbotron pt-4">

    <?= $this->element('Nav/fighters') ?>

    <h4 class="card-title"><h3><?= h($fighter->name) ?></h3></h4>
    <p class="card-text">
    <?php
    if($isMine) {
        echo $this->element('Component/levelUp', ['fighter' => $fighter]);
    }
    ?>
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
        <dd>
            <?php
            for($i=0; $i < $fighter->current_health; $i++) {
                echo("<i class='icons8-heart-filled text-danger'></i>");
            }
            ?>
        </dd>

        <?php
        if($isMine) {
            ?>
            <dt>Position</dt>
            <dd>
                <?= $this->Number->format($fighter->coordinate_x) ?> ;
                <?= $this->Number->format($fighter->coordinate_y) ?> (X;Y)
            </dd>
            <?php
        }
        ?>

        <dt>Skills</dt>
        <dd>
            <ul class="m-auto skills">
                <li class="d-flex align-items-center">
                    <i class="icons8-iris-scan mr-2"></i>
                    Sight : <?= $fighter->skill_sight ?>
                </li>
                <li class="d-flex align-items-center">
                    <i class="icons8-muscle mr-2"></i>
                    Strength: <?= $fighter->skill_strength ?>
                </li>
                <li class="d-flex align-items-center">
                    <i class="icons8-heart-filled mr-2"></i>
                    Max health: <?= $fighter->skill_health ?>
                </li>
            </ul>
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
                .explode('.', $avatar_path[0])[1]. '?='.date('U'),
                [
                    'class' => 'img-fluid',
                    'alt' => 'avatar'
                ]);

        }
        ?>


    </div>
    <?php
    if($isMine) {
        ?>
        <div class="panel">
            <h2>Change Avatar</h2>


            <?= $this->Form->create('Fighters', [
                'url' => '/Fighters/changeAvatar',
                'enctype' => 'multipart/form-data',
                'class' => 'd-flex justify-content-around align-items-center'
            ]);?>
            <?= $this->Form->file('avatar');?>
            <?= $this->Form->button('Upload Avatar',['class'=>'btn-success']);?>
            <?= $this->Form->end();?>
        </div>
        <?php
    }
    ?>
</section>

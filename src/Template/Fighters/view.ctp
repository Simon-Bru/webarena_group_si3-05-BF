<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fighter $fighter
 */
?>
<section class="jumbotron pt-4">

    <?php
    if($userIsLogged) {
        echo $this->element('Nav/fighters');
    }
    ?>

    <h4 class="card-title"><h3><?= h($fighter->name) ?></h3></h4>
    <div class="float-left col-lg-4 col-12 ">
        <?= $this->element('Component/avatar', ['fighterId' => $fighter->id]); ?>
    </div>

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
            <?= $this->element('Component/skillsList', ['fighter' => $fighter]) ?>
        </dd>
        <dt><?= $fighter->has('guild') ? $this->Html->tag('i', '', [
                    'class' => 'icons8-shield-filled mr-1'
                ])."Guild" : "" ?></dt>
        <dd><?= $fighter->has('guild') ? $this->Html->link($fighter->guild->name, ['controller' => 'Guilds', 'action' => 'view', $fighter->guild->id]) : '' ?></dd>
    </dl>

    <?php
    if($isMine) {
        ?>
        <div class="panel">
            <h2>Change Avatar</h2>
            <?= $this->Form->create('Fighters', [
                'url' => '/Fighters/changeAvatar',
                'enctype' => 'multipart/form-data',
                'class' => 'd-flex justify-content-around align-items-center flex-wrap'
            ]);?>
            <?= $this->Form->file('avatar');?>
            <?= $this->Form->button('Upload Avatar',['class'=>'btn-success']);?>
            <?= $this->Form->end();?>
            </br>
        </div>
        <?php
    }
    ?>

    <?php
    if($isMine) {
        ?>
        <div class="text-center mb-4">
            <button class="btn btn-dark"
                    type="button"
                    data-toggle="collapse"
                    data-target="#guildJoin"
                    aria-expanded="false"
                    aria-controls="guildJoin">
                <?php
                if(!empty($fighter->guild_id)) {
                    $btnText = "Change guild";
                } else {
                    $btnText = "Join a guild";
                }
                ?>
                <i class="icons8-shield-filled"></i><?= $btnText ?>

            </button>
        </div>
        <div id="guildJoin" class="panel-collapse collapse text-center">
            <?= $this->Form->create('joinGuild', [
                'url' => '/Fighters/joinGuild',
                'class' => 'col-12 col-md-8 col-lg-6 m-auto'
            ]);?>
            <fieldset>
                <?php

                echo $this->Form->control('guild_id', [
                    'label' => 'Name',
                    'class' => 'col-12 col-md-8 col-lg-6 m-auto text-center',
                    'type' => 'select',
                    'options' => $guilds,
                    'empty' => 'Choose a guild'
                ]);

                ?>
            </fieldset>
            <p class="text-center"><?= $this->Form->button(__('Join'), ['class' => 'btn btn-success']) ?></p>
            <?= $this->Form->end() ?>
        </div>
        <?php
    }
    ?>
</section>

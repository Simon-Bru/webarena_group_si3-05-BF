<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fighter $fighter
 */
?>
<div class="fighters view large-9 medium-8 columns content">
    <h3><?= h($fighter->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($fighter->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Player') ?></th>
            <td><?= $fighter->has('player') ? $this->Html->link($fighter->player->id, ['controller' => 'Players', 'action' => 'view', $fighter->player->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Guild') ?></th>
            <td><?= $fighter->has('guild') ? $this->Html->link($fighter->guild->name, ['controller' => 'Guilds', 'action' => 'view', $fighter->guild->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fighter->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coordinate X') ?></th>
            <td><?= $this->Number->format($fighter->coordinate_x) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coordinate Y') ?></th>
            <td><?= $this->Number->format($fighter->coordinate_y) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $this->Number->format($fighter->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xp') ?></th>
            <td><?= $this->Number->format($fighter->xp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Skill Sight') ?></th>
            <td><?= $this->Number->format($fighter->skill_sight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Skill Strength') ?></th>
            <td><?= $this->Number->format($fighter->skill_strength) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Skill Health') ?></th>
            <td><?= $this->Number->format($fighter->skill_health) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Health') ?></th>
            <td><?= $this->Number->format($fighter->current_health) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Next Action Time') ?></th>
            <td><?= h($fighter->next_action_time) ?></td>
        </tr>
    </table>
    <div>

        <h2>My avatar</h2>
        <!--we will use $myid when using sessions-->
        <?php
        if (!file_exists(WWW_ROOT.'img'. DS . 'avatar' . DS .  $myid.'.jpg'))
        {
            echo $this->Html->image('avatar.jpg',array("width"=>"200", "height"=>"200"));
        }else
        {

            echo $this->Html->image('avatar/'.$myid.'.jpg',array("width"=>"200", "height"=>"200"));
        }
        ?>

    </div>
    <a href="#" class="button" onclick="" >Change my Avatar</a>
</div>

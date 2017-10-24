<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fighter[]|\Cake\Collection\CollectionInterface $fighters
 */
?>
<nav class="nav nav-pills nav-fill mb-4">
    <?= $this->Html->link(
        __('My Fighters'),
        ['action' => 'add'],
        ['class' => 'nav-item nav-link active col-12 col-sm-2']
    ) ?>
    <?= $this->Html->link(
        __('New Fighter'),
        ['action' => 'add'],
        ['class' => 'nav-item nav-link col-12 col-sm-2']
    ) ?>
</nav>
<div class="jumbotron">
    <h3><?= __('My Fighters') ?></h3>
    <ul class="list-unstyled">
        <?php foreach ($fighters as $fighter): ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><?= h($fighter->next_action_time) ?></td>
                <td><?= $fighter->has('guild') ? $this->Html->link($fighter->guild->name, ['controller' => 'Guilds', 'action' => 'view', $fighter->guild->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fighter->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fighter->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fighter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fighter->id)]) ?>
                </td>
            </tr>


            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= h($fighter->name) ?></h4>
                        <p class="card-text">
                        <dl>
                            <dt>Level</dt>
                            <dd><?= $this->Number->format($fighter->level) ?></dd>
                            <dt>XP</dt>
                            <dd>
                                <div class="progress">
                                    <div class="progress-bar bg-success progress-bar-striped"
                                         role="progressbar"
                                         style="width:<?= $fighter->xp*10 ?>%;"
                                         aria-valuenow="<?= $fighter->xp ?>"
                                         aria-valuemin="0"
                                         aria-valuemax="10"><?= $fighter->xp*10 ?>%</div>
                                </div>
                            </dd>
                            <dt>Current health</dt>
                            <dd><?php
                                for($i=0; $i < $fighter->current_health; $i++) {
                                    echo("<i class='material-icons text-danger'>favorite</i>");
                                }
                                ?></dd>
                            <dt>Position</dt>
                            <dd>
                                <?= $this->Number->format($fighter->coordinate_x) ?> ;
                                <?= $this->Number->format($fighter->coordinate_y) ?> (X;Y)
                            </dd>
                        </dl>
                        </p>
                        <button class="btn btn-info"
                           type="button"
                           data-toggle="collapse"
                           data-target="#<?= $fighter->id ?>"
                           aria-expanded="false"
                           aria-controls="collapseExample">See skills</button>
                        <div class="collapse" id="<?= $fighter->id ?>">
                            <ul class="text-center p-0">
                                <li class="m-auto d-flex align-items-center justify-content-center">
                                    Sight : <?= $fighter->skill_sight ?>
                                </li>
                                <li class="d-flex align-items-center justify-content-center">
                                    Strength: <?= $fighter->skill_strength ?>
                                </li>
                                <li class="d-flex align-items-center justify-content-center">
                                    Max health: <?= $fighter->skill_health ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>



</div>


<table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
        <th scope="col"><?= $this->Paginator->sort('player_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('coordinate_x') ?></th>
        <th scope="col"><?= $this->Paginator->sort('coordinate_y') ?></th>
        <th scope="col"><?= $this->Paginator->sort('level') ?></th>
        <th scope="col"><?= $this->Paginator->sort('xp') ?></th>
        <th scope="col"><?= $this->Paginator->sort('skill_sight') ?></th>
        <th scope="col"><?= $this->Paginator->sort('skill_strength') ?></th>
        <th scope="col"><?= $this->Paginator->sort('skill_health') ?></th>
        <th scope="col"><?= $this->Paginator->sort('current_health') ?></th>
        <th scope="col"><?= $this->Paginator->sort('next_action_time') ?></th>
        <th scope="col"><?= $this->Paginator->sort('guild_id') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
</div>

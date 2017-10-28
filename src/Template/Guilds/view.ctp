<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Guild $guild
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="nav justify-content-end">
        <li class="nav-link"><?= $this->Html->link(__('All Guilds'), ['action' => 'index']) ?> </li>
    </ul>
</nav>

<div class="guilds view large-9 medium-8 columns content">

    <table class="table table-responsive table-hover">
        <caption> <h3>Guild Description</h3></caption>
        <thead class="thead-inverse">
        <tr>
            <th scope="col"><?= __('Guild Name') ?></th>
            <th scope="row"><?= __('Id') ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?= h($guild->name) ?></td>
            <td><?= $this->Number->format($guild->id) ?></td>
        </tr>
        </tbody>
    </table>
</div>
    <div class="events index large-9 medium-8 columns content">

        <?php if (!empty($guild->fighters)): ?>

            <div class="events index large-9 medium-8 columns content">

                <table class="table table-responsive table-hover">
                    <caption><h4>Related Fighters</h4></caption>
                    <thead class="thead-inverse">
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('coordinate_x') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('coordinate_y') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Level') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Xp') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Sight') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Strength') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Health') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Current Health') ?></th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($guild->fighters as $fighters): ?>
                <tr>
                    <td><?= h($fighters->id) ?></td>
                    <td><?= h($fighters->name) ?></td>
                    <td><?= h($fighters->coordinate_x) ?></td>
                    <td><?= h($fighters->coordinate_y) ?></td>
                    <td><?= h($fighters->level) ?></td>
                    <td><?= h($fighters->xp) ?></td>
                    <td><?= h($fighters->skill_sight) ?></td>
                    <td><?= h($fighters->skill_strength) ?></td>
                    <td><?= h($fighters->skill_health) ?></td>
                    <td><?= h($fighters->current_health) ?></td>

                </tr>
            <?php endforeach; ?>
                    </tbody>
                   </table>
            </div>
        <?php endif; ?>
    </div>

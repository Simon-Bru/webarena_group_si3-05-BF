<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Guild[]|\Cake\Collection\CollectionInterface $guilds
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="navbar list-unstyled justify-content-end">
        <li class="nav-item"><?= $this->Html->link(__('Create a Guild'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<div class="events view large-9 medium-8 columns content">
    <table class="table table-responsive table-hover">
        <caption><h4>Guilds List</h4></caption>
        <thead>
            <tr class="table table-info">
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($guilds as $guild): ?>
            <tr>
                <td><?= $this->Number->format($guild->id) ?></td>
                <td><?= h($guild->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $guild->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $guild->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $guild->id], ['confirm' => __('Are you sure you want to delete # {0}?', $guild->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
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
        <p class="text-info"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

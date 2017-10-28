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
    <h1><i class="icons8-shield-filled"></i> Guilds List</h1>
    <table class="table table-responsive table-hover">
        <thead>
            <tr class="table table-info">
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($guilds as $guild): ?>
            <tr>
                <td><?= h($guild->name) ?></td>
                <td class="actions">
                <td> <?= $this->Html->link(
                        $this->Html->tag('i', '',
                            ['class' => 'icons8-eye-filled text-dark mx-1']),
                        ['action' => 'view', $guild->id],
                        ['escape' => false]) ?>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '',
                            ['class' => 'icons8-edit-filled text-dark mx-1']),
                        ['action' => 'edit', $guild->id],
                        ['escape' => false]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fighter[]|\Cake\Collection\CollectionInterface $fighters
 */
?>
<h1><i class="icons8-punching-filled mr-2"></i>Ranking</h1>

<table class="table table-responsive table-hover table-striped">
    <caption><h4><i class="icons8-arena-filled"></i> Best fighters of the arena</h4></caption>
    <thead class="thead-inverse">
    <tr>
        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
        <th scope="col"><?= $this->Paginator->sort('level', null, ['direction' => 'desc']) ?></th>
        <th scope="col"><?= $this->Paginator->sort('skill_sight') ?></th>
        <th scope="col"><?= $this->Paginator->sort('skill_strength') ?></th>
        <th scope="col"><?= $this->Paginator->sort('skill_health') ?></th>
        <th scope="col" class="actions"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($fighters as $fighter): ?>
        <tr>
            <td><?= h($fighter->name) ?></td>
            <td><?= h($fighter->level) ?></td>
            <td><?= $fighter->skill_sight ?></td>
            <td><?= $fighter->skill_strength ?></td>
            <td><?= $fighter->skill_health ?></td>
            <td class="actions">
                <?= $this->Html->link(
                    $this->Html->tag('i', '',
                        ['class' => 'icons8-eye-filled text-dark mx-1']),
                    ['action' => 'view', $fighter->id],
                    ['escape' => false]) ?>
            </td>


        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<nav aria-label="Events pagination">
    <ul class="pagination justify-content-center">
        <?= $this->Paginator->first(__('First')) ?>
        <?= $this->Paginator->prev(' <') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(' >') ?>
        <?= $this->Paginator->last(__('Last')) ?>
    </ul>

</nav>
<p class="text-info"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>


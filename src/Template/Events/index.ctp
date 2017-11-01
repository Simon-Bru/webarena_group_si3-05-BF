<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event[]|\Cake\Collection\CollectionInterface $events
 */
?>
<h1><i class="icons8-calendar mr-2"></i>Diary</h1>

<table class="table table-responsive table-hover table-striped">
    <caption><h4><i class="icons8-arena-filled"></i> Last 24 Hours events</h4></caption>
    <thead class="thead-inverse">
    <tr>
        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
        <th scope="col"><?= $this->Paginator->sort('date', null, ['direction' => 'desc']) ?></th>
        <th scope="col"><?= $this->Paginator->sort('coordinate_x') ?></th>
        <th scope="col"><?= $this->Paginator->sort('coordinate_y') ?></th>
        <th scope="col" class="actions"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($events as $event): ?>
        <tr>
            <td><?= h($event->name) ?></td>
            <td><?= h($event->date) ?></td>
            <td><?= $this->Number->format($event->coordinate_x) ?></td>
            <td><?= $this->Number->format($event->coordinate_y) ?></td>
            <td class="actions">
                <?= $this->Html->link(
                    $this->Html->tag('i', '',
                        ['class' => 'icons8-eye-filled text-dark mx-1']),
                    ['action' => 'view', $event->id],
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


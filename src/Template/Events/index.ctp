<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event[]|\Cake\Collection\CollectionInterface $events
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="nav nav-pills nav-fill justify-content-end">
        <li class="nav-link active"><?= __('Actions') ?></li>
        <li class="nav-link"><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="text-center"><h1>Diary</h1></div>
<div class="events index large-9 medium-8 columns content">

    <table class="table table-responsive table-hover">
        <caption><h4><i class="icons8-arena-filled"></i> Last 24 Hours events</h4></caption>
        <thead class="thead-inverse">
        <tr>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('date') ?></th>
            <th scope="col"><?= $this->Paginator->sort('coordinate_x') ?></th>
            <th scope="col"><?= $this->Paginator->sort('coordinate_y') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
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
                    <?= $this->Form->postLink(
                        $this->Html->tag('i', '', [
                            'class' => 'icons8-delete-bin-filled text-danger mx-1'
                        ]),
                        ['action' => 'delete', $event->id],
                        [
                            'confirm' => __('Are you sure you want to delete {0}?', $event->name),
                            'escape' => false
                        ]
                    )?>
                </td>


            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <?= $this->Paginator->prev('<<'.__('Previous'), [
                    'class' => 'page-link'
                ]); ?>
            </li>
            <li class="page-item"><?= $this->Paginator->first('<< ' . __('first'), [
                    'class' => 'page-link'
                ]) ?></li>
            <li class="page-item"><?= $this->Paginator->numbers() ?></li>
            <li class="page-item"><?= $this->Paginator->next(__('Next') . ' >>') ?></li>
            <li class="page-item"><?= $this->Paginator->last(__('last') . ' >>') ?></li>
        </ul>

    </nav>
    <p class="text-info"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>

</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Guild[]|\Cake\Collection\CollectionInterface $guilds
 */

if($userIsLogged) {
    ?>
    <nav>
        <?= $this->Html->link(__('Create a Guild'), [
            'action' => 'add'
        ], [
            'class' => 'btn btn-dark float-right'
        ]) ?>
    </nav>

    <?php
}
?>


<h1><i class="icons8-shield-filled mr-2"></i>Guilds</h1>
<table class="table table-responsive table-hover table-striped">
    <thead>
    <tr class="thead-inverse">
        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
        <th><?= $this->Paginator->sort('Number of members') ?></th>
        <th><?= $this->Paginator->sort('Power', '', ['direction' => 'desc']) ?></th>
        <th scope="col"><?= h('See Members') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($guilds as $guild): ?>
        <tr>
            <td><?= h($guild->name) ?></td>
            <td><?= h(sizeof($guild->fighters)) ?></td>
            <td>
                <?= empty($guild->fighters)
                    ? "0"
                    : round(array_sum(array_map(function($fighter) {
                            return $fighter->level;
                        }, $guild->fighters))/sizeof($guild->fighters)) ?>
            </td>
            <td> <?= $this->Html->link(
                    $this->Html->tag('i', '',
                        ['class' => 'icons8-eye-filled text-dark mx-1']),
                    ['action' => 'view', $guild->id],
                    ['escape' => false]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div aria-label="guilds paginator">
    <ul class="pagination justify-content-center">
        <?= $this->Paginator->first(__('First')) ?>
        <?= $this->Paginator->prev(' <') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(' >') ?>
        <?= $this->Paginator->last(__('Last')) ?>
    </ul>
    <p class="text-info"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>

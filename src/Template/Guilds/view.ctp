<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Guild $guild
 */
?>
<nav class="">
    <ul class="nav">
        <li class="nav-link"><?= $this->Html->link(__('All Guilds'), ['action' => 'index']) ?> </li>
    </ul>
</nav>

<h1><i class="icons8-shield-filled mr-2"></i><?= h($guild->name) ?> Fighters</h1>



<table class="table table-responsive table-hover">
    <caption><i class="icons8-kicking-filled"></i> Related Fighters</caption>
    <thead class="thead-inverse">
    <tr>
        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
        <th scope="col"><?= $this->Paginator->sort('Level') ?></th>
        <th>View</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($guild->fighters as $fighters): ?>
        <tr>
            <td><?= h($fighters->name) ?></td>
            <td><?= h($fighters->level) ?></td>
            <td> <?= $this->Html->link(
                    $this->Html->tag('i', '',
                        ['class' => 'icons8-eye-filled text-dark mx-1']),
                    ['controller' => 'Fighters','action' => 'view', $fighters->id],
                    ['escape' => false])
                ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


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

    <h1><i class="icons8-shield-filled"></i> Guild <?= h($guild->name) ?></h1>





</div>
    <div class="events index large-9 medium-8 columns content">

        <?php if (!empty($guild->fighters)): ?>

            <div class="events index large-9 medium-8 columns content">
                <h2><i class="icons8-kicking-filled"></i> Related Fighters</h2>
                <table class="table table-responsive table-hover">
                    <thead class="thead-inverse">
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Level') ?></th>
                        <th></th>
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
            </div>
        <?php endif; ?>
    </div>

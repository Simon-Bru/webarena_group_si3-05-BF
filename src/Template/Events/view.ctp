<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

    <ul class="navbar list-unstyled justify-content-end">
        <li class="nav-item"><?= $this->Html->link(__('All Events'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="events view large-9 medium-8 columns content">
    <h4><i class="icons8-arena-filled"></i> Description of the event</h4>
    <table class="table table-responsive table-bordered table-hover">
        <tr class="table-info">
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($event->name) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Coordinate X') ?></th>
            <td><?= $this->Number->format($event->coordinate_x) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Coordinate Y') ?></th>
            <td><?= $this->Number->format($event->coordinate_y) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($event->date) ?></td>
        </tr>
    </table>
</div>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

    <ul class="navbar list-unstyled justify-content-around">
        <li class="nav-item"><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
        <li class="nav-item"><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li class="nav-item"><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="events view large-9 medium-8 columns content">
    <table class="table table-responsive table-bordered table-hover">
        <caption><h4>Description of the event</h4></caption>

        <tr class="table-info">
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($event->name) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($event->id) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Coordinate X') ?></th>
            <td><?= $this->Number->format($event->coordinate_x) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Coordinate Y') ?></th>
            <td><?= $this->Number->format($event->coordinate_y) ?></td>
        </tr>

        <tr class="table-warning">
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($event->date) ?></td>
        </tr>
    </table>
</div>
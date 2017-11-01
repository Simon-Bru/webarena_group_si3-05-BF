<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<nav class="nav">

    <ul class="navbar">
        <li class="nav-item"><?= $this->Html->link(__('All Events'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<h1><i class="icons8-calendar mr-2"></i>Details of the event</h1>
<dl>
    <dt><?= __('Name') ?></dt>
    <dd><?= h($event->name) ?></dd>
    <dt><?= __('Coordinates (X;Y)') ?></dt>
    <dd><?= $this->Number->format($event->coordinate_x) ?>; <?= $this->Number->format($event->coordinate_y) ?></dd>
    <dt><?= __('Date') ?></dt>
    <dd><?= h($event->date) ?></dd>
</dl>

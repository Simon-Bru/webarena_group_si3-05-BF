<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message[]|\Cake\Collection\CollectionInterface $messages
 */
?>
<div class="jumbotron">
    <h3><?= __('Messages') ?></h3>
    <?php foreach ($messages as $message): ?>
    <div>
        <span><?= $this->Number->format($message->id) ?></span>
        <span><?= h($message->date) ?></span>
        <span><?= h($message->title) ?></span>
        <span><?= $this->Number->format($message->fighter_id_from) ?></span>
        <span><?= $message->has('fighter') ? $this->Html->link($message->fighter->name, ['controller' => 'Fighters', 'action' => 'view', $message->fighter->id]) : '' ?></span>
        <span class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $message->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $message->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?>
        </span>
    </div>
    <?php endforeach; ?>
</div>

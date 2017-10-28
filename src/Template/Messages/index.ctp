<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message[]|\Cake\Collection\CollectionInterface $messages
 */
?>
<div class="jumbotron">
    <h3><?= __('Messages') ?></h3>
    <div class="row">
        <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
            </div>
        </div>
        <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">...</div>
                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
                <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
            </div>
        </div>
    </div>

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

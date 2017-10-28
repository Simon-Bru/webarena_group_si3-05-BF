<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 */
?>
<div class="jumbotron">

    <h3><?= h($message->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($message->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fighter') ?></th>
            <td><?= $message->has('fighter') ? $this->Html->link($message->fighter->name, ['controller' => 'Fighters', 'action' => 'view', $message->fighter->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($message->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fighter Id From') ?></th>
            <td><?= $this->Number->format($message->fighter_id_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($message->date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($message->message)); ?>
    </div>
</div>

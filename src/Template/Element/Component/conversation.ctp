<?php

use Cake\Utility\Hash;

$conversation = Hash::merge($recipient->messages_sent, $recipient->messages_received);
$conversation = Hash::sort($conversation, '{n}.date', 'asc');
?>

<?php foreach ($conversation as $message) :
    if($message->fighter_id_from == $id) {
        $class = "float-right bg-info text-white";
    } else {
        $class = "float-left border-info";
    }?>
    <div class="row">
        <div class="col-12">
            <div class="d-block card mb-3 <?= $class ?>" style="max-width: 20rem;">
                <div class="card-body p-2">
                    <h5 class="card-title"><?= $message->title ?></h5>
                    <p class="card-text"><?= $message->message ?></p>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>

<?= $this->Form->create('sendMessage', ['class' => 'text-center m-auto', 'url' => '/messages/add']); ?>
<?= $this->Form->hidden('fighter_id', ['value' => $recipient->id]) ?>
<?= $this->Form->hidden('fighter_id_from', ['value' => $id]) ?>
<?= $this->Form->input('title', ['label' => '', 'placeholder' => 'Title']); ?>
<?= $this->Form->input('message', ['label' => '', 'placeholder' => 'Message']); ?>
<?= $this->Form->button('Send', ['class' => 'btn-info m-auto']);?>
<?= $this->Form->end(); ?>

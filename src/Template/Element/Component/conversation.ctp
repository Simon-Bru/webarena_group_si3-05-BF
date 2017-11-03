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
<div class="clearfix"></div>

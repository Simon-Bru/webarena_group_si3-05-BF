<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message[]|\Cake\Collection\CollectionInterface $conversations
 */
?>
<div class="jumbotron">
    <h1><i class="icons8-communication-filled mr-3"></i><?= __('Messages') ?></h1>
    <div class="text-center col-12 col-md-8 col-lg-6 m-auto">
        <?= $this->Form->control('guild_id', [
            'label' => 'Select the recipient fighter: ',
            'class' => 'w-50 ml-2 m-auto',
            'id' => 'fighterSelect',
            'type' => 'select',
            'options' => $myfighters
        ]);
        ?>
    </div>
    <div class="row">
        <div class="col-4">
            <aside class="list-group" id="list-tab" role="tablist">
                <?php
                foreach($recipients as $recipient) {
                    echo $this->Html->link(
                        $recipient->name.
                        $this->Html->tag('span',
                            sizeof($recipient->messages_sent)+sizeof($recipient->messages_received),
                            ['class' => 'badge badge-primary float-right']
                        ),
                        '#'.$recipient->id,
                        [
                            'class' => 'list-group-item list-group-item-action',
                            'role' => 'tab',
                            'data-toggle' => 'list',
                            'aria-controls' => $recipient->id,
                            'escape' => false
                        ]
                    );
                }
                ?>
            </aside>
        </div>
        <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
                <?php

                foreach($recipients as $recipient) {

                    echo $this->Html->tag(
                        'div',
                        $this->element('Component/conversation', ['recipient' => $recipient]),
                        [
                        'class' => 'tab-pane fade',
                        'id' => $recipient->id,
                        'role' => 'tabpanel',
                        'aria-labelledby' => 'conversation-'.$recipient->id,
                        'escape' => false
                    ]);
                }
                ?>
            </div>
        </div>
    </div>
</div>

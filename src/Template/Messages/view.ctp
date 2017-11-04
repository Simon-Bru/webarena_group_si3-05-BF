<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message[]|\Cake\Collection\CollectionInterface $conversations
 */
?>
<div class="jumbotron">
    <h1><i class="icons8-communication-filled mr-3"></i><?= __('Messages') ?></h1>
    <div class="col-12 col-md-8 col-lg-6 m-auto">
        <?= $this->Form->control('guild_id', [
            'label' => 'Select the recipient fighter: ',
            'class' => 'w-50 ml-2 m-auto d-inline-block',
            'id' => 'fighterSelect',
            'type' => 'select',
            'options' => $myfighters
        ]);
        ?>
        <?= $this->Form->control('guild_id', [
            'label' => 'New message to : ',
            'class' => 'w-50 ml-2 m-auto',
            'id' => 'messageToSelect',
            'type' => 'select',
            'options' => array_map(function($fighter){
                return [
                    'value' => $fighter->id,
                    'text' => $fighter->name
                ];
            },$recipients),
            'empty' => 'Choose a fighter to send new messages'
        ]);
        ?>
    </div>
    <div class="row">
        <div class="col-12 col-sm-4">
            <aside class="list-group" id="list-tab" role="tablist">
                <?php
                foreach($recipients as $recipient) {
                    $hidden = '';
                    if(sizeof($recipient->messages_sent)+sizeof($recipient->messages_received) == 0) {
                        $hidden = ' d-none';
                    }
                    echo $this->Html->link(
                        $recipient->name.
                        $this->Html->tag('span',
                            sizeof($recipient->messages_sent)+sizeof($recipient->messages_received),
                            ['class' => 'badge badge-primary float-right']
                        ),
                        '#'.$recipient->id,
                        [
                            'class' => 'list-group-item list-group-item-action'.$hidden,
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
        <div class="col-12 col-sm-8">
            <div class="tab-content" id="nav-tabContent">
                <?php

                foreach($recipients as $recipient) {

                    echo $this->Html->tag(
                        'div',
                        $this->element('Component/conversation', [
                            'recipient' => $recipient,
                            'id' => $id
                        ]),
                        [
                            'class' => 'tab-pane fade card p-4 conversation',
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

<script type="text/javascript">
    window.onload = function() {
        $('[data-toggle=list]')[0].click();
        $('#messageToSelect').change(function() {
            $('[aria-controls='+$(this)[0].value+']').removeClass("d-none");
            $('[aria-controls='+$(this)[0].value+']').click();
        });
        // Messages view fighters selection
        $('#fighterSelect').change(function() {
            window.location.replace(window.location.origin+"/messages/view/"+$(this)[0].value)
        });
    };
</script>
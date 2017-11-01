<?php
    $list = [
        $this->Html->tag('i', '', ['class' => 'icons8-iris-scan  mr-2']).$fighter->skill_sight,
        $this->Html->tag('i', '', ['class' => 'icons8-muscle-filled  mr-2']).$fighter->skill_strength,
        $this->Html->tag('i', '', ['class' => 'icons8-heart-filled  mr-2']).$fighter->current_health
    ];
    echo $this->Html->nestedList($list, [
        'class' => 'm-auto skills  list-unstyled lead p-0'
    ],
    [
        'class' => 'd-flex align-items-center justify-content-center',
        'escape' => false
    ]);
?>
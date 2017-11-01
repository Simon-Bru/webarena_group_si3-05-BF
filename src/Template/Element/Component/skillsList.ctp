<?php
    $list = [
        $this->Html->tag('i', '', ['class' => 'icons8-iris-scan  mr-2']).'Sight: '.$fighter->skill_sight,
        $this->Html->tag('i', '', ['class' => 'icons8-muscle  mr-2']).'Strength: '.$fighter->skill_strength,
        $this->Html->tag('i', '', ['class' => 'icons8-heart-filled  mr-2']).'Sight: '.$fighter->skill_health
    ];
    echo $this->Html->nestedList($list, [
        'class' => 'm-auto skills'
    ],
    [
        'class' => 'd-flex align-items-center list-unstyled',
        'escape' => false
    ]);
?>
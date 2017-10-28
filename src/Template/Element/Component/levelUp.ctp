<?php if(($fighter->hasFullXp())){?>
    <div class="text-center">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#levelUpModal">
            Level Up !
        </button>
    </div>
    <div class="modal fade" id="levelUpModal" tabindex="-1" role="dialog" aria-labelledby="Choose a skill to level up" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose a skill to improve</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex justify-content-around align-items-center">
                    <?php echo $this->Html->link(
                        $this->Html->tag('i', '', [
                            'class' => 'icons8-iris-scan d-block display-4'
                        ]).'+1 Sight',
                        array('controller' => 'Fighters', 'action' => 'levelUp', $fighter->id, 1), [
                            'class' => 'btn btn-outline-info',
                            'escape' => false
                        ]
                    );

                    echo $this->Html->link(
                        $this->Html->tag('i', '', [
                            'class' => 'icons8-muscle-filled d-block display-4'
                        ]).'+1 Strendth',
                        array('controller' => 'Fighters', 'action' => 'levelUp', $fighter->id, 2), [
                            'class' => 'btn btn-outline-warning',
                            'escape' => false
                        ]
                    );

                    echo $this->Html->link(
                        $this->Html->tag('i', '', [
                            'class' => 'icons8-heart-filled d-block display-4'
                        ]).'+3 Health',
                        array('controller' => 'Fighters', 'action' => 'levelUp', $fighter->id, 3), [
                            'class' => 'btn btn-outline-danger',
                            'escape' => false
                        ]
                    );
                    ?>

                </div>
            </div>
        </div>
    </div>
<?php } ?>

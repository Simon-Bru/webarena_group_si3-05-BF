<button type="button" class="btn btn-success" data-toggle="modal" data-target="#inventoryModal">
    Inventory
</button>

<div class="modal fade" id="inventoryModal" tabindex="-1" role="dialog" aria-labelledby="Tools picked up by fighter" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inventoryModalLabel">Inventory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php
                $list = array_map(function($tool) {
                    return $this->Html->tag('i', '',
                            ['class' => TOOLS_TABLE[$tool->type]['icon']]).
                        $this->Html->tag('p', '+'.$tool->bonus.' '.explode('_', TOOLS_TABLE[$tool->type]['bonus'])[1]);
                }, $tools);
                echo $this->Html->nestedList($list,
                    [
                        'class' => 'm-auto p-0 text-center d-flex justify-content-center align-items-center flex-wrap'
                    ],
                    [
                        'class' => 'list-unstyled mx-3',
                        'escape' => false
                    ]);
                ?>

            </div>
        </div>
    </div>
</div>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fighter[]|\Cake\Collection\CollectionInterface $fighters
 */
?>
<section class="jumbotron pt-4">
    <nav class="nav nav-pills nav-fill mb-4 text-center">
        <?= $this->Html->link(
            __('My Fighters'),
            ['action' => 'add'],
            ['class' => 'nav-item nav-link active col-12 col-sm-2 ml-auto']
        ) ?>
        <?= $this->Html->link(
            __('New Fighter'),
            ['action' => 'add'],
            ['class' => 'nav-item nav-link col-12 col-sm-2 mr-auto']
        ) ?>
    </nav>
    <h3><?= __('My Fighters') ?></h3>
    <hr class="my-4">

    <ul class="row fightersList p-2">
        <?php if($fighters->isEmpty()) { ?>
            <h5>You have no fighters yet ! Please click the link above to create one</h5>
        <?php } ?>
        <?php foreach ($fighters as $fighter): ?>
            <div class="col-sm-4 d-inline-block">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right">
                            <?= $this->Html->link(
                                $this->Html->tag('i', '',
                                    ['class' => 'icons8-eye-filled text-dark mx-1']),
                                ['action' => 'view', $fighter->id],
                                ['escape' => false]) ?>
                            <?= $this->Html->link(
                                $this->Html->tag('i', '',
                                    ['class' => 'icons8-edit-filled text-dark mx-1']),
                                ['action' => 'edit', $fighter->id],
                                ['escape' => false]) ?>
                            <?= $this->Form->postLink(
                                $this->Html->tag('i', '', [
                                    'class' => 'icons8-delete-bin-filled text-danger mx-1'
                                ]),
                                ['action' => 'delete', $fighter->id],
                                [
                                    'confirm' => __('Are you sure you want to delete {0}?', $fighter->name),
                                    'escape' => false
                                ]
                            )
                            ?>
                        </div>
                        <h4 class="card-title"><?= h($fighter->name) ?></h4>
                        <p class="card-text">
                        <dl>
                            <dt>Level <?= $this->Number->format($fighter->level) ?></dt>
                            <dd>
                                <div class="progress">
                                    <div class="progress-bar bg-success progress-bar-striped"
                                         role="progressbar"
                                         style="width:<?= $fighter->xp*10 ?>%;"
                                         aria-valuenow="<?= $fighter->xp ?>"
                                         aria-valuemin="0"
                                         aria-valuemax="10"><?= $fighter->xp*10 ?>%</div>
                                </div>
                            </dd>
                            <dt>Current health</dt>
                            <dd><?php
                                for($i=0; $i < $fighter->current_health; $i++) {
                                    echo("<i class='icons8-heart-filled text-danger'></i>");
                                }
                                ?></dd>
                            <dt>Position</dt>
                            <dd>
                                <?= $this->Number->format($fighter->coordinate_x) ?> ;
                                <?= $this->Number->format($fighter->coordinate_y) ?> (X;Y)
                            </dd>
                            <dt><?= $fighter->has('guild') ? "Guild" : "" ?></dt>
                            <dd><?= $fighter->has('guild') ? $this->Html->link($fighter->guild->name, ['controller' => 'Guilds', 'action' => 'view', $fighter->guild->id]) : '' ?></dd>
                        </dl>
                        </p>
                        <p class="text-center">
                            <button class="btn btn-info"
                                    type="button"
                                    data-toggle="collapse"
                                    data-target="#<?= $fighter->id ?>"
                                    aria-expanded="false"
                                    aria-controls="collapseExample">Show skills</button>
                        <div class="collapse" id="<?= $fighter->id ?>">
                            <ul class="m-auto skills">
                                <li class="d-flex align-items-center">
                                    <i class="icons8-iris-scan mr-2"></i>
                                    Sight : <?= $fighter->skill_sight ?>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="icons8-muscle mr-2"></i>
                                    Strength: <?= $fighter->skill_strength ?>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="icons8-heart-filled mr-2"></i>
                                    Max health: <?= $fighter->skill_health ?>
                                </li>
                            </ul>
                        </div>
                        </p>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
</section>

<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'WebArena';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('icons8.min') ?>
    <?= $this->Html->css('style') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<header class="mb-3">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <?php echo $this->Html->link('Home',
                        array('controller' => 'Pages', 'action' => '/'),
                        ['class' => 'nav-link']); ?>
                </li>
                <li class="nav-item">
                    <?php echo $this->Html->link('Sight',
                        array('controller' => 'Arena', 'action' => ''),
                        ['class' => 'nav-link']); ?>
                </li>
                <li class="nav-item">
                    <?php echo $this->Html->link('Fighters',
                        array('controller' => 'Fighters', 'action' => '/'),
                        ['class' => 'nav-link']); ?>
                </li>
                <li class="nav-item">
                    <?php echo $this->Html->link('Diary',
                        array('controller' => 'Events', 'action' => '/', 'sort' => 'date', 'direction' => 'desc'),
                        ['class' => 'nav-link']); ?>
                </li>
                <li class="nav-item">
                    <?php echo $this->Html->link('Guilds',
                        array('controller' => 'Guilds', 'action' => '/', 'sort' => 'power', 'direction' => 'desc'),
                        ['class' => 'nav-link']); ?>
                </li>
                <li class="nav-item">
                    <?php echo $this->Html->link('Ranking',
                        array('controller' => 'Fighters', 'action' => 'ranking', 'sort' => 'level', 'direction' => 'desc'),
                        ['class' => 'nav-link']); ?>
                </li>
                <?php
                if(!$userIsLogged) {
                    ?>
                    <li class="nav-item">
                        <?php echo $this->Html->link('Sign in',
                            ['controller' => 'Players', 'action' => 'login'],
                            ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo $this->Html->link('Sign up',
                            ['controller' => 'Players', 'action' => 'add'],
                            ['class' => 'nav-link']); ?>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item float-right">
                        <?php
                        echo $this->Html->link('Messages', [
                            'controller' => 'Messages', 'action' => 'index'
                        ], [
                            'escape' => false,
                            'class' => 'nav-link'
                        ])
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php echo $this->Html->link('Log out',
                            ['controller' => 'Players', 'action' => 'logout'],
                            ['class' => 'nav-link']); ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </nav>
</header>
<?= $this->Flash->render() ?>

<div class="container clearfix mt-2">
    <?= $this->fetch('content') ?>
</div>

<footer class="container-fluid d-flex justify-content-around mt-5 pt-5">
    <p class="d-inline-block">Group SII3</p>
    <p class="d-inline-block">&copy Bruguerolle/ Molano/ Belluccini Options ABF</p>
    <p class="d-inline-block"> <a href="https://github.com/Simon-Bru/webarena_group_si3-05-BF/commits/master">Link Versionning</a></p>
</footer>

<?= $this->Html->script('jquery.min') ?>
<?= $this->Html->script('popper.min') ?>
<?= $this->Html->script('bootstrap.min') ?>
<?= $this->Html->script('bootstrap_init') ?>
</body>
</html>

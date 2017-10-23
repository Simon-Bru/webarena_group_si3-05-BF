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

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
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
                            array('controller' => 'Arenas', 'action' => '/'),
                            ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo $this->Html->link('Fighters',
                            array('controller' => 'Fighters', 'action' => '/'),
                            ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo $this->Html->link('Diary',
                            array('controller' => 'Events', 'action' => '/'),
                            ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo $this->Html->link('Sign in',
                            '/login',
                            ['class' => 'nav-link']); ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>

    <?= $this->Html->script('jquery.min') ?>
    <?= $this->Html->script('popper.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    Groupe SII3
    <p>&copy Bruguerolle/ Molano/ Belluccin Options BF</p>
    <p> <a href="https://github.com/Simon-Bru/webarena_group_si3-05-BF">Lien versionning</a></p>

    

</body>
</html>

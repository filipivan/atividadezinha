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

$cakeDescription = 'Atividadezinha';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta(
        'fav.ico',
        '/fav.ico',
        ['type' => 'icon']
    ); ?>


    <?= $this->Html->css(['bootstrap.css', 'estilo.css']) ?>
    <?= $this->Html->script(['jquery-3.2.1.js', 'bootstrap.js']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <!-- NAVBAR -->
    <?= $this->element('navbar'); ?>

    <?= $this->Flash->render() ?>


    <div class="container">

        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>

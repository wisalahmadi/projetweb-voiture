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
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min',
     'milligram.min', 
     'cake',
     'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'
     ]) 
     ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php
    echo $this->Html->script([
        'https://code.jquery.com/jquery-1.12.4.js',
        'https://code.jquery.com/ui/1.12.1/jquery-ui.js'
            ], ['block' => 'scriptLibraries']
    );
    ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>You're at the right place to sell your car</a>
        </div>
        <div class="top-nav-links">
         
                <?= $this->Html->link(__('Admin'), ['prefix' => false, 'controller' => 'CarsColorsDispo', 'action' => 'index']) ?>
                <?= $this->Html->link(__('listes liés'), ['controller' => 'CarsBrands', 'action' => 'add']) ?>
                <?= $this->Html->link(__('Autocomplete'), ['controller' => 'Cars', 'action' => 'add']) ?>
                <?= $this->Html->link(__('Monopage'), ['controller' => 'CarsYear', 'action' => 'add']) ?>               <?php
                    $loguser = $this->request->getSession()->read('Auth.User');
                    if ($loguser) :
                        ?>
                        <li>
                            <?php
                            if (!$loguser['confirmed']) {
                                echo $this->Html->link(__('Please confirm'), ['controller' => 'Users', 'action' => 'confirm', $loguser['uuid']]);
                            } else {
                                echo $this->Html->link(__('Email confirmed :-)'), ['controller' => 'Users', 'action' => 'view', $loguser['id']]);
                            }
                            ?>
                        </li>
                        <?php
                        $user = $loguser['email'];
                        echo $this->Html->link($user . ' logout', ['controller' => 'Users', 'action' => 'logout']);
                    else :
                        echo $this->Html->link('login', ['controller' => 'Users', 'action' => 'login']);
                    endif;
                    ?>
                    </li>
                    <?php
                    $language = $this->request->getSession()->read('Config.language');
                    if ($language == 'en_US'):
                        ?>
                       
                            <?= $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]); ?>
                      
                    <?php else : ?>
                     
                            <?= $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false]); ?>
                       
                    <?php endif; ?>
                   <a target="_blank" href="https://book.cakephp.org/3/">Documentation</a>
                    <a target="_blank" href="https://api.cakephp.org/3.0/">API</a>
             
            </div>
        </nav>
        <?= $this->Flash->render() ?>
        <div class="container clearfix">
            <?= $this->fetch('content') ?>
        </div>
        <footer>
        </footer>
        <?= $this->fetch('scriptLibraries') ?>
        <?= $this->fetch('script'); ?>
        <?= $this->fetch('scriptBottom') ?> 
    </body>
</html>

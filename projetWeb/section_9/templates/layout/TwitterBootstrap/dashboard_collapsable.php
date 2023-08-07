<?php

/**
 * @var \Cake\View\View $this
 */
use Cake\Core\Configure;

$this->Html->css('BootstrapUI.dashboard', ['block' => true]);
$this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->getParam('controller'), $this->request->getParam('action')]) . '" ');
$this->start('tb_body_start');
?>
<body <?= $this->fetch('tb_body_attrs') ?>>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <?= $this->Html->link(Configure::read('App.title'), '/', ['class' => 'navbar-brand col-sm-3 col-md-2 mr-0']) ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">

            <ul class="navbar-nav px-3">
<?= $this->fetch('tb_sidebar') ?>
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="#">Sign out</a>
                </li>
            </ul>
        </div>  
    </nav>

    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <h1 class="page-header"><?= $this->request->getParam('controller'); ?></h1>
                <?php
                /**
                 * Default `flash` block.
                 */
                if (!$this->fetch('tb_flash')) {
                    $this->start('tb_flash');
                    if (isset($this->Flash)) {
                        echo $this->Flash->render();
                    }
                    $this->end();
                }
                $this->end();

                $this->start('tb_body_end');
                echo '</body>';
                $this->end();

                $this->append('content', '</main></div></div>');
                echo $this->fetch('content');
                
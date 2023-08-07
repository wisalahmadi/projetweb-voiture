<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarsColorsDispo $carsColorsDispo
 * @var \App\Model\Entity\CarsYear[]|\Cake\Collection\CollectionInterface $carsYear
 * @var \App\Model\Entity\CarsBrands[]|\Cake\Collection\CollectionInterface $carsBrands
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $carsColorsDispo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carsColorsDispo->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Dispo Car Colors'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Cars Year'), ['controller' => 'CarsYear', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Cars Year'), ['controller' => 'CarsYear', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Cars Brands'), ['controller' => 'CarsBrands', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Cars Brands'), ['controller' => 'CarsBrands', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="carsColorsDispo form content">
    <?= $this->Form->create($carsColorsDispo) ?>
    <fieldset>
        <legend><?= __('Edit Disponible Car Colors') ?></legend>
        <?php
            echo $this->Form->control('car_year_id', ['options' => $carsYear]);
            echo $this->Form->control('color_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

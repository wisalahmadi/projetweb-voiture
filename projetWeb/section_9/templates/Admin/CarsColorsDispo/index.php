<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarsColorsDispo[]|\Cake\Collection\CollectionInterface $carsColorsDispo
 */
?>


<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Quit Admin View'), ['prefix' => false,'controller' => 'CarsColorsDispo','action' => 'index'], ['class' => 'btn btn-danger']) ?></li>
<li><?= $this->Html->link(__('New Dispo Car Colors'), ['action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Cars Year'), ['controller' => 'CarsYear', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Cars Year'), ['controller' => 'CarsYear', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Cars Brands'), ['controller' => 'CarsBrands', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Cars Brands'), ['controller' => 'CarsBrands', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-bordered table-secondary table-hover">
    <thead>
    <tr class="d-flex">
        <th class="col-1"><?= $this->Paginator->sort('id') ?></th>
        <th class="col-2"><?= $this->Paginator->sort('cars_year_id') ?></th>
        <th class="col-2"><?= $this->Paginator->sort('color_name') ?></th>
        <th class="actions col-5"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($carsColorsDispo as $carsColorsDispo) : ?>
        <tr class="d-flex">
            <td class="col-1"><?= $this->Number->format($carsColorsDispo->id) ?></td>
            <td class="col-2"><?= $carsColorsDispo->has('cars_year') ? $this->Html->link($carsColorsDispo->cars_year->annee, ['controller' => 'CarsYear', 'action' => 'view', $carsColorsDispo->cars_year->id]) : '' ?></td>
            <td class="col-2"><?= h($carsColorsDispo->color_name) ?></td>
            <td class="actions col-5">
                <?= $this->Html->link(__('View'), ['action' => 'view', $carsColorsDispo->id], ['title' => __('View'), 'class' => 'btn btn-success']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $carsColorsDispo->id], ['title' => __('Edit'), 'class' => 'btn btn-primary']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $carsColorsDispo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carsColorsDispo->id), 'title' => __('Delete'), 'class' => 'btn btn-danger']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('First')) ?>
        <?= $this->Paginator->prev('< ' . __('Previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('Next') . ' >') ?>
        <?= $this->Paginator->last(__('Last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>



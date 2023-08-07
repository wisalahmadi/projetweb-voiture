<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarsColorsDispo[]|\Cake\Collection\CollectionInterface $carsColorsDispo
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Admin Cars Dispo'), ['prefix' => 'Admin','controller' => 'CarsColorsDispo','action' => 'index'], ['class' => 'btn btn-danger']) ?></li>
<li><?= $this->Html->link(__('List Cars Years'), ['controller' => 'CarsYear', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Cars Brands'), ['controller' => 'CarsBrands', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>


<table class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('car_year_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('color_name') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($carsColorsDispo as $carsColorsDispo) : ?>
        <tr>
            <td><?= $this->Number->format($carsColorsDispo->id) ?></td>
            <td><?= $carsColorsDispo->has('cars_year') ? $this->Html->link($carsColorsDispo->cars_year->annee, ['controller' => 'CarsYear', 'action' => 'view', $carsColorsDispo->cars_year->id]) : '' ?></td>
            <td><?= h($carsColorsDispo->color_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $carsColorsDispo->id], ['title' => __('View'), 'class' => 'btn btn-secondary']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>


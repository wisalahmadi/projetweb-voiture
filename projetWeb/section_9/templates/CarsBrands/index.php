<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarsBrand[]|\Cake\Collection\CollectionInterface $carsBrands
 */
?>
<div class="carsBrands index content">
    <?= $this->Html->link(__('New Cars Brand'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cars Brands') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('car_year_id') ?></th>
                    <th><?= $this->Paginator->sort('car_color_dispo_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carsBrands as $carsBrand): ?>
                <tr>
                    <td><?= $this->Number->format($carsBrand->id) ?></td>
                    <td><?= $carsBrand->has('cars_year') ? $this->Html->link($carsBrand->cars_year->id, ['controller' => 'CarsYear', 'action' => 'view', $carsBrand->cars_year->id]) : '' ?></td>
                    <td><?= $carsBrand->has('cars_colors_dispo') ? $this->Html->link($carsBrand->cars_colors_dispo->id, ['controller' => 'CarsColorsDispo', 'action' => 'view', $carsBrand->cars_colors_dispo->id]) : '' ?></td>
                    <td><?= h($carsBrand->brand_name) ?><td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $carsBrand->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $carsBrand->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $carsBrand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carsBrand->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
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
</div>

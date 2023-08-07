<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarsYear[]|\Cake\Collection\CollectionInterface $carsYear
 */
?>
<div class="carsYear index content">
    <?= $this->Html->link(__('New Cars Year'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cars Year') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('annee') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carsYear as $carsYear): ?>
                <tr>
                    <td><?= $this->Number->format($carsYear->id) ?></td>
                    <td><?= h($carsYear->annee) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $carsYear->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $carsYear->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $carsYear->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carsYear->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Specification[]|\Cake\Collection\CollectionInterface $specifications
 */
?>
<div class="specifications index content">
    <?= $this->Html->link(__('New Specification'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Specifications') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($specifications as $specification): ?>
                <tr>
                    <td><?= $this->Number->format($specification->id) ?></td>
                    <td><?= h($specification->type) ?></td>
                    <td><?= h($specification->created) ?></td>
                    <td><?= h($specification->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $specification->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $specification->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $specification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specification->id)]) ?>
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

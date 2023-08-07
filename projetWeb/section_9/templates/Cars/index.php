<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car[]|\Cake\Collection\CollectionInterface $cars
 */
?>
<div class="cars index content">
    <?= $this->Html->link(__('New Car'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cars') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('your name') ?></th>
                    <th><?= __('image') ?></th>
                    <th><?= $this->Paginator->sort('car_brand_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('model_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cars as $car): ?>
                <tr>
                    <td><?= $car->has('user') ? $this->Html->link($car->user->name, ['controller' => 'Users', 'action' => 'view', $car->user->id]) : '' ?></td>
                    <td><?= h($car->name) ?></td>
                    <td>
                        <?php
                        if (!empty($car->files)) {
                            $file = $car->files[0];
                            echo $this->Html->image($file->path . $file->name, ['style' => 'max-width:50px;height:50px;border-radius:50%;']);
                        }
                        ?>
                    </td>
                    <td><?= h($car->car_brand_id) ?></td>
                    <td><?= h($car->created) ?></td>
                    <td><?= h($car->modified) ?></td>
                    <td><?= $car->has('model') ? $this->Html->link($car->model->name, ['controller' => 'Model', 'action' => 'view', $car->model->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link('pdf', ['action' => 'view', $car->slug . '.pdf']) ?>
                        <?= $this->Html->link(__('View'), ['action' => 'view', $car->slug]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $car->slug]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $car->id], ['confirm' => __('Are you sure you want to delete # {0}?', $car->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car $car
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Car'), ['action' => 'edit', $car->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Car'), ['action' => 'delete', $car->id], ['confirm' => __('Are you sure you want to delete # {0}?', $car->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cars'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Car'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cars view content">
            <h3><?= h($car->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User name') ?></th>
                    <td><?= $car->has('user') ? $this->Html->link($car->user->name, ['controller' => 'Users', 'action' => 'view', $car->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Your Name') ?></th>
                    <td><?= h($car->name) ?></td>
                </tr>

                <tr>
                    <th><?= __('Car Model') ?></th>
                    <td><?= $car->has('model') ? $this->Html->link($car->model->name, ['controller' => 'Model', 'action' => 'view', $car->model->id]) : '' ?></td>
                </tr>
                <tr>

                    <th><?= __('Brand') ?></th>
                    <td><?= h($car->cars_brand['brand_name']) ?></td>
                </tr >
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($car->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($car->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Specifications') ?></h4>
                <?php if (!empty($car->specifications)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($car->specifications as $specifications) : ?>
                        <tr>
                            <td><?= h($specifications->id) ?></td>
                            <td><?= h($specifications->type) ?></td>
                            <td><?= h($specifications->created) ?></td>
                            <td><?= h($specifications->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Specifications', 'action' => 'view', $specifications->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Specifications', 'action' => 'edit', $specifications->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Specifications', 'action' => 'delete', $specifications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specifications->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>

            <div class="related">
                <h4><?= __('Related Files') ?></h4>
                <?php if (!empty($car->files)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Title') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($car->files as $files) : ?>
                                <tr>
                                    <td>
                                        <?= $this->Html->image($files->path . $files->name, ['style' => 'max-width:50px;height:50px;border-radius:50%;']); ?>
                                    </td>
                                    <td><?= h($files->created) ?></td>
                                    <td><?= h($files->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Files', 'action' => 'view', $files->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Files', 'action' => 'edit', $files->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Files', 'action' => 'delete', $files->id], ['confirm' => __('Are you sure you want to delete # {0}?', $files->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>


        </div>
    </div>
</div>

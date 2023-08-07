<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car $car
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="cars view content">
            <h3><?= h($car->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User name') ?></th>
                    <td><?= $car->has('user') ? $this->Html->link($car->user->name, ['controller' => 'Users', 'action' => 'view', $car->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Car Name') ?></th>
                    <td><?= h($car->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Car Image') ?></th>
                    <td><?= @$this->Html->image('cars/' . $car->image, ['style' => 'max-width:50px;height:50px;border-radius:50%;']) ?></td>
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
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

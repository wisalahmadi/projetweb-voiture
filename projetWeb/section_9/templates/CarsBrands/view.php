<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarsBrand $carsBrand
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cars Brand'), ['action' => 'edit', $carsBrand->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cars Brand'), ['action' => 'delete', $carsBrand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carsBrand->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cars Brands'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cars Brand'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="carsBrands view content">
            <h3><?= h($carsBrand->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cars Year') ?></th>
                    <td><?= $carsBrand->has('cars_year') ? $this->Html->link($carsBrand->cars_year->annee, ['controller' => 'CarsYear', 'action' => 'view', $carsBrand->cars_year->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Disponible Car Color ') ?></th>
                    <td><?= $carsBrand->has('cars_colors_dispo') ? $this->Html->link($carsBrand->cars_colors_dispo->color_name, ['controller' => 'CarsColorsDispo', 'action' => 'view', $carsBrand->cars_colors_dispo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Brand name') ?></th>
                    <td><?= h($carsBrand->brand_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($carsBrand->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Cars') ?></h4>
                <?php if (!empty($carsBrand->cars)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Car brand Id') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($carsBrand->cars as $cars) : ?>
                        <tr>
                            <td><?= h($cars->id) ?></td>
                            <td><?= h($cars->user_id) ?></td>
                            <td><?= h($cars->car_brand_id) ?></td>
                            <td><?= h($cars->image) ?></td>
                            <td><?= h($cars->created) ?></td>
                            <td><?= h($cars->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Cars', 'action' => 'view', $cars->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Cars', 'action' => 'edit', $cars->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cars', 'action' => 'delete', $cars->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cars->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarsColorsDispo $carsColorsDispo
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('List Disponible car colors'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Cars year'), ['controller' => 'CarsColorsDispo', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Cars brands'), ['controller' => 'CarsBrands', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>


<div class="carsColorsDispo view large-9 medium-8 columns content">
    <h3><?= h($carsColorsDispo->id) ?></h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="row"><?= __('Cars Year') ?></th>
                    <td><?= $carsColorsDispo->has('cars_year') ? $this->Html->link($carsColorsDispo->cars_year->annee, ['controller' => 'CarsYear', 'action' => 'view', $carsColorsDispo->cars_year->id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Color Name') ?></th>
                    <td><?= h($carsColorsDispo->color_name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($carsColorsDispo->id) ?></td>
                </tr>
            </table>
        </div>
        <div class="related">
            <h4><?= __('Related Disponible Cars colors') ?></h4>
            <?php if (!empty($carsColorsDispo->cars_brands)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Car Year Id') ?></th>
                        <th scope="col"><?= __('Dispo Car Color Id') ?></th>
                        <th scope="col"><?= __('Color name') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($carsColorsDispo->cars_brands as $carsBrands): ?>
                    <tr>
                        <td><?= h($carsBrands->id) ?></td>
                        <td><?= h($carsBrands->car_year_id) ?></td>
                        <td><?= h($carsBrands->car_color_dispo_id) ?></td>
                        <td><?= h($carsBrands->brand_name) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'CarsBrands', 'action' => 'view', $carsBrands->id], ['class' => 'btn btn-secondary']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

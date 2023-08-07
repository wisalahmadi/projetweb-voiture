<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarsYear $carsYear
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cars Year'), ['action' => 'edit', $carsYear->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cars Year'), ['action' => 'delete', $carsYear->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carsYear->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cars Year'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cars Year'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="carsYear view content">
            <h3><?= h($carsYear->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Annee') ?></th>
                    <td><?= h($carsYear->annee) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($carsYear->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

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
            <?= $this->Html->link(__('List Cars Year'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="carsYear form content">
            <?= $this->Form->create($carYear) ?>
            <fieldset>
                <legend><?= __('Add Cars Year') ?></legend>
                <?php
                    echo $this->Form->control('annee');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

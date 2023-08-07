<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Specification $specification
 * @var \Cake\Collection\CollectionInterface|string[] $cars
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Specifications'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="specifications form content">
            <?= $this->Form->create($specification) ?>
            <fieldset>
                <legend><?= __('Add Specification') ?></legend>
                <?php
                    echo $this->Form->control('type');
                    echo $this->Form->control('cars._ids', ['options' => $cars]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

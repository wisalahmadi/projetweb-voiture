<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Specification $specification
 * @var string[]|\Cake\Collection\CollectionInterface $cars
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $specification->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $specification->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Specifications'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="specifications form content">
            <?= $this->Form->create($specification) ?>
            <fieldset>
                <legend><?= __('Edit Specification') ?></legend>
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

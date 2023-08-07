<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarsBrand $carsBrand
 * @var string[]|\Cake\Collection\CollectionInterface $carsYear
 * @var string[]|\Cake\Collection\CollectionInterface $carsColorsDispo
 */
?>
<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "CarsColorsDispo",
    "action" => "getByCarYear",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('CarsBrands/add_edit', ['block' => 'scriptBottom']);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $carsBrand->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $carsBrand->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Cars Brands'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="carsBrands form content">
            <?= $this->Form->create($carsBrand) ?>
            <fieldset>
                <legend><?= __('Edit Cars Brand') ?></legend>
                <?php
                    echo $this->Form->control('car_year_id', ['options' => $carsYear]);
                    echo $this->Form->control('car_color_dispo_id', ['options' => $carsColorsDispo]);
                    
                    echo $this->Form->control('brand_name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

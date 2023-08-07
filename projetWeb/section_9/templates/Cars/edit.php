<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car $car
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $model
 * @var string[]|\Cake\Collection\CollectionInterface $specifications
 * @var string[]|\Cake\Collection\CollectionInterface $carsBrands
 */
?>
<?php
$urlToCarsBrandsAutocompletedemoJson = $this->Url->build([
    "controller" => "CarsBrands",
    "action" => "findCarsBrands",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToCarsBrandsAutocompletedemoJson . '";', ['block' => true]);
                         
echo $this->Html->script('Cars/add_edit/carsBrandsAutocomplete', ['block' => 'scriptBottom']);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $car->slug],
                ['confirm' => __('Are you sure you want to delete # {0}?', $car->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Cars'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cars form content">
            <?= $this->Form->create($car, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Car') ?></legend>

                
                
                <div>
                    <input id="autocomplete", type="text" value="<?= $car->cars_brand->id;?>">
                </div>

                <?php
                    echo $this->Form->control('user_id', ['type' => 'hidden']);
                    echo $this->Form->control('name', ['label' => __('Your name')]);
                    echo $this->Form->control('car_brand_id', ['label' => __('Brand') . ' (' . __('Autocomplete demo') . ')', 'type' => 'text', 'id' => 'autocomplete']);
                    echo $this->Form->control('image_file', ['type' => 'file']);
                    echo $this->Form->control('model_id', ['options' => $model, 'empty' => true]);
                    echo $this->Form->control('specifications._ids', ['options' => $specifications]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

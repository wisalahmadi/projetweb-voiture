<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car $car
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $model
 * @var \Cake\Collection\CollectionInterface|string[] $specifications
 * @var \Cake\Collection\CollectionInterface|string[] $carsBrands
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
            <?= $this->Html->link(__('List Cars'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cars form content image_upload_div">
            <?= $this->Form->create($car, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Car') ?></legend>
                <?php
               
                    echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
                    echo $this->Form->control('name',['label' => 'Your name']);
//                  echo $this->Form->control('slug');
                    
                    echo $this->Form->control('car_brand_id', ['label' => 'Brand', 'type' => 'text', 'id' => 'autocomplete']);
                
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

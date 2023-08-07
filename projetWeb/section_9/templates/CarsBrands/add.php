<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarsBrand $carsBrand
 */
?>
<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js'
        ], ['block' => 'scriptLibraries']
);
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "CarsYear",
    "action" => "getCarsYear",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('CarsBrands/add_edit', ['block' => 'scriptBottom']);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cars Brands'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>

    <div class="column-responsive column-80">
        <div class="carsBrands form content" ng-app="linkedlists" ng-controller="CarsYearController">
            <?= $this->Form->create($carsBrand) ?>
            <fieldset>
                <legend><?= __('Add Cars Brand') ?></legend>
                <div>
                    <?= __('Year') . ' ' . '(car year)' ?> :
                    <select
                        name="car_year_id"
                        id="car-year-id"
                        ng-model="carYear"
                        ng-options="carYear.annee for carYear in carsYear track by carYear.id"
                        >
                        <option value=''>Select</option>
                    </select>
                </div>
                <div>
                    <?= __('Color') . ' ' . '(car color)' ?> :
                    <!-- pre ng-show='carsYear'>{{ carsYear | json }}></pre-->
                    <select
                        name="car_color_dispo_id"
                        id="car-color-dispo-id"
                        ng-disabled="!carYear"
                        ng-model="carsColorsDispo"
                        ng-options="carsColorsDispo.color_name for carsColorsDispo in carYear.cars_colors_dispo track by carsColorsDispo.id"
                        >
                        <option value=''>Select</option>
                    </select>
                </div>
              </div>
                <?php
//                    echo $this->Form->control('car_year_id', ['options' => $carsYear]);
//                    echo $this->Form->control('car_color_dispo_id', ['options' => [__('Please select a carYear first')]]);
                    echo $this->Form->control('brand_name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

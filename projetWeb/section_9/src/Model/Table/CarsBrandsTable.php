<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CarsBrands Model
 *
 * @property \App\Model\Table\CarsYearTable&\Cake\ORM\Association\BelongsTo $CarsYear
 * @property \App\Model\Table\CarsColorsDispoTable&\Cake\ORM\Association\BelongsTo $CarsColorsDispo
 *
 * @method \App\Model\Entity\CarsBrand newEmptyEntity()
 * @method \App\Model\Entity\CarsBrand newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CarsBrand[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CarsBrand get($primaryKey, $options = [])
 * @method \App\Model\Entity\CarsBrand findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CarsBrand patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CarsBrand[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CarsBrand|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CarsBrand saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CarsBrand[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CarsBrand[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CarsBrand[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CarsBrand[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CarsBrandsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('cars_brands');
        $this->setDisplayField('brand_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('CarsYear', [
            'foreignKey' => 'car_year_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('CarsColorsDispo', [
            'foreignKey' => 'car_color_dispo_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Cars', [
            'foreignKey' => 'car_brand_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('car_year_id')
            ->requirePresence('car_year_id', 'create')
            ->notEmptyString('car_year_id');

        $validator
            ->integer('car_color_dispo_id')
            ->requirePresence('car_color_dispo_id', 'create')
            ->notEmptyString('car_color_dispo_id');

        $validator
            ->scalar('brand_name')
            ->requirePresence('brand_name', 'create')
            ->notEmptyString('brand_name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('car_year_id', 'CarsYear'), ['errorField' => 'car_year_id']);
        $rules->add($rules->existsIn('car_color_dispo_id', 'CarsColorsDispo'), ['errorField' => 'car_color_dispo_id']);

        return $rules;
    }
}

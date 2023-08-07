<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CarsColorsDispo Model
 *
 * @property \App\Model\Table\CarsYearTable&\Cake\ORM\Association\BelongsTo $CarsYear
 * @property \App\Model\Table\CarsBrandsTable&\Cake\ORM\Association\HasMany $CarsBrands
 * @method \App\Model\Entity\CarsColorsDispo newEmptyEntity()
 * @method \App\Model\Entity\CarsColorsDispo newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CarsColorsDispo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CarsColorsDispo get($primaryKey, $options = [])
 * @method \App\Model\Entity\CarsColorsDispo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CarsColorsDispo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CarsColorsDispo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CarsColorsDispo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CarsColorsDispo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CarsColorsDispo[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CarsColorsDispo[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CarsColorsDispo[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CarsColorsDispo[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CarsColorsDispoTable extends Table
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

        $this->setTable('cars_colors_dispo');
        $this->setDisplayField('color_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('CarsYear', [
            'foreignKey' => 'car_year_id',
            'joinType' => 'INNER',
        ]);

        $this->hasMany('CarsBrands', [
            'foreignKey' => 'car_color_dispo_id ',
          
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');
            
        $validator
            ->integer('car_year_id')
            ->requirePresence('car_year_id', 'create')
            ->notEmptyString('car_year_id');

        $validator
            ->scalar('color_name')
            ->requirePresence('color_name', 'create')
            ->notEmptyString('color_name');

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

        return $rules;
    }
}

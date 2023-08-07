<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CarsYear Model
 * 
 * @property \App\Model\Table\CarsBrandsTable&\Cake\ORM\Association\HasMany $CarsBrands
 *@property \App\Model\Table\CarsColorsDispoTable&\Cake\ORM\Association\HasMany $CarsColorsDispo

 * @method \App\Model\Entity\CarsYear newEmptyEntity()
 * @method \App\Model\Entity\CarsYear newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CarsYear[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CarsYear get($primaryKey, $options = [])
 * @method \App\Model\Entity\CarsYear findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CarsYear patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CarsYear[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CarsYear|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CarsYear saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CarsYear[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CarsYear[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CarsYear[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CarsYear[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CarsYearTable extends Table
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

        $this->setTable('cars_year');
        $this->setDisplayField('annee');
        $this->setPrimaryKey('id');

        $this->hasMany('CarsBrands', [
            'foreignKey' => 'car_year_id  ',
        ]);
        $this->hasMany('CarsColorsDispo', [
            'foreignKey' => 'car_year_id ',
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
            ->scalar('annee')
            ->maxLength('annee', 255)
            ->requirePresence('annee', 'create')
            ->notEmptyString('annee');

        return $validator;
    }
}

<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CarsColorsDispo Controller
 *
 * @property \App\Model\Table\CarsColorsDispoTable $CarsColorsDispo
 * @method \App\Model\Entity\CarsColorsDispo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarsColorsDispoController extends AppController
{
    
    public function initialize(): void {
        parent::initialize();
        $this->viewBuilder()->setLayout('carsColorsDispoBootstrap');
    }

    public function getByCarYear() {
        $this->Authorization->skipAuthorization();
        $car_year_id = $this->request->getQuery('car_year_id');

        $carsColorsDispo = $this->CarsColorsDispo->find('all', [
            'conditions' => ['CarsColorsDispo.car_year_id' => $car_year_id],
        ]);
        $this->set('carsColorsDispo', $carsColorsDispo);
        $this->set('_serialize', ['carsColorsDispo']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['CarsYear'],
        ];
        $carsColorsDispo = $this->paginate($this->CarsColorsDispo);

        $this->set(compact('carsColorsDispo'));
    }

    /**
     * View method
     *
     * @param string|null $id Cars Colors Dispo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $carsColorsDispo = $this->CarsColorsDispo->get($id, [
            'contain' => ['CarsYear', 'CarsBrands'],
        ]);

        $this->set(compact('carsColorsDispo'));
    }
}

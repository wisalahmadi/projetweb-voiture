<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CarsBrands Controller
 *
 * @property \App\Model\Table\CarsBrandsTable $CarsBrands
 * @method \App\Model\Entity\CarsBrand[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarsBrandsController extends AppController
{      
    public function initialize(): void {
        parent::initialize();
        $this->viewBuilder()->setLayout('cakephp_default');
    }             
    public function findCarsBrands() {
        $this->Authorization->skipAuthorization();
        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->getQuery('term');
            $results = $this->CarsBrands->find('all', array(
                'conditions' => array('CarsBrands.brand_name LIKE ' => '%' . $name . '%')
            ));
           
            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['brand_name'], 'value' => $result['id']);
            }
            echo json_encode($resultArr);
        } 
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
            'contain' => ['CarsYear', 'CarsColorsDispo'],
        ];
        $carsBrands = $this->paginate($this->CarsBrands);

        $this->set(compact('carsBrands'));
    }

    /**
     * View method
     *
     * @param string|null $id Cars Brand id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $carsBrand = $this->CarsBrands->get($id, [
            'contain' => ['CarsYear', 'CarsColorsDispo'],
        ]);

        $this->set(compact('carsBrand'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $carsBrand = $this->CarsBrands->newEmptyEntity();
        if ($this->request->is('post')) {
            $carsBrand = $this->CarsBrands->patchEntity($carsBrand, $this->request->getData());
            if ($this->CarsBrands->save($carsBrand)) {
                $this->Flash->success(__('The cars brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cars brand could not be saved. Please, try again.'));
        }
        $carsYear = $this->CarsBrands->CarsYear->find('list', ['limit' => 200])->all();
        $carsColorsDispo = $this->CarsBrands->CarsColorsDispo->find('list', ['limit' => 200])->all();
        $this->set(compact('carsBrand', 'carsYear', 'carsColorsDispo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cars Brand id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $carsBrand = $this->CarsBrands->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carsBrand = $this->CarsBrands->patchEntity($carsBrand, $this->request->getData());
            if ($this->CarsBrands->save($carsBrand)) {
                $this->Flash->success(__('The cars brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cars brand could not be saved. Please, try again.'));
        }
        $carsYear = $this->CarsBrands->CarsYear->find('list', ['limit' => 200])->all();
        $carsColorsDispo = $this->CarsBrands->CarsColorsDispo->find('list', ['limit' => 200])->all();
        $this->set(compact('carsBrand', 'carsYear', 'carsColorsDispo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cars Brand id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    { $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['post', 'delete']);
        $carsBrand = $this->CarsBrands->get($id);
        if ($this->CarsBrands->delete($carsBrand)) {
            $this->Flash->success(__('The cars brand has been deleted.'));
        } else {
            $this->Flash->error(__('The cars brand could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CarsYear Controller
 *
 * @property \App\Model\Table\CarsYearTable $CarsYear
 * @method \App\Model\Entity\CarsYear[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarsYearController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event) {
        parent::beforeFilter($event);
        // for all controllers in our application, make index and view
        // actions public, skipping the authentication check
        $this->Authentication->addUnauthenticatedActions(['getCarsYear']);
    }

    public function getCarsYear() {
        $this->Authorization->skipAuthorization();
        $carsYear = $this->CarsYear->find('all',
                ['contain' => ['CarsColorsDispo']]);
        $this->set([
            'carsYear' => $carsYear,
            '_serialize' => ['carsYear']
        ]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $carsYear = $this->CarsYear->find('all')->all();
    //    $carsYear = $this->paginate($this->CarsYear);

        $this->set(compact('carsYear'));
        $this->viewBuilder()->setLayout('cakephp_default');
        $this->viewBuilder()->setOption('seralize', ['carsYear']);
    }

    public function indexBaked(){
        $this->Authorization->skipAuthorization();
        $carsYear = $this->paginate($this->CarsYear);
        $this->set(compact('carsYear'));
    }

    /**
     * View method
     *
     * @param string|null $id Cars Year id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $carYear = $this->CarsYear->get($id, [
            'contain' => ['CarsBrands', 'CarsColorsDispo'],
        ]);

        $this->set(compact('carYear'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        //$this->Authorization->authorize($carYear);
        $carYear = $this->CarsYear->newEmptyEntity();
        if ($this->request->is('post')) {
            $carYear = $this->CarsYear->patchEntity($carYear, $this->request->getData());
            if ($this->CarsYear->save($carYear)) {
                $this->Flash->success(__('The cars year has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cars year could not be saved. Please, try again.'));
        }
        $this->set(compact('carYear'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cars Year id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $carYear = $this->CarsYear->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carYear = $this->CarsYear->patchEntity($carYear, $this->request->getData());
            if ($this->CarsYear->save($carYear)) {
                $this->Flash->success(__('The cars year has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cars year could not be saved. Please, try again.'));
        }
        $this->set(compact('carYear'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cars Year id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['post', 'delete']);
        $carYear = $this->CarsYear->get($id);
        if ($this->CarsYear->delete($carYear)) {
            $this->Flash->success(__('The cars year has been deleted.'));
        } else {
            $this->Flash->error(__('The cars year could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

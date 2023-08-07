<?php
declare(strict_types=1);

namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
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
        $this->viewBuilder()->setLayout('carsColorsDispoAdminBootstrap');
    }
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['CarsYear', 'CarsBrands'],
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

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $carsColorsDispo = $this->CarsColorsDispo->newEmptyEntity();
        if ($this->request->is('post')) {
            $carsColorsDispo = $this->CarsColorsDispo->patchEntity($carsColorsDispo, $this->request->getData());
            if ($this->CarsColorsDispo->save($carsColorsDispo)) {
                $this->Flash->success(__('The cars colors dispo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cars colors dispo could not be saved. Please, try again.'));
        }
        $carsYear = $this->CarsColorsDispo->CarsYear->find('list', ['limit' => 200])->all();
        $this->set(compact('carsColorsDispo', 'carsYear'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cars Colors Dispo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $carsColorsDispo = $this->CarsColorsDispo->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carsColorsDispo = $this->CarsColorsDispo->patchEntity($carsColorsDispo, $this->request->getData());
            if ($this->CarsColorsDispo->save($carsColorsDispo)) {
                $this->Flash->success(__('The cars colors dispo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cars colors dispo could not be saved. Please, try again.'));
        }
        $carsYear = $this->CarsColorsDispo->CarsYear->find('list', ['limit' => 200])->all();
        $this->set(compact('carsColorsDispo', 'carsYear'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cars Colors Dispo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['post', 'delete']);
        $carsColorsDispo = $this->CarsColorsDispo->get($id);
        if ($this->CarsColorsDispo->delete($carsColorsDispo)) {
            $this->Flash->success(__('The cars colors dispo has been deleted.'));
        } else {
            $this->Flash->error(__('The cars colors dispo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

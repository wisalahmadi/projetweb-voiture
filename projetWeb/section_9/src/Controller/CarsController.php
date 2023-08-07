<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cars Controller
 *
 * @property \App\Model\Table\CarsTable $Cars
 * @method \App\Model\Entity\Car[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarsController extends AppController
{
    public function initialize(): void {
        parent::initialize();
        $this->viewBuilder()->setLayout('cakephp_default');
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
            'contain' => ['Users', 'Model', 'CarsBrands','Files'],
        ];
        $cars = $this->paginate($this->Cars);

        $this->set(compact('cars'));
    }

    /**
     * View method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $this->Authorization->skipAuthorization();
        $car = $this->Cars->findBySlug($slug)
            ->contain('Users')
            ->contain('Model')
            ->contain('Files')
            ->contain('Specifications')
            ->contain('CarsBrands')
            ->firstOrFail();

        $this->set(compact('car'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $car = $this->Cars->newEmptyEntity();
        $this->Authorization->authorize($car);
        if ($this->request->is('ajax')) {

        }
        if ($this->request->is('post')) {
            $car = $this->Cars->patchEntity($car, $this->request->getData());
            $car->user_id = $this->request->getAttribute('identity')->getIdentifier();

            if (!$car->getErrors) {
                $image = $this->request->getData('image_file');

                $name = $image->getClientFilename();

                $targetPath = WWW_ROOT . 'img' . DS . 'cars' . DS . $name;

                if ($name)
                    $image->moveTo($targetPath);

                $car->image = $name;
            }
            if ($this->Cars->save($car)) {
                $this->Flash->success(__('The car has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The car could not be saved. Please, try again.'));
        }
        $model = $this->Cars->Model->find('list', ['limit' => 200])->all();
        $specifications = $this->Cars->Specifications->find('list', ['limit' => 200])->all();
        $carsBrands = $this->Cars->CarsBrands->find('list', ['limit' => 200])->all();
        $this->set(compact('car', 'model', 'specifications', 'carsBrands'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($slug = null)
    {
        $car = $this->Cars->findBySlug($slug)
        ->contain('Users')
        ->contain('Model')
        ->contain('Specifications')
        ->contain('CarsBrands')
        ->firstOrFail();
        $this->Authorization->authorize($car);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $car = $this->Cars->patchEntity($car, $this->request->getData(), [
                'accessibleFields' => ['user_id' => false]
            ]);

            if ($this->Cars->save($car)) {
                $this->Flash->success(__('The car has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The car could not be saved. Please, try again.'));
        }
        $users = $this->Cars->Users->find('list', ['limit' => 200])->all();
        $model = $this->Cars->Model->find('list', ['limit' => 200])->all();
        $specifications = $this->Cars->Specifications->find('list', ['limit' => 200])->all();
        $carsBrands = $this->Cars->CarsBrands->find('list', ['limit' => 200])->all();
        $this->set(compact('car', 'users', 'model', 'specifications','carsBrands'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $car = $this->Cars->get($id);
        $this->Authorization->authorize($car);
        if ($this->Cars->delete($car)) {
            $this->Flash->success(__('The car has been deleted.'));
        } else {
            $this->Flash->error(__('The car could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

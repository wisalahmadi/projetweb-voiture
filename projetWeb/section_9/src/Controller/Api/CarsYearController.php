<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

// src/Controller/CarsYearController.php
class CarsYearController extends AppController {

    public function initialize(): void {
        parent::initialize();
        $this->Jwt->allowUnauthenticated(['index']);
        $this->Authorization->skipAuthorization();
    }

    public function index() {
//        $this->Authorization->skipAuthorization();

        $carsYear = $this->CarsYear->find('all')->all();
        $this->set('carsYear', $carsYear);
        $this->viewBuilder()->setOption('serialize', ['carsYear']);
    }

    public function view($id) {
        $carYear = $this->CarsYear->get($id);
        $this->set('carYear', $carYear);
        $this->viewBuilder()->setOption('serialize', ['carYear']);
    }

    public function add() {
        $this->request->allowMethod(['post', 'put']);
        $carYear = $this->CarsYear->newEntity($this->request->getData());
        if ($this->CarsYear->save($carYear)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'carYear' => $carYear,
        ]);
        $this->viewBuilder()->setOption('serialize', ['carYear', 'message']);
    }

    public function edit($id) {
        $this->request->allowMethod(['patch', 'post', 'put', 'get']);
        $carYear = $this->CarsYear->get($id);
        $carYear = $this->CarsYear->patchEntity($carYear, $this->request->getData());
        if ($this->CarsYear->save($carYear)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'carYear' => $carYear,
        ]);
        $this->viewBuilder()->setOption('serialize', ['carYear', 'message']);
    }

    public function delete($id) {
        $this->request->allowMethod(['delete']);
        $carYear = $this->CarsYear->get($id);
        $message = 'Deleted';
        if (!$this->CarsYear->delete($carYear)) {
            $message = 'Error';
        }
        $this->set('message', $message);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

}

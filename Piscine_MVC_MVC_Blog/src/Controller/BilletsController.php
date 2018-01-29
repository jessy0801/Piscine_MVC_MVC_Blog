<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Billets Controller
 *
 * @property \App\Model\Table\BilletsTable $Billets
 *
 * @method \App\Model\Entity\Billet[] paginate($object = null, array $settings = [])
 */
class BilletsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function index()
    {
        $billets = $this->Billets->find('all');
        //$this->set(compact('billets'));
        /*
        $this->paginate = [
            'contain' => ['Users']
        ];

        $this->set('_serialize', ['billets']);
        */
        $this->set('billets', $this->paginate($this->Billets));
        $this->set('user', $this->Auth->user('id'));
    }

    /**
     * View method
     *
     * @param string|null $id Billet id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $billet = $this->Billets->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('billet', $billet);
        $this->set('_serialize', ['billet']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $billet = $this->Billets->newEntity();
        if ($this->request->is('post')) {

            $billet = $this->Billets->patchEntity($billet, $this->request->getData());
            $billet->user_id = $this->Auth->user('id');
            if ($this->Billets->save($billet)) {
                $this->Flash->success(__('The billet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The billet could not be saved. Please, try again.'));
        }
        $users = $this->Billets->Users->find('list', ['limit' => 200]);
        $this->set(compact('billet', 'users'));
        $this->set('_serialize', ['billet']);
        // Ajout de la liste des catégories pour pouvoir choisir
        // une catégorie pour un article
        $categories = $this->Billets->Categories->find('treeList');
        $this->set(compact('categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Billet id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $billet = $this->Billets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $billet = $this->Billets->patchEntity($billet, $this->request->getData());
            if ($this->Billets->save($billet)) {
                $this->Flash->success(__('The billet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The billet could not be saved. Please, try again.'));
        }
        $users = $this->Billets->Users->find('list', ['limit' => 200]);
        $this->set(compact('billet', 'users'));
        $this->set('_serialize', ['billet']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Billet id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $billet = $this->Billets->get($id);
        if ($this->Billets->delete($billet)) {
            $this->Flash->success(__('The billet has been deleted.'));
        } else {
            $this->Flash->error(__('The billet could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

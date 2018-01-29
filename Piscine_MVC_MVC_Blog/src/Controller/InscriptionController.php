<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inscription Controller
 *
 *
 * @method \App\Model\Entity\Inscription[] paginate($object = null, array $settings = [])
 */
class InscriptionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $this->render('index');
       /* $inscription = $this->paginate($this->Inscription);

        $this->set(compact('inscription'));
        $this->set('_serialize', ['inscription']);*/
    }

    /**
     * View method
     *
     * @param string|null $id Inscription id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inscription = $this->Inscription->get($id, [
            'contain' => []
        ]);

        $this->set('inscription', $inscription);
        $this->set('_serialize', ['inscription']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inscription = $this->Inscription->newEntity();
        if ($this->request->is('post')) {
            $inscription = $this->Inscription->patchEntity($inscription, $this->request->getData());
            if ($this->Inscription->save($inscription)) {
                $this->Flash->success(__('The inscription has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inscription could not be saved. Please, try again.'));
        }
        $this->set(compact('inscription'));
        $this->set('_serialize', ['inscription']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inscription id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inscription = $this->Inscription->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inscription = $this->Inscription->patchEntity($inscription, $this->request->getData());
            if ($this->Inscription->save($inscription)) {
                $this->Flash->success(__('The inscription has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inscription could not be saved. Please, try again.'));
        }
        $this->set(compact('inscription'));
        $this->set('_serialize', ['inscription']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inscription id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inscription = $this->Inscription->get($id);
        if ($this->Inscription->delete($inscription)) {
            $this->Flash->success(__('The inscription has been deleted.'));
        } else {
            $this->Flash->error(__('The inscription could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php

namespace MakvilleMailer\Controller;

use MakvilleMailer\Controller\AppController;

/**
 * MailingListAddresses Controller
 *
 * @property \MakvilleMailer\Model\Table\MailingListAddressesTable $MailingListAddresses
 */
class MailingListAddressesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['MailingLists']
        ];
        $mailingListAddresses = $this->paginate($this->MailingListAddresses);

        $this->set(compact('mailingListAddresses'));
        $this->set('_serialize', ['mailingListAddresses']);
    }

    /**
     * View method
     *
     * @param string|null $id Mailing List Address id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $mailingListAddress = $this->MailingListAddresses->get($id, [
            'contain' => ['MailingLists']
        ]);

        $this->set('mailingListAddress', $mailingListAddress);
        $this->set('_serialize', ['mailingListAddress']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $mailingListAddress = $this->MailingListAddresses->newEmptyEntity();
        if ($this->request->is('post')) {
            $mailingListAddress = $this->MailingListAddresses->patchEntity($mailingListAddress, $this->request->data);
            if ($this->MailingListAddresses->save($mailingListAddress)) {
                $this->Flash->success(__('The mailing list address has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mailing list address could not be saved. Please, try again.'));
        }
        $mailingLists = $this->MailingListAddresses->MailingLists->find('list', ['limit' => 200]);
        $this->set(compact('mailingListAddress', 'mailingLists'));
        $this->set('_serialize', ['mailingListAddress']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mailing List Address id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $mailingListAddress = $this->MailingListAddresses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mailingListAddress = $this->MailingListAddresses->patchEntity($mailingListAddress, $this->request->data);
            if ($this->MailingListAddresses->save($mailingListAddress)) {
                $this->Flash->success(__('The mailing list address has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mailing list address could not be saved. Please, try again.'));
        }
        $mailingLists = $this->MailingListAddresses->MailingLists->find('list', ['limit' => 200]);
        $this->set(compact('mailingListAddress', 'mailingLists'));
        $this->set('_serialize', ['mailingListAddress']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mailing List Address id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $mailingListAddress = $this->MailingListAddresses->get($id);
        if ($this->MailingListAddresses->delete($mailingListAddress)) {
            $this->Flash->success(__('The mailing list address has been deleted.'));
        } else {
            $this->Flash->error(__('The mailing list address could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'mailing-lists', 'action' => 'view', $mailingListAddress->mailing_list_id]);
    }

}

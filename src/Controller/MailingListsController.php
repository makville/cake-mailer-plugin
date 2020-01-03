<?php

namespace MakvilleMailer\Controller;

use MakvilleMailer\Controller\AppController;

/**
 * MailingLists Controller
 *
 * @property \MakvilleMailer\Model\Table\MailingListsTable $MailingLists
 */
class MailingListsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $mailingLists = $this->paginate($this->MailingLists->find()->contain(['MailingListAddresses']));

        $this->set(compact('mailingLists'));
        $this->set('_serialize', ['mailingLists']);
    }

    /**
     * View method
     *
     * @param string|null $id Mailing List id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $mailingList = $this->MailingLists->get($id, [
            'contain' => ['MailingListAddresses']
        ]);

        $this->set('mailingList', $mailingList);
        $this->set('_serialize', ['mailingList']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $mailingList = $this->MailingLists->newEntity();
        if ($this->request->is('post')) {
            $data = [];
            $data['name'] = $this->request->data['name'];
            foreach ($this->request->data['emails'] as $email) {
                if ( $email ) {
                    $data['mailing_list_addresses'][]['email'] = $email;
                }
            }
            $mailingList = $this->MailingLists->patchEntity($mailingList, $data);
            if ($this->MailingLists->save($mailingList)) {
                $this->Flash->success(__('The mailing list has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mailing list could not be saved. Please, try again.'));
            }
        }
        if (\Cake\Core\Plugin::isLoaded('MakvilleAcl')) {
            $users = $this->Acl->getUsers();
        } else {
            $users = [];
        }
        $this->set(compact('mailingList', 'users'));
        $this->set('_serialize', ['mailingList']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mailing List id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $mailingList = $this->MailingLists->get($id, [
            'contain' => ['MailingListAddresses']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = [];
            $data['name'] = $this->request->data['name'];
            foreach ($this->request->data['emails'] as $email) {
                if ( $email ) {
                    $data['mailing_list_addresses'][]['email'] = $email;
                }
            }
            $mailingList = $this->MailingLists->patchEntity($mailingList, $data);
            if ($this->MailingLists->save($mailingList)) {
                $this->Flash->success(__('The mailing list has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mailing list could not be saved. Please, try again.'));
            }
        }
        $users = $this->Acl->getUsers();
        $this->set(compact('mailingList', 'users'));
        $this->set('_serialize', ['mailingList']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mailing List id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $mailingList = $this->MailingLists->get($id);
        if ($this->MailingLists->delete($mailingList)) {
            $this->Flash->success(__('The mailing list has been deleted.'));
        } else {
            $this->Flash->error(__('The mailing list could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}

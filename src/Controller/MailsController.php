<?php

namespace MakvilleMailer\Controller;

use MakvilleMailer\Controller\AppController;

/**
 * Mails Controller
 *
 * @property \MakvilleMailer\Model\Table\MailsTable $Mails
 */
class MailsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($status = 'sent') {
        $mails = $this->paginate($this->Mails->find()->where(['status' => $status]));

        $this->set(compact('mails', 'status'));
        $this->set('_serialize', ['mails']);
    }

    /**
     * View method
     *
     * @param string|null $id Mail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $mail = $this->Mails->get($id, [
            'contain' => []
        ]);
        $lists = $this->Mailer->getMailingLists();
        $this->set(compact('mail', 'lists'));
        $this->set('_serialize', ['mail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $mail = $this->Mails->newEntity();
        if ($this->request->is('post')) {
            $mail = $this->Mails->patchEntity($mail, $this->request->data);
            if ($this->Mails->save($mail)) {
                $this->Flash->success(__('The mail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mail could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('mail'));
        $this->set('_serialize', ['mail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $mail = $this->Mails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mail = $this->Mails->patchEntity($mail, $this->request->data);
            if ($this->Mails->save($mail)) {
                $this->Flash->success(__('The mail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mail could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('mail'));
        $this->set('_serialize', ['mail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $mail = $this->Mails->get($id);
        if ($this->Mails->delete($mail)) {
            $this->Flash->success(__('The mail has been deleted.'));
        } else {
            $this->Flash->error(__('The mail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function compose($id = null) {
        if (is_null($id)) {
            $mail = $this->Mails->newEntity();
        } else {
            $mail = $this->Mails->get($id);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recipients = [];
            $data = $this->request->data;
            //we need to determine the recipients first
            if (is_array($data['recipients'])) {
                foreach ($data['recipients'] as $email) {
                    if (trim($email) == '') {
                        continue;
                    }
                    $recipients[] = trim($email);
                }
            }
            //are we using mailing lists too?
            if ($data['recipient_mailing_lists']) {
                $data['recipient_mailing_lists'] = implode(',', $data['recipient_mailing_lists']);
            }
            $listIds = is_array($this->request->data('recipient_mailing_lists')) ? $this->request->data('recipient_mailing_lists') : [];
            foreach ($listIds as $listId) {
                if (is_numeric($listId)) {
                    if ($listId == 0) {
                        if (in_array('Acl', $this->components()->loaded())) {
                            $users = $this->Acl->getUsers();
                        } else {
                            $users = [];
                        }
                        foreach ($users as $user) {
                            $recipients[] = $user->email;
                        }
                    } else {
                        $list = $this->Mailer->getMailingList($listId);
                        foreach ($list->mailing_list_addresses as $email) {
                            $recipients[] = trim($email->email);
                        }
                    }
                }
            }
            $data['recipients'] = implode(',', array_unique($recipients));
            //attachments
            $attachments = [];
            if (isset($data['attachments'])) {
                foreach ($data['attachments'] as $attached) {
                    $parts = explode('|', $attached);
                    $attachment = ['filename' => $parts[0], 'filePath' => $parts[1]];
                    $attachments[] = $attachment;
                }
                $data['attachments'] = implode(',', $data['attachments']);
            }
            if (isset($data['send'])) {
                if (!$mail->isNew()) {
                    $mail = $this->Mails->newEntity();
                }
                $data['status'] = 'sent';
                $status = 'sent';
                //do the actual sending
                if (in_array('Mailgun', $this->components()->loaded())) {
                    $this->Mailgun->sendHTML(\Cake\Core\Configure::read('makville-mailer-admin-mail', 'admin@' . $this->request->host()), $data['recipients'], $data['name'], $data['content'], $attachments);
                }
            } else {
                $data['status'] = 'draft';
                $status = 'draft';
            }
            $mail = $this->Mails->patchEntity($mail, $data);
            if ($this->Mails->save($mail)) {
                return $this->redirect(['action' => 'index', $status]);
            }
        }
        $emails = in_array('Acl', $this->components()->loaded()) ? $this->Acl->getEmails() : [];
        $lists = $this->Mailer->getMailingLists();
        $this->set(compact('lists', 'mail', 'emails'));
    }

}

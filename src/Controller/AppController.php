<?php

namespace MakvilleMailer\Controller;

use App\Controller\AppController as BaseController;
use Cake\Core\Configure;

class AppController extends BaseController {

    public function initialize(): void {
        parent::initialize();
        $this->viewBuilder()->setLayout(Configure::read('makville-mailer-layout', 'admin'));
        $this->loadComponent('MakvilleMailer.Mailer');
        if (!in_array('Acl', $this->components()->loaded())) {
            if (\Cake\Core\Plugin::isLoaded('MakvilleAcl')) {
                $this->loadComponent('MakvilleAcl.Acl');
            }
        }
    }

}

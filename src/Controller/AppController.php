<?php

namespace MakvilleMailer\Controller;

use App\Controller\AppController as BaseController;
use Cake\Core\Configure;

class AppController extends BaseController {

    public function initialize() {
        parent::initialize();
        $this->viewBuilder()->setLayout(Configure::read('makville-mailer-layout', 'admin'));
        if (!in_array('Acl', $this->components()->loaded())) {
            $this->loadComponent('MakvilleMailer.Mailer');
            if (\Cake\Core\Plugin::isLoaded('MakvilleAcl')) {
                $this->loadComponent('MakvilleAcl.Acl');
            }
        }
    }

}

<?php

namespace MakvilleMailer\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController {

    public function initialize() {
        parent::initialize();
        if (!in_array('Acl', $this->components()->loaded())) {
            $this->loadComponent('MakvilleMailer.Mailer');
            if (\Cake\Core\Plugin::isLoaded('MakvilleAcl')) {
                $this->loadComponent('MakvilleAcl.Acl');
            }
        }
    }

}

<?php

namespace MakvilleMailer\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController {
    
    public function initialize() {
        parent::initialize();
        $this->loadComponent('MakvilleMailer.Mailer');
        if(\Cake\Core\Plugin::isLoaded('MakvilleAcl')) {
            $this->loadComponent('MakvilleAcl.Acl');
        }
    }
}

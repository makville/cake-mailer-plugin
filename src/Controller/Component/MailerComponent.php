<?php

namespace MakvilleMailer\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;

/**
 * Mail component
 */
class MailerComponent extends Component {

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function getMailingLists() {
        $table = TableRegistry::get('Mail.MailingLists');
        $lists = $table->find('list')->toArray();
        $lists[0] = 'All members';
        ksort($lists);
        return $lists;
    }
    
    public function getMailingList($id) {
        $table = TableRegistry::get('Mail.MailingLists');
        return $table->get($id, ['contain' => ['MailingListAddresses']]);
    }
}

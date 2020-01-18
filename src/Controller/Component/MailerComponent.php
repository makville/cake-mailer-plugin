<?php

namespace MakvilleMailer\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\Locator\TableLocator;

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
    
    /**
     *
     * @var Cake\ORM\Locator\TableLocator
     */
    private $locator;
    
    private $mailingListTable;

    public function initialize(array $config): void {
        parent::initialize($config);
        $this->locator = new TableLocator();
        $config = $this->locator->exists('MakvilleMailer.MailingLists') ? [] : ['className' => 'MakvilleMailer\Model\Table\MailingListsTable'];
        $this->mailingListTable = $this->locator->get('MakvilleMailer.MailingLists', $config);
    }
    
    public function getMailingLists() {
        $lists = $this->mailingListTable->find('list')->toArray();
        $lists[0] = 'All members';
        ksort($lists);
        return $lists;
    }
    
    public function getMailingList($id) {
        return $this->mailingListTable->get($id, ['contain' => ['MailingListAddresses']]);
    }
}

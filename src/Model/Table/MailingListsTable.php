<?php

namespace MakvilleMailer\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MailingLists Model
 *
 * @property \Cake\ORM\Association\HasMany $MailingListAddresses
 *
 * @method \MakvilleMailer\Model\Entity\MailingList get($primaryKey, $options = [])
 * @method \MakvilleMailer\Model\Entity\MailingList newEntity($data = null, array $options = [])
 * @method \MakvilleMailer\Model\Entity\MailingList[] newEntities(array $data, array $options = [])
 * @method \MakvilleMailer\Model\Entity\MailingList|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakvilleMailer\Model\Entity\MailingList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MakvilleMailer\Model\Entity\MailingList[] patchEntities($entities, array $data, array $options = [])
 * @method \MakvilleMailer\Model\Entity\MailingList findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MailingListsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('mailing_lists');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('MailingListAddresses', [
            'foreignKey' => 'mailing_list_id',
            'className' => 'MakvilleMailer.MailingListAddresses',
            'saveStrategy' => 'replace'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->allowEmpty('name');

        $validator
                ->allowEmpty('description');

        return $validator;
    }

}

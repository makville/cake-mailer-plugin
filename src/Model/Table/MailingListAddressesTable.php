<?php

namespace MakvilleMailer\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MailingListAddresses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MailingLists
 *
 * @method \MakvilleMailer\Model\Entity\MailingListAddress get($primaryKey, $options = [])
 * @method \MakvilleMailer\Model\Entity\MailingListAddress newEntity($data = null, array $options = [])
 * @method \MakvilleMailer\Model\Entity\MailingListAddress[] newEntities(array $data, array $options = [])
 * @method \MakvilleMailer\Model\Entity\MailingListAddress|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakvilleMailer\Model\Entity\MailingListAddress patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MakvilleMailer\Model\Entity\MailingListAddress[] patchEntities($entities, array $data, array $options = [])
 * @method \MakvilleMailer\Model\Entity\MailingListAddress findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MailingListAddressesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('mailing_list_addresses');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MailingLists', [
            'foreignKey' => 'mailing_list_id',
            'className' => 'Mail.MailingLists'
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
                ->email('email')
                ->allowEmpty('email');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['mailing_list_id'], 'MailingLists'));

        return $rules;
    }

}

<?php

namespace MakvilleMailer\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mails Model
 *
 * @method \MakvilleMailer\Model\Entity\Mail get($primaryKey, $options = [])
 * @method \MakvilleMailer\Model\Entity\Mail newEntity($data = null, array $options = [])
 * @method \MakvilleMailer\Model\Entity\Mail[] newEntities(array $data, array $options = [])
 * @method \MakvilleMailer\Model\Entity\Mail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakvilleMailer\Model\Entity\Mail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MakvilleMailer\Model\Entity\Mail[] patchEntities($entities, array $data, array $options = [])
 * @method \MakvilleMailer\Model\Entity\Mail findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MailsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('mails');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->allowEmpty('title');

        $validator
                ->allowEmpty('content');

        $validator
                ->allowEmpty('attachments');

        $validator
                ->allowEmpty('recipients');

        $validator
                ->allowEmpty('recipient_mailing_lists');

        $validator
                ->allowEmpty('status');

        return $validator;
    }

}

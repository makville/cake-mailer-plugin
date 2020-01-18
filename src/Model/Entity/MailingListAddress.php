<?php
namespace MakvilleAcl\Model\Entity;

use Cake\ORM\Entity;

/**
 * MailingListAddress Entity
 *
 * @property int $id
 * @property int $mailing_list_id
 * @property string $email
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \Mail\Model\Entity\MailingList $mailing_list
 */
class MailingListAddress extends Entity
{

    /**
     * Fields that can be mass assigned using newEmptyEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}

<?php
namespace MakvilleMailer\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mail Entity
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $attachments
 * @property string $recipients
 * @property string $recipient_mailing_lists
 * @property string $status
 * @property \Cake\I18n\Time $created
 */
class Mail extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
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

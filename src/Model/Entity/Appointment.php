<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Appointment Entity
 *
 * @property int $id
 * @property string $beauty_care_service
 * @property string $appointment_name
 * @property string|null $appointment_phone
 * @property string|null $appointment_email
 * @property \Cake\I18n\FrozenTime $appointment_datetime
 * @property string|null $appointment_comment
 * @property string|null $appointment_address
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Appointment extends Entity
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
        'beauty_care_service' => true,
        'appointment_name' => true,
        'appointment_phone' => true,
        'appointment_email' => true,
        'appointment_datetime' => true,
        'appointment_comment' => true,
        'appointment_address' => true,
        'user_id' => true,
        'user' => true,
    ];
}

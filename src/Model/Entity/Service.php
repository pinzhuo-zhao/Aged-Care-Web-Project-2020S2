<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Service Entity
 *
 * @property int $service_id
 * @property string $service_type
 * @property string $service_charge
 */
class Service extends Entity
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
        'service_type' => true,
        'service_charge' => true,
    ];
}

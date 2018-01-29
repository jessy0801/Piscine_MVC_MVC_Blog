<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property \Cake\I18n\FrozenDate $birthdate
 * @property string $login
 * @property string $password
 * @property string $email
 * @property \Cake\I18n\FrozenTime $date_inscrit
 */
class User extends Entity
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
    /*protected $_accessible = [
        'name' => true,
        'lastname' => true,
        'birthdate' => true,
        'login' => true,
        'password' => true,
        'email' => true,
        'date_inscrit' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    /*protected $_hidden = [
        'password'
    ];*/
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
    protected function _setPassword($password){
        return (new DefaultPasswordHasher)->hash($password);
    }
}

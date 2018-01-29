<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Billet Entity
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $id_user
 * @property string $tags
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Billet extends Entity
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
        'title' => true,
        'body' => true,
        'user_id' => true,
        'category_id' => true,
        'tags' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property int $points
 * @property string $role
 * @property bool $active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Game[] $games
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
    protected $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'username' => true,
        'email' => true,
        'password' => true,
        'points' => true,
        'role' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'games' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    // Criptação de Senha
    protected function _setPassword($password){
        if (!empty($password)){
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($password);
        }
        else{
            $id_user = $this->_properties['id'];
            $user = TableRegistry::get('Users')->recoverPassword($id_user);
            return $user;
        }
    }
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity
 *
 * @property int $id
 * @property string $description
 * @property string $alternative01
 * @property string $alternative02
 * @property string $alternative03
 * @property string $alternative04
 * @property string $correct
 * @property string $difficulty
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $questioncategory_id
 *
 * @property \App\Model\Entity\Questioncategory $questioncategory
 */
class Question extends Entity
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
        'description' => true,
        'alternative01' => true,
        'alternative02' => true,
        'alternative03' => true,
        'alternative04' => true,
        'correct' => true,
        'difficulty' => true,
        'created' => true,
        'modified' => true,
        'questioncategory_id' => true,
        'questioncategory' => true
    ];
}

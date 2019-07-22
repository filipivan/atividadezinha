<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questions Model
 *
 * @property \App\Model\Table\QuestioncategoriesTable|\Cake\ORM\Association\BelongsTo $Questioncategories
 *
 * @method \App\Model\Entity\Question get($primaryKey, $options = [])
 * @method \App\Model\Entity\Question newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Question[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Question|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Question patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Question[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Question findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuestionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('questions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Questioncategories', [
            'foreignKey' => 'questioncategory_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('alternative01')
            ->maxLength('alternative01', 100)
            ->requirePresence('alternative01', 'create')
            ->notEmpty('alternative01');

        $validator
            ->scalar('alternative02')
            ->maxLength('alternative02', 100)
            ->requirePresence('alternative02', 'create')
            ->notEmpty('alternative02');

        $validator
            ->scalar('alternative03')
            ->maxLength('alternative03', 100)
            ->requirePresence('alternative03', 'create')
            ->notEmpty('alternative03');

        $validator
            ->scalar('alternative04')
            ->maxLength('alternative04', 100)
            ->requirePresence('alternative04', 'create')
            ->notEmpty('alternative04');

        $validator
            ->scalar('correct')
            ->maxLength('correct', 100)
            ->requirePresence('correct', 'create')
            ->notEmpty('correct');

        $validator
            ->scalar('difficulty')
            ->requirePresence('difficulty', 'create')
            ->notEmpty('difficulty');

        $validator
            ->add(
                'confirm_password',
                'compareWith',[
                    'rule' => ['compareWith', 'password'],
                    'message' => 'As Senhas Não Conferem'
                ]
            );

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules){
        $rules->add($rules->existsIn(['questioncategory_id'], 'Questioncategories'));
        return $rules;
    }
}

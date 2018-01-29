<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Billets Model
 *
 * @method \App\Model\Entity\Billet get($primaryKey, $options = [])
 * @method \App\Model\Entity\Billet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Billet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Billet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Billet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Billet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Billet findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BilletsTable extends Table
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

        $this->setTable('billets');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
        /*$this->addAssociations([
            'belongsTo' => [
                'Users' => ['className' => 'App\Model\Table\UsersTable']
            ],
            'hasMany' => ['Comments'],
            'belongsToMany' => ['Tags']
        ]);*/
        //$this->addBehavior('Timestamp');
        $this->hasMany('Users', [
            'foreignKey' => 'id'

        ]);
        $this->addBehavior('Timestamp');
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
        ]);

       /* $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);*/
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
            ->notEmpty('title')
            ->requirePresence('title')
            ->notEmpty('body')
            ->requirePresence('body')
            ->notEmpty('tags')
            ->requirePresence('tags');

        return $validator;
    }
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}

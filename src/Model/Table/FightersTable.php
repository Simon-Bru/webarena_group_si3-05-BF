<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fighters Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Players
 * @property |\Cake\ORM\Association\BelongsTo $Guilds
 * @property |\Cake\ORM\Association\HasMany $Messages
 *
 * @method \App\Model\Entity\Fighter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fighter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fighter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fighter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fighter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fighter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fighter findOrCreate($search, callable $callback = null, $options = [])
 */
class FightersTable extends Table
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

        $this->setTable('fighters');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Players', [
            'foreignKey' => 'player_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Guilds', [
            'foreignKey' => 'guild_id'
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'fighter_id'
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
            ->allowEmpty('id', 'create')
            ->notEmpty('id', 'Id must be specified on update', 'update');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('coordinate_x')
            ->allowEmpty('coordinate_x');

        $validator
            ->integer('coordinate_y')
            ->allowEmpty('coordinate_y');

        $validator
            ->integer('level')
            ->allowEmpty('level');

        $validator
            ->integer('xp')
            ->allowEmpty('xp');

        $validator
            ->integer('skill_sight')
            ->allowEmpty('skill_sight');

        $validator
            ->integer('skill_strength')
            ->allowEmpty('skill_strength');

        $validator
            ->integer('skill_health')
            ->allowEmpty('skill_health');

        $validator
            ->integer('current_health')
            ->allowEmpty('current_health');

        $validator
            ->dateTime('next_action_time')
            ->allowEmpty('next_action_time');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['player_id'], 'Players'));
        $rules->add($rules->existsIn(['guild_id'], 'Guilds'));

        return $rules;
    }

    public function shows($id){
        $allow=false;
        $temp=$this->get($id);
        if(($temp->xp)/4 == 1){
            $allow=true;
        }
        return $allow;
    }
    public function moreSight($id){
        $temp=$this->get($id);
        $temp->skill_sight++;
        $temp->level++;
        $temp->xp=0;
        $this->save($temp);

    }
    public function moreHealth($id){
        $temp=$this->get($id);
        $temp->skill_health++;
        $temp->level++;
        $temp->xp=0;
        $this->save($temp);
    }
    public function moreStrength($id){
        $temp=$this->get($id);
        $temp->skill_strength++;
        $temp->level++;
        $temp->xp=0;
        $this->save($temp);
    }

    public function remove($id){
        $allow=false;
        $temp=$this->get($id);
        if($temp->current_health==0) {
            $this->delete($temp);
            $allow=true;
        }
        return $allow;
    }


}

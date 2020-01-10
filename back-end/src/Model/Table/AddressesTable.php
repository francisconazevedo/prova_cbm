<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Addresses Model
 *
 * @method \App\Model\Entity\Address get($primaryKey, $options = [])
 * @method \App\Model\Entity\Address newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Address[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Address|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Address|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Address patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Address[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Address findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AddressesTable extends Table
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

        $this->setTable('addresses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('cep')
            ->maxLength('cep', 10)
            ->requirePresence('cep', 'create')
            ->notEmpty('cep')
            ->add('cep', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('logradouro')
            ->maxLength('logradouro', 45)
            ->allowEmpty('logradouro');

        $validator
            ->scalar('complemento')
            ->maxLength('complemento', 45)
            ->allowEmpty('complemento');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 45)
            ->allowEmpty('bairro');

        $validator
            ->scalar('localidade')
            ->maxLength('localidade', 45)
            ->allowEmpty('localidade');

        $validator
            ->scalar('uf')
            ->maxLength('uf', 45)
            ->allowEmpty('uf');

        $validator
            ->scalar('unidade')
            ->maxLength('unidade', 45)
            ->allowEmpty('unidade');

        $validator
            ->integer('ibge')
            ->allowEmpty('ibge');

        $validator
            ->integer('gia')
            ->allowEmpty('gia');

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
        $rules->add($rules->isUnique(['cep']));

        return $rules;
    }
}

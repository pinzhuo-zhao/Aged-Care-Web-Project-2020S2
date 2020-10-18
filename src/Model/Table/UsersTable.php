<?php
/**
 * Created by PhpStorm.
 * User: angga
 * Date: 22/08/2018
 * Time: 4:18 PM
 */
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{


    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->hasMany('Appointments');
    }
    public function validationDefault(Validator $validator)
    {


        return $validator
            ->integer('id')
            ->allowEmpty('id', 'create')
            ->requirePresence('email', 'create')
            ->notEmpty('email', 'An email address is required')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'])
            ->notEmpty('password', 'A password is required')
            ->add('password', [
                'length' => [
                    'rule' => ['minLength', 8],
                    'message' => 'Passwords must be at least 8 characters long.',
                ]
            ])
            ->requirePresence('confirm_password', 'create')
            ->notEmpty('confirm_password')
            ->allowEmpty('confirm_password', 'update')
            ->add('confirm_password', 'compareWith', [
                'rule' => ['compareWith', 'password'],
                'message' => 'Passwords do not match.'
            ]);








        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 20)
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->scalar('surname')
            ->maxLength('surname', 20)
            ->requirePresence('surname', 'create')
            ->notEmpty('surname');



        return $validator;

    }

    public function validationUpdate_profile(Validator $validator)
    {
        $validator

            ->notEmpty('first_name')
            ->notEmpty('surname')
            ->notEmpty('email', 'An email address is required');

        return $validator;
    }

    public function validationBooking(Validator $validator)
    {

        $validator->add('accept_terms', 'custom', [
            'rule' => [$this, 'AcceptTerm'],
            'message' => 'You must agreed Term and Condition'
        ]);
        return $validator;
    }
    //make function
    public function AcceptTerm($value,$context){
        if($context['data']['accept_terms']==1)
            return true;
        else
            return false;
    }


}

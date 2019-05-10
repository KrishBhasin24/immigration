<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Rule\IsUnique;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

use Cake\ORM\Association;

class UsersTable extends Table
{
        public function initialize(array $config)
    {     

        $this->belongsTo('Departments');
        $this->belongsTo('Companies');
        //$this->hasMany('Permissions');
        $this->hasMany('Permissions');
           
    }

    public function beforeSave(){
      
    }

    public function validationDefault(Validator $validator)
    {
	 return $validator;
    }
	
	
}
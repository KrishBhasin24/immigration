<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Rule\IsUnique;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

//use Cake\ORM\Entity;
//use Cake\Auth\DefaultPasswordHasher;

class LeadPaymentsTable extends Table
{
    public function initialize(array $config)
    {       
          $this->belongsTo('Leads');
    }
    public function beforeSave(){
      
    }
    public function validationDefault(Validator $validator)
    {
	     return $validator;
    }
	
	
}
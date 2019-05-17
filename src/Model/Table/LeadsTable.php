<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Rule\IsUnique;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

//use Cake\ORM\Entity;
//use Cake\Auth\DefaultPasswordHasher;

class LeadsTable extends Table
{
    public function initialize(array $config)
    {       
          $this->hasOne('AccountLeads');
          $this->belongsTo('LeadStatus');
          $this->belongsTo('Categories');
          $this->belongsTo('SubCategories');
          $this->hasOne('LeadPayments');
    }
    public function beforeSave(){
      
    }
    public function validationDefault(Validator $validator)
    {
	     return $validator;
    }
}
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

        //$this->hasMany('Leads')->setForeignKey(['processingAgent_id']);

        $this->hasMany('Filling', [
            'foreignKey' => 'processingAgent_id',
            'className' => 'Leads'
        ]);

        $this->hasMany('Lead', [
            'foreignKey' => 'agent_id',
            'className' => 'Leads'
        ]);

        $this->hasMany('Retain', [
            'foreignKey' => 'retainer_id',
            'className' => 'Leads'
        ]);
           
    }

    public function beforeSave(){
      
    }

    public function validationDefault(Validator $validator)
    {
	 return $validator;
    }
	
	
}/*Intel Smart Sound Technology driver*/
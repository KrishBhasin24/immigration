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
            $this->hasMany('LeadPayments');
            $this->hasMany('LeadRefunds');
            $this->hasOne('LeadCharges');
            $this->hasMany('LeadPaymentPlans');

            /*$this->belongsTo('Retainer', [
                'foreignKey' => 'retainer_id',
                'className' => 'Users'
            ]);*/
            //$this->belongsTo('Users',['foreignKey' => ['retainer_id']]);


            $this->belongsTo('Lead', [
                'foreignKey' => 'agent_id',
                'joinType' => 'LEFT',
                'className' => 'Users'
            ]);

            $this->belongsTo('Retain', [
                'foreignKey' => 'retainer_id',
                'joinType' => 'LEFT',
                'className' => 'Users'
            ]);

            $this->belongsTo('Filling', [
                'foreignKey' => 'processingAgent_id',
                'joinType' => 'LEFT',
                'className' => 'Users'
            ]);

            $this->hasOne('LeadDocuments');


    }
    public function beforeSave(){
      
    }
    public function validationDefault(Validator $validator)
    {
	     return $validator;
    }
}
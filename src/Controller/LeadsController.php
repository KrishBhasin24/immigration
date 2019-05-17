<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Utility\Security;
use Cake\Event\Event;

class LeadsController extends AppController
{
	public function initialize()
    {
        parent::initialize();
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
   	}

   	public function getStaff(){
   		$this->loadModel('Users');

   		$user = $this->Users->find('all')->Where(['department_id NOT IN' => [2, 4, 5]])->contain('Companies');

     // $user = $this->Users->find('all', ['conditions' => ["NOT IN" => ["Users.department_id" => [2, 4, 5] ] ] ])->contain('Companies');
      return($user->toArray());
   	}

    public function addLead($leadData = array(), $status){
        try{
            $leadData['lead_status_id'] = $status;
            $leadTable = TableRegistry::get('Leads');
            $lead = $leadTable->newEntity();
            $lead = $leadTable->patchEntity($lead, $leadData);
            $end = $leadTable->save($lead);
            return $end;
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function editLead($leadData = array(),$id=null){
        try{
          $LeadTable = TableRegistry::get('Leads');
          $detail = $LeadTable->get($id);
          $LeadTable->patchEntity($detail, $leadData);
          $result = $LeadTable->save($detail);
          return $result;
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getInitLeadByUserId($id = null){
      $this->loadModel('Leads');
      $lead = $this->Leads->find('all')->where(['agent_id' => $id,'lead_status_id IN'=>[1,2]])->contain(['Categories','SubCategories','LeadStatus']);
      return($lead->toArray());
    }
    public function getLeadByUserId($id = null){
      $this->loadModel('Leads');
      $lead = $this->Leads->find('all')->where(['agent_id' => $id])->contain(['Categories','SubCategories','LeadStatus']);
      return($lead->toArray());
    }

    public function getLeadById($id = null){
      $this->loadModel('Leads');
      $lead = $this->Leads->find('all')->where(['Leads.id' => $id])->contain(['Categories','SubCategories','AccountLeads']);
      return($lead->toArray());
    }

    public function retainLead($fileData = array()){
      $this->loadModel('AccountLeads');
      $AccTable = TableRegistry::get('AccountLeads');
      $acc = $AccTable->newEntity();
      $AccTable->patchEntity($acc, $fileData);
      $entry = $AccTable->save($acc);
      return($entry);
    }

    public function getRemarksByLeadId($id = null){
        $this->loadModel('Remarks');
        $remarks = $this->Remarks->find('all')->where(['lead_id'=>$id])->order(['Remarks.id' => 'DESC'])->contain('Users')->toArray(); 
        return($remarks);
    }

    public function addRemarks(){
      if($this->Auth->user()){
        if($this->request->is('ajax')){
            
            $remarksData = $this->request->data();
            
            $RemarkTable = TableRegistry::get('Remarks');
            $remarks = $RemarkTable->newEntity();
            $RemarkTable->patchEntity($remarks, $remarksData);
            $result = $RemarkTable->save($remarks);

            
            $all_remarks = $this->getRemarksByLeadId($remarksData['lead_id']);
            echo json_encode($all_remarks);
            
            
        }
      }
      die;
    }

    public function leadAssignToCaseprocessing(){
      if($this->Auth->user()){
        if($this->request->is('ajax')){
            
            $rawData = $this->request->data();
            $leadTable = TableRegistry::get('Leads');
            $lead = $leadTable->get($rawData['lead_id']);
            
            $assignData = $lead->toArray();
            $assignData['processingAgent_id'] = $rawData['user_id'];
            $assignData['lead_status_id'] = 3;
            
            $leadTable->patchEntity($lead, $assignData);
            $leadTable->save($lead);
        }
      }
      die;
    }


}
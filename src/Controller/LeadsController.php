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

    public function addClient($clientData = array()){
        $clientInfo = array();
        $clientInfo['first_name'] = $clientData['first_name'];
        $clientInfo['last_name'] = $clientData['last_name'];
        $clientInfo['password'] = $this->passwordHasher($clientData['last_name']); 
        $clientInfo['email'] = $clientData['email'];
        $clientInfo['address'] = $clientData['address'];
        $clientInfo['phone'] = $clientData['telephone'];
        $clientInfo['city'] = $clientData['city'];
        $clientInfo['province'] = $clientData['province'];
        $clientInfo['postal_code'] = $clientData['postal_code'];
        $clientInfo['country'] = $clientData['country'];
        $clientInfo['role'] = 'client';

        $userTable = TableRegistry::get('Users');
        $user = $userTable->newEntity();
        $user = $userTable->patchEntity($user, $clientInfo);
        $info = $userTable->save($user);
        return $info;
    }

    public function editClient($leadData = array()){
        try{
          
          $UserTable = TableRegistry::get('Users');
          $client_data = $UserTable->find('all')->where(['email'=>$leadData['email']])->toArray();
          
          //pr($client_data);die;
          $clientInfo['first_name'] = $leadData['first_name'];
          $clientInfo['last_name'] = $leadData['last_name'];
          $clientInfo['email'] = $leadData['email'];
          $clientInfo['address'] = $leadData['address'];
          $clientInfo['phone'] = $leadData['telephone'];
          $clientInfo['city'] = $leadData['city'];
          $clientInfo['province'] = $leadData['province'];
          $clientInfo['postal_code'] = $leadData['postal_code'];
          $clientInfo['country'] = $leadData['country'];

          $user_info = $UserTable->get($client_data[0]->id);
          $UserTable->patchEntity($user_info, $clientInfo);
          $UserTable->save($user_info);
          
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function addLead($leadData = array(), $status){
        try{
            $clientData = $this->addClient($leadData);
            $leadData['client_id'] = $clientData->id;
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
            //$this->editClient($leadData);
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

    public function getInitLeadByUserId($id = null,$access = null){
      $this->loadModel('Leads');
      if($access == 'retain'){
        $lead = $this->Leads->find('all')->where(['lead_status_id IN'=>[1,2],'OR' => [['retainer_id' => $id], ['agent_id' => $id]]])->order(['Leads.id'=> 'DESC'])->contain(['Retain','Lead','Categories','SubCategories','LeadStatus']);  
      }
      elseif($access == 'full'){
        $lead = $this->Leads->find('all')->where(['lead_status_id IN'=>[1,2]])->order(['Leads.id'=> 'DESC'])->contain(['Retain','Lead','Categories','SubCategories','LeadStatus']);  
      }
      
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

    public function getClientRemarksByLeadId($id = null){
        $this->loadModel('ClientRemarks');
        $remarks = $this->ClientRemarks->find('all')->where(['lead_id'=>$id])->order(['ClientRemarks.id' => 'DESC'])->contain('Users')->toArray(); 
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

    public function addClientRemarks(){
      if($this->Auth->user()){
        if($this->request->is('ajax')){
            
            $remarksData = $this->request->data();
            
            $RemarkTable = TableRegistry::get('ClientRemarks');
            $remarks = $RemarkTable->newEntity();
            $RemarkTable->patchEntity($remarks, $remarksData);
            $result = $RemarkTable->save($remarks);

            
            $all_remarks = $this->getClientRemarksByLeadId($remarksData['lead_id']);
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
            $assignData['status_changed_date'] = date('Y-m-d');
            $leadTable->patchEntity($lead, $assignData);
            $leadTable->save($lead);
        }
      }
      die;
    }

    public function leadPaymentBalance($id = null){
      
          $this->loadModel('Leads');
          $leadDetail = $this->Leads->find('all')->where(['id'=> $id])->toArray();

          $this->loadModel('LeadPayments');
          $totalPaid = 0;
          $payment_val = $this->LeadPayments->find('all',['fields'=>['current_payment']])->where(['Lead_id'=> $id])->toArray();
          foreach ($payment_val as $value) {
              $totalPaid = $totalPaid + $value['current_payment']; 
          }
          
          $this->loadModel('LeadRefunds');
          $totalRefund = 0;
          $payment_ref = $this->LeadRefunds->find('all',['fields'=>['refund_payment']])->where(['Lead_id'=> $id])->toArray();
          foreach ($payment_ref as $value) {
              $totalRefund = $totalRefund + $value['refund_payment']; 
          }
          
          $balance = ( $leadDetail[0]['amount_payable'] - $totalPaid ) + $totalRefund ;
          return $balance;
    }

    public function changeLeadStatus(){
      if($this->Auth->user()){
        if($this->request->is('ajax')){
          try{
            $rawData = $this->request->data();
            $leadTable = TableRegistry::get('Leads');
            $lead = $leadTable->get($rawData['lead_id']);
            $assignData = $lead->toArray();
            $assignData['lead_status_id'] = $rawData['lead_status_id'];
            $assignData['status_changed_date'] = date('Y-m-d');
            $leadTable->patchEntity($lead, $assignData);
            $leadTable->save($lead);
          }
          catch (Exception $e) {
            echo $e->getMessage();
          }
        }
      }
      die;
    }

    public function addCicDetail(){
      if($this->Auth->user()){
        if($this->request->is('ajax')){
          try{
            $rawData = $this->request->data();
            $AccountleadTable = TableRegistry::get('AccountLeads');
            $account = $AccountleadTable->get($rawData['file_id']);
            $assignData = $account->toArray();
            $assignData['cic_file_id'] = $rawData['file_no'];
            $assignData['cic_file_date'] = $rawData['date'];
            $AccountleadTable->patchEntity($account, $assignData);
            $AccountleadTable->save($account);
          }
          catch (Exception $e) {
            echo $e->getMessage();
          }
        }
      }
      die;
    }

    public function addClientDocument(){
      if($this->Auth->user()){
        if($this->request->is('ajax')){
          try{
            $rawData = $this->request->data();
            $LeadDocumentsTable = TableRegistry::get('LeadDocuments');
            $leadDocument = $LeadDocumentsTable->find('all')->where(['lead_id'=>$rawData['lead_id']])->toArray();
            
            if (count($leadDocument) < 1){
              $document = $LeadDocumentsTable->newEntity();
            }
            else{
              $document = $leadDocument[0]; /*array('id'=>$leadDocument[0]->id,'lead_id'=>$leadDocument[0]->lead_id,'document_need'=>$rawData['document_need']);*/
            }

            if ($this->request->is(['post','put'])) {
              $LeadDocumentsTable->patchEntity($document, $this->request->data);
              $LeadDocumentsTable->save($document);
            }
          }
          catch (Exception $e) {
            echo $e->getMessage();
          }
        }
      }
      die;
    }

    public function delClientDocument(){
      if($this->Auth->user()){
        if($this->request->is('ajax')){
          try{
            $rawData = $this->request->data();
            $LeadDocumentsTable = TableRegistry::get('LeadDocuments');
            $leadDocument = $LeadDocumentsTable->find('all')->where(['lead_id'=>$rawData['lead_id']])->toArray();
            $LeadDocumentsTable->delete($leadDocument[0]);
          }
          catch (Exception $e) {
            echo $e->getMessage();
          }
        }
      }
      die;
    }


}
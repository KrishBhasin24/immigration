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
use Cake\View\Helper;


class AdminsController extends AppController
{
	public function initialize()
    {
        parent::initialize();

    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->setlayout('admin');
        $key_data = array();
        
    }

    public function admin_dash(){
        //$key_data['loggedInUser']= $this->Auth->user();
        $this->loadModel('Leads');
        $this->loadModel('Users');
        $this->loadModel('LeadPayments');
        $this->loadModel('LeadRefunds');
        $this->loadModel('Links');
        $case = $this->Leads->find('all')->where(['MONTH(created_at)' => date('n'),'YEAR(created_at)'=> date('Y'),'NOT'=> ['lead_status_id' =>'1']]);
        $case_count['total_case'] = $case->count();
        $case_count['un_processed'] = 0;
        $case_count['filed'] = 0;
        $case_count['approved'] = 0;
        $case_count['in_process'] = 0;
        foreach($case->toArray() as $records){
            $rec = $records->toArray();
            if($rec['lead_status_id'] == 2 || $rec['lead_status_id'] == 3 ||$rec['lead_status_id'] == 4 || $rec['lead_status_id'] == 5 || $rec['lead_status_id'] == 9 ){
                $case_count['un_processed'] = $case_count['un_processed'] + 1; 
            } 
            elseif($rec['lead_status_id'] == 6){
               $case_count['filed'] =  $case_count['filed'] + 1;
            }
            elseif($rec['lead_status_id'] == 10){
                $case_count['approved'] =  $case_count['approved'] + 1;
            }
            elseif($rec['lead_status_id'] == 11){
                $case_count['in_process'] = $case_count['in_process'] + 1;
            }
        }
        $payment_records = $this->LeadPayments->find('all',['fields'=>['current_payment']])->where(['MONTH(payment_date)' => date('n'),'YEAR(payment_date)'=> date('Y')])->toArray();
        $total_payment = 0;
        foreach ($payment_records as $payment_value) {
            $payment_value = $payment_value->toArray();
            $total_payment = $total_payment + $payment_value['current_payment'];
        }
        $refund_records = $this->LeadRefunds->find('all',['fields'=>['refund_payment']])->where(['MONTH(payment_date)' => date('n'),'YEAR(payment_date)'=> date('Y')])->toArray();
            $total_refund = 0;
        foreach ($refund_records as $refund_value) {
            $refund_value = $refund_value->toArray();
            $total_refund = $total_refund + $refund_value['refund_payment'];
        }
        $total_transection = $total_payment + $total_refund ;
        $user_info = $this->Users->find('all')->order(['Users.id'=> 'DESC'])->where(['Users.role' => 'staff','Users.department_id' => 6])->contain(['AccountLeads'=>['conditions'=>['MONTH(retain_date)' => date('n'),'YEAR(retain_date)'=> date('Y')]]])->toArray();

        $admin_data['link'] = $this->Links->find('all')->toArray(); 

        $admin_data['case_count'] = $case_count;
        $admin_data['total_payment'] = $total_payment;
        $admin_data['total_refund'] = $total_refund;
        $admin_data['total_transection'] = $total_transection;
        $admin_data['user_info'] = $user_info;
        return $admin_data;
    }

    public function marketing_dash(){
        $key_data['loggedInUser']= $this->Auth->user();
        $this->loadModel('Leads');
        $this->loadModel('Links');
        $case = $this->Leads->find('all')->where(['MONTH(created_at)' => date('n'),'YEAR(created_at)'=> date('Y'),'retainer_id'=> $key_data['loggedInUser']['id'] ])->contain(['LeadPayments','LeadRefunds']);
        $case_count['total_case'] = $case->count();
        $case_count['un_processed'] = 0;
        $case_count['filed'] = 0;
        $case_count['approved'] = 0;
        $case_count['in_process'] = 0;
        $total_payment = 0;
        $total_refund = 0;
        foreach($case->toArray() as $records){
            $rec = $records->toArray();

            if($rec['lead_status_id'] == 2 || $rec['lead_status_id'] == 3 ||$rec['lead_status_id'] == 4 || $rec['lead_status_id'] == 5 || $rec['lead_status_id'] == 9  ){
                $case_count['un_processed'] = $case_count['un_processed'] + 1; 
            } 
            elseif($rec['lead_status_id'] == 6){
               $case_count['filed'] =  $case_count['filed'] + 1;
            }
            elseif($rec['lead_status_id'] == 10){
                $case_count['approved'] =  $case_count['approved'] + 1;
            }
            elseif($rec['lead_status_id'] == 11){
                $case_count['in_process'] = $case_count['in_process'] + 1;
            }

            if( $rec['lead_payments']){
                foreach ($rec['lead_payments'] as $payment_value) {
                    $total_payment = $total_payment + $payment_value['current_payment'];
                }
            }

            if( $rec['lead_refunds']){
                foreach ($rec['lead_refunds'] as $refund_value) {
                    $total_refund = $total_refund + $refund_value['refund_payment'];
                }
            }
         }

        $total_transection = $total_payment + $total_refund ;
        $marketing_data['link'] = $this->Links->find('all')->where(['display_to IN' =>['All','Staff']])->toArray(); 
         
        $marketing_data['total_payment'] = $total_payment;
        $marketing_data['total_refund'] = $total_refund;
        $marketing_data['total_transection'] = $total_transection;
        $marketing_data['case_count'] = $case_count;
        return $marketing_data;
    }

    public function case_dash(){
        $key_data['loggedInUser']= $this->Auth->user();
        $this->loadModel('Leads');
        $this->loadModel('Links');
        $case = $this->Leads->find('all')->where(['MONTH(created_at)' => date('n'),'YEAR(created_at)'=> date('Y'),'processingAgent_id'=> $key_data['loggedInUser']['id'] ]);

        $case_count['total_case'] = $case->count();
        $case_count['un_processed'] = 0;
        $case_count['filed'] = 0;
        $case_count['approved'] = 0;
        $case_count['in_process'] = 0;
        foreach($case->toArray() as $records){
            $rec = $records->toArray();
            if($rec['lead_status_id'] == 3 ||$rec['lead_status_id'] == 4 || $rec['lead_status_id'] == 5 || $rec['lead_status_id'] == 9 ){
                $case_count['un_processed'] = $case_count['un_processed'] + 1; 
            } 
            elseif($rec['lead_status_id'] == 6){
               $case_count['filed'] =  $case_count['filed'] + 1;
            }
            elseif($rec['lead_status_id'] == 10){
                $case_count['approved'] =  $case_count['approved'] + 1;
            }
            elseif($rec['lead_status_id'] == 11){
                $case_count['in_process'] = $case_count['in_process'] + 1;
            }
        }
        $case_data['link'] = $this->Links->find('all')->where(['display_to IN' =>['All','Staff']])->toArray(); 
        $case_data['case_count'] = $case_count;
        return $case_data;
    }

    public function account_dash(){
        $key_data['loggedInUser']= $this->Auth->user();
        $this->loadModel('Leads');
        $this->loadModel('Links');
        $case = $this->Leads->find('all')->where(['MONTH(created_at)' => date('n'),'YEAR(created_at)'=> date('Y')])->contain(['LeadPayments','LeadRefunds']);
        $case_count['total_case'] = $case->count();
        $case_count['un_processed'] = 0;
        $case_count['filed'] = 0;
        $case_count['approved'] = 0;
        $case_count['in_process'] = 0;
        $total_payment = 0;
        $total_refund = 0;
        foreach($case->toArray() as $records){
            $rec = $records->toArray();
            if($rec['lead_status_id'] == 2 || $rec['lead_status_id'] == 3 ||$rec['lead_status_id'] == 4 || $rec['lead_status_id'] == 5 || $rec['lead_status_id'] == 9  ){
                $case_count['un_processed'] = $case_count['un_processed'] + 1; 
            } 
            elseif($rec['lead_status_id'] == 6){
               $case_count['filed'] =  $case_count['filed'] + 1;
            }
            elseif($rec['lead_status_id'] == 10){
                $case_count['approved'] =  $case_count['approved'] + 1;
            }
            elseif($rec['lead_status_id'] == 11){
                $case_count['in_process'] = $case_count['in_process'] + 1;
            }

            if( $rec['lead_payments']){
                foreach ($rec['lead_payments'] as $payment_value) {
                    $total_payment = $total_payment + $payment_value['current_payment'];
                }
            }

            if( $rec['lead_refunds']){
                foreach ($rec['lead_refunds'] as $refund_value) {
                    $total_refund = $total_refund + $refund_value['refund_payment'];
                }
            }
         }

        $total_transection = $total_payment + $total_refund ;
        $account_data['link'] = $this->Links->find('all')->where(['display_to IN' =>['All','Staff']])->toArray(); 
         
        $account_data['total_payment'] = $total_payment;
        $account_data['total_refund'] = $total_refund;
        $account_data['total_transection'] = $total_transection;
        $account_data['case_count'] = $case_count;
        return $account_data;
    }

    public function customer_dash(){
        $key_data['loggedInUser']= $this->Auth->user();
        $this->loadModel('Leads');
        $this->loadModel('Links');
        $this->loadModel('Users');
        $case = $this->Leads->find('all')->where(['MONTH(created_at)' => date('n'),'YEAR(created_at)'=> date('Y'),'NOT'=> ['lead_status_id' =>'1']]);
        $case_count['total_case'] = $case->count();
        $case_count['un_processed'] = 0;
        $case_count['filed'] = 0;
        $case_count['approved'] = 0;
        $case_count['in_process'] = 0;
        foreach($case->toArray() as $records){
            $rec = $records->toArray();
            if($rec['lead_status_id'] == 2 || $rec['lead_status_id'] == 3 ||$rec['lead_status_id'] == 4 || $rec['lead_status_id'] == 5 || $rec['lead_status_id'] == 9  ){
                $case_count['un_processed'] = $case_count['un_processed'] + 1; 
            } 
            elseif($rec['lead_status_id'] == 6){
               $case_count['filed'] =  $case_count['filed'] + 1;
            }
            elseif($rec['lead_status_id'] == 10){
                $case_count['approved'] =  $case_count['approved'] + 1;
            }
            elseif($rec['lead_status_id'] == 11){
                $case_count['in_process'] = $case_count['in_process'] + 1;
            }
        }
        $user_info = $this->Users->find('all')->order(['Users.id'=> 'DESC'])->where(['Users.role' => 'staff','Users.department_id' => 2])->contain(['Filling'=>['conditions'=>['MONTH(created_at)' => date('n'),'YEAR(created_at)'=> date('Y')]]])->toArray();
        $customer_data['link'] = $this->Links->find('all')->where(['display_to IN' =>['All','Staff']])->toArray(); 
        $customer_data['case_count'] = $case_count;
        $customer_data['user_info'] = $user_info;
        return $customer_data;
    }

    public function assessment_dash(){
        $key_data['loggedInUser']= $this->Auth->user();
        $this->loadModel('Leads');
        $this->loadModel('Links');
        $case = $this->Leads->find('all')->where(['MONTH(created_at)' => date('n'),'YEAR(created_at)'=> date('Y')]);
        $case_count['total_case'] = $case->count();
        $case_count['un_processed'] = 0;
        $case_count['filed'] = 0;
        $case_count['approved'] = 0;
        $case_count['in_process'] = 0;
        foreach($case->toArray() as $records){
            $rec = $records->toArray();
            if($rec['lead_status_id'] == 3 ||$rec['lead_status_id'] == 4 || $rec['lead_status_id'] == 5 || $rec['lead_status_id'] == 9 ){
                $case_count['un_processed'] = $case_count['un_processed'] + 1; 
            } 
            elseif($rec['lead_status_id'] == 6){
               $case_count['filed'] =  $case_count['filed'] + 1;
            }
            elseif($rec['lead_status_id'] == 10){
                $case_count['approved'] =  $case_count['approved'] + 1;
            }
            elseif($rec['lead_status_id'] == 11){
                $case_count['in_process'] = $case_count['in_process'] + 1;
            }
        }
        $assessment_data['link'] = $this->Links->find('all')->where(['display_to IN' =>['All','Staff']])->toArray(); 
        $assessment_data['case_count'] = $case_count;
        return $assessment_data;
    }


    public function dashboard(){
        $key_data['loggedInUser']= $this->Auth->user();
        if($key_data['loggedInUser']['department_id'] == 1){
            $key_data['admin_data'] = $this->admin_dash();
        }
        else if($key_data['loggedInUser']['department_id'] == 2 ){
            $key_data['case_data'] = $this->case_dash();
        }
        else if($key_data['loggedInUser']['department_id'] == 3 ){
           $key_data['customer_data'] = $this->customer_dash(); 
        }
        else if($key_data['loggedInUser']['department_id'] == 4 ){
            $key_data['account_data'] = $this->account_dash();
        }
        else if($key_data['loggedInUser']['department_id'] == 5 ){
            $key_data['assessment_data'] = $this->assessment_dash();
        }
        else if($key_data['loggedInUser']['department_id'] == 6 ){
            $key_data['marketing_data'] = $this->marketing_dash();
        }
        $this->set('key_data', $key_data);
    }

    public function getCountryList(){
        $this->loadModel('Countries');
        return $this->Countries->find('all')->order(['name'=>'ASC'])->toArray(); 
    }

    public function getAllCompanies(){
        $key_data['loggedInUser']= $this->Auth->user();
        $user = new UsersController();

        $key_data['company'] = $user->getAllCompany('parent');
        $key_data['company_count'] = count($key_data['company']);
        $key_data['branch'] = $user->getAllCompany('branch');
        $key_data['branch_count'] = count($key_data['branch']);
        $key_data['Countries'] = $this->getCountryList();
        $this->set('key_data',$key_data);
    }


     public function editCompany($id=null)
    {
         $key_data['loggedInUser']= $this->Auth->user();
        
         try{
                $this->loadModel('Companies');
                $company_data = $this->Companies->get($id); 
                $key_data['Company_data'] = $company_data;
                $key_data['Countries'] = $this->getCountryList();
                if ($this->request->is(['post','put'])) { 

                    $this->Companies->patchEntity($company_data, $this->request->data);
                    if($this->Companies->save($company_data)){
                    $this->Flash->success(__('Company info Modified'));
                    return $this->redirect(['controller' => 'Admins', 'action' => 'getAllCompanies']);
                    }


                }
                
               
                $companies_rqst = $this->Companies->find('all');    
                $key_data['all_company_data'] = $companies_rqst->toArray();
                $this->set('key_data',$key_data);
            }catch (Exception $e) {
                echo $e->getMessage();
        }
    }


    public function getAllStaff(){
        $key_data['loggedInUser']= $this->Auth->user();
        $user = new UsersController();
        $key_data['staff'] = $user->getAllUser('staff');
        $key_data['staff_count'] = count($key_data['staff']);

        $this->loadModel('Companies');
        $this->loadModel('Departments');
        
        $key_data['Countries'] = $this->getCountryList();
        $key_data['companies'] = $this->Companies->find('all')->toArray();  
        $key_data['department'] = $this->Departments->find('all')->toArray();  
        
        $this->set('key_data',$key_data);
    }

    public function addStaff(){
        
        if ($this->request->is('post')) {
            $data = $this->request->data();
            $user = new UsersController();
            $this->loadModel('Users');
            $exist = $this->Users->find('all')->where(['email' => $data['email']])->toArray();
            //echo "<pre>";pr($exist);die;
            if($exist){
            	$this->Flash->error(__('Email Id Already Exist. Please Use Unique Email Id'));
                return $this->redirect(['controller'=>'Admins','action' => 'getAllStaff']);  
            }
            else{
            	if($register = $user->addStaff($data,'staff')){
                    $this->Flash->success(__('Staff Data Added'));
                    return $this->redirect(['controller'=>'Admins','action' => 'getAllStaff']);
                }
            }
            
            
        }
	}

    public function editStaff($id=null)
    {
        $key_data['loggedInUser']= $this->Auth->user();
        $this->loadModel('Users');
        try{
                $key_data['userData'] = $this->Users->get($id);   
                $key_data['Countries'] = $this->getCountryList();
                $this->loadModel('Companies');
                $this->loadModel('Departments');
                $companies_rqst = $this->Companies->find('all');  
                $department_rqst = $this->Departments->find('all');  
                $key_data['companies'] = $companies_rqst->toArray();
                $key_data['department'] = $department_rqst->toArray();
                if ($this->request->is(['post','put'])) {

                   // pr($this->request->data);die;

                    $this->Users->patchEntity($key_data['userData'] , $this->request->data);
                    if($this->Users->save($key_data['userData'] )){
                        $this->Flash->success(__('Staff info Modified'));
                        return $this->redirect(['controller' => 'Admins', 'action' => 'getAllStaff']);
                    }
                }
                $this->set('key_data',  $key_data);
        }catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function setPermission($id=null){

        $key_data['loggedInUser']= $this->Auth->user();
        $this->loadModel('Users');
        $user_data = $this->Users->find('all')->where(['Users.id'=>$id])->contain(['Departments','Permissions'])->first();
        $user_record = $user_data->toArray();
        $key_data['user_data'] = $user_record;
        $condition = "Pages.".$key_data['user_data']['department']['handle'];
        $this->loadModel('Menus');
        $key_data['page_data'] = $this->Menus->find('all')->order(['Menus.menu_order'=> 'ASC'])->contain(['Pages'=>['conditions'=>[$condition=>1]]])->toArray();
        $permission_data = array();
        foreach ($key_data['user_data']['permissions'] as $value) {
            $permission_data[] = $value['handle'];
        }
        $key_data['permission_data'] =$permission_data; 
        if ($this->request->is(['post','put'])) {
            $user = new UsersController();
            if($permission = $user->userPermission($this->request->data(),$key_data['user_data']) ){
                $this->Flash->success(__('User Permission has been Edited.'));
                return $this->redirect(['controller'=>'Admins','action' => 'setPermission',$id]);
            }

            //echo "<pre>";print_r($this->request->data());
        }

        $this->set('key_data',$key_data);

        
    }

    public function addCompany(){
       if ($this->request->is('post')) {
            $data = $this->request->data();
            $user = new UsersController();
            
            if($register = $user->addCompany($data,'staff')){
                $this->Flash->success(__('Company Data Added'));
                return $this->redirect(['controller'=>'Admins','action' => 'getAllCompanies']);
            }
        }
    }


    public function getImmStatus(){
        $key_data['loggedInUser']= $this->Auth->user();
        
        $this->loadModel('Departments');
        $department = $this->Departments->find('all');   
        $key_data['department'] = $department->toArray();

        $this->loadModel('LeadStatus');
        $status_data = $this->LeadStatus->find('all')->contain('Departments');   
        $key_data['status_data'] = $status_data->toArray();
        $key_data['status_count'] = count($key_data['status_data']);
        $this->set('key_data',$key_data);
    }

    public function changeLeadStatus($id=null){
        $key_data['loggedInUser']= $this->Auth->user();

        $statusTable = TableRegistry::get('LeadStatus');
        if ($id == null){
          $status = $statusTable->newEntity();
        }
        else{
             $status = $statusTable->get($id);

             $key_data['leadStatus'] = $status;
        }
        if ($this->request->is(['post','put'])) { 
            $statusTable->patchEntity($status, $this->request->data);
            if($statusTable->save($status)){
                $this->Flash->success(__('Status Added or Modified'));
                return $this->redirect(['controller' => 'Admins', 'action' => 'getLeadStatus']);
            }
        }

         $this->loadModel('Departments');
        $department = $this->Departments->find('all');   
        $key_data['department'] = $department->toArray();

        $this->set('key_data',$key_data);
       
    }

    public function getLink(){
        $key_data['loggedInUser']= $this->Auth->user();
        $this->loadModel('Links');
        $link_data = $this->Links->find('all');   
        $key_data['link_data'] = $link_data->toArray();
        $key_data['link_count'] = count($key_data['link_data']);
        $this->set('key_data',$key_data);
    }

    public function changeLink($id = null){
        $key_data['loggedInUser'] = $this->Auth->user();

        $linkTable = TableRegistry::get('Links');
        if ($id == null){
            $link = $linkTable->newEntity();
        }
        else{
             $link = $linkTable->get($id);

             $key_data['link_data'] = $link;
        }
        if ($this->request->is(['post','put'])) { 
            $linkTable->patchEntity($link, $this->request->data);
            if($linkTable->save($link)){
                $this->Flash->success(__('Link Added or Modified'));
                return $this->redirect(['controller' => 'Admins', 'action' => 'getLink']);
            }
        }

        $this->loadModel('Departments');
        $department = $this->Departments->find('all');   
        $key_data['department'] = $department->toArray();

        $this->set('key_data',$key_data);
    }

    public function getCategory(){
        $key_data['loggedInUser'] = $this->Auth->user();
        $user = new UsersController();
        $result = $user->getCat();
        $subcat_result = $user->getSubCat();
        
        $key_data['cat_count'] = count($result);
        $key_data['cat_list'] = $result;

        $key_data['subcat_count'] = count($subcat_result);
        $key_data['subcat_list'] = $subcat_result;
        $this->set('key_data',$key_data);
    }

    public function changeCategory($id = null){
        $key_data['loggedInUser'] = $this->Auth->user();

        $CatTable = TableRegistry::get('Categories');
        if ($id == null){
            $cat = $CatTable->newEntity();
        }
        else{
            $cat = $CatTable->get($id);
            $key_data['cat_list'] = $cat;
        }
        if ($this->request->is(['post','put'])) { 
            $CatTable->patchEntity($cat, $this->request->data);
            if($CatTable->save($cat)){
                $this->Flash->success(__('Category Added or Modified'));
                return $this->redirect(['controller' => 'Admins', 'action' => 'getCategory']);
            }
        }
        $this->set('key_data',$key_data);
    }


    public function changeSubCategory($id = null){
        $key_data['loggedInUser'] = $this->Auth->user();

        $user = new UsersController();
        $result = $user->getCat();
        $key_data['cat_list'] = $result;

        $SubCatTable = TableRegistry::get('SubCategories');
        if ($id == null){
            $subcat = $SubCatTable->newEntity();
        }
        else{
            $subcat = $SubCatTable->get($id);
            $key_data['subcat_list'] = $subcat;
        }
        if ($this->request->is(['post','put'])) { 


            $SubCatTable->patchEntity($subcat, $this->request->data);
            //pr($this->request->data);die;

            if($SubCatTable->save($subcat)){
                $this->Flash->success(__('Sub Category Added or Modified'));
                return $this->redirect(['controller' => 'Admins', 'action' => 'getCategory']);
            }
        }
        $this->set('key_data',$key_data);
    }



    /*public function getAgent()
    {
        $key_data['loggedInUser'] = $this->Auth->user();
        $lead = new LeadsController();
        $result = $lead->getStaff();
        $key_data['agent_count'] = count($result);
        $key_data['agent_list'] = $result;
        $this->set('key_data',$key_data);
    }*/


    public function addLead(){
        $key_data['loggedInUser'] = $this->Auth->user();

        /*if($key_data['loggedInUser']['role'] == 'admin'){
              $lead = new LeadsController();
              $result = $lead->getStaff();
              $key_data['agent_list'] = $result;
        }*/


        if ($this->request->is('post')) {
            $data = $this->request->data();
           // pr($data);die;
            $lead = new LeadsController();
            if($added = $lead->addLead($data,1)){
                $this->Flash->success(__('Lead Added Sucessfully'));
                return $this->redirect(['controller'=>'Admins','action' => 'getLead']);
            }
        }
        

        $this->loadModel('Categories');
        $key_data['category'] = $this->Categories->find('all')->toArray(); 
        $key_data['Countries'] = $this->getCountryList();
        $key_data['loggedInUser'] = $this->Auth->user();
        $this->set('key_data',$key_data);   
    }

    public function getLead(){
        $key_data['loggedInUser'] = $this->Auth->user();
        $lead = new LeadsController();
        if($key_data['loggedInUser']['department']['id'] == 1 || $key_data['loggedInUser']['department']['id'] == 6 ){
            $result = $lead->getInitLeadByUserId($key_data['loggedInUser']['id'],'retain');
        }
        else{
            $result = $lead->getInitLeadByUserId($key_data['loggedInUser']['id'],'full');
        }


        //pr($result);die;

        $key_data['my_lead_count'] = count($result);
        $key_data['lead_list'] = $result;
        $this->set('key_data',$key_data); 
    }

    public function getAllLead(){
        $key_data['loggedInUser'] = $this->Auth->user();
        $this->loadModel('Leads');

        if($key_data['loggedInUser']['department']['id'] == 6 ){
            $key_data['all_lead'] = $this->Leads->find('all')->where(['Leads.retainer_id' => $key_data['loggedInUser']['id'] ])->contain(['Retain','Lead','Categories','SubCategories','LeadStatus','LeadPaymentPlans','AccountLeads'])->toArray(); 
        }
        elseif($key_data['loggedInUser']['department']['id'] == 1 || $key_data['loggedInUser']['department']['id'] == 3){
            $key_data['all_lead'] = $this->Leads->find('all')->contain(['Retain','Lead','Categories','SubCategories','LeadStatus','LeadPaymentPlans','AccountLeads'])->toArray();    
        }

        else{
            $this->Flash->error(__('You Dont have permission for this page'));
            return $this->redirect(['controller'=>'Admins','action' => 'getLead']);
        }

       // pr($key_data);die;
        
        $key_data['all_lead_count'] = count($key_data['all_lead']);
        $this->set('key_data',$key_data); 
    }

    public function editLead($id=null){

        $key_data['loggedInUser'] = $this->Auth->user();
        $lead = new LeadsController();
        $notification = new NotificationsController();
        $result = $lead->getLeadById($id);
        $notified = 0;
        $this->loadModel('Leads');
        $key_data['lead_data'] = $result[0]; 

        $key_data['Remarks'] = $lead->getRemarksByLeadId($id);
        
        $this->loadModel('Categories');
        $key_data['category'] = $this->Categories->find('all')->toArray(); 

        $this->loadModel('SubCategories');
        $key_data['subcat'] = $this->SubCategories->find('all')->toArray(); 

        $key_data['Countries'] = $this->getCountryList();
        
        $staff_list = $lead->getStaff();
        $key_data['staff_list'] = $staff_list;

        if ($this->request->is(['post','put'])) {
            $data = $this->request->data();
            /*pr($data);die;*/
            if (array_key_exists('contract_signed',$data)){
                if($data['contract_signed'] == 1){
					$data['lead_status_id'] = 2;
                    $data['status_changed_date'] = date('Y-m-d');
                    $file['lead_id'] = $id;
                    $file['retainer_id'] = $data['retainer_id'];
                    $filedetail = $lead->retainLead($file);    
                    $notified = 1;
                }
            }

            if($added = $lead->editLead($data,$id)){
				if($notified == 1){
                    $this->loadModel('Users');
                    $retainer_data = $this->Users->get($data['retainer_id'])->toArray();
                    
                    $message_data = array_merge($data,$filedetail->toArray());
                    $message_data['retainer_info'] = $retainer_data;
                    $message_data['category_info'] = $this->Categories->get($data['category_id'])->toArray();
                    $message_data['sub_category'] = $this->SubCategories->get($data['sub_category_id'])->toArray();
                    $notification->retain($message_data);
            	}
                $this->Flash->success(__('Lead Updated Sucessfully'));
                return $this->redirect(['controller'=>'Admins','action' => 'getLead']);
            }
        }   
        $this->set('key_data',$key_data); 
    }

    public function caseAssign($id = null){
        $key_data['loggedInUser'] = $this->Auth->user();
            
        $lead = new LeadsController();
        $result = $lead->getLeadById($id);
        $key_data['lead_info'] = $result[0]; 

        $this->loadModel('Users');
        $this->loadModel('Leads');
        $key_data['user_list'] = $this->Users->find('all')->Where(['department_id'=>'2','active'=>1])->toArray(); 


        foreach ($key_data['user_list'] as $user) {
            $user['assigned']  = count ($this->Leads->find('all')->where(['processingAgent_id'=>$user['id'],'lead_status_id '=>3])->toArray() );
            $user['in_progress'] = count ( $this->Leads->find('all')->where(['processingAgent_id'=>$user['id'],'lead_status_id '=>11])->toArray() );
        }


        
        $this->set('key_data',$key_data); 
    }

    public function caseReAssign($id = null){
        $key_data['loggedInUser'] = $this->Auth->user();
            
        $lead = new LeadsController();
        $result = $lead->getLeadById($id);
        $key_data['lead_info'] = $result[0]; 

        $this->loadModel('Users');
        $this->loadModel('Leads');
        $key_data['user_list'] = $this->Users->find('all')->Where(['department_id'=>'2'])->toArray(); 


        foreach ($key_data['user_list'] as $user) {
            $user['assigned']  = count ($this->Leads->find('all')->where(['processingAgent_id'=>$user['id'],'lead_status_id '=>3])->toArray() );
            $user['in_progress'] = count ( $this->Leads->find('all')->where(['processingAgent_id'=>$user['id'],'lead_status_id '=>11])->toArray() );
        }
        $this->set('key_data',$key_data); 
    }

    public function accountLead(){
        $key_data['loggedInUser'] = $this->Auth->user();

       // pr($key_data['loggedInUser']['id']);die;
        $this->loadModel('Leads');
        if($key_data['loggedInUser']['department']['id'] == 6 ){
            $key_data['accountLeads'] = $this->Leads->find('all')->where(['NOT'=> ['Leads.lead_status_id' =>'1'],'Leads.retainer_id'=>$key_data['loggedInUser']['id']])->order(['Leads.id'=> 'DESC'])->contain(['LeadStatus','Categories','SubCategories','AccountLeads','Retain'])->toArray();      
        }
        else{
            $key_data['accountLeads'] = $this->Leads->find('all')->where(['NOT'=> ['Leads.lead_status_id' =>'1']])->order(['Leads.id'=> 'DESC'])->contain(['LeadStatus','Categories','SubCategories','AccountLeads','Retain'])->toArray();      
        }
        $this->set('key_data',$key_data); 
    }


    public function manageReceipt($id=null){
        $this->loadModel('Leads');
        $this->loadModel('LeadPayments');
        $this->loadModel('LeadRefunds');
        $this->loadModel('LeadCharges');

        $key_data['loggedInUser'] = $this->Auth->user();
        $leadDetail = $this->Leads->find('all')->where(['Leads.id' => $id ])->order(['Leads.id'=> 'DESC'])->contain(['LeadStatus','Categories','SubCategories','AccountLeads','Retain','LeadPayments','LeadStatus'])->toArray();       
        $key_data['leadDetail'] = $leadDetail[0]->toArray();

        $key_data['leadPayment'] = $this->LeadPayments->find('all')->where(['lead_id'=>$id])->toArray();
        $key_data['leadRefund'] = $this->LeadRefunds->find('all')->where(['lead_id'=>$id])->toArray();

        $lead = new LeadsController();
        $key_data['balance'] = $lead->leadPaymentBalance($id);

        $leadCharge = $this->LeadCharges->find('all')->where(['lead_id'=>$id])->toArray();
        if(!empty($leadCharge)){
            $leadCharge = $leadCharge[0];
        }
        else{
            $leadCharge = array('admin_charges'=>0,'gov_fee'=>0,'case_processing_fee'=>0,'misc_fee'=>0,'consultation_fee'=>0);
        }

        //pr($leadCharge);die;
        $total = 0;
        if($key_data['leadDetail']['lead_status']['lead_status'] == 'Case Filed'){
            $total =  $total + $leadCharge['consultation_fee'];
            $refundable = array('Consultation Fees'=>$leadCharge['consultation_fee']);
            $nonRefundable = array('Government Fees'=>$leadCharge['gov_fee'],'Case Processing Fees'=>$leadCharge['case_processing_fee'],'Misc Charges'=>$leadCharge['misc_fee'],'Administration Fees'=>$leadCharge['admin_charges']);
        }
        else{
            $total = $total+$leadCharge['gov_fee']+$leadCharge['case_processing_fee']+$leadCharge['misc_fee']+$leadCharge['consultation_fee'];
            $refundable = array('Government Fees'=>$leadCharge['gov_fee'],'Case Processing Fees'=>$leadCharge['case_processing_fee'],'Misc Charges'=>$leadCharge['misc_fee'],'Consultation Fees'=>$leadCharge['consultation_fee']);
            
            $nonRefundable = array('Administration Fees'=>$leadCharge['admin_charges']);
        }

        $key_data['refund_total']= $total;
        $key_data['refundable']= $refundable;
        $key_data['nonRefundable']= $nonRefundable;

        //pr($key_data);die;
        /*pr($key_data['leadDetail']['lead_status']['lead_status']);
        pr($leadCharge);die;*/

        $this->set('key_data',$key_data);  
        /*pr($key_data['leadDetail']);
        die;*/
    }

    


    public function changeReceipt($id=null){
        $key_data['loggedInUser'] = $this->Auth->user();
        $paymentTable = TableRegistry::get('LeadPayments');
        $lead_id = $this->request->data('lead_id');
        if ($id == null){
            $receipt = $paymentTable->newEntity();
        }
        else{
            $receipt = $paymentTable->get($id);
            $key_data['receipt'] = $receipt;
        }

        if ($this->request->is(['post','put'])) {
            $paymentTable->patchEntity($receipt, $this->request->data);
            if($paymentTable->save($receipt)){
                $this->Flash->success(__('Receipt Added or Modified'));
                return $this->redirect(['controller' => 'Admins', 'action' => 'manageReceipt',$lead_id]);
            }
        }
        //pr($this->request->data());die;
        $this->set('key_data',$key_data);  
    }

    public function changeRefund($id=null){
        $key_data['loggedInUser'] = $this->Auth->user();
        $paymentTable = TableRegistry::get('LeadRefunds');
        $lead_id = $this->request->data('lead_id');
        if ($id == null){
            $receipt = $paymentTable->newEntity();
        }
        else{
            $receipt = $paymentTable->get($id);
            $key_data['refund'] = $receipt;
        }

        if ($this->request->is(['post','put'])) {
            $paymentTable->patchEntity($receipt, $this->request->data);
            if($paymentTable->save($receipt)){
                $this->Flash->success(__('Refund Added or Modified'));
                return $this->redirect(['controller' => 'Admins', 'action' => 'manageReceipt',$lead_id]);
            }
        }
        //pr($this->request->data());die;
        $this->set('key_data',$key_data);  
    }

     public function manageCase(){
        $key_data['loggedInUser'] = $this->Auth->user();
        $this->loadModel('Leads');
        if($key_data['loggedInUser']['department']['id'] == 2 ){
            $key_data['leadDetail'] = $this->Leads->find('all')->where(['Leads.processingAgent_id' => $key_data['loggedInUser']['id'],'NOT'=> ['Leads.lead_status_id IN' =>[1,2]]])->order(['Leads.id' => 'DESC'])->contain(['Retain','Lead','Filling','Categories','SubCategories','AccountLeads','LeadStatus'])->toArray();        
        }
        elseif($key_data['loggedInUser']['department']['id'] == 6){
            $key_data['leadDetail'] = $this->Leads->find('all')->where(['Leads.retainer_id' => $key_data['loggedInUser']['id'],'NOT'=> ['Leads.lead_status_id IN' =>[1,2]]])->order(['Leads.id' => 'DESC'])->contain(['Retain','Lead','Filling','Categories','SubCategories','AccountLeads','LeadStatus'])->toArray();           
        }
        elseif($key_data['loggedInUser']['department']['id'] == 5){
            $key_data['leadDetail'] = $this->Leads->find('all')->where(['Leads.lead_status_id' => 4 ])->order(['Leads.id' => 'DESC'])->contain(['Retain','Lead','Filling','Categories','SubCategories','AccountLeads','LeadStatus'])->toArray();      
        }

        else{
            $key_data['leadDetail'] = $this->Leads->find('all')->where(['NOT'=> ['Leads.lead_status_id IN' =>[1,2]]])->order(['Leads.id' => 'DESC'])->contain(['Retain','Lead','Filling','Categories','SubCategories','AccountLeads','LeadStatus'])->toArray();
        }
        
        $this->set('key_data',$key_data);  
    }

    public function manageAllCase(){
        $key_data['loggedInUser'] = $this->Auth->user();
        $this->loadModel('Leads');
        $key_data['leadDetail'] = $this->Leads->find('all')->where(['NOT'=> ['Leads.lead_status_id IN' =>[1,2]]])->order(['Leads.id' => 'DESC'])->contain(['Retain','Lead','Filling','Categories','SubCategories','AccountLeads','LeadStatus'])->toArray();
        $this->set('key_data',$key_data);  
    }

    public function manageRemarks($id=null){
        $key_data['loggedInUser'] = $this->Auth->user();
        $key_data['lead_id'] = $id;
        $lead = new LeadsController();
        $key_data['Remarks'] = $lead->getRemarksByLeadId($id);
        $this->set('key_data',$key_data);     
    }

    public function editCase($id=null){
        $key_data['loggedInUser'] = $this->Auth->user();
        $this->loadModel('Leads');
        $this->loadModel('LeadStatus');
        $key_data['leadStatus'] = $this->LeadStatus->find('all')->toArray(); 
        $leadDetail = $this->Leads->find('all')->where(['Leads.id'=> $id])->contain(['Retain','Lead','Filling','Categories','SubCategories','AccountLeads','LeadStatus','LeadDocuments'])->toArray();    
        
        $lead = new LeadsController();
        $key_data['Remarks'] = $lead->getRemarksByLeadId($id);

        $key_data['ClientRemarks'] = $lead->getClientRemarksByLeadId($id);        

        $key_data['leadDetail'] = $leadDetail[0];
        $key_data['balance'] = $lead->leadPaymentBalance($id);
        $this->set('key_data',$key_data);         
    }

    public function retainedCase(){
        $key_data['loggedInUser'] = $this->Auth->user();
        $this->loadModel('Leads');
        $key_data['retained_lead_data'] = $this->Leads->find('all')->where(['Leads.retainer_id' => $key_data['loggedInUser']['id'],'NOT'=> ['Leads.lead_status_id' =>'1']])->order(['Leads.id' => 'DESC'])->contain(['Lead','Filling','Categories','SubCategories','AccountLeads','LeadStatus'])->toArray();
        $key_data['retained_lead_count'] = count($key_data['retained_lead_data']);
        $this->set('key_data',$key_data);           
    }

    public function paymentPlan($id=null){
        $key_data['loggedInUser'] = $this->Auth->user();
        
        if ($this->request->is(['post','put'])) {
            $data = $this->request->data();
            $lead = $data['lead_id'];
            $LeadPaymentPlansTable = TableRegistry::get('LeadPaymentPlans');
            $lead_data = $LeadPaymentPlansTable->find('all')->where(['lead_id' => $data['lead_id']])->toArray();
            if(!empty($lead_data)){
                foreach ($lead_data as $value) {
                    $LeadPaymentPlansTable->delete($value);
                }
            }
            
           foreach ($data['payment'] as $key => $plan) {
                $detail = array('lead_id'=>$data['lead_id'],'user_id'=>$data['user_id'],'payment'=>$plan,'title' => $data['title'][$key]);
                $payment = $LeadPaymentPlansTable->newEntity(); 
                $LeadPaymentPlansTable->patchEntity($payment, $detail);       
                $LeadPaymentPlansTable->save($payment);
            }

            $this->Flash->success(__('Payment Plan Changed'));
            return $this->redirect(['controller' => 'Admins', 'action' => 'paymentPlan',$lead]);
        }
        $lead = new LeadsController();
        $leadDetail = $lead->getLeadById($id);
        $key_data['leadPaymentDetail'] = $lead->getPaymentPlanByLead($id);
        $key_data['leadDetail'] = $leadDetail[0];
        $this->set('key_data',$key_data);              
    }

    public function manageCharges($id=null){
        $key_data['loggedInUser'] = $this->Auth->user();
        $lead = new LeadsController();
        $leadDetail = $lead->getLeadById($id);
        $leadChargesDetail = $lead->getChargesByLead($id);
        if(!empty($leadChargesDetail)){$key_data['leadChargesDetail'] = $leadChargesDetail[0];}
        else{$key_data['leadChargesDetail'] = null;}
        $leadsTable = TableRegistry::get('Leads');
        $LeadChargesTable = TableRegistry::get('LeadCharges');
        if ($this->request->is(['post','put'])) {
            $data = $this->request->data();
            $lead_data = $data['lead_id'];
            $leadCharges = $lead->getChargesByLead($data['lead_id']);
            
            if(!empty($leadCharges)){
                $charge = $leadCharges[0]; 
            }
            else{
                $charge = $LeadChargesTable->newEntity(); 
            }
            $total = $data['admin_charges']+$data['gov_fee']+$data['consultation_fee']+$data['case_processing_fee']+$data['misc_fee'];
            $LeadChargesTable->patchEntity($charge, $data);     
            $LeadChargesTable->save($charge);
            
            $leads = $leadsTable->get($lead_data); 
            $leads->amount_payable = $total;
            $leadsTable->save($leads);
            $this->Flash->success(__('Lead Charges Added'));
            return $this->redirect(['controller' => 'Admins', 'action' => 'manageCharges',$lead_data]);
        }
        $key_data['leadDetail'] = $leadDetail[0];
        $this->set('key_data',$key_data);

    }

    public function leadContract($id=null){
        $this->viewBuilder()->setlayout('print');
        $key_data['loggedInUser'] = $this->Auth->user();
        $this->loadModel('Leads');

        $leadInfo = $this->Leads->find('all')->where(['Leads.id'=>$id])->contain(['LeadPaymentPlans','LeadCharges','Categories','SubCategories','AccountLeads'])->toArray();
        if(!empty($leadInfo)){
            $key_data['leadDetail'] = $leadInfo[0];    
        }
        else{
            $key_data['leadDetail'] = array();       
        }
        
        $this->set('key_data',$key_data);
    }

    public function receiptPrint($id=null){
        $this->viewBuilder()->setlayout('print');
        $key_data['loggedInUser'] = $this->Auth->user();
        $this->loadModel('LeadPayments');
        $this->loadModel('Leads');
        $key_data['lead_receipt'] = $this->LeadPayments->get($id)->toArray();
        $leadInfo = $this->Leads->find('all')->where(['Leads.id'=>$key_data['lead_receipt']['lead_id']])->contain(['AccountLeads'])->toArray();
        foreach ($leadInfo as $info) {
            $key_data['leadInfo'] = $info->toArray();    
        }
        
        /*pr($leadInfo);die;*/
        $this->set('key_data',$key_data);
    }

    public function refundPrint($id=null){
        $this->viewBuilder()->setlayout('print');
        $key_data['loggedInUser'] = $this->Auth->user();
        $this->loadModel('LeadRefunds');
        $this->loadModel('Leads');
        $key_data['lead_refund'] = $this->LeadRefunds->get($id)->toArray();
        $leadInfo = $this->Leads->find('all')->where(['Leads.id'=>$key_data['lead_refund']['lead_id']])->contain(['AccountLeads'])->toArray();
        foreach ($leadInfo as $info) {
            $key_data['leadInfo'] = $info->toArray();    
        }
        
        /*pr($leadInfo);die;*/
        $this->set('key_data',$key_data);   
    }


}

?>



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


    public function dashboard(){
        $this->loadModel('Users');
        /*$data = $this->Users->find('all')->where(['Users.id'=>4])->contain(['Permissions','Departments']);
        echo "<pre>";print_r($data->toArray());        */
        //echo "<pre>";print_r($this->Auth->user());

        

        $key_data['loggedInUser']= $this->Auth->user();


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
            $exist = $exist[0]->toArray();  
            if(count($exist) > 1 ){
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


    public function getLeadStatus(){
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
        $key_data['my_lead_count'] = count($result);
        $key_data['lead_list'] = $result;
        $this->set('key_data',$key_data); 
    }

    public function getAllLead(){
        $key_data['loggedInUser'] = $this->Auth->user();
        $this->loadModel('Leads');
        $key_data['all_lead'] = $this->Leads->find('all')->where(['lead_status_id IN'=>[1,2]])->contain(['Retain','Lead','Categories','SubCategories','LeadStatus'])->toArray();  
        $key_data['all_lead_count'] = count($key_data['all_lead']);
        $this->set('key_data',$key_data); 
    }

    public function editLead($id=null){

        $key_data['loggedInUser'] = $this->Auth->user();
        $lead = new LeadsController();
        $result = $lead->getLeadById($id);

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
            if (array_key_exists('contract_signed',$data)){
                if($data['contract_signed'] == 1){
                    $data['lead_status_id'] = 2;
                    $data['status_changed_date'] = date('Y-m-d');
                    $file['lead_id'] = $id;
                    $file['retainer_id'] = $data['retainer_id'];
                    $filedetail = $lead->retainLead($file); 
                }
            }

            if($added = $lead->editLead($data,$id)){
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
        $key_data['user_list'] = $this->Users->find('all',)->Where(['department_id'=>'2'])->toArray(); 


        foreach ($key_data['user_list'] as $user) {
            $user['assigned']  = count ($this->Leads->find('all')->where(['processingAgent_id'=>$user['id'],'lead_status_id '=>3])->toArray() );
            $user['in_progress'] = count ( $this->Leads->find('all')->where(['processingAgent_id'=>$user['id'],'lead_status_id '=>11])->toArray() );
        }


        
        $this->set('key_data',$key_data); 
    }
    public function accountLead(){
        $key_data['loggedInUser'] = $this->Auth->user();
        $this->loadModel('Leads');
        $key_data['accountLeads'] = $this->Leads->find('all')->where(['NOT'=> ['Leads.lead_status_id' =>'1']])->order(['Leads.id'=> 'DESC'])->contain(['LeadStatus','Categories','SubCategories','AccountLeads','Retain'])->toArray();

        //pr($key_data['accountLeads']);die;
        $this->set('key_data',$key_data); 
    }


    public function manageReceipt($id=null){
        $this->loadModel('Leads');
        $this->loadModel('LeadPayments');
        $this->loadModel('LeadRefunds');

        $key_data['loggedInUser'] = $this->Auth->user();
        $leadDetail = $this->Leads->find('all')->where(['Leads.id' => $id ])->order(['Leads.id'=> 'DESC'])->contain(['LeadStatus','Categories','SubCategories','AccountLeads','Retain','LeadPayments'])->toArray();       
        $key_data['leadDetail'] = $leadDetail[0]->toArray();

        $key_data['leadPayment'] = $this->LeadPayments->find('all')->where(['lead_id'=>$id])->toArray();
        $key_data['leadRefund'] = $this->LeadRefunds->find('all')->where(['lead_id'=>$id])->toArray();

        $lead = new LeadsController();
        $key_data['balance'] = $lead->leadPaymentBalance($id);
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
        else{
            $key_data['leadDetail'] = $this->Leads->find('all')->where(['NOT'=> ['Leads.lead_status_id IN' =>[1,2]]])->order(['Leads.id' => 'DESC'])->contain(['Retain','Lead','Filling','Categories','SubCategories','AccountLeads','LeadStatus'])->toArray();
        }
        
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
        //$this->loadModel('Leads');
        $leadsTable = TableRegistry::get('Leads');

        if ($this->request->is(['post','put'])) {
            $data = $this->request->data();
            $lead = $data['lead_id'];
            $LeadPaymentPlansTable = TableRegistry::get('LeadPaymentPlans');
            $lead_data = $LeadPaymentPlansTable->find('all')->where(['lead_id' => $data['lead_id']])->toArray();
            if(!empty($lead_data)){
                foreach ($lead_data as $value) {
                   //pr($value);
                    $LeadPaymentPlansTable->delete($value);
                }
            }
            
            $total = 0;
            foreach ($data['payment'] as $key => $plan) {
                $total = $total + $plan;
                $detail = array('lead_id'=>$data['lead_id'],'user_id'=>$data['user_id'],'payment'=>$plan,'title' => $data['title'][$key]);
                $payment = $LeadPaymentPlansTable->newEntity(); 
                $LeadPaymentPlansTable->patchEntity($payment, $detail);       
                $LeadPaymentPlansTable->save($payment);
            }

            $leads = $leadsTable->get($lead); 
            $leads->amount_payable = $total;
            $leadsTable->save($leads);
           

            $this->Flash->success(__('Lead Payment Plan Modified'));
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
        $key_data['leadChargesDetail'] = $lead->getChargesByLead($id);

        pr($key_data['leadChargesDetail']);die;

        $key_data['leadDetail'] = $leadDetail[0];
        $this->set('key_data',$key_data);

    }


}

?>



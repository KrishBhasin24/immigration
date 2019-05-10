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




class AdminsController extends AppController
{
	public function initialize()
    {
        parent::initialize();

    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
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


    public function getAllCompanies(){
        $key_data['loggedInUser']= $this->Auth->user();
        $user = new UsersController();

        $key_data['company'] = $user->getAllCompany('parent');
        $key_data['company_count'] = count($key_data['company']);
        $key_data['branch'] = $user->getAllCompany('branch');
        $key_data['branch_count'] = count($key_data['branch']);
        $this->set('key_data',$key_data);
    }


     public function editCompany($id=null)
    {
         $key_data['loggedInUser']= $this->Auth->user();
        
         try{
                $this->loadModel('Companies');
                $company_data = $this->Companies->get($id); 
                $key_data['Company_data'] = $company_data;
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
        $companies_rqst = $this->Companies->find('all');  
        $department_rqst = $this->Departments->find('all');  
        $key_data['companies'] = $companies_rqst->toArray();
        $key_data['department'] = $department_rqst->toArray();

        $this->set('key_data',$key_data);
    }

    public function addStaff(){
        
        if ($this->request->is('post')) {
            $data = $this->request->data();
            $user = new UsersController();
            if($register = $user->addStaff($data,'staff')){
                $this->Flash->success(__('Staff Data Added'));
                return $this->redirect(['controller'=>'Admins','action' => 'getAllStaff']);
            }
        }


    }

    public function editStaff($id=null)
    {
        $key_data['loggedInUser']= $this->Auth->user();
        $this->loadModel('Users');
        try{
                $key_data['userData'] = $this->Users->get($id);   
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

        $this->loadModel('Pages');
        $page_data = $this->Pages->find('all')->where([ $key_data['user_data']['department']['handle'] => 1]);     
         $key_data['page_data'] = $page_data->toArray();



        $permission_data = array();
        foreach ($key_data['user_data']['permissions'] as $value) {
            $permission_data[] = $value['handle'];
        }
        $key_data['permission_data'] =$permission_data; 



        if ($this->request->is(['post','put'])) {
            $user = new UsersController();
            if($permission = $user->userPermission($this->request->data(),$key_data['user_data']) ){
                $this->Flash->success(__('User data has been Edited.'));
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



    public function getAgent()
    {
        $key_data['loggedInUser'] = $this->Auth->user();
        $lead = new LeadsController();
        $result = $lead->getStaff(2);
        $key_data['agent_count'] = count($result);
        $key_data['agent_list'] = $result;
        $this->set('key_data',$key_data);
    }




}

?>


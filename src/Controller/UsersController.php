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

class UsersController extends AppController
{
	 public function initialize()
    {
        parent::initialize();

    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
       
        
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
      
    }



    public function addStaff($userData = array(), $userType ){
    	
    	  try{
    	  		$userData['role'] = $userType;
    	  		$userTable = TableRegistry::get('Users');
    	  		$user = $userTable->newEntity();
			    $userData['password'] = $this->passwordHasher( $userData['password']); 
				$user = $userTable->patchEntity($user, $userData);
				$end = $userTable->save($user);

				return $end;

    	  }
    	  catch (Exception $e) {
            echo $e->getMessage();
        }

	
    }

    public function login()
    {
        $this->viewBuilder()->layout('login');
    	if ($this->request->is('post')) {
          	$user = $this->Auth->identify();   
			if($user){
            	$this->Auth->setUser($user);
        	   if($user['role'] == 'staff' || $user['role'] == 'admin'){
                    return $this->redirect( [ 'controller' => 'Admins', 'action' => 'dashboard' ]);    
               }
               else{
                echo "I am in ";die;
               }

                
            }
            else{
            	echo "wrong data";
            }
       	}      

          
	}

	public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }


	/*public function dashboard(){
		echo "Welcome"."<br>";
		pr($this->Auth->user());
		die;
	}*/


	public function addCompany($userData = array()){


		$compayTable = TableRegistry::get('Companies');
		$company = $compayTable->newEntity();
		$company = $compayTable->patchEntity($company, $userData);
 		$result = $compayTable->save($company);
		return $result;
      
    }


    public function getUser($id){
        $this->loadModel('Users');
        $user_date = $this->Users->find('all')->where(['Users.id' => $id]);
        $user = $user_date->toArray();

        /*$this->loadModel('Departments');
        $dep_date = $this->Departments->find('all');
        $dep = $dep_date->toArray();
        pr($dep);
*/
        return $user;
    }

    public function getAllCompany($param){
        $this->loadModel('Companies');
        if ($param == 'parent'){
            $data = $this->Companies->find('all')->where(['parent_id ' => 0]);
        }
        elseif($param == 'branch'){
            $data = $this->Companies->find('all')->where(['parent_id !=' => 0]);
        }
        return $data->toArray();
    }

    public function getAllUser($usertype){
        $this->loadModel('Users');
        $staff = $this->Users->find('all')->where(['Users.role' => $usertype])->contain(['Departments','Companies']);
        $staff_result = $staff->toArray();
        return $staff_result;
    }

    public function userPermission($formData = array(),$userData = array()){

        //pr($formData);die;

        $value = array();
        $this->loadModel('Permissions');
        foreach ($userData['permissions'] as $val) {
            $record = $this->Permissions->get($val['id']);
            $this->Permissions->delete($record);
        }
      
        foreach ($formData['handle'] as $handle) {
            
            $arr = explode("_", $handle, 3);
            $value['user_id'] = $userData['id'];
            $value['department_id'] = $userData['department_id'];
            $value['menu_id'] = $arr[2];
            $value['parent'] = $arr[2];
            $value['handle'] = $arr[0];
            $value['page_name'] = $arr[1];
          
            $permission_obj = $this->Permissions->newEntity($value);
            $result[] = $this->Permissions->save($permission_obj);
        }
        return $result;
    }

    public function getCat(){
        $this->loadModel('Categories');
        $data = $this->Categories->find('all')->toArray();
        return $data;
    }
    public function getSubCat(){
        $this->loadModel('SubCategories');
        $data = $this->SubCategories->find('all')->contain('Categories')->toArray();
        return $data;
    }

    /*public function addCat($userData = array()){
        $catTable = TableRegistry::get('Categories');
        $cat = $catTable->newEntity();
        $cat = $catTable->patchEntity($cat, $userData);
        $result = $catTable->save($cat);
        return $result;
    }

    public function addSubCat($userData = array()){
        $subcatTable = TableRegistry::get('SubCategories');
        $subcat = $subcatTable->newEntity();
        $subcat = $subcatTable->patchEntity($subcat, $userData);
        $result = $subcatTable->save($subcat);
        return $result;
    }*/
   

}


?>



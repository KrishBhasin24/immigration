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


class ReportsController extends AppController
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
    public function paymentReport(){
    	/*$this->loadModel('Leads');
      	$key_data['lead'] = $this->Leads->find('all')->contain(['Categories','SubCategories','AccountLeads','Retain','LeadPayments','LeadRefunds'])->toArray();*/

      	$this->loadModel('LeadPayments');
		$key_data['lead'] = $this->LeadPayments->find('all')->contain(['Leads'=>['Categories','SubCategories','AccountLeads','Retain']])->toArray();

    	$key_data['loggedInUser']= $this->Auth->user();
    	$this->set('key_data',$key_data); 
    	//pr($lead);die;
    }

    public function refundReport(){
        /*$this->loadModel('Leads');
        $key_data['lead'] = $this->Leads->find('all')->contain(['Categories','SubCategories','AccountLeads','Retain','LeadPayments','LeadRefunds'])->toArray();*/

        $this->loadModel('LeadRefunds');
        $key_data['leadRefund'] = $this->LeadRefunds->find('all')->contain(['Leads'=>['Categories','SubCategories','AccountLeads','Retain']])->toArray();

        $key_data['loggedInUser']= $this->Auth->user();
        $this->set('key_data',$key_data); 
        
    }

    public function activeFiles(){
        $key_data['loggedInUser']= $this->Auth->user();
        $this->loadModel('Leads');
        $key_data['lead'] = $this->Leads->find('all')->where(['lead_status_id NOT IN' => [1,2]])->contain(['AccountLeads','Categories','SubCategories','LeadStatus','Filling','Retain'])->toArray();
        $this->set('key_data',$key_data); 
       
    }
}
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
use Cake\Mailer\Email;

	
class NotificationsController extends AppController
{
	public function initialize()
    {
        parent::initialize();

    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
       // $this->viewBuilder()->setlayout('admin');
        $key_data = array();

    }

   public function retain($data = array()){
		//echo "<pre>";print_r($data); die;
	    $template = "retain";
	    /*$to = "nitin@siiscanada.com";
	    $cc = "accounts@siiscanada.com";*/
	    $to = 'krish.k.bhasin@gmail.com';
	    $subject = "Re: New Retainer";
	    $this->mail($data,$template,$to,$subject);
	    return;
    }

    public function case_assign($data = array()){
    	//echo "<pre>";print_r($data); die;
    	$template = "case_assign";
	    /*$to = "nitin@siiscanada.com";
	    $cc = "accounts@siiscanada.com";*/
	    $to = 'krish.k.bhasin@gmail.com';
	    $subject = "Fwd: New File Assigned";
	    $this->mail($data,$template,$to,$subject);
	    return;	
    }

    public function case_status($data = array()){
    	
    	if($data['lead_status_id'] == 4){
			$template = "case_for_review";
			$to = 'krish.k.bhasin@gmail.com';
			$subject = "Fwd: File Ready For Review";
    	} //ready for review
		elseif ($data['lead_status_id'] == 5){
			$template = "case_reviewed";
			$to = 'krish.k.bhasin@gmail.com';
			$subject = "Fwd: Case Reviewed";
		}  //case reviewed
		elseif ($data['lead_status_id'] == 6){
			$template = "case_filed";
			$to = 'krish.k.bhasin@gmail.com';
			$subject = "Fwd: Case Filed";
		}	//case filed
    	
	    //echo "<pre>";print_r($data); die;

	    $this->mail($data,$template,$to,$subject);
	    return;	

    }

    public function mail($data = array(),$template,$to,$subject,$cc = null){
    	$headers = array();
		$headers['Organization'] = "Sender Organization";
		$headers['MIME-Version'] = "1.0";
		$headers['Content-type'] = "text/html";
		$headers['charset'] = "utf8";
		$headers['X-Priority'] = "3";
		$headers['X-Mailer'] = "PHP ". phpversion(); 
		$email = new Email('gmail');
        $email->settransport('gmail3')
            ->setViewVars(['value' => $data])
            ->setHeaders($headers)
            ->template($template)
            ->emailFormat('html')
		    ->setFrom(['krish@siisgroup.com' => 'Siis Canada'])
		    ->setTo($to);
        if($cc != null){
            $email->setCc($cc);
        } 
        $email->setSubject($subject)
	       ->send();
        return;
    }

    /*Array
		(
		    [client_id] => 54
		    [category_id] => 3
		    [sub_category_id] => 8
		    [first_name] => Sachin
		    [last_name] => kumar
		    [dob] => 1996-05-19
		    [address] => test
		    [telephone] => (956) 323-2323
		    [city] => Toronto
		    [province] => Ontario
		    [postal_code] => L3T4M7
		    [country] => Canada
		    [marital_status] => Never Married
		    [reason_of_qualify] => 
		    [special_instruction] => 
		    [submission_deadline] => 2019-06-27
		    [source_of_lead] => 2
		    [contract_signed] => 1
		    [retainer_id] => 17
		    [lead_status_id] => 2
		    [status_changed_date] => 2019-06-18
		    [lead_id] => 1
		    [id] => 3
		)
	*/


}

?>
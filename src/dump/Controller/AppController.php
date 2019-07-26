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


use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
    public function beforeFilter(Event $event)
    {
         $key_data = array();
        $userModel = 'Users'; 
        $this->loadComponent('Auth', [
                'authorize' => 'Controller',
                'authenticate' => [
                              'Form' => [
                                'userModel' => $userModel, 
                                'contain' => ['Departments','Permissions'=>['sort'=>['Menus.menu_order'=>'ASC']],'Permissions.Menus'],

                              'fields' => [
                                  'username' => 'email',
                                  'password' => 'password',
                                 ]
                               ]],
                'loginAction' =>[
                    'controller' => '',
                    'action' => 'login',
                ],
                'authError' => 'You must be logged in to view this page.',
                'logoutRedirect' => [
                    'controller' =>'',
                    'action' => 'login',
                    
                ]
            ]);
       

    }

    public function isAuthorized($user = null)
    {
        // Admin can access every action
        if (isset($user)) {
            return true;
        }

        // Default deny
        return false;
    }

    public function passwordHasher($password)
    {
        return (new DefaultPasswordHasher)->hash($password); 
    }
}

<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $uses = array('User','Rol','Personnel','School','SchoolRole','Settings');

	public $is_login;

	public $_navLink = array('home'=>'header-link','school'=>'header-link');

	public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'users',
                'action' => 'index',
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login',
            ),
            'authorize' => array('Controller'),
            
            /*'authorize' => array(
                'Actions' => array('actionPath' => 'controllers/'),
                'Controller'
            ),*/
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => array(
                        'className' => 'Simple',
                        'hashType' => 'sha256'
                    ),
                    //'fields' => array('username' => 'email')
                )
            )
        )
    );

    public function isAuthorized() {
       $user = $this->Auth->user();
        if (isset($this->params->params['prefix']) && ($this->params->params['prefix'] == 'admin')) {
            if(!empty($user) && $user['Rol']['admin']){
            	$this->is_login = true;
            	$this->set('is_login',$this->is_login);
                return true;
            }
        }else{
            if(!empty($user) && $user['Rol']['user']){
            	$this->is_login = true;
            	$this->set('is_login',$this->is_login);
                return true;
            }
        }

        return false;
    }

    function beforeFilter(){
        //debug($_SERVER); exit(0);
        $settings = $this->_getSettings();
        //debug($res); 
        if($settings['DOMAIN'] != $_SERVER['HTTP_HOST']){
            $subdomen = explode('.', $_SERVER['HTTP_HOST']);
            //debug($subdomen);
            $subdomen = $subdomen[0];
            $subdomains = $this->_getSubDomen();
            if(!in_array($subdomen, $subdomains)){
                $this->redirect('http://'.$settings['DOMAIN'].'/errors/error404');
            }
        }
        /*echo $_SERVER['HTTP_HOST'];   
        exit(0);*/
    	 $user = $this->Auth->user();
        	//debug($user); exit(0);
        if(!empty($user)){ 
            $this->set('is_login',true);
            $this->set('username',$user['username']);
            $this->set('userData',$user);
            $this->_getSchollSetings(@$user['school_id']);
        }

        $this->set('navLink',$this->_navLink);
    }

    private function _getSchollSetings($school_id = null){
        $settings = $this->School->findById($school_id);
        $this->set('pattern',@$settings['School']['background']);
        $this->set('layout',@$settings['School']['layout']);
    }

    public function _getSettings(){
        return $this->Settings->find('list',array('fields'=>array('name','value'),'conditions'=>array('not'=>array('name'=>'EMAIL'))));
    }

    protected function _getSubDomen(){
        return $this->School->find('list',array('fields'=>array('id','sub_domen'),'conditions'=>array('School.active'=>1)));
    }

}

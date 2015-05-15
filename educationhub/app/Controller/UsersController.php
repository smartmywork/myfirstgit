<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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



App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
    public $components = array();

	public $uses = array('Country','User','Rol','Personnel','SchoolRole','School');

    private $_mylifeEndPoint;

	function beforeFilter() {
        parent::beforeFilter();   

        $this->navsel_['users'] = 'active';
        $this->set('navsel_',$this->navsel_);

        $this->Auth->Allow('signup','login','logout','terms','policies','success','confirmation');
    }

    function isAuthorized() {
        if(parent::isAuthorized()){
            return true;
        }else{
            $this->Session->setFlash(__('You are not authorized to access this page'));
            $this->redirect('/');
        }
    }

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    
    public function policies() {
        $page = $this->Page->find('first',array('conditions'=>array('slug'=>'policies')));
        $this->set('title_for_layout',$page['Page']['title']);
        $this->set('content',$page['PageContent']['content']);
        $this->description = $page['PageContent']['description'];
        $this->keywords = $page['PageContent']['keywords'];
            $this->set('description', htmlspecialchars($this->description));
            $this->set('keywords', htmlspecialchars($this->keywords));
    }

    public function terms() {
        $page = $this->Page->find('first',array('conditions'=>array('slug'=>'terms')));
        $this->set('title_for_layout',$page['Page']['title']);
        $this->set('content',$page['PageContent']['content']);
        $this->description = $page['PageContent']['description'];
        $this->keywords = $page['PageContent']['keywords'];
            $this->set('description', htmlspecialchars($this->description));
            $this->set('keywords', htmlspecialchars($this->keywords));
    }
    
	function index(){
		//debug($this->Auth->user());
	}

	function login(){
		if($this->request->is('post') || $this->request->is('put')){
			$user = $this->User->find('first',
                        array(
                            'conditions'=>array(
                                'Rol.user' => 1,
                                'User.status' => 1,
                                'User.username'=>$this->request->data['User']['username'],
                            )
                        )
                    );
			//debug($user); exit(0);
			if(!empty($user) && $this->Auth->login()){

				$this->Session->setFlash(__('Welcome '.$user['User']['first_name'].' '.$user['User']['last_name']),'flashgood');
				//echo $this->Auth->login(); exit(0);
				$this->redirect(array('controller'=>'users','action'=>'profile'));
			}
			$this->Session->setFlash(__('The username or password you entered is incorrect'));
		}		
	}

	function profile(){
        //$user = $this->Auth->user();
        //debug($user); 
        /*$paypal = array();
        App::uses('CakeEmail', 'Network/Email');
                    $email = new CakeEmail();
                    $email->from(Configure::read('Settings.ADMIN_EMAIL'))
                            ->cc(Configure::read('Settings.ADMIN_EMAIL'))
                            ->to($user['username'])
                            ->subject('Complete Registration')
                            ->template('sign_up')
                            ->emailFormat('text')
                            ->viewVars(array('user' => $user))
                            ->send();*/
        //$this->sendMail('Complete Registration',$user,array($user['username']));
        //$this->render('profile');
        if($this->request->is('post') || $this->request->is('put')){
            if(empty($this->request->data['User']['password'])){
                unset($this->request->data['User']['password']);
            }
            if($this->User->save($this->request->data)){
                $this->Session->setFlash(__('Changes have been saved'),'flashgood');
            }else{
                $this->Session->setFlash(__('Changes not saved'));
            }
        }
        $id = $this->Auth->user('id');
        $this->request->data = $this->User->find('first',array('conditions'=>array('User.id'=>$id)));
        unset($this->request->data['User']['password']);
        $res = $this->Country->find('list',array('fields'=>array('Country.id','Country.name')));
        $this->set('countries',$res);
        $subscription = $this->Subscription->find('first',array('conditions'=>array('Subscription.user_id'=>$id,'Subscription.subscription_status'=>array('active','non_renewing','trial','in_trial')),'order'=>'Subscription.id desc'));
        $this->set('subscription',$subscription);
        $this->cabinetSelectTab['account'] = 'active';
        $this->set('cabinetSelectTab',$this->cabinetSelectTab);
	}


    function signup(){
        /*if($this->request->is('post') || $this->request->is('put')){
            $this->request->data['User']['role_id'] = USERTYPE_OWNER;
            if($this->User->save($this->request->data)){   
                    //echo $this->User->id; exit(0);      
                    $user = $this->User->find('first',array('conditions'=>array('User.id'=>$this->User->id)));   
                    $this->sendMail('Complete Registration',$user,array($user['User']['username']));        
                    $this->Session->setFlash(__('Registration was successful'),'flashgood');
                    $this->redirect(array('controller'=>'users','action'=>'login','admin'=>false));
                }else{
                     $this->Session->setFlash(__('Registration was not successful'));
                     //$this->redirect(array('controller'=>'users','action'=>'signup','admin'=>false));
                }
        }*/
         if($this->request->is('post') || $this->request->is('put')){
            $this->request->data['User']['role_id'] = 2;
            $this->request->data['User']['status'] = 2;
            $this->request->data['User']['password'] = 'softsoftsoft';
            $this->User->set($this->request->data);
            $this->Session->write('User.request',$this->request->data);
            if($this->User->validates($this->request->data,array('username','password','sub_domen'))){
                $this->redirect(array('controller'=>'bee','action'=>'index','admin'=>false));
            }else{

            }
        }
        $res = $this->Country->find('list',array('fields'=>array('Country.id','Country.name')));
        $this->set('countries',$res);
    }

    function success(){
        $this->set('domain',$this->_domain);
        $id = $this->Session->read('User.confirm_id'); 
        if($id){
            $res = $this->User->findById($id);
            $this->set('subdomen',$res['User']['sub_domen']);
        }
    }

    function confirmation(){
        /*if($this->Session->read('User.confirm_id')){
            $this->redirect('/');
        }*/
        if($this->request->is('post') || $this->request->is('put')){
            if($this->request->data['User']['password'] != $this->request->data['User']['confirm']){
                $this->Session->setFlash(__('Confirm the password and password do not match'));
            }else{
                unset($this->request->data['User']['confirm']);
                $this->request->data['User']['status'] = 1;
                //debug($this->request->data); exit(0);
                if($this->User->save($this->request->data)){
                    $this->Session->delete('User.confirm_id');

                    $settings = $this->_getSettings();
                    $this->_mylifeEndPoint = $settings['MYLIFE_PATH'];
                    $user = $this->User->findById($this->User->id);
                    $user['User']['password'] = $this->request->data['User']['password'];

                    $this->createUserOnMoodle($user);
                    if(!empty($user['User']['sub_domen'])){
                        $this->createNewVhostFile($user['User']['sub_domen']);
                        $this->restartApache();
                        $this->_createDefaultSchool($this->User->id,$user['User']['sub_domen']);
                        $this->redirect('http://'.$user['User']['sub_domen'].'.'.$this->_domain); // redirect to school
                    }
                    $this->Session->setFlash(__('Confirmation successful'),'flashgood');
                    $this->redirect(array('controller'=>'users','action'=>'login','admin'=>false));
                }else{

                }
            }
        }else{
            $this->request->data['User']['id'] = $this->Session->read('User.confirm_id');
        }
    }

    private function createUserOnMoodle($params){
        unset($params['User']['role_id']);
        unset($params['User']['country_id']);
        unset($params['User']['phone']);
        unset($params['User']['institute_name']);
        unset($params['User']['sub_domen']);
        unset($params['User']['paid']);
        $opts = array();
        $curl = curl_init();
        $url = $this->_mylifeEndPoint.'/users/save_user_from_education';
         $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = http_build_query($params, null, '&');
         $opts[CURLOPT_URL] = $url;
        $opts[CURLOPT_RETURNTRANSFER] = true;
        $opts[CURLOPT_CONNECTTIMEOUT] = 50;
        $opts[CURLOPT_TIMEOUT] = 100;
        /*$userAgent = "Chargebee-PHP-Client" . " v" . ChargeBee_Version::VERSION;*/
        $headers = array(
            'Accept: application/json',
            /*"User-Agent: " . $userAgent*/);
        $opts[CURLOPT_HTTPHEADER] = $headers;
        //$opts[CURLOPT_USERPWD] = $env->getApiKey() . ':';
        debug($opts);
        curl_setopt_array($curl, $opts);
        try{
            $response = curl_exec($curl); 

        //debug($response); exit(0);
        }catch (Exception $e){
            return false;
        }
        return true;
    }

	function logout(){
		$this->redirect($this->Auth->logout());
	}

	function admin_index(){
	}

	function admin_list(){
		$this->set('title_for_layout','User list');
        $this->paginate = array(
                'User'=>array(
                    'order' => array('User.id' => 'desc'),
                    'limit'=>10
                    )
                );
        $this->set('users',$this->paginate('User'));
	}

	function admin_edit($id = null){
        $this->set('title_for_layout','User edit');
        if (!$this->User->exists($id)) {
		   $this->Session->setFlash(__('No such user.'));
		   $this->redirect(array('controller'=>'users','action'=>'list','admin'=>true));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
                    if (empty($this->request->data['User']['password'])) {
                       //$oldpass = $this->User->find('first', array('conditions' => array('User.id' => $id)));
                       //$this->request->data['User']['password'] = $oldpass['User']['password'];
			unset($this->request->data['User']['password']);
                    }
                    $userData = $this->request->data;
                    if ($this->User->save($userData)) {
                        $this->Session->setFlash(__('Changes to user have been saved.'), 'flashgood');
                        $this->redirect(array('controller'=>'users','action'=>'list','admin'=>true));
                    } else {
                            $this->Session->setFlash(__('Changes the user is not saved.'));
                    }
		} else {
			$options = array('conditions' => array('User.id' => $id));
			$this->request->data = $this->User->find('first', $options);
                      
			$status = array('locked','active');			
			$this->set('status',$status);
		}
          $roles = $this->Rol->find('list',array('order'=>'Rol.name'));                        
                        $this->set('roles',$roles);
    }

	function admin_delete($id = NULL){
        if($id && $this->User->exists($id)){
            //$this->Constructor->deleteAll(array('Constructor.user_id'=>$id));
            //$this->Expense->deleteAll(array('Expense.user_id'=>$id));
            //$this->Ticket->deleteAll(array('Ticket.user_id'=>$id));
            $this->Personnel->deleteAll(array('Personnel.user_id'=>$id));
            $this->User->delete($id);
        }
        $this->redirect(array('controller'=>'users','action'=>'list','admin'=>TRUE));
    }

    function admin_block($id = NULL){
        if(!empty($this->params->query['action'])){
            $action = $this->params->query['action'];
        }else{
            $action = null;
        }
        if($this->User->exists($id)){
            if($action == 'block'){             
                $this->User->updateAll(array('User.status'=>0), array('User.id'=>$id));
            }elseif($action == 'unblock'){
                    $this->User->updateAll(array('User.status'=>1), array('User.id'=>$id));
                }
        }
        $this->redirect(array('controller'=>'users','action'=>'list','admin'=>true));
    }
	function admin_login(){
		$this->layout = 'login';
        if($this->request->is("post") || $this->request->is("put")){
            if(!empty($this->request->data)){
                $user = $this->User->find('first',
                            array(
                                'conditions'=>array(
                                    'Rol.admin' => 1,
                                    'User.status'=>1,
                                    'User.username'=>$this->request->data['User']['username'],
                                ),
                            )
                        );                
                if(!empty($user)){
                    if($this->Auth->login()){
                        /*$session_id = $this->Session->id();
                        $this->User->save(array('User'=>array('id'=>$user['User']['id'],'session'=>$session_id)));*/
                        $this->redirect(array('controller'=>'users','action'=>'list','admin'=>true));
                    }
                }
            }
        }
	}

    public function admin_info($id = null) {
        $this->set('title_for_layout','User info');
        if (!$this->User->exists($id)) {
           $this->Session->setFlash(__('No such user.'));
           $this->redirect(array('controller'=>'users','action'=>'list','admin'=>true));
        }
        $info = $this->User->findById($id);
        $this->set('info',$info);
    }

    public function _generateSitemap() {
        $sitemap = array(
            array(
                'loc' => array('controller' => 'users', 'action' => 'login'),
                'changefreq' => 'hourly',
                'priority' => '0.5'
            ),
            array(
                'loc' => array('controller' => 'users', 'action' => 'signup'),
                'changefreq' => 'hourly',
                'priority' => '0.5'
            ),
        );
        return $sitemap;
    }

    private function _createDefaultSchool($user_id,$subdomen){
        if($user_id){
            $this->School->create();
            $this->School->set('name','My School');
            $this->School->set('active',1);
            $this->School->set('layout','full');
            $this->School->set('sub_domen',$subdomen);
            if($this->School->save()){
                $this->_setSchoolRole($this->School->id);
                $this->Personnel->create();
                $this->Personnel->set('school_role_id',$this->_getSchoolDefaultRole($this->School->id,'owner'));
                $this->Personnel->set('user_id',$user_id);
                $this->Personnel->set('school_id',$this->School->id);
                $this->Personnel->save();
            }
        }
    }

    private function _setSchoolRole($id = null){
        if($this->School->exists($id)){
            $roles = $this->Rol->find('all');
            $_data = array();
            foreach($roles as $k=>$role){
                $_data[$k]['SchoolRole']['role_id'] = $role['Rol']['id'];
                $_data[$k]['SchoolRole']['school_id'] = $id;
                $_data[$k]['SchoolRole']['name'] = $role['Rol']['name'];
                $_data[$k]['SchoolRole']['short'] = $role['Rol']['short'];
                $_data[$k]['SchoolRole']['admin'] = $role['Rol']['admin'];
                $_data[$k]['SchoolRole']['user'] = $role['Rol']['user'];
                $_data[$k]['SchoolRole']['description'] = $role['Rol']['description'];
            }
            $this->SchoolRole->saveAll($_data);       
        }
    }

    private function _getSchoolDefaultRole($school_id,$name_role){
        $res = $this->SchoolRole->find('first',array('conditions'=>array('SchoolRole.short'=>$name_role,'SchoolRole.school_id'=>$school_id)));
        if(!empty($res)){
            return $res['SchoolRole']['id'];
        }
        return 0;
    }
}
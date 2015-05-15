<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController{

	function beforeFilter() {
        parent::beforeFilter();   

        /*$this->navsel_['users'] = 'active';
        $this->set('navsel_',$this->navsel_);*/

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


    function login(){
		if($this->request->is('post') || $this->request->is('put')){
			//debug($this->request->data);exit(0);
			/*$user = $this->User->find('first',
                        array(
                            'conditions'=>array(
                                'Rol.user' => 1,
                                'User.status' => 1,
                                'User.username'=>$this->request->data['User']['username'],
                            )
                        )
                    );*/
			
			$_user = $this->User->find('first',
					array(
						'conditions'=>array(
							'User.status' => 1,
                            'User.username'=>$this->request->data['User']['username'],
						)
					)
				);
			$personel = $this->Personnel->find('first',array('conditions'=>array('Personnel.user_id'=>@$_user['User']['id'])));
			if(!empty($personel) && ($personel['SchoolRole']['admin'] || $personel['SchoolRole']['user'])){
				//debug($personel);
				$_user['Rol']['name'] = $personel['SchoolRole']['name'];
				$_user['Rol']['admin'] = $personel['SchoolRole']['admin'];
				$_user['Rol']['user'] = $personel['SchoolRole']['user'];
				//debug($_user); 
				$user = $_user['User'];
				$user['Rol'] = $_user['Rol'];
				$user['Country'] = $_user['Country'];
				$user['school_id'] = $personel['Personnel']['school_id'];
				//debug($user); exit(0);
				if(!empty($user) && $this->Auth->login()){
					$this->Auth->login($user);
					$this->Session->setFlash(__('Welcome '.$_user['User']['first_name'].' '.$_user['User']['last_name']),'flashgood');
					//echo $this->Auth->login(); exit(0);
					$this->redirect(array('controller'=>'users','action'=>'profile'));
				}
			}
			$this->Session->setFlash(__('The username or password you entered is incorrect'));
		}		
	}

	function logout(){
		$this->redirect($this->Auth->logout());
	}


	public function profile() {
		$this->set('email',$this->Auth->user('username'));
	}
}
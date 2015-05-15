<?php


class SchoolsController extends AppController{

	public $uses = array('Country');

	function beforeFilter() {
        parent::beforeFilter();   
        $this->_navLink['school'] = 'active-header-link';
	    $this->set('navLink',$this->_navLink);
    }

    function isAuthorized() {
        if(parent::isAuthorized()){
            return true;
        }else{
            $this->Session->setFlash(__('You are not authorized to access this page'));
            $this->redirect('/');
        }
    }

	public function index(){
		if($this->request->is('post') || $this->request->is('put')){
			//debug($this->request->data); exit(0);
			if($this->School->save($this->request->data)){

			}else{

			}
		}
		$countries = $this->Country->find('list',array('fields'=>array('id','name')));
        $this->set('countries',$countries);   
		//debug($this->Auth->user());
		$this->request->data = $this->School->findById($this->Auth->user('school_id'));
	}

	public function sel_pattern($id = null){
		if($this->request->is('post')){
			echo WWW_ROOT . 'img' . DS. 'small-pattern'.DS.$id.'.jpg';
		}
		exit(0);
	}

}
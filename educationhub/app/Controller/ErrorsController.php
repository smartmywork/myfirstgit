<?php


class ErrorsController extends AppController{

	function beforeFilter() {
        parent::beforeFilter();   
        //$this->layout = 'bootstrap';
        //$this->navsel_['users'] = 'active';
        $this->Auth->Allow();
    }

	function admin_error404(){
		$this->Session->setFlash(__('Papge not found'));
	}

	function error404(){
		/*$this->Session->setFlash(__('Papge not found'));*/
	}
}
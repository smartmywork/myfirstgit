<?php


class RolesController extends AppController{

	public $uses = array('Rol','User');

	function beforeFilter() {
        parent::beforeFilter();   

        $this->navsel_['users'] = 'active';
        $this->set('navsel_',$this->navsel_);
    }


	function admin_index(){
		$this->set('title_for_layout','Roles list');
        $this->paginate = array(
                'Rol'=>array(
                    'order' => array('Rol.id' => 'desc'),
                    'limit'=>10
                    )
                );
        $this->set('roles',$this->paginate('Rol'));
	}

	/*function admin_add(){
		if($this->request->is('post') || $this->request->is('put')){
			if($this->Rol->save($this->request->data)){
				$this->Session->setFlash(__('Role have been saved'),'flashgood');
				$this->redirect(array('controller'=>'roles','action'=>'index','admin'=>true));
			}else{
				$this->Session->setFlash(__('Role not saved'));
			}
		}
	}*/

	function admin_edit($id = null){
		if(!$this->Rol->exists($id)){
			$this->Session->setFlash(__('Role not found'));
			$this->redirect(array('controller'=>'roles','action'=>'index','admin'=>true));
		}

		if($this->request->is('post') || $this->request->is('put')){
			if($this->Rol->save($this->request->data)){
				$this->Session->setFlash(__('Changes have been saved'),'flashgood');
				$this->redirect(array('controller'=>'roles','action'=>'index','admin'=>true));
			}else{
				$this->Session->setFlash(__('Changes not saved'));
			}
		}else{
			$this->request->data = $this->Rol->findById($id);
		}
	}

	/*function admin_delete($id = null){
		if(!$this->Rol->exists($id)){
			$this->Session->setFlash(__('Role not found'));
			$this->redirect(array('controller'=>'roles','action'=>'index','admin'=>true));
		}
		$this->User->updateAll(array('User.status'=>0),array('User.role_id'=>$id));
		if($this->Rol->delete($id)){
			$this->Session->setFlash(__('Role has been deleted'),'flashgood');
			$this->redirect(array('controller'=>'roles','action'=>'index','admin'=>true));
		}else{
			$this->Session->setFlash(__('Role is not deleted'));
		}
		$this->redirect(array('controller'=>'roles','action'=>'index','admin'=>true));
	}*/
}
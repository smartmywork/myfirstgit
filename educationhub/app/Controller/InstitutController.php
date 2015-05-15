<?php


class InstitutController extends AppController{

    public $uses = array('User','Country','School','SchoolRole','Personnel','Rol');

	function beforeFilter() {
        parent::beforeFilter();   
        $this->navsel_['schools'] = 'active';
        $this->set('navsel_',$this->navsel_);
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
    	$this->cabinetSelectTab['institut'] = 'active';
    	$this->set('cabinetSelectTab',$this->cabinetSelectTab);
        /*$institutName = $this->User->find('first',
            array(
                'fields'=>array('User.institute_name'),
                'conditions'=>array(
                    'User.'.$this->User->primaryKey => $this->Auth->user('id')
                    )
                )
            );
        //debug($institutName); exit(0);
        $this->set('institutName',$institutName['User']['institute_name']);*/

    }

    public function fees(){
    	$this->cabinetSelectTab['fees'] = 'active';
    	$this->set('cabinetSelectTab',$this->cabinetSelectTab);
    }

    public function quiz() {
        $this->cabinetSelectTab['quiz'] = 'active';
        $this->set('cabinetSelectTab',$this->cabinetSelectTab);
    }

    public function course() {
        $this->cabinetSelectTab['course'] = 'active';
        $this->set('cabinetSelectTab',$this->cabinetSelectTab);
    }

    public function admin_list(){
        //$res = $this->Personnel->find('all');
        //debug($res); exit(0);
        $this->paginate = array(
                'School'=>array(
                    'order' => array('School.id' => 'desc'),
                                        'limit'=>10
                                        )
                );
        $this->set('schools',$this->paginate('School'));
    }

    public function admin_add(){

        if($this->request->is('post') || $this->request->is('put')){
            $error = false;
            $filename = null;
                //debug(getimagesize($this->request->data['logo']['tmp_name'])); 
                if (is_uploaded_file($this->request->data['logo']['tmp_name']))  {
                    $_size = getimagesize($this->request->data['logo']['tmp_name']);
                    $width =  $_size[0];
                    $height =  $_size[1];
                    if($this->request->data['logo']['size'] <= 512000 && $width <= 150 && $height <= 110){
                        //exit(0);
                        $ext = pathinfo($this->request->data['logo']['name'], PATHINFO_EXTENSION); 
                        $filename = time().'_'.pathinfo($this->request->data['logo']['name'], PATHINFO_FILENAME).'.'.$ext;
                        if(move_uploaded_file($this->request->data['logo']['tmp_name'], APP.WEBROOT_DIR.DS.'img'.DS.'schools'.DS.$filename)){
                           
                        }
                    }else{
                        $error = true;
                        $this->Session->setFlash(__('The file is too large'));
                    }                    
                }
            unset($this->request->data['logo']);
            $this->request->data['School']['logo'] = $filename;
            //debug($this->request->data); 
            if(!$error){
                if($this->School->save($this->request->data)){
                    $this->_setSchoolRole($this->School->id);
                    $this->Session->setFlash(__('School has been saved'),'flashgood');
                    $this->redirect(array('controller'=>'institut','action'=>'list','admin'=>true));
                }else{
                     $this->Session->setFlash(__('School is not saved'));
                }
            }
        }

        $countries = $this->Country->find('list',array('fields'=>array('id','name')));
        $this->set('countries',$countries);
        $this->set('pageHeader','New school');
    }

    public function admin_edit($id){

        if(!$this->School->exists($id)){
            $this->Session->setFlash(__('School not found'));
            $this->redirect(array('controller'=>'institut','action'=>'list','admin'=>true));
        }

        if($this->request->is('post') || $this->request->is('put')){
            $error = false;
            $filename = null;
            if($this->School->save($this->request->data)){
                if (is_uploaded_file($this->request->data['logo']['tmp_name']))  {
                    $_size = getimagesize($this->request->data['logo']['tmp_name']);
                    $width =  $_size[0];
                    $height =  $_size[1];
                    if($this->request->data['logo']['size'] <= 512000 && $width <= 150 && $height <= 110){
                        //exit(0);
                        $ext = pathinfo($this->request->data['logo']['name'], PATHINFO_EXTENSION); 
                        $filename = time().'_'.pathinfo($this->request->data['logo']['name'], PATHINFO_FILENAME).'.'.$ext;
                        if(move_uploaded_file($this->request->data['logo']['tmp_name'], APP.WEBROOT_DIR.DS.'img'.DS.'schools'.DS.$filename)){
                            $this->School->set('id',$id);
                            $this->School->set('logo',$filename);
                            $this->School->save();
                        }
                    }else{
                        $error = true;
                        $this->Session->setFlash(__('The file is too large'));
                    }                    
                }
                if(!$error){
                    $this->Session->setFlash(__('School has been saved'),'flashgood');
                    $this->redirect(array('controller'=>'institut','action'=>'list','admin'=>true));
                }                
            }else{
                $this->Session->setFlash(__('School is not saved'));
            }
        }else{
            
        }
        $this->request->data = $this->School->findById($id);

        $countries = $this->Country->find('list',array('fields'=>array('id','name')));
        $this->set('countries',$countries);        
        $this->set('pageHeader','Edit school - '.$this->request->data['School']['name']);
        $this->render('admin_add');
    }

    public function admin_delete_logo($id = null) {
        if(!$this->School->exists($id)){
            $this->Session->setFlash(__('School not found'));
            $this->redirect(array('controller'=>'institut','action'=>'list','admin'=>true));
        }
        $_oldImages = $this->School->find('first',array('conditions'=>array('School.id'=>$id),'fields'=>array('logo')));
        if(!empty($this->request->query) && !empty($_oldImages['School'][$this->request->query['image']])){
            $this->_deleteImage('schools',$_oldImages['School'][$this->request->query['image']]);
            $this->School->set('id',$id);
            $this->School->set($this->request->query['image'],null);
            $this->School->save();
        }
        $this->redirect(array('controller'=>'institut','action'=>'edit','admin'=>true,$id));
        exit(0);
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

    private function _deleteImage($dir,$nameImage){
        if(file_exists(APP.WEBROOT_DIR.DS.'img'.DS.$dir.DS.$nameImage) && !empty($nameImage)){ // remove image
            unlink(APP.WEBROOT_DIR.DS.'img'.DS.$dir.DS.$nameImage);
        }
    }

    public function admin_info($id = null){
        if(!$this->School->exists($id)){
            $this->Session->setFlash(__('School not found'));
            $this->redirect(array('controller'=>'institut','action'=>'list','admin'=>true));
        }
        $school = $this->School->findById($id);
        $this->set('school',$school);
    }

    public function admin_userlist($school_id = null){
        if(!$this->School->exists($school_id)){
            $this->Session->setFlash(__('School not found'));
            $this->redirect(array('controller'=>'institut','action'=>'list','admin'=>true));
        }
        $this->paginate = array(
                'Personnel'=>array(
                    'order' => array('Personnel.id' => 'desc'),
                    'limit'=>10,
                    'conditions'=>array('Personnel.school_id'=>$school_id),
                    )
                );
        $this->set('users',$this->paginate('Personnel'));
        $this->set('school_id',$school_id);
    }

    public function admin_createuser($school_id = null){
        if(!$this->School->exists($school_id)){
            $this->Session->setFlash(__('School not found'));
            $this->redirect(array('controller'=>'institut','action'=>'list','admin'=>true));
        }
        if($this->request->is('post') || $this->request->is('put')){             
            if($this->User->save($this->request->data)){
                //$roleId = $this->_getDefaultRole($school_id);
                $this->Personnel->create();
                $this->Personnel->set('school_role_id',$this->request->data['Personnel']['school_role_id']);
                $this->Personnel->set('user_id',$this->User->id);
                $this->Personnel->set('school_id',$school_id);
                if($this->Personnel->save()){
                    $this->Session->setFlash(__('User has been created'),'flashgood');
                    $this->redirect(array('controller'=>'institut','action'=>'userlist','admin'=>true,$school_id));
                }else{
                     $this->Session->setFlash(__('User is not created'));
                }
            }
        }

        $this->set('school_id',$school_id);
        $res = $this->Country->find('list',array('fields'=>array('Country.id','Country.name')));
        $this->set('countries',$res);
        $this->set('pageHeader','Create new user');
        $this->set('schoolrole',$this->_getSchoolRole($school_id));
        $this->render('admin_user');
    }

    public function admin_useredit($id = null){
        $personnel = $this->Personnel->find('first',
                array(
                        'conditions'=>array(
                                'Personnel.school_id'=>$this->request->query['school_id'],
                                'Personnel.user_id'=>$id
                            )
                    )
            );

        if(empty($personnel)){
            $this->Session->setFlash(__('User not found'));
            $this->redirect(array('controller'=>'institut','action'=>'userlist','admin'=>true,$this->request->query['school_id']));
        }
        if($this->request->is('post') || $this->request->is('put')){    
            if(empty($this->request->data['User']['password'])){
                unset($this->request->data['User']['password']);
            }         
            if($this->User->save($this->request->data)){
                /*$roleId = $this->_getDefaultRole($school_id);
                $this->Personnel->create();
                $this->Personnel->set('school_role_id',$roleId);
                $this->Personnel->set('user_id',$this->User->id);
                $this->Personnel->set('school_id',$school_id);*/
                //debug($this->request->data); exit(0);
                $personnel['Personnel']['school_role_id'] = $this->request->data['Personnel']['school_role_id'];
                if($this->Personnel->save($personnel)){
                    $this->Session->setFlash(__('User has been created'),'flashgood');
                    $this->redirect(array('controller'=>'institut','action'=>'userlist','admin'=>true,$this->request->query['school_id']));
                }else{
                     $this->Session->setFlash(__('User is not created'));
                }
            }
            
        }else{
            $this->request->data = $this->User->findById($id);
        }

        $this->set('school_id',$this->request->query['school_id']);
        $res = $this->Country->find('list',array('fields'=>array('Country.id','Country.name')));
        $this->set('countries',$res);
        $this->set('pageHeader','Edit user');
        $this->set('schoolrole',$this->_getSchoolRole($this->request->query['school_id']));
        $this->set('schoolrole_id',$personnel['Personnel']['school_role_id'] );
        $this->render('admin_user');
    }

    public function admin_deleteuser($id = null){
        if(!$this->User->exists($id)){
            $this->Session->setFlash(__('User not found'));
            $this->redirect(array('controller'=>'institut','action'=>'userlist','admin'=>true,$this->request->query['school_id']));
        }
        if($this->Personnel->deleteAll(array('Personnel.user_id'=>$id),false) && $this->User->delete($id)){
            $this->Session->setFlash(__('User has been deleted'),'flashgood');            
        }else{
            $this->Session->setFlash(__('User is not deleted'));         
        }
        $this->redirect(array('controller'=>'institut','action'=>'userlist','admin'=>true,$this->request->query['school_id']));
    }

    private function _getDefaultRole($school_id = null,$shortName = 'student'){
        $id = $this->SchoolRole->find('first',array('fields'=>array('SchoolRole.id'),'conditions'=>array('SchoolRole.short'=>$shortName,'SchoolRole.school_id'=>$school_id)));
        return @$id['SchoolRole']['id'];
    }

    private function _getSchoolRole($school_id = null){
        return  $this->SchoolRole->find('list',array('fields'=>array('SchoolRole.id','SchoolRole.name'),'conditions'=>array('SchoolRole.school_id'=>$school_id)));
    }

    public function admin_roles($school_id = null){
        if(!$this->School->exists($school_id)){
            $this->Session->setFlash(__('School not found'));
            $this->redirect(array('controller'=>'institut','action'=>'list','admin'=>true));
        }
        $this->paginate = array(
                'SchoolRole'=>array(
                    'order' => array('SchoolRole.id' => 'desc'),
                    'limit'=>10,
                    'conditions'=>array('SchoolRole.school_id'=>$school_id),
                    )
                );
        $this->set('roles',$this->paginate('SchoolRole'));
        $this->set('school_id',$school_id);
    }

    public function admin_roleedit($id){
        if(!$this->SchoolRole->exists($id)){
            $this->Session->setFlash(__('Role not found'));
            $this->redirect(array('controller'=>'institut','action'=>'roles','admin'=>true,$this->request->query['school_id']));
        }
        if($this->request->is('post') || $this->request->is('put')){
            if($this->SchoolRole->save($this->request->data)){
                $this->Session->setFlash(__('Role has been created'),'flashgood');
                $this->redirect(array('controller'=>'institut','action'=>'roles','admin'=>true,$this->request->query['school_id']));
            }else{
                $this->Session->setFlash(__('Role is not created'));
            }
        }
        $this->request->data = $this->SchoolRole->findById($id);
        $this->set('school_id',$this->request->query['school_id']);
    }
}
<?php 


App::uses('Model', 'Model');
//App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel{
    public $name = 'User';

    public $belongsTo = array(
		'Rol' => array(
			'className' => 'Rol',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => array('id','name','admin','user')
		),    
        'Country' => array(
            'className' => 'Country',
            'foreignKey' => 'country_id',
            'conditions' => '',
            'fields' => ''
        ),             
	);
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A email is required'
            ),
            'uniqueNameRule' => array(
                'rule' => 'isUnique',
                'message' => 'Email already registered'
            ),
            'email'=>array(
            	'rule' => array('email', true),
        		'message' => 'Please supply a valid email address.'
        	)
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            ),
            'rule' => array('minLength', '8'),
            'message' => 'Minimum 8 characters long'
        ),
        'role_id' => array(
            'valid' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        ),
        'sub_domen' =>array(
        	'uniqueNameRule' => array(
                'rule' => 'isUnique',
                'message' => 'This Name has already been taken.'
            ),
            'valid'=>array(
                 'rule' => 'alphaNumericDashUnderscore',
                 'message' => 'Only little letters and integers and "-"'
                )
           
        )
    );

    public function alphaNumericDashUnderscore($check) {
        $value = array_values($check);
        $value = strtolower($value[0]);

        return preg_match('|^[a-z0-9](?:[a-z0-9-]{0,255}[a-z0-9])?$|', $value);
        //return preg_match('|^[a-zA-Z0-9](?:[a-zA-Z0-9-][a-zA-Z0-9])?$|', $value);
         //return preg_match('|^[a-z0-9](?:[a-z0-9-]{0,61}[a-z0-9])?$|', $value);
    }
    
    function isUniqueUsername($check) {

		$username = $this->find(
			'first',
			array(
				'fields' => array(
					'User.id',
					'User.username'
				),
				'conditions' => array(
					'User.username' => $check['username'],
                                        'not'=>array(
                                            'User.id'=>$this->id,
                                        )
				)
			)
		);
                //debug($this->id); //exit(0);
                //debug($username);
		if(!empty($username)){
			/*if(@$this->data[$this->alias]['username'] != $username['User']['username']){
				return true; 
			}else{
				return false; 
			}*/
                    return false; 
                    /*if($this->id != $username['User']['id']){
                        return true; exit(0);
                    }else{
                        return false;
                    }*/
		}else{
			return true; 
		}
    }

	/**
	 * Before isUniqueEmail
	 * @param array $options
	 * @return boolean
	 */
    
     public function beforeSave($options = array()) {
        // hash our password
       /* if (isset($this->data[$this->alias]['password'])) {
                $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }

        // if we get a new password, hash it
        if (isset($this->data[$this->alias]['password_update'])) {
                $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password_update']);
        }*/
        if (isset($this->data[$this->alias]['password'])) {
            //$passwordHasher = new BlowfishPasswordHasher();
            //error_log('change password '.$this->data[$this->alias]['username']);
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        if(isset($this->data[$this->alias]['sub_domen'])){
            $this->data[$this->alias]['sub_domen'] = strtolower($this->data[$this->alias]['sub_domen']);
            //debug($this->data[$this->alias]);
            //exit(0);
        }
        if (isset($this->data[$this->alias]['password_update'])) {
            //$passwordHasher = new BlowfishPasswordHasher();
            //error_log('change password '.$this->data[$this->alias]['username']);
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password_update']
            );
        }
        // fallback to our parent
            return parent::beforeSave($options);
    }
    

    
    function getSession($id){
        $res = $this->find('first',array('fields'=>array('User.session'),'conditions'=>array('User.id'=>$id)));
        if(isset($res['User']['session'])){
            return $res['User']['session'];
        }
        return '';
    }
    
}

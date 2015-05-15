<?php


App::uses('Model', 'Model');
//App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');


class User extends AppModel{
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
}
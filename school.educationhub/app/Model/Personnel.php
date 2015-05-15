<?php


class Personnel extends AppModel{
	public $useTable = 'personnel';

	public $belongsTo = array(
		'SchoolRole' => array(
			'className' => 'SchoolRole',
			'foreignKey' => 'school_role_id',
			'conditions' => '',
			'fields' => ''
		),	
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => ''
		),              
	);
}
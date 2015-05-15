<?php


class Subscription extends AppModel{
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => array('User.username')
		),             
	);
}
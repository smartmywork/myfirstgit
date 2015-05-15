<?php

class Settings extends AppModel{
	public $useTable = 'settings';

	public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A name is required'
            ),
            'uniqueNameRule' => array(
                'rule' => 'isUnique',
                'message' => 'This setting is already exists'
            ),
        ),
    );
}
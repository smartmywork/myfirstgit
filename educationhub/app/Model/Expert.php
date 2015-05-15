<?php


class Expert extends AppModel{
	public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A name is required'
            ),
            'uniqueNameRule' => array(
                'rule' => 'isUnique',
                'message' => 'This course is already exists'
            ),
        ),
        'cite' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A author is required'
            ),
        ),
    );
}
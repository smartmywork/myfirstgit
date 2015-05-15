<?php


class School extends AppModel{
	public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A name is required'
            ),
            /*'uniqueNameRule' => array(
                'rule' => 'isUnique',
                'message' => 'Name already exists'
            ),*/
        ),
    );

    public $belongsTo = array( 
        'Country' => array(
            'className' => 'Country',
            'foreignKey' => 'country_id',
            'conditions' => '',
            'fields' => ''
        ),             
    );
}
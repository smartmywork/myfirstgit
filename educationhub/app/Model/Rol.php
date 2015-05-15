<?php

App::uses('Model', 'Model');

class Rol extends AppModel{
     public $name = 'Rol';

     public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A name is required'
            ),
            'uniqueNameRule' => array(
                'rule' => 'isUnique',
                'message' => 'Name already exists'
            ),
        ),
    );

}
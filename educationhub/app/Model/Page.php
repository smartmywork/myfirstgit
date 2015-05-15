<?php


class Page extends AppModel{

	public $hasOne = 'PageContent';

	public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A name is required'
            ),
            'uniqueNameRule' => array(
                'rule' => 'isUnique',
                'message' => 'This Name has already been taken.'
            ),
        ),
        /*'slug' =>array(
        	'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A slug is required'
            ),
        	'uniqueNameRule' => array(
                'rule' => 'isUnique',
                'message' => 'This Slug has already been taken.'
            ),
            'valid'=>array(
                 'rule' => 'alphaNumericDashUnderscore',
                 'message' => 'Only little letters and integers and "-"'
                )
           
        )*/
    );

    public function alphaNumericDashUnderscore($check) {
        $value = array_values($check);
        $value = strtolower($value[0]);

        return preg_match('|^[a-z0-9](?:[a-z0-9-]{0,255}[a-z0-9])?$|', $value);
        //return preg_match('|^[a-zA-Z0-9](?:[a-zA-Z0-9-][a-zA-Z0-9])?$|', $value);
         //return preg_match('|^[a-z0-9](?:[a-z0-9-]{0,61}[a-z0-9])?$|', $value);
    }

    public function beforeSave($options = array()) {
        if(isset($this->data[$this->alias]['slug'])){
            $this->data[$this->alias]['slug'] = strtolower($this->data[$this->alias]['slug']);
            //debug($this->data[$this->alias]);
            //exit(0);
        }
        // fallback to our parent
            return parent::beforeSave($options);
    }
}
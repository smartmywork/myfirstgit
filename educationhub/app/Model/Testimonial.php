<?php


class Testimonial extends AppModel{
	public $validate = array(
        'cite' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A author is required'
            ),
        ),
    );
}
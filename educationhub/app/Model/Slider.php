<?php


class Slider extends AppModel{

    /*public $actsAs = array(
        'Upload.Upload' => array(
            'image1' => array( // The field we are configuring for
                'thumbnailSizes' => array( // Various sizes of thumbnail to generate
                    // Resize for best fit to 200px by 200px, cropped from the center of the image. Prefix with big_
                    'small' => '700x300',
                )
            ),
            'image2' => array( // The field we are configuring for
                'thumbnailSizes' => array( // Various sizes of thumbnail to generate
                    'big' => '200x200', // Resize for best fit to 200px by 200px, cropped from the center of the image. Prefix with big_
                    'small' => '120x120',
                    'thumb' => '80x80'
                    'small' => '700x300',
                )
            )
        )
    );*/

	public $validate = array(
        'header' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A header is required'
            ),
            'uniqueNameRule' => array(
                'rule' => 'isUnique',
                'message' => 'This header is already exists'
            ),
        ),
    );
}
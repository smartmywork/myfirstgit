<?php

class EmailConfig {

	public $default = array(
		'transport' => 'Mail',
		'from' => 'cool.black1717@yandex.ru',
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
	);

	public $smtp = array(
		'transport' => 'Smtp',
		'from' => array('cool.black1717@yandex.ru' => 'Education Hub'),
		'host' => 'ssl://smtp.yandex.ua',
		'port' => 465,
		'timeout' => 30,
		'username' => 'cool.black1717@yandex.ru',
		'password' => '52563988',
		'client' => null,
		'log' => false,
		'charset' => 'utf-8',
		'subject' => 'Confirm registration',
	);
	/*public $smtpOrder = array(
		'transport' => 'Smtp',
		'from' => array('cool.black1717@yandex.ru' => 'Education Hub'),
		'host' => 'smtp.yandex.ua',
		'port' => 465,
		'timeout' => 30,
		'username' => 'cool.black1717@yandex.ru',
		'password' => '52563988',
		'client' => null,
		'log' => false,
		'charset' => 'utf-8',
		'subject' => '',
		'headerCharset' => 'utf-8',
	);*/
	public $fast = array(
		'from' => 'cool.black1717@yandex.ru',
		'sender' => 'cool.black1717@yandex.ru',
		'to' => null,
		'cc' => null,
		'bcc' => null,
		'replyTo' => null,
		'readReceipt' => null,
		'returnPath' => null,
		'messageId' => true,
		'subject' => 'Confirm registration',
		'message' => null,
		'headers' => null,
		'viewRender' => null,
		'template' => false,
		'layout' => false,
		'viewVars' => null,
		'attachments' => null,
		'emailFormat' => null,
		'transport' => 'Smtp',
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

}
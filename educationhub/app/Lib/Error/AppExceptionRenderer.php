<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExceptionRenderer
 *
 * @author Mr White
 */
App::uses('ExceptionRenderer', 'Error');
class AppExceptionRenderer extends ExceptionRenderer {
    public function notFound($error) {
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'error404'));
    }
    
    public function MissingView($error) {
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'error404'));
    }
    
    public function MissingAction($error) {
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'error404'));
    }
    
    public function MissingController($error) {
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'error404'));
    }
}

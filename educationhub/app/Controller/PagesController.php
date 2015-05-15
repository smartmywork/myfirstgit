<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */

	public $uses = array();

	function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow();
	    //$this->layout = 'bootstrap';
	}

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();
		//debug($path); exit(0);
		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$activePage = '';
		if($page!='home'){
			$_content = $this->_getPageContent($page);
			$title_for_layout = $_content['Page']['title'];
			$this->set('pageContent',$_content);
			$activePage = $page;
			$path[0] = 'page';
			$this->description = htmlspecialchars($_content['PageContent']['description']);
			$this->keywords = htmlspecialchars($_content['PageContent']['keywords']);
			$this->set('description',$this->description);
            $this->set('keywords',$this->keywords);
		}else{
			$_content = $this->_getPageContent($page);
			$this->description = htmlspecialchars($_content['PageContent']['description']);
			$this->keywords = htmlspecialchars($_content['PageContent']['keywords']);
			$this->set('description',$this->description);
            $this->set('keywords',$this->keywords);
            $title_for_layout = $_content['Page']['title'];
		}
		$this->set(compact('page','activePage', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

	private function _getPageContent($slug = null){
		$_page = $this->Page->find('first',array('conditions'=>array('Page.slug'=>$slug)));
		if(empty($_page)){
			$this->redirect(array('controller'=>'errors','action'=>'error404','admin'=>false));
		}
		return $_page;
	}

	

	public function _generateSitemap() {
        $sitemap = array(
            array(
                'loc' => array('controller' => 'pages', 'action' => 'display','home'),
                'changefreq' => 'hourly',
                'priority' => '0.5'
            )
        );

        if ($results = $this->Page->find('all',array('conditions'=>array('group'=>array('site','agreement'))))) {
            foreach ($results as $result) {
                $sitemap[] = array(
                    'loc' => array('controller' => 'pages', 'action' => 'display', $result['Page']['slug']),
                    'lastmod' => time(),
                    'changefreq' => 'daily',
                    'priority' => '0.9'
                );
            }
        }

        return $sitemap;
    }
}

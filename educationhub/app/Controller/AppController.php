<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');
App::uses('SubDomain', 'Lib');

    define('DOMAIN','mobileidea.co.in');
    define('DOCROOT',dirname(ROOT).DS."school.educationhub");
    define('CONF_FOLDER','/etc/httpd/conf.d/');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $uses = array('Settings','Page','PageContent','Block','Course','Subscription','Expert','Testimonial','Slider');

	public $is_login;

    public $_siteName;

    public $_sitePath;

    public $_dirRoot;

    public $_domain;

    public $_logo;

	public $navsel_ = array('users'=>'','settings'=>'','pages'=>'','blocks'=>'','subscriptions'=>'','roles'=>'','schools'=>'');

    public $cabinetSelectTab = array('institut'=>'','account'=>'','fees'=>'','quiz'=>'','course'=>'');

    public $description = null;

    public $keywords = null;

	public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'users',
                'action' => 'index',
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login',
            ),
            'authorize' => array('Controller'),
            
            /*'authorize' => array(
                'Actions' => array('actionPath' => 'controllers/'),
                'Controller'
            ),*/
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => array(
                        'className' => 'Simple',
                        'hashType' => 'sha256'
                    ),
                    //'fields' => array('username' => 'email')
                )
            )
        )
    );

    public function isAuthorized() {
       $user = $this->Auth->user();
       /* //error_log('action = '.$this->action. ' controller = '.$this->params['controller']);
        //error_log(print_r($this->request->params,1));
        //error_log(print_r($user,1));
        
       //$this->Session->id = '144233';
        $session_id = $this->Session->id();
        //debug($session_id);
        $user_session_id = $this->User->getSession($this->Auth->user('id'));
        if($session_id != $user_session_id){
            $this->redirect(array('controller'=>'users','action'=>'logout','admin'=>false));
        }*/
        if (isset($this->params->params['prefix']) && ($this->params->params['prefix'] == 'admin')) {
            if(!empty($user) && $user['Rol']['admin']){
            	$this->is_login = true;
            	$this->set('is_login',$this->is_login);
                return true;
            }
        }else{
            if(!empty($user) && $user['Rol']['user']){
            	$this->is_login = true;
            	$this->set('is_login',$this->is_login);
                return true;
            }
        }

        return false;
    }

    function beforeFilter() {


        //exit(0);
        //echo dirname(ROOT).DS."school.educationhub";
       // exit(0);
        //$this->sendmail('FIrst letter from MyLIfe','hello world !!!');,'ost.vas@mail.ru'
        //$this->sendMail2('Four letter from MyLIfe', 'hello world !!!', array('ostapchyk.vasia@gmail.com'));
        //exit(0);
        //debug($this->Auth->loggedIn());
        //$user = $this->Auth->user();
        
        $settings = $this->_getSettings();
        $this->_siteName = $settings['SITE_NAME'];
        //$this->_sitePath = $settings['SITE_PATH'];
        $this->_logo = $settings['LOGO'];
        $this->set('siteName',$this->_siteName);
        $this->set('logo',$this->_logo);

        $this->_dirRoot = $settings['SCHOOL_DIR_ROOT']; 
        $this->_domain = $settings['DOMAIN'];

        //$this->createNewVhostHub();
        //$this->restartApache();

        $this->Auth->authError = 'You are not authorized to access this page';
        if(isset($this->params->params['prefix']) && $this->params->params['prefix'] == 'admin'){
            $user = $this->Auth->user();
            //debug($this->params->params); exit(0);
            if(!(!empty($user) && $user['Rol']['admin'] == USERTYPE_ADMIN) && $this->params->params['action'] != 'admin_login'){
                $this->redirect(array('controller'=>'users','action'=>'login','admin'=>true));
            }else{
                $this->layout = 'admin';         
            }
            //error_log('user '.print_r($user,1));
            $this->_setListPageAll();
            $this->set('navsel_',$this->navsel_);
        }else{
            $this->set('blocks',$this->_getBlock());
            $this->set('popularCourses',$this->_getPopularCourses());
            $this->set('topExpert',$this->_getTopExpert());
            $this->set('testimonials',$this->_getTestimonials());
            $this->set('sliders',$this->_getSliders());
            $this->_setListPage();
            $this->set('cabinetSelectTab',$this->cabinetSelectTab);
            $this->set('description', htmlspecialchars($this->description));
            $this->set('keywords', htmlspecialchars($this->keywords));
        }
        
        $user = $this->Auth->user();
        
        if(!empty($user) && $user['role_id']!=USERTYPE_ADMIN){
            $this->set('is_login',true);
            $this->set('username',$user['username']);
            $this->set('userData',$user);
        }
    }

    public function _getSettings(){
        return $this->Settings->find('list',array('fields'=>array('name','value'),'conditions'=>array('not'=>array('name'=>'EMAIL'))));
    }

    private function _setListPage(){ //in view
        $listPage = $this->_getListPage();
        //debug($listPage); exit(0);
        $this->set('listPage',$listPage);
    }

    private function _setListPageAll(){ //in view
        $listPage = $this->_getListPageAll();
        //debug($listPage); exit(0);
        $this->set('listPage',$listPage);
    }

    protected function _getListPage(){
        return $this->Page->find('all',array('fields'=>array('name','slug','id'),'conditions'=>array('Page.group'=>'site')));
    } 

    protected function _getListPageAll(){
        return $this->Page->find('all',array('fields'=>array('name','slug','id')));
    } 

    protected function _getBlock(){
        return $this->Block->find('all',array('limit'=>3));
    }

    protected function _getPopularCourses(){
        return $this->Course->find('all',array('limit'=>4,'order'=>'Course.stars desc'));
    }

    protected function _getTopExpert(){
        return $this->Expert->find('all',array('limit'=>2,'order'=>'Expert.id desc'));
    }

    protected function _getTestimonials(){
        return $this->Testimonial->find('all',array('limit'=>3,'order'=>'Testimonial.id desc'));
    }

    protected function _getSliders(){
        return $this->Slider->find('all',array('order'=>'Slider.id desc'));
    }

    protected function createNewVhostFile($subdomain) {
        $filename   = CONF_FOLDER.$subdomain.'.conf';
        $fh         = fopen($filename, 'w') or die("can't open file");
        //$servername = $subdomain.".".DOMAIN;
        $servername = $subdomain.".".$this->_domain;
        //$docroot = DOCROOT;
        $docroot = $this->_dirRoot;

        $virtualhost = "
        <VirtualHost *:80> 
            ServerName $servername
            ServerAlias $servername
            DocumentRoot $docroot
            <Directory />
                    Options FollowSymLinks
                    AllowOverride All
            </Directory>

            <Directory /var/www/html/educationhub/>
                    #Options Indexes FollowSymLinks MultiViews
                    AllowOverride All
                    Order allow,deny
                    allow from all
            </Directory>
        </VirtualHost>";

        debug($virtualhost);
        fwrite($fh, $virtualhost);
        fclose($fh);        
    }

    protected function restartApache() {
        $configtest = `apachectl configtest 2>&1`;
        //$configtest = shell_exec('apachectl configtest 2>&1');
        echo $configtest;
        if(strtolower(trim($configtest)) == 'syntax ok'){
            //$restart = `/etc/init.d/httpd restart 2>&1`;
            //$restart = `sudo /etc/init.d/httpd restart 2>&1`;
            //shell_exec('service httpd restart &');            
            //echo shell_exec('service httpd restart &');
           //echo $restart;
           echo shell_exec('apachectl graceful');
        }
    }

    

    protected function createNewVhostHub($subdomain = 'mylifehub.org') {
        $filename   = CONF_FOLDER.$subdomain.'.conf';
        $fh         = fopen($filename, 'w') or die("can't open file");
        //$servername = $subdomain.".".DOMAIN;
        $servername = $subdomain.".".$this->_domain;
        //$docroot = DOCROOT;
        $docroot = $this->_dirRoot;

        $virtualhost = "
        <VirtualHost *:80>
            ServerName $subdomain
            ServerAlias $subdomain www.$subdomain 
            DocumentRoot /var/www/html/educationhub
            <Directory />
                    Options FollowSymLinks
                    AllowOverride All
            </Directory>

            <Directory /var/www/html/educationhub/>
                    #Options Indexes FollowSymLinks MultiViews
                    AllowOverride All
                    Order allow,deny
                    allow from all
            </Directory>        
        </VirtualHost>";

        debug($virtualhost);
        fwrite($fh, $virtualhost);
        fclose($fh);        
    }
}

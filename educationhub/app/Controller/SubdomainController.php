<?php

	define('DOMAIN','mobileidea.co.in');
    define('DOCROOT',dirname(ROOT).DS."school.educationhub");
    define('CONF_FOLDER','/etc/httpd/conf.d/');
    

class SubdomainController extends AppController{

	function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow();
	}


	private function createNewVhostFile($subdomain) {
        $filename   = CONF_FOLDER.$subdomain.'.conf';
        $fh         = fopen($filename, 'w') or die("can't open file");
        $servername = $subdomain.".".DOMAIN;
        $docroot = DOCROOT;

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

    private function restartApache() {
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

    private function createDocRoot($subdomain){
        $docroot =  DOCROOT.$subdomain; 
        if(is_dir($subdomain)){
            echo "Document root allready exists.";
        }else{
            mkdir($docroot,644);
        }
    }


    public function admin_index(){
    	/*$subdomain = 'tt-gg';
    	//$this->createDocRoot($subdomain);
    	$this->createNewVhostFile($subdomain);
    	$this->restartApache();
    	exit(0);*/
        //$this->
    }

    private function delete(){
        $subdomain = 'qq';
        $file = CONF_FOLDER.$subdomain.'.conf';
        if(file_exists($file) && is_file($file)){
            echo 'yes ';
            if(unlink($file) === true){
                $this->restartApache();
            }
        }else{
            echo 'no';
        }
        exit(0);
    }

}